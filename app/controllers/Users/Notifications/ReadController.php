<?php namespace Users\Notifications;

use \Input as Input;
use \Response as Response;
use \Redirect as Redirect;
use \Auth as Auth;
use \Hash as Hash;
use \View as View;
use \Crypt as Crypt;
use \UserProfile as UserProfile;
use \User as User;
use \Course as Course;
use \Message as Message;
use \Notification as Notification;

class ReadController extends \BaseController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::$views = 'users.notifications.read';

		self::$route = '/notificaciones';

		self::$name = 'notifications';

		self::$title = 'Notificaciones';

		self::$description = 'Módulo de Notificaciones del Sistema';

		self::fixSection('index', 'Notificaciones');

		self::setArguments();

	}

	public function getIndex(){

		self::$route = $username;

		if( $user = User::retrieveByUsername( $username )):

			self::$title = $user->display_name;
			self::$description = $username;
			self::fixSection('index', 'Perfil de '.$user->display_name);
			self::setArguments();
			self::addArgument('sidebar_closed', true);
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
				case 'learning':
					self::addArgument('courses', Course::paginate(10));
					break;
			endswitch;

			return self::make($section);

		else:

			return View::make('security.auth.404');

		endif;

	}

	public function postIndex(){

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
				case 'followers':
					self::addArgument('followers', $user->followers);
					break;
				case 'following':
					self::addArgument('following', $user->followed);
					break;
				case 'learning':
					self::addArgument('courses', $user->learning()->paginate(10));
					break;
				case 'teaching':
					self::addArgument('courses', $user->teaching()->paginate(10));
					break;
				case 'discussions':
					self::addArgument('discussions',$user->discussionsfromcourses);
					break;
			endswitch;

			return self::make($section);

		else:

			return View::make('security.auth.404');

		endif;

	}

	public function getGo($notification_id){

		$notification = Notification::find(Crypt::decrypt($notification_id));
		$notification->status = 'viewed';
		$notification->save();

		return Redirect::to($notification->route);

	}

}