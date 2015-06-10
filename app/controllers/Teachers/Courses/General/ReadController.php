<?php namespace Teachers\Courses\General;

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
		
		self::pushViews('general');    

		self::pushRoute('general');

		self::pushName('general');

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
	public function getIndex()
	{

		self::addArgument('hashid', Hashids::decode($id));

		self::addArgument('course', Course::find(Hashids::decode($id)));
		
		self::addArgument('sidebar_closed', true);

		return self::make('general.index');

	}

}
