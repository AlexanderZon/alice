<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * To apply the softDeleting.
	 *
	 * @var string
	 */

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    private $rules = array(
        'username' => 'required|alpha|min:6|unique:users',
        'password'  => 'required',
        'email' => 'unique:users'
        // .. more rules here ..
    );

	public function role(){

		return $this->belongsTo('Roles', 'id_role');

	}

	public function tasks(){

		return $this->belongsToMany('Tasks', 'user_tasks', 'id_user', 'id_task');
		
	}

	public function inbox(){

		return $this->belongsToMany('Messages', 'user_messages', 'id_user', 'id_messages');
		
	}

	public function outbox(){

		return $this->hasMany('Messages', 'id_user_from', 'id');

	}

	public function auditories(){

		return $this->hasMany('Auditories', 'id_user');
		
	}

	public function hasCapability( $capability ){

		$capabilities = $this->role->capabilities;

		$bool = false;

		foreach( $capabilities as $cap ):

			if($cap->name == $capability['name'] ) $bool = true;

		endforeach;

		return $bool;

	}

	public function hasCap( $capability ){

		$capabilities = $this->role->capabilities;

		$bool = false;

		foreach( $capabilities as $cap ):

			if($cap->name == $capability ) $bool = true;

		endforeach;

		return $bool;

	}

	public function profile(){

		return $this->hasOne('Profile','user_id');

	}

	public function achievements(){

		return $this->belongsToMany('Achievement','user_achiements');

	}

	public function courseAchievements(){

		return $this->belongsToMany('CourseAchievement','user_course_achievements');

	}

	public function achievementFromCourse( $course ){

		return $this->belongsToMany('CourseAchievement','user_course_achievements')->where('course_id','=',$course->id)->get();

	}

	public function tests(){

		return $this->hasMany('Test','user_id');

	}

	public function approvedTests(){

		$approved = array();

		foreach($this->tests as $test) if($test->tercentage >= $test->lesson->approval_percentage) $approved[] = $test;

		return $approved;

	}

	public function contributions(){

		return $this->belongsToMany('Course', 'contributes');

	}

	public function registeredCourses(){

		return $this->belongsToMany('Course','inscriptions');

	}

	public function inscriptions(){

		return $this->hasMany('Inscription','user_id');

	}

	public function myCourses(){

		return $this->belongsToMany('Course','inscriptions')->where('status','=','active')->get();

	}

	public function iTeach(){

		return $this->hasMany('Course','user_id');

	}

	public function notes(){

		return $this->hasMany('Note','user_id');

	}

	public function discussions(){

		return $this->hasMany('Discussion','user_id');

	}

	public function inbox(){

		return $this->belongsToMany('Message','user_messages');

	}

	public function outbox(){

		return $this->hasMany('Message','user_id');

	}

	public function lessons(){

		return $this->belongsToMany('Lesson','user_lessons');
		
	}

}
