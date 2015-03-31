<?php namespace Security;

class ReadController extends \BaseController {

	public function __construct(){

		parent::__construct();
		
		self::$views = 'security.read';

		self::$route = '/security';

		self::$name = 'security';

		self::$title = 'Seguridad';

		self::$description = 'Gestión de Seguridad del Sistema';

		self::setArguments();

	}

	public function getIndex(){

		return self::go('users');

	}

}