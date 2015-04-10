<?php namespace Coordinators\Teachers;

use \User as User;
use \Role as Role;
use \Capability as Capability;
use \Input as Input;
use \Hash as Hash;
use \Hashids as Hashids;

class ReadController extends \Coordinators\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::pushViews('teachers');    

		self::pushRoute('teachers');       

		self::setModule('teachers');

		self::pushName('teacher');

		self::$title = 'Usuarios';

		self::$description = 'Gestión de Usuarios del Sistema';

		self::pushBreadCrumb('Usuarios', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /teachers
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		self::addArgument('teachers', User::all());

		self::addArgument('roles', Role::all());

		return self::make('index');

	}

	/**
	 * Show the form for updateing the specified resource.
	 * GET /teachers/show/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{

		self::addArgument('teacher', User::find(Hashids::decode($id)));

		self::addArgument('roles', Role::all());

		return self::make('show');

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /teachers/create
	 *
	 * @return Response
	 */
	public function getCreate()
	{

		self::addArgument('teachers', User::all());

		self::addArgument('roles', Role::all());

		return self::make('create');

	}

	/**
	 * Show the form for creating a new resource.
	 * POST /teachers/create
	 *
	 * @return Response
	 */
	public function postCreate()
	{

		if( User::hasUsername(Input::get('teachername')) ):

			self::setWarning('coordinator_teacher_teachername_err', 'Error al agregar usuario', 'El usuario ' . Input::get('teachername') . ' ya existe, por favor ingrese uno diferente');

			return self::go( 'create' );

		elseif( User::hasEmail(Input::get('email')) ):

			self::setWarning('coordinator_teacher_email_err', 'Error al agregar usuario', 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente');

			return self::go( 'create' );

		elseif( strlen(Input::get('password_1')) < 6 ):

			self::setWarning('coordinator_teacher_password_err', 'Error al agregar usuario', 'La contraseña debe contener más de 5 caracteres');

			return self::go( 'create' );

		elseif( Input::get('password_1') != Input::get('password_2')):

			self::setWarning('coordinator_teacher_password_err', 'Error al agregar usuario', 'Las contraseñas deben ser iguales');

			return self::go( 'create' );


		elseif( Input::get('role_id') == null ):

			self::setWarning('coordinator_teacher_role_err', 'Error al agregar usuario', 'Debe indicar el rol del usuario');

			return self::go( 'create' );

		else:

			$teacher = new User();
			$teacher->first_name = Input::get('first_name');
			$teacher->last_name = Input::get('last_name');
			$teacher->teachername = Input::get('teachername');
			$teacher->display_name = Input::get('display_name') != '' ? Input::get('display_name') : Input::get('first_name').' '.Input::get('last_name');
			$teacher->email = Input::get('email');
			$teacher->password = Hash::make(Input::get('password_1'));
			$teacher->role_id = Input::get('role_id');
			$teacher->status = 'inactive';
			
			if( $teacher->save() ):
	
				self::setSuccess('coordinator_teacher_create', 'Usuario Agregado', 'El usuario ' . $teacher->display_name . ' fue agregado exitosamente');

				return self::go( 'index' );

			else:

				self::setDanger('coordinator_teacher_create_err', 'Error al agregar usuario', 'Hubo un error al agregar el usuario ' . $teacher->display_name);

				return self::go( 'create' );

			endif;

		endif;

	}

	/**
	 * Show the form for updateing the specified resource.
	 * GET /teachers/update/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getUpdate($id)
	{

		self::addArgument('teacher', User::find( Hashids::decode($id) ));

		self::addArgument('roles', Role::all());

		return self::make('update');

	}

	/**
	 * Show the form for updateing the specified resource.
	 * POST /teachers/update/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id)
	{

		$teacher = User::find(Hashids::decode($id));

		if( User::hasUsername(Input::get('teachername'), $teacher->id ) ):
			
			self::setWarning('coordinator_teacher_teachername_err', 'Error al agregar usuario', 'El usuario ' . Input::get('teachername') . ' ya existe, por favor ingrese uno diferente');

			return self::go( 'update/'.Crypt::encrypt($teacher->id) );

		elseif( User::hasEmail(Input::get('email'), $teacher->id) ):
			
			self::setWarning('coordinator_teacher_email_err', 'Error al agregar usuario', 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente');

			return self::go( 'update/'.Crypt::encrypt($teacher->id) );

		elseif( strlen(Input::get('password_1')) < 6 AND strlen(Input::get('password_1')) > 0 ):
			
			self::setWarning('coordinator_teacher_password_err', 'Error al agregar usuario', 'La contraseña debe contener más de 5 caracteres');

			return self::go( 'update/'.Crypt::encrypt($teacher->id) );

		elseif( Input::get('password_1') != Input::get('password_2')):
			
			self::setWarning('coordinator_teacher_password_err', 'Error al agregar usuario', 'Las contraseñas deben ser iguales');

			return self::go( 'update/'.Crypt::encrypt($teacher->id) );

		elseif( Input::get('role_id') == null ):
			
			self::setWarning('coordinator_teacher_role_err', 'Error al agregar usuario', 'Debe indicar el rol del usuario');

			return self::go( 'update/'.Crypt::encrypt($teacher->id) );

		else:

			$teacher->first_name = Input::get('first_name');
			$teacher->last_name = Input::get('last_name');
			$teacher->teachername = Input::get('teachername');
			$teacher->display_name = Input::get('display_name') != '' ? Input::get('display_name') : Input::get('first_name').' '.Input::get('last_name');
			$teacher->email = Input::get('email');
			$teacher->password = Input::get('password_1') != '' ? Hash::make(Input::get('password_1')) : $teacher->password;
			$teacher->role_id = Input::get('role_id');
			$teacher->status = 'inactive';

			if( $teacher->save() ):

				self::setSuccess('coordinator_teacher_update', 'Usuario actualizado', 'El usuario ' . $teacher->display_name . ' fue actualizado exitosamente');

				return self::go( 'index' );

			else:
				
				self::setDanger('coordinator_teacher_update_err', 'Error al actualizar usuario', 'Hubo un error al actualizar el usuario ' . $teacher->display_name);

				return self::go( 'update/'.Crypt::encrypt($teacher->id) );

			endif;

		endif;
	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /teachers/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{

		self::addArgument('teacher', User::find( Hashids::decode($id) ));

		self::addArgument('roles', Role::all());

		return self::make('delete');
	}

	/**
	 * Show the form for deleting the specified resource.
	 * POST /teachers/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($id)
	{
		$teacher = User::find(Hashids::decode($id));

		if($teacher->delete()):

			self::setSuccess('coordinator_teacher_delete', 'Usuario Eliminado', 'El usuario ' . $teacher->display_name . ' fue eliminado exitosamente');

			return self::go( 'index' );

		else:

			self::setDanger('coordinator_teacher_delete_err', 'Error al eliminar usuario', 'Hubo un error al eliminar el usuario ' . $teacher->display_name);

			return self::go( 'delete/'.Crypt::encrypt($teacher->id) );

		endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /teachers/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getActivate($id)
	{

		$teacher = User::find( Hashids::decode($id) );

		$teacher->status = 'active';

		if($teacher->save()):

			self::setSuccess('coordinator_teacher_activate', 'Usuario Activado', 'El usuario ' . $teacher->display_name . ' fue activado exitosamente');

			return self::go( 'index' );

		else:

			self::setDanger('coordinator_teacher_activate_err', 'Error al activar usuario', 'Hubo un error al activar el usuario ' . $teacher->display_name);

			return self::go( 'index' );

		endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /teachers/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDeactivate($id)
	{

		$teacher = User::find( Hashids::decode($id) );

		$teacher->status = 'inactive';

		if($teacher->save()):

			self::setSuccess('coordinator_teacher_deactivate', 'Usuario Desactivado', 'El usuario ' . $teacher->display_name . ' fue desactivado exitosamente');

			return self::go( 'index' );

		else:

			self::setDanger('coordinator_teacher_deactivate_err', 'Error al desactivar usuario', 'Hubo un error al desactivar el usuario ' . $teacher->display_name);

			return self::go( 'index' );

		endif;

	}

}