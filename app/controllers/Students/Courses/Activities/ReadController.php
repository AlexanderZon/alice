<?php namespace Students\Courses\Activities;

use \Course as Course;
use \Evaluation as Evaluation;
use \Test as Test;
use \Discussion as Discussion;
use \DiscussionKarma as DiscussionKarma;
use \Attachment as Attachment;
use \User as User;
use \Auth as Auth;
use \Input as Input;
use \Response as Response;
use \GUID as GUID;
use \Hash as Hash;
use \Hashids as Hashids;
use \Crypt as Crypt;

class ReadController extends \Students\Courses\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory'); 

		self::setModule('read');  
		
		self::pushViews('activities');    

		self::pushRoute('activities');       

		self::setModule('activities');

		self::pushName('activities');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Actividades';

		self::$description = 'Gestión de Actividades de los Cursos';

		self::pushBreadCrumb('Actividades', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function getTest( $course_name = '' )
	{
		$course = Course::getByName($course_name);	

		$evaluation = Evaluation::find(Crypt::decrypt(Input::get('evaluation_id')));

		$questions = $evaluation->json($evaluation->type);

		/*$test = new Test();
		$test->evaluation_id = $evaluation->id;
		$test->user_id = Auth::user()->id;
		$test->status = 'starting';
		$test->percentage = 0;
		$test->save();*/

		$activities = Auth::user()->achievementFromCourse($course);

		self::addArgument('course', $course);

		self::addArgument('evaluation', $evaluation);

		self::addArgument('questions', $questions);

		// self::addArgument('test', $test);

		return self::make($evaluation->type);

	}

}