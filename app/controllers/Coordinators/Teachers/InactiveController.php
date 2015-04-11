<?php namespace Coordinators\Teachers;

use \User as User;
use \Role as Role;
use \Capability as Capability;
use \Input as Input;
use \Hash as Hash;
use \Hashids as Hashids;

class InactiveController extends ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');

		self::pushName('inactive');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Profesores';

		self::$description = 'Gestión de Profesores del Sistema';

		self::pushBreadCrumb('Profesores', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /teachers
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		self::addArgument('teachers', User::getTeachers('inactive'));

		self::addArgument('roles', Role::all());

		return self::make('inactive');

	}

}