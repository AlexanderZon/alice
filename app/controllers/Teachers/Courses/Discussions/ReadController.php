<?php namespace Teachers\Courses\Discussions;

use \Course as Course;
use \Discussion as Discussion;
use \Attachments as Attachments;
use \User as User;
use \Auth as Auth;
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
		
		self::pushViews('discussions');    

		self::pushRoute('discussions');       

		self::setModule('discussions');

		self::pushName('discussions');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Discusiones';

		self::$description = 'Gestión de Discusiones de los Cursos';

		self::pushBreadCrumb('Discusiones', self::$route );

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

		self::addArgument('discussions', $course->discussions);

		return self::make('index');

	}

	public function getAdd( $course_id = '' )
	{
		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		return self::make('add');

	}

	public function postAdd( $course_id = '' )
	{
		$course = Course::find(Hashids::decode($course_id));

		$name = Discussion::setPermalink(Input::get('title'));
		$directory = Discussion::makeFullDirectory( $course->name, $name );

		$discussion = new Discussion();
		$discussion->discussionable_id = $course->id;
		$discussion->discussionable_type = 'Course';
		$discussion->name = $name;
		$discussion->title = Input::get('title');
		$discussion->content = Input::get('content');
		$discussion->user_id = Auth::user()->id;
		$discussion->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		
		$discussion->save();

		self::addArgument('course', $course);

		self::addArgument('discussions', $course->discussions);

		return self::make('index');
	}

	public function getEdit( $course_id = '' )
	{
		$course = Course::find(Hashids::decode($course_id));
		$discussion = Discussion::find(Hashids::decode(Input::get('discussion_id')));

		self::addArgument('course', $course);

		self::addArgument('discussion', $discussion);

		return self::make('edit');

	}

	public function postEdit( $course_id = '' )
	{
		$course = Course::find(Hashids::decode($course_id));

		$discussion = Discussion::find(Hashids::decode(Input::get('discussion_id')));
		$discussion->title = Input::get('title');
		$discussion->content = Input::get('content');
		$discussion->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		$discussion->save();

		self::addArgument('course', $course);

		self::addArgument('discussions', $course->discussions);

		return self::make('index');
	}

}
