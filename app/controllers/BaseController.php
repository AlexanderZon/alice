<?php

class BaseController extends Controller implements BaseInterface{

	protected static $app = 'Alice';

	protected static $upload_folder = 'uploads/';

	protected static $views = 'base.read';

	protected static $arguments = array();

	protected static $parameters = array();

	protected static $module = 'read';

	protected static $route = '/base';

	protected static $parent = '/';

	protected static $title = 'Base';

	protected static $name = 'base';

	protected static $description = 'System Base';

	protected static $breadcrumbs = array(
		array(
			'name' => 'Escritorio',
			'route' => '/'
			),
		);

	protected static $sections = array(
		'index' => 'Listado',
		'create' => 'Nuevo',
		'update' => 'Actualizar',
		'delete' => 'Eliminar',
		);

	protected static $msg_warning = null;

	protected static $msg_danger = null;

	protected static $msg_success = null;

	protected static $msg_active = null;

	protected static $action = 'BaseController@getIndex';

	public function __construct(){

		self::$msg_active = Session::get('msg_active');
		self::$msg_success = Session::get('msg_success');
		self::$msg_warning = Session::get('msg_warning');
		self::$msg_danger = Session::get('msg_danger');

	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	# --- Filter Parameters --- #

	public static function getController( $action ){

		return strstr($action, '@', true);

	}

	public static function setParameters( $parameters ){

		foreach( $parameters as $key => $value ):
			self::$parameters[$key] = $value;
		endforeach; 

	}

	# --- Module Settings --- #

	public static function setModule($module){

		self::$module = $module;

	}

	public static function pushName($name){

		self::$name = self::$name.'_'.$name;

	}

	public static function pushRoute($route){

		self::$parent = self::$route;

		self::$route = self::$route.'/'.$route;

	}

	public static function setRouteUri($uri){

		self::$route = '/'.$uri;

		if(!empty(self::$parameters)):
			foreach(self::$parameters as $key => $value):
				self::$route = str_replace('{'.$key.'}', $value, self::$route);
				self::$route = str_replace('{'.$key.'?}', $value, self::$route);
			endforeach;
		endif;

	}

	public static function setParentUri($uri){

		if(!empty(self::$parameters)):
			foreach(self::$parameters as $key => $value):
				self::$parent = str_replace('{'.$key.'}', $value, self::$parent);
				self::$parent = str_replace('{'.$key.'?}', $value, self::$parent);
			endforeach;
		endif;

	}

	public static function pushViews($views){

		self::$views = strstr(self::$views, self::$module, true).$views;

	}

	public static function pushModuleViews($views){

		self::$views = strstr(self::$views, self::$module, true).$views.'.'.self::$module;

	}

	# --- Arguments --- #

	public static function setArguments(){

		self::$arguments = array(
			'app' => self::$app,
			'route' => self::$route,
			'parent' => self::$parent,
			'title' => self::$title,
			'name' => self::$name,
			'description' => self::$description,
			'breadcrumbs' => self::$breadcrumbs,
			'sections' => self::$sections,
			'msg_danger' => self::$msg_danger,
			'msg_warning' => self::$msg_warning,
			'msg_success' => self::$msg_success,
			'msg_active' => self::$msg_active,
			);

	}

	public static function addArgument( $key, $value ){

		self::$arguments[$key] = $value;

	}

	public static function fixArgument( $key, $value ){

		self::addArgument( $key, $value );

	}

	public static function deleteArgument( $key ){

		unset(self::$arguments[$key]);

	}

	# --- View --- #

	public static function make( $file = 'index'){

		return View::make(self::$views.'.'.$file)->with(self::$arguments);

	}

	# --- Redirect ---#

	public static function go( $route = 'index'){

		return Redirect::to(self::$route.'/'.$route)->with(self::$arguments);

	}

	public static function redirect( $route = 'index'){

		return Redirect::to('/'.$route)->with(self::$arguments);

	}

	public static function action( $controller = 'BaseController@getIndex'){

		return Redirect::action($controller)->with(self::$arguments);

	}

	# --- Auditory --- #

	public static function audit($description = ''){

		self::$action = Route::getCurrentRoute()->getAction();

		# Capability::getByController(self::$action['controller']); 

		Auditory::add(Auth::user(), array(
			'controller' => self::$action['controller'], //campo controller de la Capability
			'title' => 'Base del Sistema', //campo title de la Capablity
			'description' => $description != '' ? $description : 'Plataforma Educativa',
			), 'READ'); //campo crud de la Capability

	}

	# --- Sections --- #

	protected static function addSection($name, $title){

		self::$sections[$name] = $title;

	}

	protected static function fixSection($name, $title){

		self::addSection($name, $title);

	}

	protected static function deleteSection($name){

		unset(self::$sections[$name]);

	}

	# --- Breadcrumbs --- #

	protected static function getBreadcrumbs(){

		return self::$breadcrumbs;

	}

	protected static function pushBreadcrumb($name, $route){

		$self_breadcrumb = array(
			'name' => $name,
			'route' => $route
			);

		array_push( self::$breadcrumbs, $self_breadcrumb);

	}

	# --- MSGS --- #

	public function setActive( $name = '', $title = '', $description = '' ){

		self::$msg_active = array(
			'name' => $name,
			'title' => $title,
			'description' => $description
			);

		self::setArguments();
		
	}

	public function setSuccess( $name = '', $title = '', $description = '' ){

		self::$msg_success = array(
			'name' => $name,
			'title' => $title,
			'description' => $description
			);

		self::setArguments();
		
	}

	public function setWarning( $name = '', $title = '', $description = '' ){

		self::$msg_warning = array(
			'name' => $name,
			'title' => $title,
			'description' => $description
			);

		self::setArguments();
		
	}

	public function setDanger( $name = '', $title = '', $description = '' ){

		self::$msg_danger = array(
			'name' => $name,
			'title' => $title,
			'description' => $description
			);

		self::setArguments();

	}

	# --- Upload Image --- #

	public function uploadImage($image){

		$info_image = getimagesize($image);
		$width = array("100","200","400",$info_image[0]);
		$filename = Crypt::encrypt($image->getClientOriginalName().date('Y-m-d H:i:s')).".".$image->getClientOriginalExtension();

		$names = array(
			"thumb_".$filename => '100',
			"small_".$filename => '200',
			"medium_".$filename => '300',
			"large_".$filename => $info_image[0],
			);

		foreach( $names as $name => $width ):

			$path = public_path(self::$upload_folder.$name);
			Image::make( $image->getRealPath() )->resize( $width, null, function ($constraint) { 
				$constraint->aspectRatio(); 
				})->save($path);

		endforeach;

		return $filename;
		
	}

}
