<?php namespace Ancestors\Parents;

class ReadController extends \Ancestors\ReadController {

	public function __construct(){

		parent::__construct();

		self::$route;

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::pushModuleViews('parents');    

		self::pushRoute('{ancestor}/parents'); 

		self::pushName('parent');

		self::$title = 'Parents';

		self::$description = 'Gestión de Parents del Sistema';

		self::pushBreadCrumb('Parents', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /parents
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		return self::make('index');

	}

}