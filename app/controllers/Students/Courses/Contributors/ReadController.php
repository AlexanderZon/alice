<?php namespace Students\Courses\Contributors;

use \Course as Course;
use \User as User;
use \Input as Input;
use \Hash as Hash;
use \Hashids as Hashids;

class ReadController extends \Students\Courses\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory'); 

		self::setModule('read');  
		
		self::pushViews('contributors');    

		self::pushRoute('contributors');       

		self::setModule('contributors');

		self::pushName('contributors');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Estudiantes';

		self::$description = 'Gestión de Estudiantes de los Cursos';

		self::pushBreadCrumb('Estudiantes', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function postIndex( $course_name = '' )
	{

		$course = Course::getByName($course_name);

		self::addArgument('course', $course);

		self::addArgument('contributors', $course->contributors);

		return self::make('index');

	}

}