<?php namespace Teachers\Courses;

use \Course as Course;
use \User as User;
use \Input as Input;
use \Response as Response;
use \Hash as Hash;
use \Hashids as Hashids;
use \Auth as Auth;


class ReadController extends \Teachers\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::pushViews('courses.read');    

		self::pushRoute('courses');       

		self::setModule('courses');

		self::pushName('courses');

		self::addSection('show', 'Gestionar Curso');

		self::$title = 'Cursos';

		self::$description = 'Gestión de Cursos del Sistema';

		self::pushBreadCrumb('Cursos', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		self::addArgument('courses', Auth::user()->teaching()->paginate(5));

		self::addArgument('section', 'index');

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function getShow( $id )
	{

		self::addArgument('hashid', $id);

		self::addArgument('course', Course::find(Hashids::decode($id)));
		
		self::addArgument('sidebar_closed', true);

		return self::make('show');

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function postShow( $id )
	{

		$course = Course::find(Hashids::decode($id));
		$course->title = Input::get('title');
		$course->description = Input::get('description');
		if(Input::file('main_picture') != null) $course->main_picture = Course::uploadMainPicture(Input::file('main_picture'), $course->name);
		if(Input::file('cover_picture') != null) $course->cover_picture = Course::uploadCoverPicture(Input::file('cover_picture'), $course->name);
		$course->save();

		self::addArgument('hashid', $id);

		self::addArgument('course', $course);
		
		self::addArgument('sidebar_closed', true);

		return self::make('general.index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function postList()
	{

		self::addArgument('courses', Course::paginate(5));

		self::addArgument('section', 'index');

		return self::make('list');

	}

}
