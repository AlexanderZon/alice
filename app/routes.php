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

Route::get('/test/getimagesize', function(){
	dd(getimagesize(public_path().'/assets/admin/pages/media/blog/8.jpg'));
});

if(Auth::check()):

	switch(Auth::user()->role->name):

		case 'superadmin':
		
			# Routes for administrator

			# Ancestors Modules

			Route::controller('/ancestors/{ancestor}/parents/{parent}/children','\Ancestors\Parents\Children\ReadController');
			Route::controller('/ancestors/{ancestor}/parents','\Ancestors\Parents\ReadController');
			Route::controller('/ancestors','\Ancestors\ReadController');				

			# Security Module 
			
			Route::controller('/security/users','\Security\UserController');
			Route::controller('/security/roles','\Security\RoleController');
			Route::controller('/security/capabilities','\Security\CapabilityController');
			Route::controller('/security','\Security\ReadController');
		
			# Administrator Module

			Route::controller('/administrators', '\Administrators\DashboardController');
			Route::get('/administrators', '\Administrators\DashboardController@getIndex');

		break;
		case 'coordinator':
		
			# Routes for coordinator

			Route::controller('/coordinators/courses', '\Coordinators\Courses\ReadController');
			Route::controller('/coordinators/students', '\Coordinators\Students\ReadController');
			Route::controller('/coordinators/teachers', '\Coordinators\Teachers\ReadController');
			Route::controller('/coordinators', '\Coordinators\ReadController');

		break;
		case 'teacher':
			# Routes for teacher
			Route::controller('/teachers', '\Teachers\ReadController');
		break;
		case 'student':
			# Routes for student
		break;
		default:
			# Routes for unknown
		break;

	endswitch;

	Route::controller('/messages', '\Users\Mails\ReadController');
	Route::controller('/profile', '\Users\Profile\ReadController');

	Route::controller('/rpsls', '\Games\RPSLS\ReadController');
	Route::controller('/hangman', '\Games\Hangman\ReadController');
	Route::controller('/memory', '\Games\Memory\ReadController');
	Route::controller('/roulette', '\Games\Roulette\ReadController');
	Route::controller('/auth', '\Security\AuthenticationController');
	Route::controller('{username}/{section?}/{action?}', '\Users\Wall\ReadController');
	Route::controller('/', '\Security\AuthenticationController');

else:

	Route::controller('/auth', '\Security\AuthenticationController');
	Route::any('/{one?}/{two?}/{three?}/{four?}/{five?}/', function($one = '' ,$two = '' ,$three = '' ,$four = '' ,$five = '' ){
		if(Request::path() == '/'):
			return Redirect::to('/auth/login')->with('redirect_to', '');
		else:
			return Redirect::to('/auth/login')->with('redirect_to', Request::path());
		endif;
	});

endif;
