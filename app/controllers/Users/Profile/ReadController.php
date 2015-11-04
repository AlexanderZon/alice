<?php namespace Users\Profile;

use \Input as Input;
use \Response as Response;
use \Auth as Auth;
use \Hash as Hash;
use \Hashids as Hashids;
use \UserProfile as UserProfile;
use \User as User;

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

		if( Input::has('phones')):

			if( !filter_var(Input::get('phones'), FILTER_VALIDATE_REGEXP, array( 'options' => array( 'regexp' => '/^([(0412)|(0414)|(0416)|(0424)|(0426)]{4}|[02]{2}[0-9]{2})[0-9]{7}$/'))) ):

				self::setWarning('security_user_phones_err', 'Error al cambiar teléfono', 'El Teléfono ' . Input::get('phones') . ' no es válido, solo puede agregar telefonos 0412, 0414, 0416, 0424, 0426, 02XX y solo en este Formato 0416XXXXXXX');

				return self::go( 'index' );

			endif;

		endif;

		if( Input::has('website')):

			if( !filter_var(Input::get('website'), FILTER_VALIDATE_REGEXP, array( 'options' => array( 'regexp' => '#((https?|ftp)://(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)#i')) )):

				self::setWarning('security_user_website_err', 'Error al cambiar el website', 'La URL ' . Input::get('website') . ' no es válida, solo puede agregar una URL con el formato http://ejemplo.com, y seran válido solo los protocolos http, https, y ftp');

				return self::go( 'index' );

			endif;

		endif;

		if( Input::has('facebook')):

			if( !filter_var(Input::get('facebook'), FILTER_VALIDATE_REGEXP, array( 'options' => array( 'regexp' => '/^@[a-z\d.]{5,50}$/')) )):

				self::setWarning('security_user_facebook_err', 'Error al cambiar el usuario facebook', 'El Nombre de Usuario ' . Input::get('facebook') . ' no es válido, solo puede agregar un usuario de Facebook con el formato @UsuarioFacebook, y debe contener entre 5 y 50 catacteres, y puede contener numeros y punto (.)');

				return self::go( 'index' );

			endif;

		endif;

		if( Input::has('twitter')):

			if( !filter_var(Input::get('twitter'), FILTER_VALIDATE_REGEXP, array( 'options' => array( 'regexp' => '/^@([A-Za-z0-9_]{1,15})/')) )):

				self::setWarning('security_user_twitter_err', 'Error al cambiar el usuario twitter', 'El Nombre de Usuario ' . Input::get('twitter') . ' no es válido, solo puede agregar un usuario de Twitter con el formato @UsuarioTwitter, y debe contener entre 5 y 15 catacteres, y puede contener numeros y punto (.)');

				return self::go( 'index' );

			endif;

		endif;

		if( !filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL) ):

			self::setWarning('security_user_email_err', 'Error al cambiar correo', 'El correo ' . Input::get('email') . ' no es válido, por favor ingrese uno diferente');

			// Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return self::go( 'index' );

		endif;

		if( !filter_var(Input::get('first_name'), FILTER_VALIDATE_REGEXP, array( 'options' => array( 'regexp' => '/^[a-zA-Z][a-zA-Z ]*$/'))) ):

			self::setWarning('security_user_first_name_err', 'Error al agregar usuario', 'El nombre ' . Input::get('first_name') . ' no es válido, por favor ingrese uno diferente');

			// Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return self::go( 'index' );

		endif;

		if( !filter_var(Input::get('last_name'), FILTER_VALIDATE_REGEXP, array( 'options' => array( 'regexp' => '/^[a-zA-Z][a-zA-Z ]*$/'))) ):

			self::setWarning('security_user_last_name_err', 'Error al agregar usuario', 'El nombre ' . Input::get('last_name') . ' no es válido, por favor ingrese uno diferente');

			// Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return self::go( 'index' );

		endif;

		$user = Auth::user();
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->display_name = Input::get('display_name') != '' ? Input::get('display_name') : $user->first_name . ' ' . $user->last_name;
		$user->save();
		
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
				
				self::setWarning('security_user_email_err', 'Error al cambiar correo', 'El correo ' . Input::get('email') . ' ya existe para otro usuario, por favor ingrese uno diferente');

				return self::go( 'index' );

			else:
			
				$user->email = Input::get('email');
				$user->save();

			endif;

		endif;

		if(strlen(Input::get('password_1')) > 0 ):

			if( strlen(Input::get('password_1')) < 6 ):

				self::setWarning('users_password_password_err', 'Error al cambiar la contraseña', 'La contraseña debe contener al menos 6 caracteres');

				return self::go( 'index' );

			elseif( Input::get('password_1') != Input::get('password_2')):

				self::setWarning('users_password_password_err', 'Error al cambiar la contraseña', 'Las contraseñas deben ser iguales');

				return self::go( 'index' );

			else:

				$user->password = Hash::make(Input::get('password_1'));
				$user->save();

			endif;

		endif;

		self::setSuccess('users_data_changed', 'Datos Actualizados', 'Los Datos del Perfil se han cambiado exitósamente.');

		return self::go('index');

	}

}