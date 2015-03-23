<?php namespace Games\Roulette;

use \Games\Roulette\Question as Question;
use \Games\Roulette\Answer as Answer;
use \View as View;
use \Input as Input;
use \Redirect as Redirect;

class ReadController extends \BaseController {

	public function getIndex(){

		$args = array(
			'questions' => Question::json(),
			);

		return View::make('games.roulette.index')->with($args);

	}

	public function getCreate(){

		return View::make('games.roulette.create');

	}

	public function postCreate(){

		$question = new Question();
		$question->question = Input::get('question');
		$question->save();
		$answer = new Answer();
		$answer->question_id = $question->id;
		$answer->answer = Input::get('correct');
		$answer->is_correct = true;
		$answer->save();
		foreach(Input::get('incorrect') as $incorrect):
			$answer = new Answer();
			$answer->question_id = $question->id;
			$answer->answer = $incorrect;
			$answer->is_correct = false;
			$answer->save();
		endforeach;

		return Redirect::to('roulette/create');

	}

}