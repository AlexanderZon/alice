<?php namespace Teachers\Courses\Lessons;

use \Course as Course;
use \Module as Module;
use \Lesson as Lesson;
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

	/**
	 * Display a listing of the resource.
	 * GET /addlesson
	 *
	 * @return Response
	 */
	public function getAddlesson( $course_id = '' )
	{

		$module = Module::find(Hashids::decode(Input::get('module_id')));

		self::addArgument('module', $module);

		self::addArgument('course', $module->course);

		return self::make('addlesson');

	}

	/**
	 * Display a listing of the resource.
	 * POST /addlesson
	 *
	 * @return Response
	 */
	public function postAddlesson( $course_id = '' )
	{

		$module = Module::find(Hashids::decode(Input::get('module_id')));

		$lesson = new Lesson();
		$lesson->module_id = $module->id;
		$lesson->previous_id = Input::get('previous_id') != null ? Input::get('previous_id') : 0;
		$lesson->title = Input::get('title');
		$lesson->name = Lesson::setPermalink(Input::get('title'));
		$lesson->approval_percentage = (Input::get('approval_percentage')/100);
		$lesson->content = Input::get('content');
		// $lesson->date_start = date('Y-m-d', strtotime(str_replace('/','-',strstr(Input::get('daterange'),' - ', true))));
		// $lesson->date_end = date('Y-m-d', strtotime(str_replace('/','-',str_replace(' - ','',strstr(Input::get('daterange'),' - ', false)))));
		$lesson->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		$lesson->order = Lesson::getLastPosition($module);
		$lesson->save();

		$directory = $lesson->makeFullDirectory();

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /editlesson
	 *
	 * @return Response
	 */
	public function getEditlesson( $course_id = '' )
	{

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		self::addArgument('module', $lesson->module);

		self::addArgument('lesson', $lesson);

		self::addArgument('course', Course::find(Hashids::decode($course_id)));

		return self::make('editlesson');

	}

	/**
	 * Display a listing of the resource.
	 * POST /editlesson
	 *
	 * @return Response
	 */
	public function postEditlesson( $course_id = '' )
	{

		$lesson = Lesson::find(Crypt::decrypt(Input::get('lesson_id')));
		$lesson->previous_id = Input::get('previous_id') != null ? Input::get('previous_id') : 0;
		$lesson->title = Input::get('title');
		$lesson->approval_percentage = (Input::get('approval_percentage')/100);
		$lesson->content = Input::get('content');
		// $lesson->date_start = date('Y-m-d', strtotime(str_replace('/','-',strstr(Input::get('daterange'),' - ', true))));
		// $lesson->date_end = date('Y-m-d', strtotime(str_replace('/','-',str_replace(' - ','',strstr(Input::get('daterange'),' - ', false)))));
		$lesson->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		$lesson->save();

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /deletelesson
	 *
	 * @return Response
	 */
	public function getDeletelesson( $course_id = '' )
	{

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		self::addArgument('course', Course::find(Hashids::decode( $course_id )));

		self::addArgument('lesson', $lesson);

		return self::make('deletelesson');

	}

	/**
	 * Display a listing of the resource.
	 * POST /deletelesson
	 *
	 * @return Response
	 */
	public function postDeletelesson( $course_id = '' )
	{

		$lesson = Lesson::find(Crypt::decrypt(Input::get('lesson_id')));
		$lesson->delete();

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /orderlesson
	 *
	 * @return Response
	 */
	public function getOrderlessons( $course_id = '' )
	{

		$module = Module::find(Hashids::decode(Input::get('module_id')));

		self::addArgument('module', $module);

		self::addArgument('course', $module->course);

		return self::make('orderlessons');

	}

	/**
	 * Display a listing of the resource.
	 * POST /orderlesson
	 *
	 * @return Response
	 */
	public function postOrderlessons( $course_id = '' )
	{

		$position = 0;

		foreach( Input::get('order') as $order ):
			$lesson = Lesson::find(Hashids::decode($order['id']));
			$lesson->order = $position;
			$lesson->save();
			$position++;
		endforeach;

		return Response::json(Input::get('order'));

	}

}
