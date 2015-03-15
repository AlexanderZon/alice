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

/*Route::get('/rpsls/create',function(){

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

	// return Response::json($questions);

});*/

Route::controller('/rpsls', 'Games\RPSLS\ReadController');
Route::controller('/hangman', 'Games\Hangman\ReadController');

Route::get('/', function()
{
	return View::make('hello');
});

