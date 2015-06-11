<?php namespace Teachers\Courses\Questions;

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
		
		self::pushViews('questions');    

		self::pushRoute('questions');       

		self::setModule('questions');

		self::pushName('questions');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Preguntas';

		self::$description = 'Gestión de Preguntas de los Cursos';

		self::pushBreadCrumb('Preguntas', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function postIndex( $id_course = '' )
	{

		self::addArgument('questions', Course::find(Hashids::decode($id_course)));

		return self::make('index');

	}

}
