<?php namespace Coordinators;

class ReadController extends \BaseController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::$views = 'coordinators.read';

		self::$route = '/coordinators';

		self::$name = 'coordinators';

		self::$title = 'Coordinadores';

		self::$description = 'Módulo de Coordinadores del Sistema';

		self::setArguments();

	}

	public function getIndex(){

		return self::make('index');

	}

}