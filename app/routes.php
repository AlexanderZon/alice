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
	$args = array(
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
					'item' => "scisors",
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

	return Response::json( $args );
	
});

Route::get('/', function()
{
	$lesson = Lesson::find(1);
	dd($lesson->attachments[0]);
});

