<?php namespace Students\Courses\Statistics;

use \Course as Course;
use \Discussion as Discussion;
use \DiscussionKarma as DiscussionKarma;
use \Attachment as Attachment;
use \User as User;
use \Auth as Auth;
use \Input as Input;
use \Response as Response;
use \GUID as GUID;
use \Hash as Hash;
use \Hashids as Hashids;
use \Crypt as Crypt;


class ReadController extends \Students\Courses\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory'); 

		self::setModule('read');  
		
		self::pushViews('statistics');    

		self::pushRoute('statistics');       

		self::setModule('statistics');

		self::pushName('statistics');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Estadisticas';

		self::$description = 'Gestión de Estadisticas de los Cursos';

		self::pushBreadCrumb('Estadisticas', self::$route );

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

		$student = Auth::user();

		self::addArgument('course', $course);

		self::addArgument('student', $student);

		return self::make('index');

	}

}
