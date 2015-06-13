<?php namespace Teachers\Courses\Lessons;

use \Course as Course;
use \Module as Module;
use \Lessons as Lessons;
use \User as User;
use \Input as Input;
use \Response as Response;
use \Hashids as Hashids;
use \Crypt as Crypt;


class ReadController extends \Teachers\Courses\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');   

		self::setModule('read');
		
		self::pushViews('lessons');    

		self::pushRoute('lessons');       

		self::setModule('lessons');

		self::pushName('lessons');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Lecciones';

		self::$description = 'Gestión de Lecciones de los Cursos';

		self::pushBreadCrumb('Lecciones', self::$route );

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

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /addmodule
	 *
	 * @return Response
	 */
	public function getAddmodule( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		return self::make('addmodule');

	}

	/**
	 * Display a listing of the resource.
	 * POST /addmodule
	 *
	 * @return Response
	 */
	public function postAddmodule( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		$module = new Module();
		$module->course_id = $course->id;
		$module->title = Input::get('title');
		$module->name = Module::setPermalink(Input::get('title'));
		$module->date_start = date('Y-m-d', strtotime(str_replace('/','-',strstr(Input::get('daterange'),' - ', true))));
		$module->date_end = date('Y-m-d', strtotime(str_replace('/','-',str_replace(' - ','',strstr(Input::get('daterange'),' - ', false)))));
		$module->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		$module->order = Module::getLastPosition($course);
		$module->save();

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /editmodule
	 *
	 * @return Response
	 */
	public function getEditmodule( $course_id = '' )
	{

		$module = Module::find(Hashids::decode(Input::get('module_id')));

		self::addArgument('course', $module->course);

		self::addArgument('module', $module);

		return self::make('editmodule');

	}

	/**
	 * Display a listing of the resource.
	 * POST /editmodule
	 *
	 * @return Response
	 */
	public function postEditmodule( $course_id = '' )
	{

		$module = Module::find(Crypt::decrypt(Input::get('module_id')));
		$module->title = Input::get('title');
		$module->name = Module::setPermalink(Input::get('title'));
		$module->date_start = date('Y-m-d', strtotime(str_replace('/','-',strstr(Input::get('daterange'),' - ', true))));
		$module->date_end = date('Y-m-d', strtotime(str_replace('/','-',str_replace(' - ','',strstr(Input::get('daterange'),' - ', false)))));
		$module->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		$module->save();

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /deletemodule
	 *
	 * @return Response
	 */
	public function getDeletemodule( $course_id = '' )
	{

		$module = Module::find(Hashids::decode(Input::get('module_id')));

		self::addArgument('course', $module->course);

		self::addArgument('module', $module);

		return self::make('deletemodule');

	}

	/**
	 * Display a listing of the resource.
	 * POST /deletemodule
	 *
	 * @return Response
	 */
	public function postDeletemodule( $course_id = '' )
	{

		$module = Module::find(Crypt::decrypt(Input::get('module_id')));
		$module->delete();

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /ordermodule
	 *
	 * @return Response
	 */
	public function getOrdermodules( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		return self::make('ordermodules');

	}

	/**
	 * Display a listing of the resource.
	 * POST /ordermodule
	 *
	 * @return Response
	 */
	public function postOrdermodules( $course_id = '' )
	{

		$position = 0;

		foreach( Input::get('order') as $order ):
			$module = Module::find(Hashids::decode($order['id']));
			$module->order = $position;
			$module->save();
			$position++;
		endforeach;

		return Response::json(Input::get('order'));

	}

}
