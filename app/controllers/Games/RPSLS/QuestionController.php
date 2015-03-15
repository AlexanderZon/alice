<?php namespace Games\RPSLS;

use \Games\RPSLS\Question as Question;
use \Games\RPSLS\Answer as Answer;
use \View as View;
use \Input as Input;
use \Redirect as Redirect;

class QuestionController extends \BaseController {

	public function getIndex(){

		$args = array(
			'questions' => Question::json()
			);

		return View::make('games.rpsls.index')->with($args);

	}

	public function getCreate(){

		return View::make('games.rpsls.create');

	}

	public function postCreate(){

		$question = new Question();
		$question->question = Input::get('question');
		$question->seconds = Input::get('seconds');
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

		return Redirect::to('rpsls/create');

	}

}