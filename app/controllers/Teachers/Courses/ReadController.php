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
		
		self::pushViews('courses');    

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

		self::addArgument('hashid', Hashids::decode($id));

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

		return Response::json(Input::all());

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
