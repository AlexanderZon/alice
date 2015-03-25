<?php

class BaseController extends Controller {

	protected static $app = 'Alice';

	protected static $upload_folder = 'uploads/';

	protected static $views = 'base';

	protected static $args = array();

	protected static $module = array();

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

	protected static $mgs_success = null;

	protected static $msg_info = null;

	protected static $action = 'BaseController@getIndex';

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

	# --- Arguments --- #

	public function setArguments(){

		self::$args = array(
			'app' => self::$app,
			'route' => self::$route,
			'parent' => self::$parent,
			'title' => self::$title,
			'name' => self::$name,
			'description' => self::$description,
			'breadcrumbs' => self::$breadcrumbs,
			'sections' => self::$sections,
			);

	}

	public static function addArgument( $key, $value ){

		self::$args[$key] = $value;

	}

	public static function fixArgument( $key, $value ){

		self::addArgument( $key, $value );

	}

	public static function deleteArgument( $key ){

		unset(self::$args[$key]);

	}

	# --- View --- #

	public static function make( $file = 'index'){

		return View::make(self::$views.'.'.$file)->with(self::$args);

	}

	# --- Redirect ---#

	public static function go( $route = 'index'){

		return Redirect::to(self::$route.'/'.$route)->with(self::$args);

	}

	public static function redirect( $route = 'index'){

		return Redirect::to('/'.$route)->with(self::$args);

	}

	public static function action( $controller = 'BaseController@getIndex'){

		return Redirect::action($controller)->with(self::$args);

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
