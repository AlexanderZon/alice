<?php namespace Ancestors;

class ReadController extends \BaseController {

	

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');

		self::$views = 'ancestors.read';

		self::$route = '/ancestors';

		self::$name = 'ancestors';

		self::$title = 'Ancestors';

		self::$description = 'Gestión de Ancestors del Sistema';

		self::pushBreadCrumb('Ancestors', self::$route );

	}

	public function getIndex(){

		return self::make('index');

	}

}