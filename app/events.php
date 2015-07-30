<?php

	/* SOME EVENTS PUT HERE */

	Event::listen('notification.new_student', function($student){

		$coordinators = User::getCoordinators();

		foreach($coordinators as $coordinator):

			Notification::create(array(
				'student_id' => $coordinator->id,
				'notificationable_id' => $student->id,
				'notificationable_type' => 'User',
				'icon' => 'fa-plus',
				'picture' => $student->profile->getAvatar(),
				'route' => '/coordinators/students/inactive',
				'title' => 'Nuevo Estudiante Registrado',
				'description' => $student->last_name.' '.$student->first_name.' se ha registrado como '.$user->username,
				'status' => 'fired'
				));

		endforeach;

		return true;
		
	});