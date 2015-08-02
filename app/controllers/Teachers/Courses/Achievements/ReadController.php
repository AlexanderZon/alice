<?php namespace Teachers\Courses\Achievements;

use \Course as Course;
use \Achievement as Achievement;
use \CourseAchievement as CourseAchievement;
use \UserCourseAchievement as UserCourseAchievement;
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
		
		self::pushViews('achievements');    

		self::pushRoute('achievements');       

		self::setModule('achievements');

		self::pushName('achievements');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Premiaciones';

		self::$description = 'Gestión de Premiaciones de los Cursos';

		self::pushBreadCrumb('Premiaciones', self::$route );

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
		self::addArgument('students', $course->students);
		self::addArgument('achievements', $course->activeachievements);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * POST /courses
	 *
	 * @return Response
	 */
	public function postAdd( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		$request = array(
			'student_id' => Input::get('student_id'),
			'achievement_id' => Input::get('achievement_id'),
 			);

		$user_course_achievement = new UserCourseAchievement();
		$user_course_achievement->user_id = Hashids::decode(Input::get('student_id'));
		$user_course_achievement->course_achievement_id = Hashids::decode(Input::get('achievement_id'));
		$user_course_achievement->status = 'active';
		$user_course_achievement->save();
		$user_course_achievement->course_achievement = $user_course_achievement->course_achievement;
		$user_course_achievement->hashids = Hashids::encode($user_course_achievement);

		$args = array(
			'user_course_achievement' => $user_course_achievement,
			'request' => $request,
			);

		return Response::json($args);

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function getEdit( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);
		self::addArgument('achievements', $course->achievements);

		return self::make('edit');

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function getBunch( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);
		self::addArgument('achievements', $course->achievements);

		return self::make('bunch');

	}

	/**
	 * Display a listing of the resource.
	 * POST /courses
	 *
	 * @return Response
	 */
	public function postBunch( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		$achievements_actives = Input::get('achievements');

		foreach($course->achievements as $achievement):

			$status = 'inactive';

			foreach($achievements_actives as $active):
				if($achievement->id == Hashids::decode($active)) $status = 'active';
			endforeach;

			$achievement->status = $status;
			$achievement->save();

		endforeach;

		return Response::json($course->achievements);

	}

	/**
	 * Display a listing of the resource.
	 * POST /achievement
	 *
	 * @return Response
	 */

	public function postAchievement( $course_id = '' ){

		$course = Course::find(Hashids::decode(Input::get('course_id')));

		$achievement = new CourseAchievement();
		$achievement->name = '';
		$achievement->title = '';
		$achievement->description = '';
		$achievement->picture = '';
		$achievement->course_id = $course->id;
		$achievement->status = 'inactive';
		$achievement->save();
		$achievement->hashids = Hashids::encode($achievement->id);

		$course->hashids = Hashids::encode($course->id);

		$args = array(
			'achievement' => $achievement,
			'course' => $course,
			);

		return Response::json($args);

	}

	/**
	 * Display a listing of the resource.
	 * PUT /achievement
	 *
	 * @return Response
	 */

	public function putAchievement( $course_id = '' ){

		$course = Course::find(Hashids::decode(Input::get('course_id')));
		$achievement = CourseAchievement::find(Hashids::decode(Input::get('id')));

		$achievement->title = Input::get('title');
		$achievement->description = Input::get('description');
		$achievement->picture = Input::get('picture');
		$achievement->save();
		$achievement->hashids = Hashids::encode($achievement->id);

		$args = array(
			'achievement' => $achievement
			);

		return Response::json($args);

	}

	/**
	 * Display a listing of the resource.
	 * DELETE /achievement
	 *
	 * @return Response
	 */

	public function deleteAchievement( $course_id = '' ){

		$course = Course::find(Hashids::decode(Input::get('course_id')));
		$achievement = CourseAchievement::find(Hashids::decode(Input::get('id')));

		$hashids = Hashids::encode($achievement->id);

		$achievement->delete();

		$args = array(
			'hashids' => $hashids
			);

		return Response::json($args);

	}

}
