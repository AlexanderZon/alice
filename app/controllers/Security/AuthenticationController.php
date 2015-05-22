<?php namespace Security;

use \Auth as Auth;
use \Session as Session;
use \Input as Input;

class AuthenticationController extends ReadController {

	public function __construct(){

		// parent::__construct();

		// $this->beforeFilter('auth');

		// $this->beforeFilter('parameters');
		
		self::$views = 'security.auth';

		self::$route = '/auth';

		self::$title = 'Acceder';

		self::$description = 'Acceso al Sistema';

		self::setArguments();


	}

	/**
	 * Display a listing of the resource.
	 * GET /auth
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		// dd(Auth::user()->role->dashboard->controller);
		if(self::session()) return self::action(Auth::user()->role->dashboard->controller);

		return self::go('login');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /auth/login
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		if(self::session()):

			return self::go('index');

		else:

			self::addArgument('msg_error', Session::get('msg_error'));

			self::addArgument('redirect_to', Session::get('redirect_to'));

			return self::make('login');
			
		endif;
	}

	/**
	 * Show the form for creating a new resource.
	 * POST /auth/login
	 *
	 * @return Response
	 */
	public function postLogin()
	{

		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			'status' => 'active'
			);

		if(Auth::attempt($credentials)):

			/*Audits::add(Auth::user(), array(
				'name' => 'auth_login',
				'title' => 'Inicio de Sesión',
				'description' => 'El usuario ' . Auth::user()->username . ' ha Iniciado Sesión'
				), 'CREATE');*/

			if(Input::get('redirect_to') != ''):

				return self::redirect( Input::get('redirect_to') );

			else:

				return self::go('index');

			endif;

		else:

			self::addArgument('msg_error', 'Usuario o Contraseña Inválidos');

			self::addArgument('redirect_to', Input::get('redirect_to'));

			return self::go('login');

		endif;
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /auth/logout
	 *
	 * @return Response
	 */
	public function getLogout()
	{

		/*Audits::add(Auth::user(), array(
			'name' => 'auth_logout',
			'title' => 'Cierre de Sesión',
			'description' => 'El usuario ' . Auth::user()->username . ' ha Cerrado Sesión'
			), 'DELETE');*/

		Auth::logout();

		return self::go( 'login' );
	}

	private static function session(){

		if( Auth::check() ):
			return true;
		else:
			return false;
		endif;

	}

	public function getNotpermission(){

		return self::make('403');

	}

	public function getNotfound(){

		return self::make('404');

	}

	public function getSevererror(){

		return self::make('500');

	}

}