<?php namespace Coordinators\Teachers;

use \User as User;
use \Role as Role;
use \Capability as Capability;
use \Input as Input;
use \Hash as Hash;
use \Hashids as Hashids;
use \UserProfile as UserProfile;

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

		self::pushName('teachers_read');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Profesores';

		self::$description = 'Gestión de Profesores del Sistema';

		self::pushBreadCrumb('Profesores', self::$route );

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

		self::addArgument('teachers', User::getTeachers());

		self::addArgument('roles', Role::all());

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /teachers
	 *
	 * @return Response
	 */
	public function getInactive()
	{

		self::addArgument('teachers', User::getTeachers('inactive'));

		self::addArgument('roles', Role::all());

		return self::make('inactive');

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

		self::addArgument('teachers', User::getTeachers());

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

		if( !User::isValidUsername(Input::get('username')) ):

			self::setWarning('coordinators_teachers_username_err', 'Error al agregar estudiante', 'El nombre de usuario ' . Input::get('username') . ' no es Válido, por favor ingrese uno diferente');

			return self::go( 'create' );

		elseif( User::hasUsername(Input::get('username')) ):

			self::setWarning('coordinators_teachers_username_err', 'Error al agregar profesor', 'El profesor ' . Input::get('username') . ' ya existe, por favor ingrese uno diferente');

			return self::go( 'create' );

		elseif( User::hasEmail(Input::get('email')) ):

			self::setWarning('coordinators_teachers_email_err', 'Error al agregar profesor', 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente');

			return self::go( 'create' );

		elseif( strlen(Input::get('password_1')) < 6 ):

			self::setWarning('coordinators_teachers_password_err', 'Error al agregar profesor', 'La contraseña debe contener más de 5 caracteres');

			return self::go( 'create' );

		elseif( Input::get('password_1') != Input::get('password_2')):

			self::setWarning('coordinators_teachers_password_err', 'Error al agregar profesor', 'Las contraseñas deben ser iguales');

			return self::go( 'create' );

		else:

			$role = Role::getByName( 'teacher' );

			$teacher = new User();
			$teacher->first_name = Input::get('first_name');
			$teacher->last_name = Input::get('last_name');
			$teacher->username = Input::get('username');
			$teacher->display_name = Input::get('display_name') != '' ? Input::get('display_name') : Input::get('first_name').' '.Input::get('last_name');
			$teacher->email = Input::get('email');
			$teacher->password = Hash::make(Input::get('password_1'));
			$teacher->role_id = $role->id;
			$teacher->status = 'active';
			
			if( $teacher->save() ):

				$profile = new UserProfile();
				$profile->user_id = $teacher->id;
				$profile->save();

				\Event::fire('notification.new_teacher', array($teacher));
	
				self::setSuccess('coordinators_teachers_create', 'Profesor Agregado', 'El profesor ' . $teacher->display_name . ' fue agregado exitósamente');

				return self::go( 'index' );

			else:

				self::setDanger('coordinators_teachers_create_err', 'Error al agregar profesor', 'Hubo un error al agregar el profesor ' . $teacher->display_name);

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

		if( User::hasUsername(Input::get('username'), $teacher->id ) ):
			
			self::setWarning('coordinators_teachers_username_err', 'Error al agregar profesor', 'El profesor ' . Input::get('username') . ' ya existe, por favor ingrese uno diferente');

			return self::go( 'update/'.Crypt::encrypt($teacher->id) );

		elseif( User::hasEmail(Input::get('email'), $teacher->id) ):
			
			self::setWarning('coordinators_teachers_email_err', 'Error al agregar profesor', 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente');

			return self::go( 'update/'.Crypt::encrypt($teacher->id) );

		elseif( strlen(Input::get('password_1')) < 6 AND strlen(Input::get('password_1')) > 0 ):
			
			self::setWarning('coordinators_teachers_password_err', 'Error al agregar profesor', 'La contraseña debe contener más de 5 caracteres');

			return self::go( 'update/'.Crypt::encrypt($teacher->id) );

		elseif( Input::get('password_1') != Input::get('password_2')):
			
			self::setWarning('coordinators_teachers_password_err', 'Error al agregar profesor', 'Las contraseñas deben ser iguales');

			return self::go( 'update/'.Crypt::encrypt($teacher->id) );

		else:

			$role = Role::getByName( 'teacher' );

			$teacher->first_name = Input::get('first_name');
			$teacher->last_name = Input::get('last_name');
			$teacher->username = Input::get('username');
			$teacher->display_name = Input::get('display_name') != '' ? Input::get('display_name') : Input::get('first_name').' '.Input::get('last_name');
			$teacher->email = Input::get('email');
			$teacher->password = Input::get('password_1') != '' ? Hash::make(Input::get('password_1')) : $teacher->password;
			$teacher->role_id = $role->id;
			$teacher->status = 'inactive';

			if( $teacher->save() ):

				self::setSuccess('coordinators_teachers_update', 'Profesor actualizado', 'El profesor ' . $teacher->display_name . ' fue actualizado exitósamente');

				return self::go( 'inactive' );

			else:
				
				self::setDanger('coordinators_teachers_update_err', 'Error al actualizar profesor', 'Hubo un error al actualizar el profesor ' . $teacher->display_name);

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

			self::setSuccess('coordinators_teachers_delete', 'Profesor Eliminado', 'El profesor ' . $teacher->display_name . ' fue eliminado exitósamente');

			return self::go( 'index' );

		else:

			self::setDanger('coordinators_teachers_delete_err', 'Error al eliminar profesor', 'Hubo un error al eliminar el profesor ' . $teacher->display_name);

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

			self::setSuccess('coordinators_teachers_activate', 'Profesor Activado', 'El profesor ' . $teacher->display_name . ' fue activado exitósamente');

			return self::go( 'index' );

		else:

			self::setDanger('coordinators_teachers_activate_err', 'Error al activar profesor', 'Hubo un error al activar el profesor ' . $teacher->display_name);

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

			self::setSuccess('coordinators_teachers_deactivate', 'Profesor Desactivado', 'El profesor ' . $teacher->display_name . ' fue desactivado exitósamente');

			return self::go( 'index' );

		else:

			self::setDanger('coordinators_teachers_deactivate_err', 'Error al desactivar profesor', 'Hubo un error al desactivar el profesor ' . $teacher->display_name);

			return self::go( 'index' );

		endif;

	}

}