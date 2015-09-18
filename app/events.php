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
		$notification->route = '/teachers/contributions/show/'.Hashids::encode($course->id);
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
		$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id).'?section=contributors';
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
		$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id).'?section=contributors';
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
		$notification->route = '/teachers/contributions/show/'.Hashids::encode($course->id);
		$notification->title = 'Eres un Contribuidor';
		$notification->description = $teacher->display_name . ' ya formas parte de los contribuidores del curso ' . $course->title;
		$notification->save();

		return true;

	});

	Event::listen('notification.lessons_write_comment', function($writer, $lesson, $comment){

		$course = $lesson->module->course;

		foreach($lesson->students as $student):
			if($student->id != $writer->id):

				$notification = new Notification();
				$notification->user_id = $student->id;
				$notification->notificationable_id = $writer->id;
				$notification->notificationable_type = 'User';
				$notification->icon = 'fa-comment';
				$notification->badge = 'bg-green';
				$notification->picture = $writer->profile->getAvatar();
				$notification->route = '/curso/'.$course->name.'?section=lessons&action=viewlesson&type=get&lesson_id='.Hashids::encode($lesson->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
				$notification->title = $writer->display_name.' comentó';
				$notification->description = 'En '.$lesson->title.' del curso ' . $course->title;
				$notification->save();

			endif;
		endforeach;

		$teacher = $course->teacher;

		if($writer->id != $teacher->id):

			$notification = new Notification();
			$notification->user_id = $teacher->id;
			$notification->notificationable_id = $writer->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-comment';
			$notification->badge = 'bg-green';
			$notification->picture = $writer->profile->getAvatar();
			$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id).'?section=lessons&action=comments&type=get&lesson_id='.Hashids::encode($lesson->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			$notification->title = $writer->display_name.' comentó ';
			$notification->description = 'En '.$lesson->title.' del curso de ' . $course->title;
			$notification->save();

			return true;

		endif;

	});

	Event::listen('notification.lessons_reply_comment', function($writer, $lesson, $comment, $parent){

		$course = $lesson->module->course;

		$repliers = $parent->repliers();

		$author = $parent->author;

		// Notificaciones a los demas que respondieron el comentario

		foreach($repliers as $replier):
			if($replier->id != $writer->id AND $replier->id != $course->author_id AND $replier->id != $parent->user_id):

				$notification = new Notification();
				$notification->user_id = $replier->id;
				$notification->notificationable_id = $writer->id;
				$notification->notificationable_type = 'User';
				$notification->icon = 'fa-comments';
				$notification->badge = 'bg-green';
				$notification->picture = $writer->profile->getAvatar();
				$notification->route = '/curso/'.$course->name.'?section=lessons&action=viewlesson&type=get&lesson_id='.Hashids::encode($lesson->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
				$notification->title = $writer->display_name.' tambien respondió';
				if($writer->id != $parent->user_id):
					$notification->description = 'El comentario de ' . $author->display_name .' en ' .$lesson->title. ' del curso de ' . $course->title;
				else:
					$notification->description = 'Su comentario en ' .$lesson->title. ' del curso de ' . $course->title;
				endif;
				$notification->save();

			endif;
		endforeach;

		// Notificacion al que realizó el comentario

		if($writer->id != $parent->user_id):

			$notification = new Notification();
			$notification->user_id = $parent->user_id;
			$notification->notificationable_id = $writer->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-comments';
			$notification->badge = 'bg-green';
			$notification->picture = $writer->profile->getAvatar();
			$notification->route = '/curso/'.$course->name.'?section=lessons&action=viewlesson&type=get&lesson_id='.Hashids::encode($lesson->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			$notification->title = $writer->display_name.' respondió tu comentario ';
			$notification->description = 'En '.$lesson->title.' del curso ' . $course->title;
			$notification->save();

		endif;

		// Notificación al profesor

		$teacher = $course->teacher;

		if($writer->id != $teacher->id):

			$notification = new Notification();
			$notification->user_id = $teacher->id;
			$notification->notificationable_id = $writer->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-comments-o';
			$notification->badge = 'bg-green';
			$notification->picture = $writer->profile->getAvatar();
			$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id).'?section=lessons&action=comments&type=get&lesson_id='.Hashids::encode($lesson->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			$notification->title = $writer->display_name.' respondió';
			if($writer->id != $parent->user_id):
				$notification->description = 'El comentario de ' . $author->display_name .' en ' .$lesson->title. ' del curso de ' . $course->title;
			else:
				$notification->description = 'Su comentario en ' .$lesson->title. ' del curso de ' . $course->title;
			endif;
			$notification->save();

			return true;

		endif;

	});

	Event::listen('notification.lessons_like_comment', function($liker, $comment){

		if(($object = $comment->discussionable) instanceof Discussion):

			$lesson = $object->discussionable;

		else:

			$lesson = $object;

		endif;

		$course = $lesson->module->course;

		if($liker->id != $comment->user_id):

			$notification = new Notification();
			$notification->user_id = $comment->user_id;
			$notification->notificationable_id = $liker->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-thumbs-up';
			$notification->badge = 'bg-blue';
			$notification->picture = $liker->profile->getAvatar();
			if($comment->user_id == $course->author_id):
				$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id).'?section=lessons&action=comments&type=get&lesson_id='.Hashids::encode($lesson->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			else:
				$notification->route = '/curso/'.$course->name.'?section=lessons&action=viewlesson&type=get&lesson_id='.Hashids::encode($lesson->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			endif;
			$notification->title = 'A '.$liker->display_name.' le gustó tu comentario';
			$notification->description = 'En '.$lesson->title.' del curso de ' . $course->title;
			$notification->save();

		endif;

		return true;

	});

	Event::listen('notification.lessons_banned_comment', function($banneder, $comment){

		if(($object = $comment->discussionable) instanceof Discussion):

			$lesson = $object->discussionable;

		else:

			$lesson = $object;

		endif;

		$course = $lesson->module->course;

		if($course->author_id != $comment->user_id):

			$notification = new Notification();
			$notification->user_id = $comment->user_id;
			$notification->notificationable_id = $banneder->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-ban';
			$notification->badge = 'bg-red';
			$notification->picture = $banneder->profile->getAvatar();
			$notification->route = '/curso/'.$course->name.'?section=lessons&action=viewlesson&type=get&lesson_id='.Hashids::encode($lesson->id);
			$notification->title = 'A '.$banneder->display_name.' no le gustó tu comentario';
			$notification->description = 'En '.$lesson->title.' del curso de ' . $course->title . ' y fué mandado a revisión';
			$notification->save();

		endif;

		if($banneder->id != $course->author_id):

			$notification = new Notification();
			$notification->user_id = $course->author_id;
			$notification->notificationable_id = $banneder->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-ban';
			$notification->badge = 'bg-red';
			$notification->picture = $banneder->profile->getAvatar();
			$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id).'?section=lessons&action=comments&type=get&lesson_id='.Hashids::encode($lesson->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			$notification->title = 'A '.$banneder->display_name.' no le gustó';
			$notification->description = 'El comentario de '.$comment->author->display_name.' en '.$lesson->title.' del curso de ' . $course->title;
			$notification->save();

		endif;

		return true;

	});

	Event::listen('notification.discussions_write_comment', function($writer, $discussion, $comment){

		$course = $discussion->course;

		# Notificación a los participantes de la discusion

		foreach($discussion->repliers() as $replier):
			if($replier->id != $writer->id AND $replier->id != $discussion->user_id AND $replier->id != $discussion->user_id):

				$notification = new Notification();
				$notification->user_id = $replier->id;
				$notification->notificationable_id = $writer->id;
				$notification->notificationable_type = 'User';
				$notification->icon = 'fa-comments-o';
				$notification->badge = 'bg-purple';
				$notification->picture = $writer->profile->getAvatar();
				if($replier->isStudent()):
					$notification->route = '/curso/'.$course->name.'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
				else:
					$notification->route = '/teachers/contributions/show/'.Hashids::encode($course->id).'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
				endif;
				$notification->title = $writer->display_name.' comentó';
				$notification->description = 'En '.$discussion->title.' del curso ' . $course->title;
				$notification->save();

			endif;
		endforeach;

		# Notificación al contribuidor si es por parte de un contribuidor

		$teacher = $course->teacher;

		if($writer->id != $discussion->user_id AND $discussion->user_id != $teacher->id):

			$notification = new Notification();
			$notification->user_id = $discussion->user_id;
			$notification->notificationable_id = $writer->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-comments-o';
			$notification->badge = 'bg-purple';
			$notification->picture = $writer->profile->getAvatar();
			$notification->route = '/teachers/contributions/show/'.Hashids::encode($course->id).'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			$notification->title = $writer->display_name.' comentó ';
			$notification->description = 'En '.$discussion->title.' del curso de ' . $course->title;
			$notification->save();

			return true;

		endif;

		# Notificación al Profesor del Curso

		if($writer->id != $teacher->id):

			$notification = new Notification();
			$notification->user_id = $teacher->id;
			$notification->notificationable_id = $writer->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-comments-o';
			$notification->badge = 'bg-purple';
			$notification->picture = $writer->profile->getAvatar();
			$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id).'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			$notification->title = $writer->display_name.' comentó ';
			$notification->description = 'En '.$discussion->title.' del curso de ' . $course->title;
			$notification->save();

			return true;

		endif;

	});

	Event::listen('notification.discussions_reply_comment', function($writer, $discussion, $comment, $parent){

		$course = $discussion->course;

		$repliers = $discussion->repliers();

		$author = $parent->author;

		# Notificaciones a los participantes 3ros de la discusión

		foreach($repliers as $replier):
			if($replier->id != $writer->id AND $replier->id != $discussion->user_id AND $replier->id != $discussion->user_id AND $replier->id != $parent->user_id):

				$notification = new Notification();
				$notification->user_id = $replier->id;
				$notification->notificationable_id = $writer->id;
				$notification->notificationable_type = 'User';
				$notification->icon = 'fa-comments-o';
				$notification->badge = 'bg-purple';
				$notification->picture = $writer->profile->getAvatar();
				if($replier->isStudent($replier)):
					$notification->route = '/curso/'.$course->name.'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
				else:
					$notification->route = '/teachers/contributions/show/'.Hashids::encode($course->id).'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
				endif;
				$notification->title = $writer->display_name.' tambien respondió';
				if($writer->id != $parent->user_id):
					$notification->description = 'El comentario de ' . $author->display_name .' en ' .$discussion->title. ' del curso de ' . $course->title;
				else:
					$notification->description = 'Su comentario en ' .$discussion->title. ' del curso de ' . $course->title;
				endif;
				$notification->save();

			endif;
		endforeach;

		$teacher = $course->teacher;

		# Notificación a quien estan respondiendo

		if($writer->id != $parent->user_id):

			$notification = new Notification();
			$notification->user_id = $parent->user_id;
			$notification->notificationable_id = $writer->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-comments-o';
			$notification->badge = 'bg-purple';
			$notification->picture = $writer->profile->getAvatar();
			if($parent->author->isStudent()):
				$notification->route = '/curso/'.$course->name.'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			elseif($parent->author->isTeacher() AND $parent->user_id == $teacher->id):
				$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id).'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			else:
				$notification->route = '/teachers/contributions/show/'.Hashids::encode($course->id).'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			endif;
			$notification->title = $writer->display_name.' respondió tu comentario ';
			$notification->description = 'En '.$discussion->title.' del curso ' . $course->title;
			$notification->save();

		endif;

		# Notificación al contribuidor si es por parte de un contribuidor

		if($writer->id != $discussion->user_id AND $discussion->user_id != $teacher->id AND $discussion->user_id != $parent->user_id):

			$notification = new Notification();
			$notification->user_id = $discussion->user_id;
			$notification->notificationable_id = $writer->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-comments-o';
			$notification->badge = 'bg-purple';
			$notification->picture = $writer->profile->getAvatar();
			$notification->route = '/teachers/contributions/show/'.Hashids::encode($course->id).'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			$notification->title = $writer->display_name.' respondió ';
			if($writer->id != $parent->user_id):
				$notification->description = 'El comentario de ' . $author->display_name .' en ' .$discussion->title. ' del curso de ' . $course->title;
			else:
				$notification->description = 'Su comentario en ' .$discussion->title. ' del curso de ' . $course->title;
			endif;
			$notification->save();

			return true;

		endif;

		# Notificación al profesor

		$teacher = $course->teacher;

		if($writer->id != $teacher->id AND $discussion->user_id != $parent->user_id):

			$notification = new Notification();
			$notification->user_id = $teacher->id;
			$notification->notificationable_id = $writer->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-comments-o';
			$notification->badge = 'bg-purple';
			$notification->picture = $writer->profile->getAvatar();
			$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id).'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			$notification->title = $writer->display_name.' respondió';
			if($writer->id != $parent->user_id):
				$notification->description = 'El comentario de ' . $author->display_name .' en ' .$discussion->title. ' del curso de ' . $course->title;
			else:
				$notification->description = 'Su comentario en ' .$discussion->title. ' del curso de ' . $course->title;
			endif;
			$notification->save();

			return true;

		endif;

	});

	Event::listen('notification.discussions_like_comment', function($liker, $comment){

		$course = null;
		$discussion = null;
		$is_parent = false;

		if(!($object = $comment->discussionable) instanceof Course):

			if(!($parent_object = $object->discussionable) instanceof Course):

				if(!($grand_parent_object = $parent_object->discussionable) instanceof Course):

					$course = $grand_parent_object->discussionable;
					$discussion = $grand_parent_object;

				else:

					$course = $grand_parent_object;
					$discussion = $parent_object;

				endif;

			else:

				$course = $parent_object;
				$discussion = $object;

			endif;

		else:

			$course = $object;
			$discussion = $comment;
			$is_parent = true;

		endif;

		if($liker->id != $comment->user_id):

			$notification = new Notification();
			$notification->user_id = $comment->user_id;
			$notification->notificationable_id = $liker->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-thumbs-up';
			$notification->badge = 'bg-blue';
			$notification->picture = $liker->profile->getAvatar();
			if($comment->author->isStudent()):
				$notification->route = '/curso/'.$course->name.'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			elseif($comment->user_id == $course->author_id):
				$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id).'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			else:
				$notification->route = '/teachers/contributions/show/'.Hashids::encode($course->id).'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			endif;
			if($is_parent):
				$notification->title = 'A '.$liker->display_name.' le gustó tu aporte';
				$notification->description = 'En '.$discussion->title.' del curso de ' . $course->title;
			else:
				$notification->title = 'A '.$liker->display_name.' le gustó tu comentario';
				$notification->description = 'En '.$discussion->title.' del curso de ' . $course->title;
			endif;
			$notification->save();

		endif;

		return true;

	});

	Event::listen('notification.discussions_banned_comment', function($banneder, $comment){

		$course = null;
		$discussion = null;
		$is_parent = false;

		if(!($object = $comment->discussionable) instanceof Course):

			if(!($parent_object = $object->discussionable) instanceof Course):

				if(!($grand_parent_object = $parent_object->discussionable) instanceof Course):

					$course = $grand_parent_object->discussionable;
					$discussion = $grand_parent_object;

				else:

					$course = $grand_parent_object;
					$discussion = $parent_object;

				endif;

			else:

				$course = $parent_object;
				$discussion = $object;

			endif;

		else:

			$course = $object;
			$discussion = $comment;
			$is_parent = true;

		endif;

		if($comment->author->isStudent()):

			$notification = new Notification();
			$notification->user_id = $comment->user_id;
			$notification->notificationable_id = $banneder->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-ban';
			$notification->badge = 'bg-red';
			$notification->picture = $banneder->profile->getAvatar();
			$notification->route = '/curso/'.$course->name.'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id);
			$notification->title = 'A '.$banneder->display_name.' no le gustó tu comentario';
			$notification->description = 'En '.$discussion->title.' del curso de ' . $course->title . ' y fué mandado a revisión';
			$notification->save();

		endif;

		if($banneder->id != $discussion->user_id AND $discussion->user_id != $course->author_id):

			$notification = new Notification();
			$notification->user_id = $course->author_id;
			$notification->notificationable_id = $banneder->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-ban';
			$notification->badge = 'bg-red';
			$notification->picture = $banneder->profile->getAvatar();
			$notification->route = '/teachers/contributions/show/'.Hashids::encode($course->id).'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			$notification->title = 'A '.$banneder->display_name.' no le gustó';
			$notification->description = 'El comentario de '.$comment->author->display_name.' en '.$discussion->title.' del curso de ' . $course->title;
			$notification->save();

		endif;

		if($banneder->id != $course->author_id):

			$notification = new Notification();
			$notification->user_id = $course->author_id;
			$notification->notificationable_id = $banneder->id;
			$notification->notificationable_type = 'User';
			$notification->icon = 'fa-ban';
			$notification->badge = 'bg-red';
			$notification->picture = $banneder->profile->getAvatar();
			$notification->route = '/teachers/courses/show/'.Hashids::encode($course->id).'?section=discussions&action=comments&type=get&discussion_id='.Hashids::encode($discussion->id).'&focusable=true&focuskey=comment&focusvalue='.Hashids::encode($comment->id).'';
			$notification->title = 'A '.$banneder->display_name.' no le gustó';
			$notification->description = 'El comentario de '.$comment->author->display_name.' en '.$discussion->title.' del curso de ' . $course->title;
			$notification->save();

		endif;

		return true;

	});

	Event::listen('notification.publish_lesson', function($teacher, $lesson){

		$course = $lesson->module->course;

		foreach($course->students as $student):

			$notification = new Notification();
			$notification->user_id = $student->id;
			$notification->notificationable_id = $lesson->id;
			$notification->notificationable_type = 'Lesson';
			$notification->icon = 'fa-book';
			$notification->badge = 'bg-yellow';
			$notification->picture = $course->main_picture;
			$notification->route = '/curso/'.$course->name.'?section=lessons&action=viewlesson&type=post&lesson_id='.Hashids::encode($lesson->id);
			$notification->title = 'Nueva Lección Disponible';
			$notification->description = 'La lección "'.$lesson->title.'" del curso '.$course->title.' ya está disponible.';
			$notification->save();

		endforeach;

	});


	Event::listen('notification.publish_module', function($module){

		$course = $module->course;

		foreach($course->students as $student):

			$notification = new Notification();
			$notification->user_id = $student->id;
			$notification->notificationable_id = $module->id;
			$notification->notificationable_type = 'Module';
			$notification->icon = 'fa-cube';
			$notification->badge = 'bg-yellow';
			$notification->picture = $course->main_picture;
			$notification->route = '/curso/'.$course->name.'?section=lessons';
			$notification->title = 'Nuevo Módulo Disponible';
			$notification->description = 'El Módulo "'.$module->title.'" del curso '.$course->title.' ya está disponible.';
			$notification->save();

		endforeach;

	});

	Event::listen('notification.update_lesson', function($teacher, $lesson){

		$course = $lesson->module->course;

		foreach($course->students as $student):

			$notification = new Notification();
			$notification->user_id = $student->id;
			$notification->notificationable_id = $lesson->id;
			$notification->notificationable_type = 'Lesson';
			$notification->icon = 'fa-book';
			$notification->badge = 'bg-blue';
			$notification->picture = $course->main_picture;
			$notification->route = '/curso/'.$course->name.'?section=lessons&action=viewlesson&type=post&lesson_id='.Hashids::encode($lesson->id);
			$notification->title = 'Contenido Nuevo en Lección';
			$notification->description = 'La lección "'.$lesson->title.'" del curso '.$course->title.' tiene nuevo contenido.';
			$notification->save();

		endforeach;

	});

	Event::listen('notification.course_image', function($course){

		foreach($course->students as $student):

			$notification = new Notification();
			$notification->user_id = $student->id;
			$notification->notificationable_id = $course->id;
			$notification->notificationable_type = 'Course';
			$notification->icon = 'fa-file-image-o';
			$notification->badge = 'bg-green-haze';
			$notification->picture = $course->main_picture;
			$notification->route = '/curso/'.$course->name.'?section=general';
			$notification->title = 'Nueva Imagen en ' . $course->title;
			$notification->description = 'El Curso ' . $course->title . ' ha cambiado su imagen principal.';
			$notification->save();

		endforeach;

	});

	Event::listen('notification.course_cover', function($course){

		foreach($course->students as $student):

			$notification = new Notification();
			$notification->user_id = $student->id;
			$notification->notificationable_id = $course->id;
			$notification->notificationable_type = 'Course';
			$notification->icon = 'fa-file-image-o';
			$notification->badge = 'bg-green-haze';
			$notification->picture = $course->main_picture;
			$notification->route = '/curso/'.$course->name.'?section=general';
			$notification->title = 'Nueva Portada en ' . $course->title;
			$notification->description = 'El Curso ' . $course->title . ' ha cambiado su imagen de Portada.';
			$notification->save();

		endforeach;

	});

	Event::listen('notification.lesson_upload_files', function($lesson){

		$course = $lesson->module->course;

		foreach($course->students as $student):

			$notification = new Notification();
			$notification->user_id = $student->id;
			$notification->notificationable_id = $course->id;
			$notification->notificationable_type = 'Course';
			$notification->icon = 'fa-download';
			$notification->badge = 'bg-green-haze';
			$notification->picture = $course->main_picture;
			$notification->route = '/curso/'.$course->name.'?section=general';
			$notification->title = 'Nuevos Archivos Descargavles ';
			$notification->description = 'Se ha subido nuevo contenido a la Lección ' . $lesson->title . '.';
			$notification->save();

		endforeach;

	});

	################## ACHIEVEMENTS ##################

	Event::listen('notification.achievement_earned', function($user, $achievement){

			$notification = new Notification();
			$notification->user_id = $user->id;
			$notification->notificationable_id = $achievement->id;
			$notification->notificationable_type = 'Achievement';
			$notification->icon = 'fa-trophy';
			$notification->badge = 'bg-purple';
			$notification->picture = $achievement->picture;
			$notification->route = '/'.$user->username.'?section=achievements';
			$notification->title = 'Nueva Insignia en Tu Perfil';
			$notification->description = ' Has ganado la insignia "'.$achievement->title.'"';
			$notification->status = 'fired';
			$notification->save();

	});

	Event::listen('achievement.comments', function($user){

		$courses = $user->historylearning;

		$comments = 0;

		foreach($courses as $course):

			$comments += count($course->discussionsInLessonsOf($user));
			$comments += count($course->discussionsInDiscussionsOf($user));

		endforeach;

		$break_point = Achievement::numberBreakingPoint($comments);

		if($achievement = $user->achievementType('comments')):
			if($break_point > $achievement->value):
				if($new_achievement = Achievement::getAchievement('comments', $break_point)):
					$user->achievements()->detach($achievement->id);
					$user->achievements()->attach($new_achievement->id);
					Event::fire('notification.achievement_earned', array($user, $new_achievement));
				endif;
			endif;
		else:
			if($new_achievement = Achievement::getAchievement('comments', $break_point)):
				$user->achievements()->attach($new_achievement->id);
				Event::fire('notification.achievement_earned', array($user, $new_achievement));
			endif;
		endif;

		return true;

	});

	Event::listen('achievement.likes', function($user){

		$courses = $user->historylearning;

		$likes = 0;

		foreach($courses as $course):

			$likes += $course->discussionsInLessonsThumbsupsOf($user);

		endforeach;

		$break_point = Achievement::numberBreakingPoint($likes);

		if($achievement = $user->achievementType('likes')):
			if($break_point > $achievement->value):
				if($new_achievement = Achievement::getAchievement('likes', $break_point)):
					$user->achievements()->detach($achievement->id);
					$user->achievements()->attach($new_achievement->id);
					Event::fire('notification.achievement_earned', array($user, $new_achievement));
				endif;
			endif;
		else:
			if($new_achievement = Achievement::getAchievement('likes', $break_point)):
				$user->achievements()->attach($new_achievement->id);
				Event::fire('notification.achievement_earned', array($user, $new_achievement));
			endif;
		endif;

		return true;

	});

	Event::listen('achievement.activities', function($user){

		$courses = $user->historylearning;

		$activities = 0;

		foreach($courses as $course):

			$activities += count($course->activitiesOf($user));

		endforeach;

		$break_point = Achievement::numberBreakingPoint($activities);

		if($achievement = $user->achievementType('activities')):
			if($break_point > $achievement->value):
				if($new_achievement = Achievement::getAchievement('activities', $break_point)):
					$user->achievements()->detach($achievement->id);
					$user->achievements()->attach($new_achievement->id);
					Event::fire('notification.achievement_earned', array($user, $new_achievement));
				endif;
			endif;
		else:
			if($new_achievement = Achievement::getAchievement('activities', $break_point)):
				$user->achievements()->attach($new_achievement->id);
				Event::fire('notification.achievement_earned', array($user, $new_achievement));
			endif;
		endif;

		return true;

	});

	Event::listen('achievement.average', function($user){

		$courses = $user->historylearning;

		$average = 0;

		foreach($courses as $course):

			$average += $course->averageOf($user);

		endforeach;

		$break_point = Achievement::percentageBreakingPoint(round($average/$courses->count()));

		if($achievement = $user->achievementType('average')):
			if($break_point > $achievement->value):
				if($new_achievement = Achievement::getAchievement('average', $break_point)):
					$user->achievements()->detach($achievement->id);
					$user->achievements()->attach($new_achievement->id);
					Event::fire('notification.achievement_earned', array($user, $new_achievement));
				endif;
			endif;
		else:
			if($new_achievement = Achievement::getAchievement('average', $break_point)):
				$user->achievements()->attach($new_achievement->id);
				Event::fire('notification.achievement_earned', array($user, $new_achievement));
			endif;
		endif;

		return true;

	});

	Event::listen('achievement.lessons', function($user){

		$courses = $user->historylearning;

		$lessons = 0;

		foreach($courses as $course):

			$lessons += $course->lessonParticipationOf($user);

		endforeach;

		$break_point = Achievement::numberBreakingPoint($lessons);

		if($achievement = $user->achievementType('lessons')):
			if($break_point > $achievement->value):
				if($new_achievement = Achievement::getAchievement('lessons', $break_point)):
					$user->achievements()->detach($achievement->id);
					$user->achievements()->attach($new_achievement->id);
					Event::fire('notification.achievement_earned', array($user, $new_achievement));
				endif;
			endif;
		else:
			if($new_achievement = Achievement::getAchievement('lessons', $break_point)):
				$user->achievements()->attach($new_achievement->id);
				Event::fire('notification.achievement_earned', array($user, $new_achievement));
			endif;
		endif;

		return true;

	});

	//Teachers

	// 1023-1327-2857-0284-8569-7626 Adobe AfterEffects CC 