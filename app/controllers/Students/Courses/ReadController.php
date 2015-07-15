<?php namespace Students\Courses;

use \Course as Course;
use \Inscription as Inscription;
use \User as User;
use \Input as Input;
use \Response as Response;
use \Hash as Hash;
use \Hashids as Hashids;
use \Auth as Auth;


class ReadController extends \Students\ReadController {

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

		self::addSection('course', 'Visualizar Curso');

		self::$title = 'Cursos';

		self::$description = 'Contenido del Curso';

		self::pushBreadCrumb('Cursos', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function getIndex( )
	{

		self::addArgument('courses', Course::where( 'status', '=', 'active' )->paginate(5));

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
	public function getCourse( $name )
	{

		$course = Course::getByName($name);

		self::addArgument('hashid', Hashids::encode($course->id));

		self::addArgument('course', $course);
		
		self::addArgument('sidebar_closed', true);

		return self::make('show');

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function postVer( $id )
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

	public function getPostular( $id ){

		$course = Course::find(Hashids::decode($id));

		$inscription = $course->getPostuled(Auth::user());
		if($inscription == null ) $inscription = new Inscription();

		$inscription->user_id = Auth::user()->id;
		$inscription->course_id = $course->id;
		$inscription->status = 'inactive';
		$inscription->save();

		/* NOTIFICATE */

		self::addArgument('courses', Course::where( 'status', '=', 'active' )->paginate(5));

		self::addArgument('section', 'index');

		return self::make('index');

	}

	public function getNopostular( $id ){

		$course = Course::find(Hashids::decode($id));

		$inscription = $course->getPostuled(Auth::user());

		if($inscription != null) $inscription->delete();

		/* NOTIFICATE */

		self::addArgument('courses', Course::where( 'status', '=', 'active' )->paginate(5));

		self::addArgument('section', 'index');

		return self::make('index');

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