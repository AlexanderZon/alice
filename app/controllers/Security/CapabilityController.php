<?php namespace Security;

class CapabilityController extends UserController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');
		
		self::pushViews('capabilities');  

		self::pushRoute('{user}/bar');       

		self::setModule('capabilities');

		self::pushName('user');

		self::$title = 'Usuarios';

		self::$description = 'Gestión de Usuarios del Sistema';

		self::pushBreadCrumb('Usuarios', self::$route );

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

}