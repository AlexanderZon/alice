<?php namespace Games\Hangman;

use \Games\Hangman\Question as Question;
use \View as View;
use \Input as Input;
use \Redirect as Redirect;

class ReadController extends \BaseController {

	public function __construct(){

		// $this->beforeFilter('auth');

		// $this->beforeFilter('hangman');
		
		self::$views = 'games.hangman';

		self::$route = '/hangman';

		self::$title = 'El Ahorcado';

		self::$description = 'Juego del Ahorcado';

		self::setArguments();

		# --- Put here your global args for this Controller --- #

	}

	public function getIndex(){

		self::addArgument('questions', Question::json());

		return self::make('index');

	}

	public function getRead(){

		self::addArgument('questions', Question::json());

		return self::make('read');

	}

	public function getCreate(){

		return self::make('create');

	}

	public function postCreate(){

		self::process(new Question());

		return Redirect::to('hangman/create');

	}

	private static function process($model){

		$model->question = Input::get('question');
		$model->seconds = Input::get('seconds');
		$model->word = Input::get('word');
		$model->save();

	}

}