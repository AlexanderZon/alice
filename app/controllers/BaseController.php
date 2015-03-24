<?php

class BaseController extends Controller {

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

	protected static $msg_warning = null;

	protected static $msg_danger = null;

	protected static $mgs_success = null;

	protected static $msg_info = null;

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

	public function setArguments(){

		self::$args = array(
			'route' => self::$route,
			'parent' => self::$parent,
			'title' => self::$title,
			'name' => self::$name,
			'description' => self::$description,
			'breadcrumbs' => self::$breadcrumbs,
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

	public static function make( $file = 'index'){

		return View::make(self::$views.'.'.$file)->with(self::$args);

	}

	public static function redirect( $file = 'index'){

		return View::make(self::$views.'.'.$file)->with(self::$args);

	}

	public static function audit($description = ''){

		Audits::add(Auth::user(), array(
			'controller' => 'BaseController@getIndex', //campo controller de la Capability
			'title' => 'Base del Sistema', //campo title de la Capablity
			'description' => $description != '' ? $description : 'Plataforma Educativa',
			), 'READ'); //campo crud de la Capability

	}

	protected static function pushBreadcrumb($name, $route){

		$self_breadcrumb = array(
			'name' => $name,
			'route' => $route
			);

		array_push( self::$breadcrumbs, $self_breadcrumb);

	}

	protected static function getBreadcrumbs(){

		return self::$breadcrumbs;

	}

}
