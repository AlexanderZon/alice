<?php namespace Teachers\Courses\Inscriptions;

use \Course as Course;
use \Inscription as Inscription;
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
		
		self::pushViews('inscriptions');    

		self::pushRoute('inscriptions');       

		self::setModule('inscriptions');

		self::pushName('inscriptions');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Inscripciones';

		self::$description = 'Gestión de Inscripciones de los Cursos';

		self::pushBreadCrumb('Inscripciones', self::$route );

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

		self::addArgument('inscriptions', $course->postulations);

		return self::make('index');

	}

	public function getAccept( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		$inscription = Inscription::find(Hashids::decode(Input::get('inscription_id')));
		$inscription->status = 'active';
		$inscription->save();

		/* NOTIFICATE */

		self::addArgument('course', $course);

		self::addArgument('inscriptions', $course->postulations);

		return self::make('index');

	}

	public function getReject( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		$inscription = Inscription::find(Hashids::decode(Input::get('inscription_id')));
		$inscription->status = 'rejected';
		$inscription->save();

		/* NOTIFICATE */

		self::addArgument('course', $course);

		self::addArgument('inscriptions', $course->postulations);

		return self::make('index');

	}

}
