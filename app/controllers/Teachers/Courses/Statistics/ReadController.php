<?php namespace Teachers\Courses\Statistics;

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
		
		self::pushViews('statistics');    

		self::pushRoute('statistics');       

		self::setModule('statistics');

		self::pushName('statistics');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Estadisticas';

		self::$description = 'Gestión de Estadisticas de los Cursos';

		self::pushBreadCrumb('Estadisticas', self::$route );

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

		$students = $course->students;

		$statistics = array();

		foreach($students as $student):

			$student->comments = $course->discussionsOf($student);

			$student->likes = 0;

			foreach($student->comments as $comment):
				$student->likes += $comment->thumbsups->count();
			endforeach;

			$student->average = $course->averageOf($student);

			$statistics[] = array(
				"student" => $student->display_name,
				"likes" => $student->likes,
				"comments" => count($student->comments),
				"average" => $student->average,
				"achievements" => count($student->achievementFromCourse($course))
				);

		endforeach;

		self::addArgument('course', $course);

		self::addArgument('students', $students);

		self::addArgument('statistics', json_encode($statistics));

		return self::make('index');

	}

}
