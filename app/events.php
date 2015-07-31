<?php

	/* SOME EVENTS PUT HERE */

	Event::listen('notification.new_student', function($student){

		$coordinators = User::getCoordinators();

		foreach($coordinators as $coordinator):

			$notification = new Notification();
			$notification->user_id = $coordinator->id;
			$notification->notificationable_id = $student->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-plus';
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
		$notification->picture = $course->teacher->profile->getAvatar();
		$notification->route = '/curso/'.$course->name;
		$notification->title = 'Postulacion Rechazada';
		$notification->description = 'Tu solicitudpara entrar al curso '.$course->title.' ha sido rechazada';
		$notification->save();

		return true;

	});