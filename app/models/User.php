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

		return $this->belongsTo('Role', 'role_id');

	}

	public function auditories(){

		return $this->hasMany('Auditory', 'user_id');
		
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

		// return $this->belongsToMany('Message','user_messages')->where('user_messages.status', '=', 'read')->orWhere('user_messages.status', '=', 'unread');
		return $this->belongsToMany('Message','user_messages')->whereRaw('( user_messages.status = ? OR user_messages.status = ? )', array('read', 'unread'))->orderBy('user_messages.created_at', 'DESC');

	}

	public function unreadbox(){

		return $this->belongsToMany('Message','user_messages')->where('user_messages.status', '=', 'unread')->orderBy('user_messages.created_at', 'DESC');

	}

	public function readbox(){

		return $this->belongsToMany('Message','user_messages')->where('user_messages.status', '=', 'read')->orderBy('user_messages.created_at', 'DESC');

	}

	public function spambox(){

		return $this->belongsToMany('Message','user_messages')->where('user_messages.status', '=', 'spam')->orderBy('user_messages.created_at', 'DESC');

	}

	public function trashbox(){

		return $this->belongsToMany('Message','user_messages')->where('user_messages.status', '=', 'deleted')->orderBy('user_messages.created_at', 'DESC');

	}

	public function outbox(){

		return $this->hasMany('Message','author_id')->where('messages.status', '=', 'done')->orderBy('messages.created_at', 'DESC');

	}

	public function draftbox(){

		return $this->hasMany('Message','author_id')->where('messages.status', '=', 'draft')->orderBy('messages.created_at', 'DESC');

	}

	public function lessons(){

		return $this->belongsToMany('Lesson','user_lessons');
		
	}

	public function followers(){

		return $this->belongsToMany('User','follows','followed_id','follower_id');
		
	}

	public function followed(){

		return $this->belongsToMany('User','follows','follower_id','followed_id');

	}

	public static function getTeachers( $status = 'active' ){

		if( $role = Role::getByName( 'teacher' ) ):

			$users = self::where( 'role_id', '=', $role->id );

			if( $status != 'all' ) $user = $users->where( 'status', '=', $status );

			return $users->get();

		else:

			return false;

		endif;

	}

	public static function getStudents( $status = 'active' ){

		if( $role = Role::getByName( 'student' ) ):

			$users = self::where( 'role_id', '=', $role->id );

			if( $status != 'all' ) $user = $users->where( 'status', '=', $status );

			return $users->get();

		else:

			return false;

		endif;

	}

	public static function hasUsername( $username, $id = '' ){

		if( $id != '' ):

			$user = self::where('username', '=', $username )->where('id', '!=', $id )->take(1)->get();

		else:

			$user = self::where('username', '=', $username )->take(1)->get();

		endif;

		if(empty($user[0])):
			return false;
		else:
			return true;
		endif;

	}

	public static function hasEmail( $email, $id = '' ){

		if( $id != '' ):

			$user = self::where('email', '=', $email )->where('id', '!=', $id )->take(1)->get();

		else:

			$user = self::where('email', '=', $email )->take(1)->get();

		endif;

		if(empty($user[0])):

			return false;

		else:

			return true;

		endif;

	}

}
