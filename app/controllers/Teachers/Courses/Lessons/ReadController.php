<?php namespace Teachers\Courses\Lessons;

use \Course as Course;
use \User as User;
use \Input as Input;
use \Hash as Hash;
use \Hashids as Hashids;


class ReadController extends \Teachers\Courses\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');   

		self::setModule('read');
		
		self::pushViews('lessons');    

		self::pushRoute('lessons');       

		self::setModule('lessons');

		self::pushName('lessons');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Lecciones';

		self::$description = 'Gestión de Lecciones de los Cursos';

		self::pushBreadCrumb('Lecciones', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function postIndex( $id_course = '' )
	{

		$course = Course::find(Hashids::decode($id_course));

		self::addArgument('course', $course);

		self::addArgument('lessons', $course->lessons);

		return self::make('index');

	}

}
