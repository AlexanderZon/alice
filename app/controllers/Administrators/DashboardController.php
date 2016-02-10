<?php namespace Administrators;

class DashboardController extends \BaseController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::$views = 'administrators.dashboard';

		self::$route = '/administrators';

		self::$name = 'administrators_dashboard';

		self::$title = 'Administrador';

		self::$description = 'Administrador del Sistem Alyce';

		self::fixSection('index', 'Inicio');

		self::setArguments();

	}

	/**
	 * Display a listing of the resource.
	 * GET /
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		return self::make('index');

	}

}