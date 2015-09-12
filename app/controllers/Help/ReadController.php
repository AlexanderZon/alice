<?php namespace Help;

use \Auth as Auth;
use \Course as Course;
use \Discussion as Discussion;
use \Lesson as Lesson;
use \User as User;

class ReadController extends \BaseController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::$views = 'help.read';

		self::$route = '/help';

		self::$name = 'help';

		self::$title = 'Inicio';

		self::$description = 'Ayuda';

		self::setArguments();

	}

	public function getIndex( $section = ''){

		return self::make('index');

	}

}