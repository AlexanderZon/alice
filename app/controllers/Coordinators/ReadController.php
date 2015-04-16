<?php namespace Coordinators;

use \Course as Course;
use \Discussion as Discussion;
use \Lesson as Lesson;
use \User as User;

class ReadController extends \BaseController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::$views = 'coordinators.read';

		self::$route = '/coordinators';

		self::$name = 'coordinators';

		self::$title = 'Coordinadores';

		self::$description = 'Módulo de Coordinadores del Sistema';

		self::setArguments();

	}

	public function getIndex(){

		self::addArgument('all_courses', Course::all());

		self::addArgument('active_courses', Course::actives());

		self::addArgument('inactive_courses', Course::inactives());

		self::addArgument('all_lessons', Lesson::all());

		self::addArgument('active_lessons', Lesson::actives());

		self::addArgument('inactive_lessons', Lesson::inactives());

		self::addArgument('all_discussions', Discussion::allFromCourses());

		self::addArgument('active_discussions', Discussion::activesFromCourses());

		self::addArgument('inactive_discussions', Discussion::inactivesFromCourses());

		self::addArgument('all_teachers', User::getTeachers('all'));

		self::addArgument('active_teachers', User::getTeachers('active'));

		self::addArgument('inactive_teachers', User::getTeachers('inactive'));

		self::addArgument('all_students', User::getStudents('all'));

		self::addArgument('active_students', User::getStudents('active'));

		self::addArgument('inactive_students', User::getStudents('inactive'));

		return self::make('index');

	}

}