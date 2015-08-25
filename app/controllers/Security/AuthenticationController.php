<?php namespace Security;

use \User as User;
use \Auth as Auth;
use \Crypt as Crypt;
use \Hash as Hash;
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

			self::addArgument('msg_warning', Session::get('msg_warning'));

			self::addArgument('msg_success', Session::get('msg_success'));

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

			$user = Auth::user();
			$user->timestamps = false;
			$user->last_login = date('Y-m-d H:m:i');
			$user->save();

			if(Input::get('redirect_to') != ''):

				return self::redirect( Input::get('redirect_to') );

			else:

				return self::go('index');

			endif;

		else:

			if(Auth::attempt(array(
				'username' => Input::get('username'),
				'password' => Input::get('password'),
				'status' => 'inactive'
				))):

				Auth::logout();

				self::addArgument('msg_error', 'Tu usuario no ha sido verificado');

				self::addArgument('redirect_to', Input::get('redirect_to'));

				return self::go('login');

			else:

				self::addArgument('msg_error', 'Usuario o Contraseña Inválidos');

				self::addArgument('redirect_to', Input::get('redirect_to'));

				return self::go('login');

			endif;

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

	public function postSignup(){

		if( !\User::isValidUsername(Input::get('username')) ):

			self::setWarning('security_user_username_err', 'Error al agregar usuario', 'El nombre de usuario ' . Input::get('username') . ' no es Válido, por favor ingrese uno diferente');

			return self::go( 'login' );

		elseif( \User::hasUsername(Input::get('username')) ):

			self::setWarning('security_user_username_err', 'Error al agregar usuario', 'El usuario ' . Input::get('username') . ' ya existe, por favor ingrese uno diferente');

			// Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return self::go( 'login' );

		elseif( \User::hasEmail(Input::get('email')) ):

			self::setWarning('security_user_email_err', 'Error al agregar usuario', 'El correo ' . Input::get('email') . ' ya existe, por favor ingrese uno diferente');

			// Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return self::go( 'login' );

		elseif( strlen(Input::get('password')) < 6 ):

			self::setWarning('security_user_password_err', 'Error al agregar usuario', 'La contraseña debe contener más de 5 caracteres');
		
			// Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return self::go( 'login' );

		elseif( Input::get('password') != Input::get('rpassword')):

			self::setWarning('security_user_password_err', 'Error al agregar usuario', 'Las contraseñas deben ser iguales');

			// Audits::add(Auth::user(), $args['msg_warning'], 'CREATE');

			return self::go( 'login' );

		else:

			$user = new \User();
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->username = Input::get('username');
			$user->display_name = Input::get('display_name') != '' ? Input::get('display_name') : Input::get('first_name').' '.Input::get('last_name');
			$user->email = Input::get('email');
			$user->password = \Hash::make(Input::get('password'));
			$user->role_id = \Role::getIdByName('student');
			$user->status = 'inactive';
			
			if( $user->save() ):

				$profile = new \UserProfile();
				$profile->user_id = $user->id;
				$profile->save();

				\Event::fire('notification.new_student', array($user));
	
				self::setSuccess('security_user_create', 'Usuario Agregado', '' . $user->display_name . ', has sido registrado/a exitosamente. Deberás esperar la confirmación del Coordinador para ingresar al sistema.');

				// Audits::add(Auth::user(), $args['msg_success'], 'CREATE');

				return self::go( 'login' );

			else:

				self::setDanger('security_user_create_err', 'Error al agregar usuario', 'Hubo un error al agregar el usuario ' . $user->display_name);

				// Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

				return self::go( 'login' );

			endif;

		endif;

	}

	public function getLock(){

		/*Audits::add(Auth::user(), array(
			'name' => 'auth_logout',
			'title' => 'Cierre de Sesión',
			'description' => 'El usuario ' . Auth::user()->username . ' ha Cerrado Sesión'
			), 'DELETE');*/

		if(Auth::check()):

			$user = Auth::user();

			Auth::logout();

			self::addArgument('user', $user);

			return self::make( 'lock' );

		else: 

			return self::go('login');

		endif;

	}

	public function postLock(){

		$user = User::find(Crypt::decrypt(Input::get('_token')));

		if(Hash::check(Input::get('password'), $user->password)):

			Auth::login($user);

			return \Redirect::to('/');

		else:

			self::addArgument('user', $user);
			self::addArgument('msg_error', 'Contraseña Incorrecta');

			return self::make( 'lock' );

		endif;

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