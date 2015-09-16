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

	public function postIndex( $course_name = '' ){

		$course = Course::getByName( $course_name );

		$evaluations = $course->evaluations;

		self::addArgument('course', $course);

		self::addArgument('evaluations', $evaluations);

		return self::make('index');

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

		$test = null;

		if($test = Test::where('user_id', '=', Auth::user()->id )->where('evaluation_id', '=', $evaluation->id)->first()):

			$test->status = 'repeated';
			$test->attempts = $test->attempts+1;

		else:

			$test = new Test();
			$test->evaluation_id = $evaluation->id;
			$test->user_id = Auth::user()->id;
			$test->status = 'starting';
			$test->percentage = 0;
			$test->attempts = 1;

		endif;

		$test->save();

		$activities = Auth::user()->achievementFromCourse($course);

		self::addArgument('course', $course);

		self::addArgument('evaluation', $evaluation);

		self::addArgument('questions', $questions);

		self::addArgument('test', $test);

		return self::make($evaluation->type);

	}

	public function postTest( $course_name = '' ){

		$course = Course::getByName($course_name);	

		$evaluation = Evaluation::find(Crypt::decrypt(Input::get('evaluation_id')));

		$questions = $evaluation->json($evaluation->type);

		$test = null;

		if($test = Test::find(Crypt::decrypt(Input::get('test_id')))):

			$test->status = 'finished';			

		elseif($test = Test::where('user_id', '=', Auth::user()->id )->where('evaluation_id', '=', $evaluation->id)->first()):

			$test->status = 'finished';

		else:

			$test = new Test();
			$test->evaluation_id = $evaluation->id;
			$test->user_id = Auth::user()->id;
			$test->attempts = 1;
			$test->status = 'finished';

		endif;

		$test->hits = Input::get('hits');
		$test->mistakes = Input::get('mistakes');
		$test->points = Input::get('points');
		$test->duration = Input::get('duration');
		$test->percentage = Input::get('percentage');
		$test->save();

		\Event::fire('achievement.activities', array(Auth::user()));
		\Event::fire('achievement.average', array(Auth::user()));

		return Response::json($test);

	}

}