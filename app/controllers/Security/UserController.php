<?php namespace Security;

class UserController extends \BaseController {

	protected $sections = array(
		'index' => 'Todos',
		'create' => 'Nuevo',
		'edit' => 'Editar',
		'delete' => 'Eliminar'
		);

	public function __construct(){

		// $this->beforeFilter('auth');

		// $this->beforeFilter('users');
		
		self::$views = 'security.users';

		self::$route = '/users';

		self::$title = 'Usuarios';

		self::$description = 'Gestión de Usuarios del Sistema';

		self::setArguments();

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		self::addArgument('users', User::all());

		self::addArgument('roles', Role::all());

		/*Audits::add(Auth::user(), array(
			'name' => 'users_get_create',
			'title' => 'Listado de Usuarios',
			'description' => 'Vizualización del listado de Usuarios'
			), 'READ');*/

		return self::make('index');

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/show/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{
		$args = array(
			'user' => Users::find( Crypt::decrypt($id) ),
			'roles' => Roles::all(),
			'module' => $this->module,
			);

		Audits::add(Auth::user(), array(
			'name' => 'users_get_show',
			'title' => 'Visualización detallada de Usuario',
			'description' => 'Vizualización detallada del Usuario ' . $args['user']->username 
			), 'READ');

		return View::make('users.show')->with($args);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$args = array(
			'users' => Users::all(),
			'roles' => Roles::getActive(),
			'module' => $this->module,
			);

		Audits::add(Auth::user(), array(
			'name' => 'users_get_create',
			'title' => 'Formulario de Creación de Usuarios',
			'description' => 'Vizualización del Formulario de Creación de Usuarios'
			), 'READ');

		return View::make('users.create')->with($args);
	}

	/**
	 * Show the form for creating a new resource.
	 * POST /users/create
	 *
	 * @return Response
	 */
	public function postCreate()
	{

		if( Users::hasUsername(Input::get('username')) ):

			$args = array(
				'msg_warning' => array(
					'name' => 'users_username_err',
					'title' => 'Error al agregar usuario',
					'description' => 'El usuario ' . Input::get('username') . ' ya existe, por favor ingrese uno diferente'
					)
				);

			Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return Redirect::to( $this->module['route'].'/create' )->with( $args );

		elseif( Users::hasEmail(Input::get('email')) ):

			$args = array(
				'msg_warning' => array(
					'name' => 'users_email_err',
					'title' => 'Error al agregar usuario',
					'description' => 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente'
					)
				);

			Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return Redirect::to( $this->module['route'].'/create' )->with( $args );

		elseif( strlen(Input::get('password_1')) < 6 ):

			$args = array(
				'msg_warning' => array(
					'name' => 'users_password_err',
					'title' => 'Error al agregar usuario',
					'description' => 'La contraseña debe contener más de 5 caracteres'
					)
				);
		
			Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return Redirect::to( $this->module['route'].'/create' )->with( $args );

		elseif( Input::get('password_1') != Input::get('password_2')):

			$args = array(
				'msg_warning' => array(
					'name' => 'users_password_err',
					'title' => 'Error al agregar usuario',
					'description' => 'Las contraseñas deben ser iguales'
					)
				);

			Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return Redirect::to( $this->module['route'].'/create' )->with( $args );


		elseif( Input::get('id_role') == 0 ):

			$args = array(
				'msg_warning' => array(
					'name' => 'users_role_err',
					'title' => 'Error al agregar usuario',
					'description' => 'Debe indicar el rol del usuario'
					)
				);

			Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return Redirect::to( $this->module['route'].'/create' )->with( $args );

		else:

			$user = new Users();
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->username = Input::get('username');
			$user->displayname = Input::get('displayname') != '' ? Input::get('displayname') : Input::get('first_name').' '.Input::get('last_name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password_1'));
			$user->id_role = Input::get('id_role');
			$user->status = 'inactive';
			
			if( $user->save() ):

				$args = array(
					'msg_success' => array(
						'name' => 'users_create',
						'title' => 'Usuario Agregado',
						'description' => 'El usuario ' . $user->displayname . ' fue agregado exitosamente'
						)
					);

				Audits::add(Auth::user(), $args['msg_success'], 'CREATE');

				return Redirect::to( $this->module['route'] )->with( $args );

			else:

				$args = array(
					'msg_danger' => array(
						'name' => 'users_create_err',
						'title' => 'Error al agregar usuario',
						'description' => 'Hubo un error al agregar el usuario ' . $user->displayname
						)
					);

				Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

				return Redirect::to( $this->module['route'].'/create' )->with( $args );

			endif;

		endif;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/edit/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$args = array(
			'user' => Users::find( Crypt::decrypt($id) ),
			'roles' => Roles::all(),
			'module' => $this->module,
			);

		Audits::add(Auth::user(), array(
			'name' => 'users_get_edit',
			'title' => 'Formulario de Edición de Usuarios',
			'description' => 'Vizualización del Formulario de Edición de Usuarios'
			), 'READ');

		return View::make('users.edit')->with($args);
	}

	/**
	 * Show the form for editing the specified resource.
	 * POST /users/edit/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit($id)
	{

		$user = Users::find(Crypt::decrypt($id));

		if( Users::hasUsername(Input::get('username'), $user->id ) ):

			$args = array(
				'msg_warning' => array(
					'name' => 'users_username_err',
					'title' => 'Error al editar usuario',
					'description' => 'El usuario ' . Input::get('username') . ' ya existe, por favor ingrese uno diferente'
					)
				);

			Audits::add(Auth::user(), $args['msg_warning'], 'UPDATE');

			return Redirect::to( $this->module['route'].'/edit/'.Crypt::encrypt($user->id) )->with( $args );

		elseif( Users::hasEmail(Input::get('email'), $user->id) ):

			$args = array(
				'msg_warning' => array(
					'name' => 'users_email_err',
					'title' => 'Error al editar usuario',
					'description' => 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente'
					)
				);

			Audits::add(Auth::user(), $args['msg_warning'], 'UPDATE');

			return Redirect::to( $this->module['route'].'/edit/'.Crypt::encrypt($user->id) )->with( $args );

		elseif( strlen(Input::get('password_1')) < 6 AND strlen(Input::get('password_1')) > 0):

			$args = array(
				'msg_warning' => array(
					'name' => 'users_password_err',
					'title' => 'Error al editar usuario',
					'description' => 'La contraseña debe contener más de 5 caracteres'
					)
				);

			Audits::add(Auth::user(), $args['msg_warning'], 'UPDATE');

			return Redirect::to( $this->module['route'].'/edit/'.Crypt::encrypt($user->id) )->with( $args );

		elseif( Input::get('password_1') != Input::get('password_2')):

			$args = array(
				'msg_warning' => array(
					'name' => 'users_password_err',
					'title' => 'Error al editar usuario',
					'description' => 'Las contraseñas deben ser iguales'
					)
				);

			Audits::add(Auth::user(), $args['msg_warning'], 'UPDATE');

			return Redirect::to( $this->module['route'].'/edit/'.Crypt::encrypt($user->id) )->with( $args );

		elseif( Input::get('id_role') == 0 ):

			$args = array(
				'msg_warning' => array(
					'name' => 'users_role_err',
					'title' => 'Error al editar usuario',
					'description' => 'Debe indicar el rol del usuario'
					)
				);

			Audits::add(Auth::user(), $args['msg_warning'], 'UPDATE');

			return Redirect::to( $this->module['route'].'/edit/'.Crypt::encrypt($user->id) )->with( $args );

		else:

			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->username = Input::get('username');
			$user->displayname = Input::get('displayname') != '' ? Input::get('displayname') : Input::get('first_name').' '.Input::get('last_name');
			$user->email = Input::get('email');
			$user->password = Input::get('password_1') != '' ? Hash::make(Input::get('password_1')) : $user->password;
			$user->id_role = Input::get('id_role');
			$user->status = 'inactive';

			if( $user->save() ):

				$args = array(
					'msg_success' => array(
						'name' => 'users_edit',
						'title' => 'Usuario Editado',
						'description' => 'El usuario ' . $user->displayname . ' fue editado exitosamente'
						)
					);

					Audits::add(Auth::user(), $args['msg_success'], 'UPDATE');

				return Redirect::to( $this->module['route'] )->with( $args );

			else:

				$args = array(
					'msg_danger' => array(
						'name' => 'users_edit_err',
						'title' => 'Error al editar usuario',
						'description' => 'Hubo un error al editar el usuario ' . $user->displayname
						)
					);

				Audits::add(Auth::user(), $args['msg_danger'], 'UPDATE');

				return Redirect::to( $this->module['route'].'/edit/'.Crypt::encrypt($user->id) )->with( $args );

			endif;

		endif;
	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /users/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{
		$args = array(
			'user' => Users::find( Crypt::decrypt($id) ),
			'roles' => Roles::all(),
			'module' => $this->module,
			);

		Audits::add(Auth::user(), array(
			'name' => 'users_get_delete',
			'title' => 'Formulario de Eliminación de Usuarios',
			'description' => 'Vizualización del Formulario de Eliminación de Usuarios'
			), 'READ');

		return View::make('users.delete')->with($args);
	}

	/**
	 * Show the form for deleting the specified resource.
	 * POST /users/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($id)
	{
		$user = Users::find(Crypt::decrypt($id));

		if($user->delete()):

			$args = array(
				'msg_success' => array(
					'name' => 'users_delete',
					'title' => 'Usuario Eliminado',
					'description' => 'El usuario ' . $user->displayname . ' fue eliminado exitosamente'
					)
				);

			Audits::add(Auth::user(), $args['msg_success'], 'DELETE');

			return Redirect::to( $this->module['route'] )->with( $args );

		else:

			$args = array(
				'msg_danger' => array(
					'name' => 'users_delete_err',
					'title' => 'Error al eliminar usuario',
					'description' => 'Hubo un error al eliminar el usuario ' . $user->displayname
					)
				);

			Audits::add(Auth::user(), $args['msg_danger'], 'DELETE');

			return Redirect::to( $this->module['route'].'/delete/'.Crypt::encrypt($user->id) )->with( $args );

		endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /users/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getActivate($id)
	{

		$user = Users::find( Crypt::decrypt($id) );

		$user->status = 'active';

		if($user->save()):

			$args = array(
				'msg_success' => array(
					'name' => 'users_activate',
					'title' => 'Usuario activado satisfactoriamente',
					'description' => 'El usuario ' . $user->displayname . ' ha sido activado exitosamente'
					)
				);

			Audits::add(Auth::user(), $args['msg_success'], 'UPDATE');

			return Redirect::to( $this->module['route'] )->with( $args );

		else:

			$args = array(
				'msg_danger' => array(
					'name' => 'users_activate_err',
					'title' => 'Error al activar usuario',
					'description' => 'hubo un error al activar el usuario ' . $user->displayname
					)
				);

			Audits::add(Auth::user(), $args['msg_danger'], 'UPDATE');

			return Redirect::to( $this->module['route'] )->with( $args );

		endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /users/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDeactivate($id)
	{

		$user = Users::find( Crypt::decrypt($id) );

		$user->status = 'inactive';

		if($user->save()):

			$args = array(
				'msg_success' => array(
					'name' => 'users_deactivate',
					'title' => 'Usuario desactivado satisfactoriamente',
					'description' => 'El usuario ' . $user->displayname . ' ha sido desactivado exitosamente'
					)
				);

			Audits::add(Auth::user(), $args['msg_success'], 'UPDATE');

			return Redirect::to( $this->module['route'] )->with( $args );

		else:

			$args = array(
				'msg_danger' => array(
					'name' => 'users_deactivate_err',
					'title' => 'Error al desactivar usuario',
					'description' => 'hubo un error al desactivar el usuario ' . $user->displayname
					)
				);

			Audits::add(Auth::user(), $args['msg_danger'], 'UPDATE');

			return Redirect::to( $this->module['route'] )->with( $args );

		endif;

	}

	private function getBreadcumbs(){

		$self_breadcrumb = array(
			'name' => 'Usuarios',
			'route' => '/users'
			);

		array_push( $this->breadcrumbs, $self_breadcrumb);

		return $this->breadcrumbs;

	}

}