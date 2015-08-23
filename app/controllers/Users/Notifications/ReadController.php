<?php namespace Users\Notifications;

use \Input as Input;
use \Response as Response;
use \Redirect as Redirect;
use \Auth as Auth;
use \Hash as Hash;
use \View as View;
use \Crypt as Crypt;
use \Hashids as Hashids;
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

		self::addArgument('notifications', Auth::user()->notifications);

		return self::make('index');

	}

	public function deleteIndex(){

		$notification = Notification::find(Hashids::decode(Input::get('notification_id')));

		$notification->delete();

		return Response::json(array(true));

	}

	public function postMarkallasread(){

		Auth::user()->setnotifications();

		$notifications = Auth::user()->newnotifications;

		foreach($notifications as $notification):
			$notification->status = 'viewed';
			$notification->save();
		endforeach;

		return Response::json(array(true));

	}

	public function getGo($notification_id){

		$notification = Notification::find(Crypt::decrypt($notification_id));
		$notification->status = 'viewed';
		$notification->save();

		return Redirect::to($notification->route);

	}

	public function postNews(){

		$notifications = Auth::user()->firednotifications;
		Auth::user()->setnotifications();

		foreach($notifications as $notification):

			$notification->crypt = \Crypt::encrypt($notification->id);
			$notification->hashids = \Hashids::encode($notification->id);

		endforeach;

		return Response::json($notifications);

	}

}