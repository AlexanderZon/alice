<?php namespace Coordinators\Students;

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
		
		self::pushViews('students');    

		self::pushRoute('students');       

		self::setModule('students');

		self::pushName('students_read');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Estudiantes';

		self::$description = 'Gestión de Estudiantes del Sistema';

		self::pushBreadCrumb('Estudiantes', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /students
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		self::addArgument('students', User::getStudents());

		self::addArgument('roles', Role::all());

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /students
	 *
	 * @return Response
	 */
	public function getInactive()
	{

		self::addArgument('students', User::getStudents('inactive'));

		self::addArgument('roles', Role::all());

		return self::make('inactive');

	}

	/**
	 * Show the form for updateing the specified resource.
	 * GET /students/show/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{

		self::addArgument('student', User::find(Hashids::decode($id)));

		self::addArgument('roles', Role::all());

		return self::make('show');

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /students/create
	 *
	 * @return Response
	 */
	public function getCreate()
	{

		self::addArgument('students', User::getStudents());

		self::addArgument('roles', Role::all());

		return self::make('create');

	}

	/**
	 * Show the form for creating a new resource.
	 * POST /students/create
	 *
	 * @return Response
	 */
	public function postCreate()
	{

		if( User::hasUsername(Input::get('username')) ):

			self::setWarning('coordinators_students_username_err', 'Error al agregar estudiante', 'El estudiante ' . Input::get('username') . ' ya existe, por favor ingrese uno diferente');

			return self::go( 'create' );

		elseif( User::hasEmail(Input::get('email')) ):

			self::setWarning('coordinators_students_email_err', 'Error al agregar estudiante', 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente');

			return self::go( 'create' );

		elseif( strlen(Input::get('password_1')) < 6 ):

			self::setWarning('coordinators_students_password_err', 'Error al agregar estudiante', 'La contraseña debe contener más de 5 caracteres');

			return self::go( 'create' );

		elseif( Input::get('password_1') != Input::get('password_2')):

			self::setWarning('coordinators_students_password_err', 'Error al agregar estudiante', 'Las contraseñas deben ser iguales');

			return self::go( 'create' );

		else:

			$role = Role::getByName( 'student' );

			$student = new User();
			$student->first_name = Input::get('first_name');
			$student->last_name = Input::get('last_name');
			$student->username = Input::get('username');
			$student->display_name = Input::get('display_name') != '' ? Input::get('display_name') : Input::get('first_name').' '.Input::get('last_name');
			$student->email = Input::get('email');
			$student->password = Hash::make(Input::get('password_1'));
			$student->role_id = $role->id;
			$student->status = 'active';
			
			if( $student->save() ):
	
				self::setSuccess('coordinators_students_create', 'Estudiante Agregado', 'El estudiante ' . $student->display_name . ' fue agregado exitósamente');

				return self::go( 'index' );

			else:

				self::setDanger('coordinators_students_create_err', 'Error al agregar estudiante', 'Hubo un error al agregar el estudiante ' . $student->display_name);

				return self::go( 'create' );

			endif;

		endif;

	}

	/**
	 * Show the form for updateing the specified resource.
	 * GET /students/update/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getUpdate($id)
	{

		self::addArgument('student', User::find( Hashids::decode($id) ));

		self::addArgument('roles', Role::all());

		return self::make('update');

	}

	/**
	 * Show the form for updateing the specified resource.
	 * POST /students/update/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id)
	{

		$student = User::find(Hashids::decode($id));

		if( User::hasUsername(Input::get('username'), $student->id ) ):
			
			self::setWarning('coordinators_students_username_err', 'Error al agregar estudiante', 'El estudiante ' . Input::get('username') . ' ya existe, por favor ingrese uno diferente');

			return self::go( 'update/'.Crypt::encrypt($student->id) );

		elseif( User::hasEmail(Input::get('email'), $student->id) ):
			
			self::setWarning('coordinators_students_email_err', 'Error al agregar estudiante', 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente');

			return self::go( 'update/'.Crypt::encrypt($student->id) );

		elseif( strlen(Input::get('password_1')) < 6 AND strlen(Input::get('password_1')) > 0 ):
			
			self::setWarning('coordinators_students_password_err', 'Error al agregar estudiante', 'La contraseña debe contener más de 5 caracteres');

			return self::go( 'update/'.Crypt::encrypt($student->id) );

		elseif( Input::get('password_1') != Input::get('password_2')):
			
			self::setWarning('coordinators_students_password_err', 'Error al agregar estudiante', 'Las contraseñas deben ser iguales');

			return self::go( 'update/'.Crypt::encrypt($student->id) );

		else:

			$role = Role::getByName( 'student' );

			$student->first_name = Input::get('first_name');
			$student->last_name = Input::get('last_name');
			$student->username = Input::get('username');
			$student->display_name = Input::get('display_name') != '' ? Input::get('display_name') : Input::get('first_name').' '.Input::get('last_name');
			$student->email = Input::get('email');
			$student->password = Input::get('password_1') != '' ? Hash::make(Input::get('password_1')) : $student->password;
			$student->role_id = $role->id;
			$student->status = 'inactive';

			if( $student->save() ):

				self::setSuccess('coordinators_students_update', 'Estudiante actualizado', 'El estudiante ' . $student->display_name . ' fue actualizado exitósamente');

				return self::go( 'inactive' );

			else:
				
				self::setDanger('coordinators_students_update_err', 'Error al actualizar estudiante', 'Hubo un error al actualizar el estudiante ' . $student->display_name);

				return self::go( 'update/'.Crypt::encrypt($student->id) );

			endif;

		endif;
	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /students/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{

		self::addArgument('student', User::find( Hashids::decode($id) ));

		self::addArgument('roles', Role::all());

		return self::make('delete');
	}

	/**
	 * Show the form for deleting the specified resource.
	 * POST /students/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($id)
	{
		$student = User::find(Hashids::decode($id));

		if($student->delete()):

			self::setSuccess('coordinators_students_delete', 'Estudiante Eliminado', 'El estudiante ' . $student->display_name . ' fue eliminado exitósamente');

			return self::go( 'index' );

		else:

			self::setDanger('coordinators_students_delete_err', 'Error al eliminar estudiante', 'Hubo un error al eliminar el estudiante ' . $student->display_name);

			return self::go( 'delete/'.Crypt::encrypt($student->id) );

		endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /students/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getActivate($id)
	{

		$student = User::find( Hashids::decode($id) );

		$student->status = 'active';

		if($student->save()):

			self::setSuccess('coordinators_students_activate', 'Estudiante Activado', 'El estudiante ' . $student->display_name . ' fue activado exitósamente');

			return self::go( 'index' );

		else:

			self::setDanger('coordinators_students_activate_err', 'Error al activar estudiante', 'Hubo un error al activar el estudiante ' . $student->display_name);

			return self::go( 'index' );

		endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /students/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDeactivate($id)
	{

		$student = User::find( Hashids::decode($id) );

		$student->status = 'inactive';

		if($student->save()):

			self::setSuccess('coordinators_students_deactivate', 'Estudiante Desactivado', 'El estudiante ' . $student->display_name . ' fue desactivado exitósamente');

			return self::go( 'index' );

		else:

			self::setDanger('coordinators_students_deactivate_err', 'Error al desactivar estudiante', 'Hubo un error al desactivar el estudiante ' . $student->display_name);

			return self::go( 'index' );

		endif;

	}

}