<?php namespace Security;

use \User as User;
use \Role as Role;
use \Capability as Capability;
use \Input as Input;
use \Hash as Hash;
use \Crypt as Crypt;

class CapabilityController extends ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');
		
		self::pushViews('capabilities');  

		self::pushRoute('capabilities');       

		self::setModule('capabilities');

		self::pushName('capability');

		self::$title = 'Capacidades';

		self::$description = 'Gestión de Capacidades del Sistema';

		self::pushBreadCrumb('Capacidades', self::$route );

		self::setArguments();

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /capabilities
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		self::addArgument('capabilities', Capability::all());

		self::addArgument('roles', Role::all());

		return self::make('index');

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /capabilities/create
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		
		self::addArgument('capabilities', Capability::all());		

		return self::make('create');
	}

	/**
	 * Show the form for creating a new resource.
	 * POST /capabilities/create
	 *
	 * @return Response
	 */
	public function postCreate()
	{

		if((!Capability::hasName(Input::get('name'))) AND (!Capability::hasController(Input::get('controller'))) AND (Input::get('crud') != null ) ):

			$capability = new Capability();
			$capability->title = Input::get('title');
			$capability->description = Input::get('description');
			$capability->name = Input::get('name');
			$capability->controller = Input::get('controller');
			$capability->crud = Input::get('crud');
			
			if( $capability->save() ):

				self::setSuccess('security_capabitlity_create', 'Capacidad Agregada', 'La capacidad ' . $capability->title . ' fue agregada exitosamente');

				return self::go( 'index' );

			else:

				self::setDanger('security_capabitlity_create_err', 'Error al agregar la capacidad','Hubo un error al agregar la capacidad ' . $capability->title);

				return self::go( 'create' );

			endif;

		else:

			if(Capability::hasName(Input::get('name'))):

				self::setWarning('security_capability_name_err', 'Error al agregar la capacidad', 'Error: el nombre ' . Input::get('name') . ' ya existe, intente con uno diferente.');

				return self::go( 'create' );

			elseif(Input::get('crud') == null ):

				self::setWarning('security_capability_crud_err', 'Error al agregar la capacidad', 'Error: seleccione un tipo de crud.');

				return self::go( 'create' );

			else:

				self::setWarning('security_capability_controller_err', 'Error al agregar la capacidad', 'Error: el controlador ' . Input::get('controller') . ' ya existe, intente con uno diferente.');

				return self::go( 'create' );

			endif;

		endif;

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /capabilities/update/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getUpdate($id)
	{

		self::addArgument('capability', Capability::find( Crypt::decrypt($id) ));

		return self::make('update');

	}

	/**
	 * Show the form for editing the specified resource.
	 * POST /capabilities/update/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id)
	{
		
		$capability = Capability::find( Crypt::decrypt($id) );

		if((!Capability::hasName(Input::get('name'), $capability->id)) AND (!Capability::hasController(Input::get('controller'), $capability->id)) ):

			$capability->title = Input::get('title');
			$capability->description = Input::get('description');
			$capability->name = Input::get('name');
			$capability->controller = Input::get('controller');
			$capability->crud = Input::get('crud');
			
			if( $capability->save() ):

				self::setSuccess('security_capabiltiy_update', 'Capacidad Editada', 'La capacidad ' . $capability->title . ' fue editada exitosamente');

				return self::go( 'index' );

			else:

				self::setDanger('security_capability_update','Error al editar la capacidad','Hubo un error al editar la capacidad ' . $capability->title);

				return self::go( 'update/'.Crypt::encrypt($capability->id) );

			endif;

		else:

			if(Capability::hasName(Input::get('name'), $capability->id)):

				self::setWarning('security_capability_name_err','Error al editar la capacidad','Error: el nombre ' . Input::get('name') . ' ya existe, intente con uno diferente.');

				return self::go( 'update/'.Crypt::encrypt($capability->id) );

			elseif(Input::get('crud') == null):

				self::setWarning('security_capability_crud_err','Error al editar la capacidad','Error: seleccione el tipo de crud.');

				return self::go( 'update/'.Crypt::encrypt($capability->id) );

			else:

				self::setWarning('security_capability_controller_err','Error al editar la capacidad','Error: el controlador ' . Input::get('controller') . ' ya existe, intente con uno diferente.');

				return self::go( 'update/'.Crypt::encrypt($capability->id) );

			endif;

		endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /capabilities/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{

		self::addArgument('capability', Capability::find( Crypt::decrypt($id) ));

		return self::make('delete');

	}

	/**
	 * Show the form for deleting the specified resource.
	 * POST /capabilities/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($id)
	{
		$capability =  Capability::find( Crypt::decrypt($id) );

		if($capability->delete()):

			self::setSuccess('security_capability_delete', 'Capacidad Eliminada','La capacidad ' . $capability->title . ' fue eliminada exitosamente');

			return self::go( 'index' );

		else:

			self::setSuccess('security_capability_delete_err', 'Error al eliminar la capacidad', 'Hubo un error al eliminar la capacidad ' . $capability->title);
			
			return self::go( 'delete/'.Crypt::encrypt($capability->id) );

		endif;
	}

	public function getSeedscapabilities(){
		$capabilities = Capability::all();
		$html = '<pre>';
		foreach($capabilities as $capability):
			$html .= "
		Capability::create( array(
			'id' => $capability->id,
			'name' => '$capability->name',
			'title' => '$capability->title',
			'description' => '$capability->description',
			'controller' => '$capability->controller',
			));
				";
		endforeach;
		return $html;
	}

	public function getSeedsrolecapabilities(){
		$capabilities = RoleCapability::all();
		$html = '<pre>';
		foreach($capabilities as $capability):
			$html .= "
		RoleCapability::create( array(
			'id' => $capability->id,
			'id_capability' => '$capability->id_capability',
			'id_role' => '$capability->id_role',
			));
				";
		endforeach;
		return $html;
	}

}