<?php namespace Users\Profile;

use \Input as Input;
use \Response as Response;
use \Auth as Auth;
use \Hash as Hash;
use \UserProfile as UserProfile;

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
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->display_name = Input::get('display_name') != '' ? Input::get('display_name') : $user->first_name . ' ' . $user->last_name;
		
		$directory = UserProfile::makeFullDirectory( $user->username );

		$profile = $user->profile;
		$profile->picture = Input::file('picture') != null ? UserProfile::uploadMainPicture( Input::file('picture'), $user->username ) : $profile->picture;
		$profile->cover = Input::file('cover') != null ? UserProfile::uploadCoverPicture( Input::file('cover'), $user->username ) : $profile->cover;
		$profile->about_me = Input::get('about_me');
		$profile->activities = Input::get('activities');
		$profile->interests = Input::get('interests');
		$profile->born_date = date('Y-m-d', strtotime(Input::get('born_date')));
		$profile->born_place = Input::get('born_place');
		$profile->sex = Input::get('sex');
		$profile->website = Input::get('website');
		$profile->facebook = Input::get('facebook');
		$profile->twitter = Input::get('twitter');
		$profile->address = Input::get('address');
		$profile->phones = Input::get('phones');
		// $profile->timezone = Input::get('timezone');
		// $profile->locale = Input::get('locale');
		// $profile->customs = Input::get('customs');
		$profile->save();

		if($user->email != Input::get('email')):

			if( User::hasEmail(Input::get('email'), $user->id) ):
				
				self::setWarning('security_user_email_err', 'Error al agregar usuario', 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente');

				return self::go( 'update/'.Hashids::encrypt($user->id) );

			else:
			
				$user->email = Input::get('email');
				$user->save();

			endif;

		endif;

		if(strlen(Input::get('password_1')) > 0 ):

			if( strlen(Input::get('password_1')) < 6 ):

				self::setWarning('users_password_password_err', 'Error al cambiar la contraseña', 'La contraseña debe contener más de 5 caracteres');

				return self::go( 'index' );

			elseif( Input::get('password_1') != Input::get('password_2')):

				self::setWarning('users_password_password_err', 'Error al cambiar la contraseña', 'Las contraseñas deben ser iguales');

				return self::go( 'index' );

			else:

				$user->password = Hash::make(Input::get('password_1'));
				$user->save();

			endif;

		endif;

		return self::go('index');

	}

}