<?php namespace Games\Memory;

use \Games\Memory\Question as Question;
use \View as View;
use \Input as Input;
use \Redirect as Redirect;

class ReadController extends \BaseController {

	public function getIndex(){

		$args = array(
			'questions' => Question::json()
			);

		return View::make('games.memory.index')->with($args);

	}

	public function getCreate(){

		return View::make('games.memory.create');

	}

	public function postCreate(){

		$question = new Question();
		$question->question = Input::get('question');
		$question->answer = Input::get('answer');
		$question->save();

		return Redirect::to('memory/create');

	}

}
