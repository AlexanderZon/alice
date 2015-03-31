<?php namespace Ancestors\Parents\Children;

class ReadController extends \Ancestors\Parents\ReadController {

	public function __construct(){

		parent::__construct();

		self::$route;

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->afterFilter('parameters');

		$this->afterFilter('arguments');
		
		$this->afterFilter('auditory');
		
		self::pushModuleViews('children');    

		self::pushRoute('{parent}/children');       

		self::setModule('children');

		self::pushName('child');

		self::$title = 'Children';

		self::$description = 'Gestión de Children del Sistema';

		self::pushBreadCrumb('Children', self::$route );

		self::setArguments();

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /children
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		return self::make('index');

	}

}