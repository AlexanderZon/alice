<?php namespace Students;

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
		
		self::$views = 'students.read';

		self::$route = '/inicio';

		self::$name = 'students';

		self::$title = 'Inicio';

		self::$description = 'Mis Cursos';

		self::setArguments();

	}

	public function getIndex(){

		self::addArgument('courses', Auth::user()->learning()->paginate(25));

		return self::make('index');

	}

}