<?php namespace Security;

use \User as User;
use \Role as Role;
use \Capability as Capability;
use \Input as Input;
use \Crypt as Crypt;

class RoleController extends ReadController {	

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');

		self::addSection('assign', 'Asignación');
		
		self::pushViews('roles');    

		self::pushRoute('roles');       

		self::setModule('roles');

		self::pushName('role');

		self::$title = 'Roles';

		self::$description = 'Gestión de Roles del Sistema';

		self::pushBreadCrumb('Roles', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /roles
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		self::addArgument('roles', Role::all());

		return self::make('index');

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /roles/create
	 *
	 * @return Response
	 */
	public function getCreate()
	{

		return self::make('create');

	}

	/**
	 * Show the form for creating a new resource.
	 * POST /roles/create
	 *
	 * @return Response
	 */
	public function postCreate()
	{

		if(!Role::hasName(Input::get('name'))):

			$role = new Role();
			$role->title = Input::get('title');
			$role->description = Input::get('description');
			$role->name = Input::get('name');
			$role->status = 'active';
			
			if( $role->save() ):

				self::setSuccess('security_role_create', 'Rol Agregado', 'El rol ' . $role->title . ' fue agregado exitosamente');

				return self::go( 'index' );

			else:

				self::setDanger('security_role_create_err', 'Error al agregar el rol', 'Hubo un error al agregar el rol ' . $role->title );

				return self::go( 'create' );

			endif;

		else:

			self::setWarning('security_role_name_err','Error al agregar el rol','Error: el nombre ' . Input::get('name') . ' ya existe, intente con uno diferente.');

			return self::go( 'create' );

		endif;

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /roles/edit/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getUpdate($id)
	{

		self::addArgument('role', Role::find( Crypt::decrypt($id) ));

		return self::make('update');

	}

	/**
	 * Show the form for editing the specified resource.
	 * POST /roles/edit/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id)
	{
			
		$role = Role::find( Crypt::decrypt($id) );

		if(!Role::hasName(Input::get('name'), $role->id) ):
		
			$role->title = Input::get('title');
			$role->description = Input::get('description');
			$role->name = Input::get('name');
			
			if( $role->save() ):

				self::setSuccess('security_role_update','Rol editado','El rol ' . $role->title . ' fue editado exitosamente');

				return self::go( 'index' );

			else:

				self::setDanger('security_role_update_err','Error al editar el rol','Hubo un error al editar el rol ' . $role->title);

				return self::go( 'update/'.Crypt::encrypt($role->id) );

			endif;

		else:

			self::setWarning('security_role_name_err','Error al editar el rol','Error: el nombre ' . Input::get('name') . ' ya existe, intente con uno diferente.');

			return self::go( 'update/'.Crypt::encrypt($role->id) );

		endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /roles/assign/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function getAssign($id)
	{

		self::addArgument('role', Role::find( Crypt::decrypt($id) ));

		self::addArgument('capabilities', Capability::orderBy('title','ASC')->get());

		return self::make('assign');

	}

	/**
	 * Show the form for deleting the specified resource.
	 * POST /roles/assign/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function postAssign($id)
	{
		
		$role = Role::find( Crypt::decrypt($id) );

		$capabilities = Input::get('capabilities') != null ? Input::get('capabilities') : array();
		
		if($role->capabilities()->sync($capabilities)):

			self::setSuccess('security_role_assign', 'Capacidades Asignadas', 'Las capacidades fueron exitosamente asignadas');

			return self::go( 'index' );

		else:

			self::setDanger('security_role_assign_err', 'Error al Asignar las Capacidades', 'Hubo un error al asignar las capacidades ');

			return self::go( '/assign/'.Crypt::encrypt($role->id) );

		endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /roles/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{

		self::addArgument('role', Role::find( Crypt::decrypt($id) ));

		return self::make('delete');

	}

	/**
	 * Show the form for deleting the specified resource.
	 * POST /roles/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($id)
	{
		$role =  Role::find( Crypt::decrypt($id) );

		if($role->delete()):

			self::setSuccess('security_role_delete','Rol Eliminado','El rol ' . $role->title . ' fue eliminado exitosamente');

			return self::go( 'index' );

		else:

			self::setDanger('security_role_delete_err','Error al eliminar el rol','Hubo un error al eliminar el rol ' . $role->title);

			return self::go( 'delete/'.Crypt::encrypt($role->id) );

		endif;
	}

}