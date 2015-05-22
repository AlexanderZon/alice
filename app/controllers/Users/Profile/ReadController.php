<?php namespace Users\Profile;

use \Input as Input;
use \Response as Response;
use \Auth as Auth;

class ReadController extends \BaseController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::$views = 'users.profile.read';

		self::$route = '/profile';

		self::$name = 'users_profile';

		self::$title = 'Perfil';

		self::$description = 'Módulo de Perfil del Sistema';

		self::fixSection('index', 'Perfil');

		self::setArguments();

	}

	public function getIndex(){

		$user = Auth::user();

		self::addArgument('user', $user);

		self::addArgument('profile', $user->profile);

		return self::make('index');

	}

	public function postIndex(){

		$user = Auth::user();
		
		$directory = UserProfile::makeFullDirectory( $user->username );

		$profile = $user->profile;
		$profile->picture = Input::file('picture') != null ? UserProfile::uploadMainPicture( Input::file('picture'), $user->username ) : '';
		$profile->cover = Input::file('cover') != null ? UserProfile::uploadCoverPicture( Input::file('cover'), $user->username ) : '';
		$profile->about_me = Input::get('about_me');
		$profile->activities = Input::get('activities');
		$profile->intenrests = Input::get('intenrests');
		$profile->born_date = date('Y-m-d', strtotime(Input::get('born_date')));
		$profile->born_place = Input::get('born_place');
		$profile->sex = Input::get('sex');
		$profile->website = Input::get('website');
		$profile->address = Input::get('address');
		$profile->phones = Input::get('phones');
		// $profile->timezone = Input::get('timezone');
		// $profile->locale = Input::get('locale');
		// $profile->customs = Input::get('customs');
		$profile->save();

	}

}