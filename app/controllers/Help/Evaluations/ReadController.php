<?php namespace Help\Evaluations;

use \Course as Course;
use \Inscription as Inscription;
use \User as User;
use \Input as Input;
use \Response as Response;
use \Hash as Hash;
use \Hashids as Hashids;
use \Auth as Auth;

class ReadController extends \Help\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::pushViews('evaluations.read');    

		self::pushRoute('evaluations');       

		self::setModule('evaluations');

		self::pushName('evaluations');

		self::addSection('teacher', 'Actividades');

		self::$title = 'Actividades';

		self::$description = 'Ayuda de Actividades';

		self::pushBreadCrumb('Actividades', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /evaluations
	 *
	 * @return Response
	 */
	public function getIndex( $section = 'index' )
	{

		return self::make( $section );

	}

}