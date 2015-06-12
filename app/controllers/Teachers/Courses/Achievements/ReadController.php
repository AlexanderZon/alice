<?php namespace Teachers\Courses\Achievements;

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
		
		self::pushViews('achievements');    

		self::pushRoute('achievements');       

		self::setModule('achievements');

		self::pushName('achievements');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Medallero';

		self::$description = 'Gestión de Medalleros de los Cursos';

		self::pushBreadCrumb('Medallero', self::$route );

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

		self::addArgument('achievements', Course::find(Hashids::decode($course_id)));

		return self::make('index');

	}

}
