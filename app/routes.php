<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/arrays', function(){
	$figures = array('rock', 'paper', 'scissors', 'lizard', 'spock');
	for($i = 0 ; $i < 5; $i++):
		$rand = rand(0, count($figures)-1);
		var_dump($figures[$rand]);
		for ($j=$rand; $j < count($figures) - 1; $j++):
			$figures[$j] = $figures[$j+1];
		endfor;
		unset($figures[count($figures)-1]);
	endfor;
	return 0;
});

Route::get('/rpsls/create',function(){

	return View::make('games.rpsls.create');
	
});

Route::post('/rpsls/create',function(){
	$question = new Games\RPSLS\Question();
	$question->question = Input::get('question');
	$question->save();
	$answer = new Games\RPSLS\Answer();
	$answer->question_id = $question->id;
	$answer->answer = Input::get('correct');
	$answer->is_correct = true;
	$answer->save();
	foreach(Input::get('incorrect') as $incorrect):
		$answer = new Games\RPSLS\Answer();
		$answer->question_id = $question->id;
		$answer->answer = $incorrect;
		$answer->is_correct = false;
		$answer->save();
	endforeach;

	return Redirect::to('rpsls/create');

});

Route::get('/rpsls', function(){

	$questions = array();

	foreach(Games\RPSLS\Question::all() as $question):

		$answers = array();
		$figures = array('rock', 'paper', 'scissors', 'lizard', 'spock');
		$tmp = array();

		for($i = 0 ; $i < 5; $i++):

			$rand = rand(0, count($figures)-1);
			$tmp[] = $figures[$rand];

			for ($j=$rand; $j < count($figures) - 1; $j++) $figures[$j] = $figures[$j+1];

			unset($figures[count($figures)-1]);

		endfor;

		$count = 0;

		foreach($question->answers as $answer):

			$answers[] = array(
				'id' => $answer->id,
				'figure' => $tmp[$count],
				'name' => $answer->answer,
				'answer' => $answer->is_correct ? true : false,
				);
			$count++;

		endforeach;

		$questions[] = array(
			'question' => $question->question,
			'options' => $answers,
			);

	endforeach;

	$args = array(
		'questions' => json_encode($questions)
		);

	return View::make('games.rpsls.index')->with($args);

	// return Response::json($questions);

});

Route::get('/rpslsa',function(){
	$questions = array(
		array(
			'question' => '¿De que color es el caballo de Simón Bolívar?',
			'options' => array(
				array(
					'id' => 0,					
					'figure' => "rock",
					'name' => "Rojo",
					'answer' => false,
					),
				array(
					'id' => 1,					
					'figure' => "paper",
					'name' => "Azul",
					'answer' => false,
					),
				array(
					'id' => 2,					
					'figure' => "scissors",
					'name' => "Verde",
					'answer' => false,
					),
				array(
					'id' => 3,					
					'figure' => "lizard",
					'name' => "Blanco",
					'answer' => true,
					),
				array(
					'id' => 4,					
					'figure' => "spock",
					'name' => "Amarillo",
					'answer' => false,
					),
				)
			)
		);

	$args = array(
		'questions' => json_encode($questions)
		);

	return View::make('games.rpsls.index')->with($args);
	
});

Route::get('/', function()
{
	return View::make('hello');
});

