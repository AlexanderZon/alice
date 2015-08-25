<?php namespace Teachers;

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
		
		self::$views = 'teachers.read';

		self::$route = '/teachers';

		self::$name = 'teachers';

		self::$title = 'Escritorio';

		self::$description = 'Listado de cursos que imparto';

		self::setArguments();

	}

	public function getIndex(){

		self::addArgument('courses', Auth::user()->teaching()->paginate(5));

		self::addArgument('contributing', Auth::user()->contributions);

		self::addArgument('lessons', Auth::user()->lessonsteaching());

		self::addArgument('students', Auth::user()->studentsteaching());

		return self::make('index');

	}

}