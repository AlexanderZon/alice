<?php namespace Teachers\Contributions;

use \Course as Course;
use \User as User;
use \Input as Input;
use \Hash as Hash;
use \Hashids as Hashids;


class ReadController extends \Teachers\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::pushViews('contributions');    

		self::pushRoute('contributions');       

		self::setModule('contributions');

		self::pushName('contributions');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Contribuciones';

		self::$description = 'Gestión de Contribuciones de los Cursos';

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

		self::addArgument('courses', Course::actives());

		return self::make('index');

	}

}
