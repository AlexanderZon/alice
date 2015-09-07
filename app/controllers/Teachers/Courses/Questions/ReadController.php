<?php namespace Teachers\Courses\Questions;

use \Course as Course;
use \CourseQuestion as CourseQuestion;
use \User as User;
use \Input as Input;
use \Hash as Hash;
use \Hashids as Hashids;
use \Response as Response;


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
	public function postIndex( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('questions', $course->questions);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * POST /question
	 *
	 * @return Response
	 */
	public function postQuestion( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));

		$question = new CourseQuestion();
		$question->course_id = $course->id;
		$question->question = 'Pregunta #'.($course->questions->count()+1);
		$question->answer = '';
		$question->reference = '';
		$question->save();

		$question->hashids = Hashids::encode($question->id);

		$args = array(
			'question' => $question
			);

		return Response::json($args);

	}

	/**
	 * Display a listing of the resource.
	 * PUT /question
	 *
	 * @return Response
	 */
	public function putQuestion( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));

		$question = CourseQuestion::find(Hashids::decode(Input::get('id')));
		$question->question = Input::get('question');
		$question->answer = Input::get('answer');
		$question->reference = Input::get('reference');
		$question->save();

		$question->hashids = Hashids::encode($question->id);

		$args = array(
			'question' => $question
			);

		return Response::json($args);

	}

	/**
	 * Display a listing of the resource.
	 * DELETE /question
	 *
	 * @return Response
	 */
	public function deleteQuestion( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));

		$question = CourseQuestion::find(Hashids::decode(Input::get('id')));

		$question->delete();

		$args = array(
			'hashids' => Hashids::encode($question->id),
			);

		return Response::json($args);

	}

}
