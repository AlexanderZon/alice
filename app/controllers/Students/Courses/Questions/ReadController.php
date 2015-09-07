<?php namespace Students\Courses\Questions;

use \Course as Course;
use \CourseQuestion as CourseQuestion;
use \User as User;
use \Input as Input;
use \Hash as Hash;
use \Hashids as Hashids;
use \Response as Response;


class ReadController extends \Students\Courses\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory'); 

		self::setModule('read');  
		
		self::pushViews('questions');    

		self::pushRoute('questions');       

		self::setModule('questions');

		self::pushName('questions');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Preguntas';

		self::$description = 'Gestión de Preguntas de los Cursos';

		self::pushBreadCrumb('Preguntas', self::$route );

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

		self::addArgument('questions', $course->questions);

		return self::make('index');

	}

}
