<?php namespace Teachers\Courses\Contributors;

use \Course as Course;
use \User as User;
use \Contributor as Contributor;
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
		
		self::pushViews('contributors');    

		self::pushRoute('contributors');       

		self::setModule('contributors');

		self::pushName('contributors');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Contribuidores';

		self::$description = 'Gestión de Contribuidores de los Cursos';

		self::pushBreadCrumb('Contribuidores', self::$route );

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

		self::addArgument('contributors', $course->contributors);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function getAdd( $course_id = '' )
	{
		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('teachers', $course->noncontributors());

		return self::make('add');

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function postInvite( $course_id = '' )
	{
		$course = Course::find(Hashids::decode($course_id));

		$teacher = User::find(Hashids::decode(Input::get('teacher_id')));

		$contributor = new Contributor();
		$contributor->course_id = $course->id;
		$contributor->user_id = $teacher->id;
		$contributor->status = 'inactive';
		$contributor->save();

		\Event::fire('notification.contributor_invite', array($teacher, $course));

		self::addArgument('course', $course);

		self::addArgument('teachers', $course->noncontributors());

		return self::make('add');

	}



}
