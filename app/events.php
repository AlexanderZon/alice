<?php

	/* SOME EVENTS PUT HERE */

	Event::listen('notification.new_student', function($student){

		$coordinators = User::getCoordinators();

		foreach($coordinators as $coordinator):

			$notification = new Notification();
			$notification->user_id = $coordinator->id;
			$notification->notificationable_id = $student->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-user';
			$notification->badge = 'bg-blue-madison';
			$notification->picture = $student->profile->getAvatar();
			$notification->route = '/coordinators/students/inactive';
			$notification->title = 'Nuevo Estudiante Registrado';
			$notification->description = $student->last_name.' '.$student->first_name.' se ha registrado como '.$student->username;
			$notification->status = 'fired';
			$notification->save();

		endforeach;

		return true;

	});

	Event::listen('notification.activate_student', function($student, $coordinator){

		$notification = new Notification();
		$notification->user_id = $student->id;
		$notification->notificationable_id = $student->id;
		$notification->notificationable_type = 'User';
		$notification->icon = 'fa-check';
		$notification->badge = 'bg-green';
		$notification->picture = $coordinator->profile->getAvatar();
		$notification->route = '/';
		$notification->title = 'Felicidades';
		$notification->description = 'Tu usuario ha sido activado';
		$notification->save();

		return true;

	});

	Event::listen('notification.postulate_course', function($student, $course){

		$notification = new Notification();
		$notification->user_id = $course->teacher->id;
		$notification->notificationable_id = $student->id;
		$notification->notificationable_type = 'User';
		$notification->icon = 'fa-user';
		$notification->badge = 'bg-blue-madison';
		$notification->picture = $student->profile->getAvatar();
		$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id).'?section=inscriptions';
		$notification->title = 'Nuevo estudiante postulado';
		$notification->description = $student->display_name.' se ha postulado para el curso '.$course->title;
		$notification->save();

		return true;

	});

	Event::listen('notification.postulation_accepted', function($student, $course){

		$notification = new Notification();
		$notification->user_id = $student->id;
		$notification->notificationable_id = $student->id;
		$notification->notificationable_type = 'User';
		$notification->icon = 'fa-check';
		$notification->badge = 'bg-green';
		$notification->picture = $course->teacher->profile->getAvatar();
		$notification->route = '/curso/'.$course->name;
		$notification->title = 'Postulacion Aceptada';
		$notification->description = 'Has sido aceptado para entrar al curso '.$course->title;
		$notification->save();

		return true;

	});

	Event::listen('notification.postulation_declined', function($student, $course){

		$notification = new Notification();
		$notification->user_id = $student->id;
		$notification->notificationable_id = $student->id;
		$notification->notificationable_type = 'User';
		$notification->icon = 'fa-times';
		$notification->badge = 'bg-red';
		$notification->picture = $course->teacher->profile->getAvatar();
		$notification->route = '/curso/'.$course->name;
		$notification->title = 'Postulacion Rechazada';
		$notification->description = 'Tu solicitud para entrar al curso '.$course->title.' ha sido rechazada';
		$notification->save();

		return true;

	});

	Event::listen('notification.new_teacher', function($teacher){

		$notification = new Notification();
		$notification->user_id = $teacher->id;
		$notification->notificationable_id = $teacher->id;
		$notification->notificationable_type = 'User';
		$notification->icon = 'fa-check';
		$notification->badge = 'bg-green';
		$notification->picture = Auth::user()->profile->getAvatar();
		$notification->route = '/';
		$notification->title = 'Bienvenido';
		$notification->description = 'Bienvenido profesor/a'. $teacher->display_name. '.';
		$notification->save();

		return true;

	});

	Event::listen('notification.course_assigned', function($teacher, $course){

		$notification = new Notification();
		$notification->user_id = $teacher->id;
		$notification->notificationable_id = $teacher->id;
		$notification->notificationable_type = 'User';
		$notification->icon = 'fa-book';
		$notification->badge = 'bg-green-haze';
		$notification->picture = Auth::user()->profile->getAvatar();
		$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id);
		$notification->title = 'Curso Asignado';
		$notification->description = $teacher->display_name . ' has sido asignado como profesor del curso ' . $course->title;
		$notification->save();

		return true;

	});

	Event::listen('notification.contributor_invite', function($teacher, $course){

		$notification = new Notification();
		$notification->user_id = $teacher->id;
		$notification->notificationable_id = $teacher->id;
		$notification->notificationable_type = 'User';
		$notification->icon = 'fa-paper-plane';
		$notification->badge = 'bg-blue-madison';
		$notification->picture = Auth::user()->profile->getAvatar();
		$notification->route = 'teachers/contributions/show/'.Hashids::encode($course->id);
		$notification->title = 'Invitacion para ser Contribuidor';
		$notification->description = $teacher->display_name . ' has sido invitado a ser contribuidor del curso ' . $course->title;
		$notification->save();

		return true;

	});

	Event::listen('notification.contributor_accept', function($teacher, $course){

		$notification = new Notification();
		$notification->user_id = $course->author_id;
		$notification->notificationable_id = $course->author_id;
		$notification->notificationable_type = 'User';
		$notification->icon = 'fa-paper-plane';
		$notification->badge = 'bg-green';
		$notification->picture = Auth::user()->profile->getAvatar();
		$notification->route = 'teachers/courses/show/'.Hashids::encode($course->id).'?section=contributors';
		$notification->title = 'Invitacion de Contribuidor Aceptada';
		$notification->description = $teacher->display_name . ' ha aceptado tu invitación para ser contribuidor del curso ' . $course->title;
		$notification->save();

		return true;

	});

	Event::listen('notification.contributor_denied', function($teacher, $course){

		$notification = new Notification();
		$notification->user_id = $course->author_id;
		$notification->notificationable_id = $course->author_id;
		$notification->notificationable_type = 'User';
		$notification->icon = 'fa-paper-plane';
		$notification->badge = 'bg-red';
		$notification->picture = Auth::user()->profile->getAvatar();
		$notification->route = 'teachers/courses/show/'.Hashids::encode($course->id).'?section=contributors';
		$notification->title = 'Invitacion de Contribuidor Denegada';
		$notification->description = $teacher->display_name . ' ha declinado tu invitación para ser contribuidor del curso ' . $course->title;
		$notification->save();

		return true;

	});

	Event::listen('notification.contributor_active', function($teacher, $course){

		$notification = new Notification();
		$notification->user_id = $teacher->id;
		$notification->notificationable_id = $teacher->id;
		$notification->notificationable_type = 'User';
		$notification->icon = 'fa-paper-plane';
		$notification->badge = 'bg-blue-madison';
		$notification->picture = Auth::user()->profile->getAvatar();
		$notification->route = 'teachers/contributions/show/'.Hashids::encode($course->id);
		$notification->title = 'Eres un Contribuidor';
		$notification->description = $teacher->display_name . ' ya formas parte de los contribuidores del curso ' . $course->title;
		$notification->save();

		return true;

	});

	// 1023-1327-2857-0284-8569-7626 Adobe AfterEffects CC 