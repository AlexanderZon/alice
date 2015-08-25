<?php namespace Students\Teachers;

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
		
		self::pushViews('teachers.read');    

		self::pushRoute('teachers');       

		self::setModule('teachers');

		self::pushName('teachers');

		self::addSection('show', 'Gestionar Curso');

		self::addSection('teacher', 'Visualizar Curso');

		self::$title = 'Profesores';

		self::$description = 'Listado de profesores en el sistema';

		self::pushBreadCrumb('Profesores', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /teachers
	 *
	 * @return Response
	 */
	public function getIndex( )
	{

		self::addArgument('teachers', User::getTeachers());

		self::addArgument('section', 'index');

		return self::make('index');

	}

}