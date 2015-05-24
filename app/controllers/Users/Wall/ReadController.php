<?php namespace Users\Wall;

use \Input as Input;
use \Response as Response;
use \Auth as Auth;
use \Hash as Hash;
use \UserProfile as UserProfile;
use \User as User;
use \View as View;

class ReadController extends \BaseController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::$views = 'users.wall.read';

		self::$route = '/wall';

		self::$name = 'users_profile';

		self::$title = 'Perfil';

		self::$description = 'Módulo de Perfil del Sistema';

		self::fixSection('index', 'Perfil');
		self::fixSection('followers', 'Seguidores');
		self::fixSection('followed', 'Siguiendo');

		self::setArguments();

	}

	public function getIndex( $username, $section = 'index' ){

		self::$route = $username;

		if( $user = User::retrieveByUsername( $username )):

			self::$title = $user->display_name;
			self::$description = $username;
			self::fixSection('index', 'Perfil de '.$user->display_name);
			self::setArguments();
			self::addArgument('user', $user);
			self::addArgument('profile', $user->profile);
			self::addArgument('role', $user->role);
			self::addArgument('hasMyFollow', $user->hasMyFollow());

			switch($section):
				case 'follow':
					return Response::json(array(
						'status' => Auth::user()->follow($user)
						));
					break;
				case 'unfollow':
					return Response::json(array(
						'status' => Auth::user()->unfollow($user)
						));
					break;
				case 'block':
					return Response::json(array(
						'status' => Auth::user()->block($user)
						));
					break;
				case 'unblock':
					return Response::json(array(
						'status' => Auth::user()->unblock($user)
						));
					break;
			endswitch;

			return self::make('index');

		else:

			return View::make('security.auth.404');

		endif;

	}

	public function postIndex( $username, $section = 'index', $action = '' ){

		self::$route = $username;

		if( $user = User::retrieveByUsername( $username )):

			self::addArgument('user', $user);
			self::addArgument('profile', $user->profile);
			self::addArgument('role', $user->role);
			self::addArgument('hasMyFollow', $user->hasMyFollow());

			switch($section):
				case 'follow':
					return Response::json(array(
						'status' => Auth::user()->follow($user)
						));
					break;
				case 'unfollow':
					return Response::json(array(
						'status' => Auth::user()->unfollow($user)
						));
					break;
				case 'block':
					return Response::json(array(
						'status' => Auth::user()->block($user)
						));
					break;
				case 'unblock':
					return Response::json(array(
						'status' => Auth::user()->unblock($user)
						));
					break;
			endswitch;

			return self::make($section);

		else:

			return View::make('security.auth.404');

		endif;

	}

}