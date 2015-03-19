<?php namespace Games\Hangman;

use \Games\Hangman\Question as Question;
use \View as View;
use \Input as Input;
use \Redirect as Redirect;

class ReadController extends \BaseController {

	public function getIndex(){

		$args = array(
			'questions' => Question::json()
			);

		return View::make('games.hangman.index')->with($args);

	}

	public function getCreate(){

		return View::make('games.hangman.create');

	}

	public function postCreate(){

		$question = new Question();
		$question->question = Input::get('question');
		$question->seconds = Input::get('seconds');
		$question->word = Input::get('word');
		$question->save();

		return Redirect::to('hangman/create');

	}

}