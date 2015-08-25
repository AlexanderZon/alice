<?php namespace Teachers\Contributions;

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
		
		self::pushViews('contributions.read');    

		self::pushRoute('contributions');       

		self::setModule('contributions');

		self::pushName('contributions');

		self::addSection('show', 'Gestionar Curso');

		self::$title = 'Contribuciones';

		self::$description = 'Listado de Cursos que yo contribuyo';

		self::pushBreadCrumb('Contribuciones', self::$route );

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

		self::addArgument('courses', Auth::user()->contributions()->paginate(5));

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

		$course = Course::find(Hashids::decode($id));

		if($course->isContributor(Auth::user()) ):

			self::addArgument('hashid', $id);

			self::addArgument('course', $course);
			
			self::addArgument('sidebar_closed', true);

			return self::make('show');

		else:

			return \View::make('security.auth.404');

		endif;

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

	public function postAccept( $id ){

		$teacher = Auth::user();

		$course = Course::find(Hashids::decode($id));

		$invitation = $course->contributionOf($teacher);
		$invitation->status = 'active';
		$invitation->save();

		\Event::fire('notification.contributor_accept', array($teacher, $course));
		\Event::fire('notification.contributor_active', array($teacher, $course));

		return Response::json(array(true));

	}

	public function postDeny( $id ){

		$teacher = Auth::user();

		$course = Course::find(Hashids::decode($id));

		$invitation = $course->contributionOf($teacher);
		$invitation->delete();

		\Event::fire('notification.contributor_denied', array($teacher, $course));

		return Response::json(array(true));

	}

}
