<?php namespace Students\Students;

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
		
		self::pushViews('students.read');    

		self::pushRoute('students');       

		self::setModule('students');

		self::pushName('students');

		self::addSection('show', 'Gestionar Curso');

		self::addSection('teacher', 'Visualizar Curso');

		self::$title = 'Estudiantes';

		self::$description = 'Listado de estudiantes en el sistema';

		self::pushBreadCrumb('Estudiantes', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /students
	 *
	 * @return Response
	 */
	public function getIndex( )
	{

		self::addArgument('students', User::getStudents());

		self::addArgument('section', 'index');

		return self::make('index');

	}

}