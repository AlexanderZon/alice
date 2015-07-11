<?php

	/* SOME EVENTS PUT HERE */

	Event::listen('notification.new_user', function(){
		return false;
	});