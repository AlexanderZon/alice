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

			Route::controller('/teachers/courses/{course_id}/achievements', '\Teachers\Courses\Achievements\ReadController');
			Route::controller('/teachers/courses/{course_id}/activities', '\Teachers\Courses\Activities\ReadController');
			Route::controller('/teachers/courses/{course_id}/contributors', '\Teachers\Courses\Contributors\ReadController');
			Route::controller('/teachers/courses/{course_id}/discussions', '\Teachers\Courses\Discussions\ReadController');
			Route::controller('/teachers/courses/{course_id}/general', '\Teachers\Courses\General\ReadController');
			Route::controller('/teachers/courses/{course_id}/inscriptions', '\Teachers\Courses\Inscriptions\ReadController');
			Route::controller('/teachers/courses/{course_id}/lessons', '\Teachers\Courses\Lessons\ReadController');
			Route::controller('/teachers/courses/{course_id}/questions', '\Teachers\Courses\Questions\ReadController');
			Route::controller('/teachers/courses/{course_id}/statistics', '\Teachers\Courses\Statistics\ReadController');
			Route::controller('/teachers/courses/{course_id}/students', '\Teachers\Courses\Students\ReadController');
			Route::controller('/teachers/courses', '\Teachers\Courses\ReadController');
			Route::controller('/teachers/contributions', '\Teachers\Contributions\ReadController');
			Route::controller('/teachers', '\Teachers\ReadController');

		break;
		case 'student':

			# Routes for student

			Route::controller('/curso/{course_name}/actividades', '\Students\Courses\Activities\ReadController');
			Route::controller('/curso/{course_name}/premiaciones', '\Students\Courses\Achievements\ReadController');
			Route::controller('/curso/{course_name}/contribuidores', '\Students\Courses\Contributors\ReadController');
			Route::controller('/curso/{course_name}/discusiones', '\Students\Courses\Discussions\ReadController');
			Route::controller('/curso/{course_name}/general', '\Students\Courses\General\ReadController');
			Route::controller('/curso/{course_name}/inscripciones', '\Students\Courses\Inscriptions\ReadController');
			Route::controller('/curso/{course_name}/lecciones', '\Students\Courses\Lessons\ReadController');
			Route::controller('/curso/{course_name}/preguntas', '\Students\Courses\Questions\ReadController');
			Route::controller('/curso/{course_name}/estadisticas', '\Students\Courses\Statistics\ReadController');
			Route::controller('/curso/{course_name}/estudiantes', '\Students\Courses\Students\ReadController');
			Route::get('/curso/{course_name}', '\Students\Courses\ReadController@getCourse');
			Route::controller('/cursos', '\Students\Courses\ReadController');
			Route::controller('/profesores', '\Students\Teachers\ReadController');
			Route::controller('/estudiantes', '\Students\Students\ReadController');
			Route::controller('/inicio', '\Students\ReadController');

		break;
		default:
			# Routes for unknown
		break;

	endswitch;

	Route::controller('/search', '\Users\Search\ReadController');
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
