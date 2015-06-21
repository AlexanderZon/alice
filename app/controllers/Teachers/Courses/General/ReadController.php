<?php namespace Teachers\Courses\General;

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
		
		self::pushViews('general');    

		self::pushRoute('general');

		self::pushName('general');

		self::setModule('general');

		self::addSection('general', 'Informaciones Generales');

		self::$title = 'General';

		self::$description = 'Gestión de Informaciones Generales de los Cursos';

		self::pushBreadCrumb('General', self::$route );

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

		self::addArgument('hashid', Hashids::decode($course_id));

		self::addArgument('course', Course::find(Hashids::decode($course_id)));
		
		self::addArgument('sidebar_closed', true);

		return self::make('index');

	}


	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function postSave( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));
		$course->title = Input::get('title');
		$course->description = Input::get('description');
		if(Input::file('main_picture') != null) $course->main_picture = Course::uploadMainPicture(Input::file('main_picture'), $course->name);
		if(Input::file('cover_picture') != null) $course->cover_picture = Course::uploadCoverPicture(Input::file('cover_picture'), $course->name);
		$course->save();

		self::addArgument('hashid', $course_id);

		self::addArgument('course', $course);
		
		self::addArgument('sidebar_closed', true);

		return self::make('index');

	}

}
