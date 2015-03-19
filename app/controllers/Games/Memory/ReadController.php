<?php namespace Games\Memory;

use \Games\Memory\Question as Question;
use \View as View;
use \Input as Input;
use \Redirect as Redirect;

class ReadController extends \BaseController {

	public function getIndex(){

		$args = array(
			'questions' => json_encode(array())
			);

		return View::make('games.memory.index')->with($args);

	}

}
