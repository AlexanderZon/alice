<?php namespace Students\Courses\General;

use \Hashids as Hashids;
use \Course as Course;

class ReadController extends \Students\Courses\ReadController {

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
	public function postIndex( $course_name = '' )
	{

		$course =  Course::getByName($course_name);

		self::addArgument('hashid', Hashids::encode($course->id));

		self::addArgument('course', $course);
		
		self::addArgument('sidebar_closed', true);

		return self::make('index');

	}

}