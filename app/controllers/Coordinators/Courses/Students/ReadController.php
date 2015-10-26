<?php namespace Coordinators\Courses\Students;

use \Course as Course;
use \User as User;
use \Input as Input;
use \Hash as Hash;
use \Hashids as Hashids;


class ReadController extends \Coordinators\Courses\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory'); 

		self::setModule('read');  
		
		self::pushViews('students');    

		self::pushRoute('students');       

		self::setModule('students');

		self::pushName('students');

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
	public function postIndex( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('students', $course->students);

		return self::make('index');

	}

	public function getStatistics( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));

		$student = User::find(Hashids::decode(Input::get('student_id')));

		self::addArgument('course', $course);

		self::addArgument('student', $student);

		return self::make('statistics');

	}

}
