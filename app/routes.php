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


Route::get('/rpsls',function(){
	$questions = array(
		array(
			'question' => '¿De que color es el caballo de Simón Bolívar?',
			'answer'=> 3,
			'options' => array(
				array(
					'id' => 0,					
					'item' => "rock",
					'name' => "Rojo",
					'answer' => false,
					),
				array(
					'id' => 1,					
					'item' => "paper",
					'name' => "Azul",
					'answer' => false,
					),
				array(
					'id' => 2,					
					'item' => "scissors",
					'name' => "Verde",
					'answer' => false,
					),
				array(
					'id' => 3,					
					'item' => "lizard",
					'name' => "Blanco",
					'answer' => false,
					),
				array(
					'id' => 4,					
					'item' => "spock",
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

