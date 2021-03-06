<?php namespace Security;

use \User as User;
use \Role as Role;
use \Capability as Capability;
use \Input as Input;
use \Hash as Hash;
use \Hashids as Hashids;
use \UserProfile as UserProfile;

class UserController extends ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::pushViews('users');    

		self::pushRoute('users');       

		self::setModule('users');

		self::pushName('user');

		self::$title = 'Usuarios';

		self::$description = 'Gestión de Usuarios del Sistema';

		self::pushBreadCrumb('Usuarios', self::$route );

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
	 * Show the form for updateing the specified resource.
	 * GET /users/show/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{

		self::addArgument('user', User::find(Hashids::decode($id)));

		self::addArgument('roles', Role::all());

		/*Audits::add(Auth::user(), array(
			'name' => 'users_get_show',
			'title' => 'Visualización detallada de Usuario',
			'description' => 'Vizualización detallada del Usuario ' . $args['user']->username 
			), 'READ');
		*/
		return self::make('show');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function getCreate()
	{

		self::addArgument('users', User::all());

		self::addArgument('roles', Role::all());

		/*Audits::add(Auth::user(), array(
			'name' => 'users_get_create',
			'title' => 'Formulario de Creación de Usuarios',
			'description' => 'Vizualización del Formulario de Creación de Usuarios'
			), 'READ');*/

		return self::make('create');
	}

	/**
	 * Show the form for creating a new resource.
	 * POST /users/create
	 *
	 * @return Response
	 */
	public function postCreate()
	{

		if( !User::isValidUsername(Input::get('username')) ):

			self::setWarning('security_user_username_err', 'Error al agregar usuario', 'El nombre de usuario ' . Input::get('username') . ' no es Válido, por favor ingrese uno diferente');

			return self::go( 'create' );

		elseif( User::hasUsername(Input::get('username')) ):

			self::setWarning('security_user_username_err', 'Error al agregar usuario', 'El usuario ' . Input::get('username') . ' ya existe, por favor ingrese uno diferente');

			// Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return self::go( 'create' );

		elseif( User::hasEmail(Input::get('email')) ):

			self::setWarning('security_user_email_err', 'Error al agregar usuario', 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente');

			// Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return self::go( 'create' );

		elseif( strlen(Input::get('password_1')) < 6 ):

			self::setWarning('security_user_password_err', 'Error al agregar usuario', 'La contraseña debe contener más de 5 caracteres');
		
			// Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return self::go( 'create' );

		elseif( Input::get('password_1') != Input::get('password_2')):

			self::setWarning('security_user_password_err', 'Error al agregar usuario', 'Las contraseñas deben ser iguales');

			// Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return self::go( 'create' );

		elseif( Input::get('role_id') == null ):

			self::setWarning('security_user_role_err', 'Error al agregar usuario', 'Debe indicar el rol del usuario');

			// Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return self::go( 'create' );

		else:

			$user = new User();
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->username = Input::get('username');
			$user->display_name = Input::get('display_name') != '' ? Input::get('display_name') : Input::get('first_name').' '.Input::get('last_name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password_1'));
			$user->role_id = Input::get('role_id');
			$user->status = 'inactive';
			
			if( $user->save() ):

				$profile = new UserProfile();
				$profile->user_id = $user->id;
				$profile->save();
	
				self::setSuccess('security_user_create', 'Usuario Agregado', 'El usuario ' . $user->display_name . ' fue agregado exitósamente');

				// Audits::add(Auth::user(), $args['msg_success'], 'CREATE');

				return self::go( 'index' );

			else:

				self::setDanger('security_user_create_err', 'Error al agregar usuario', 'Hubo un error al agregar el usuario ' . $user->display_name);

				// Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

				return self::go( 'create' );

			endif;

		endif;

	}

	/**
	 * Show the form for updateing the specified resource.
	 * GET /users/update/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getUpdate($id)
	{
		
		self::addArgument('user', User::find( Hashids::decode($id) ));

		self::addArgument('roles', Role::all());

		/*Audits::add(Auth::user(), array(
			'name' => 'users_get_update',
			'title' => 'Formulario de Edición de Usuarios',
			'description' => 'Vizualización del Formulario de Edición de Usuarios'
			), 'READ');*/

		return self::make('update');

	}

	/**
	 * Show the form for updateing the specified resource.
	 * POST /users/update/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id)
	{

		$user = User::find(Hashids::decode($id));

		if( User::hasUsername(Input::get('username'), $user->id ) ):

			/*$args = array(
				'msg_warning' => array(
					'name' => 'users_username_err',
					'title' => 'Error al actualizar usuario',
					'description' => 'El usuario ' . Input::get('username') . ' ya existe, por favor ingrese uno diferente'
					)
				);*/
			
			self::setWarning('security_user_username_err', 'Error al agregar usuario', 'El usuario ' . Input::get('username') . ' ya existe, por favor ingrese uno diferente');

			// Audits::add(Auth::user(), $args['msg_warning'], 'UPDATE');

			return self::go( 'update/'.Hashids::encrypt($user->id) );

		elseif( User::hasEmail(Input::get('email'), $user->id) ):

			/*$args = array(
				'msg_warning' => array(
					'name' => 'users_email_err',
					'title' => 'Error al actualizar usuario',
					'description' => 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente'
					)
				);*/
			
			self::setWarning('security_user_email_err', 'Error al agregar usuario', 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente');

			// Audits::add(Auth::user(), $args['msg_warning'], 'UPDATE');

			return self::go( 'update/'.Hashids::encrypt($user->id) );

		elseif( strlen(Input::get('password_1')) < 6 AND strlen(Input::get('password_1')) > 0 ):

			/*$args = array(
				'msg_warning' => array(
					'name' => 'users_password_err',
					'title' => 'Error al actualizar usuario',
					'description' => 'La contraseña debe contener más de 5 caracteres'
					)
				);*/
			
			self::setWarning('security_user_password_err', 'Error al agregar usuario', 'La contraseña debe contener más de 5 caracteres');

			// Audits::add(Auth::user(), $args['msg_warning'], 'UPDATE');

			return self::go( 'update/'.Hashids::encrypt($user->id) );

		elseif( Input::get('password_1') != Input::get('password_2')):

			/*$args = array(
				'msg_warning' => array(
					'name' => 'users_password_err',
					'title' => 'Error al actualizar usuario',
					'description' => 'Las contraseñas deben ser iguales'
					)
				);*/
			
			self::setWarning('security_user_password_err', 'Error al agregar usuario', 'Las contraseñas deben ser iguales');

			// Audits::add(Auth::user(), $args['msg_warning'], 'UPDATE');

			return self::go( 'update/'.Hashids::encrypt($user->id) );

		elseif( Input::get('role_id') == null ):

			/*$args = array(
				'msg_warning' => array(
					'name' => 'users_role_err',
					'title' => 'Error al actualizar usuario',
					'description' => 'Debe indicar el rol del usuario'
					)
				);*/
			
			self::setWarning('security_user_role_err', 'Error al agregar usuario', 'Debe indicar el rol del usuario');

			// Audits::add(Auth::user(), $args['msg_warning'], 'UPDATE');

			return self::go( 'update/'.Hashids::encrypt($user->id) );

		else:

			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->username = Input::get('username');
			$user->display_name = Input::get('display_name') != '' ? Input::get('display_name') : Input::get('first_name').' '.Input::get('last_name');
			$user->email = Input::get('email');
			$user->password = Input::get('password_1') != '' ? Hash::make(Input::get('password_1')) : $user->password;
			$user->role_id = Input::get('role_id');
			$user->status = 'inactive';

			if( $user->save() ):

				/*$args = array(
					'msg_success' => array(
						'name' => 'users_update',
						'title' => 'Usuario actualizado',
						'description' => 'El usuario ' . $user->display_name . ' fue actualizado exitósamente'
						)
					);*/

				self::setSuccess('security_user_update', 'Usuario actualizado', 'El usuario ' . $user->display_name . ' fue actualizado exitósamente');

					// Audits::add(Auth::user(), $args['msg_success'], 'UPDATE');

				return self::go( 'index' );

			else:

				/*$args = array(
					'msg_danger' => array(
						'name' => 'users_update_err',
						'title' => 'Error al actualizar usuario',
						'description' => 'Hubo un error al actualizar el usuario ' . $user->display_name
						)
					);*/
				
				self::setDanger('security_user_update_err', 'Error al actualizar usuario', 'Hubo un error al actualizar el usuario ' . $user->display_name);

				// Audits::add(Auth::user(), $args['msg_danger'], 'UPDATE');

				return self::go( 'update/'.Hashids::encrypt($user->id) );

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

		self::addArgument('user', User::find( Hashids::decode($id) ));

		self::addArgument('roles', Role::all());

		/*Audits::add(Auth::user(), array(
			'name' => 'users_get_delete',
			'title' => 'Formulario de Eliminación de Usuarios',
			'description' => 'Vizualización del Formulario de Eliminación de Usuarios'
			), 'READ');*/

		return self::make('delete');
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
		$user = User::find(Hashids::decode($id));

		if($user->delete()):

			self::setSuccess('security_user_delete', 'Usuario Eliminado', 'El usuario ' . $user->display_name . ' fue eliminado exitósamente');
			
			// Audits::add(Auth::user(), $args['msg_success'], 'DELETE');

			return self::go( 'index' );

		else:

			self::setDanger('security_user_delete_err', 'Error al eliminar usuario', 'Hubo un error al eliminar el usuario ' . $user->display_name);

			// Audits::add(Auth::user(), $args['msg_danger'], 'DELETE');

			return self::go( 'delete/'.Hashids::encrypt($user->id) );

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

		$user = User::find( Hashids::decode($id) );

		$user->status = 'active';

		if($user->save()):

			self::setSuccess('security_user_activate', 'Usuario Activado', 'El usuario ' . $user->display_name . ' fue activado exitósamente');

			// Audits::add(Auth::user(), $args['msg_success'], 'UPDATE');

			return self::go( 'index' );

		else:

			self::setDanger('security_user_activate_err', 'Error al activar usuario', 'Hubo un error al activar el usuario ' . $user->display_name);

			// Audits::add(Auth::user(), $args['msg_danger'], 'UPDATE');

			return self::go( 'index' );

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

		$user = User::find( Hashids::decode($id) );

		$user->status = 'inactive';

		if($user->save()):

			self::setSuccess('security_user_deactivate', 'Usuario Desactivado', 'El usuario ' . $user->display_name . ' fue desactivado exitósamente');

			// Audits::add(Auth::user(), $args['msg_success'], 'UPDATE');

			return self::go( 'index' );

		else:

			self::setDanger('security_user_deactivate_err', 'Error al desactivar usuario', 'Hubo un error al desactivar el usuario ' . $user->display_name);

			// Audits::add(Auth::user(), $args['msg_danger'], 'UPDATE');

			return self::go( 'index' );

		endif;

	}

}