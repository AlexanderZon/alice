<?php namespace Students\Courses\Achievements;

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
		
		self::pushViews('achievements');    

		self::pushRoute('achievements');       

		self::setModule('achievements');

		self::pushName('achievements');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Premios';

		self::$description = 'Gestión de Premios de los Cursos';

		self::pushBreadCrumb('Premios', self::$route );

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

		$achievements = Auth::user()->achievementFromCourse($course);

		self::addArgument('course', $course);

		self::addArgument('achievements', $achievements);

		return self::make('index');

	}

}
