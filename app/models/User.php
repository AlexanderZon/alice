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

	public function notifications(){

		return $this->hasMany('Notification', 'user_id')->orderBy('created_at','DESC');
		
	}

	public function firednotifications(){

		return $this->notifications()->where('notifications.status','=','fired');

	}

	public function newnotifications(){

		return $this->notifications()->where('notifications.status','=','catched')->orderBy('created_at','DESC');
		
	}

	public function setnotifications(){

		$fired = $this->firednotifications;

		foreach($fired as $notification):
			$notification->status = 'catched';
			$notification->save();
		endforeach;

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

		return $this->hasOne('UserProfile','user_id');

	}

	public function achievements(){

		return $this->belongsToMany('Achievement','user_achievements');

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

		return $this->belongsToMany('Course', 'contributors')->where('contributors.deleted_at','=',null);

	}

	public function registeredCourses(){

		return $this->belongsToMany('Course','inscriptions');

	}

	public function inscriptions(){

		return $this->hasMany('Inscription','user_id');

	}

	public function learning(){

		return $this->belongsToMany('Course','inscriptions')->where('inscriptions.status','=','active');

	}

	public function learned(){

		return $this->belongsToMany('Course','inscriptions')->where('inscriptions.status','=','done');

	}

	public function historylearning(){

		return $this->belongsToMany('Course','inscriptions');

	}

	public function myCourses(){

		return $this->belongsToMany('Course','inscriptions')->where('status','=','active')->get();

	}

	public function teaching(){

		return $this->hasMany('Course','author_id')->where('courses.status','=','active');

	}

	public function lessonsteaching(){

		$lessons = array();

		$courses = $this->teaching;

		if($courses->count() > 0):

			foreach($courses as $course):
				$c_lessons = $course->lessons;
				if($c_lessons->count() > 0):
					foreach($c_lessons as $c_lesson):
						$lessons[] = $c_lesson;
					endforeach;
				endif;
			endforeach;

		endif;

		return $lessons;

	}

	public function studentsteaching(){

		$students = array();

		$courses = $this->teaching;

		if($courses->count() > 0):

			foreach($courses as $course):
				$c_students = $course->students;
				if($c_students->count() > 0):
					foreach($c_students as $c_lesson):
						$students[] = $c_lesson;
					endforeach;
				endif;
			endforeach;

		endif;

		return $students;

	}

	public function notes(){

		return $this->hasMany('Note','user_id');

	}

	public function discussions(){

		return $this->hasMany('Discussion','user_id');

	}


	public function discussionsfromcourses(){

		return $this->hasMany('Discussion','user_id')->where('discussions.discussionable_type','=','Course');

	}

	public function inbox( $q = '' ){

		$inbox = $this->belongsToMany('Message','user_messages')->whereRaw('( `user_messages`.`status` = ? OR `user_messages`.`status` = ? )', array('read', 'unread'))->orderBy('user_messages.created_at', 'DESC');

		if($q != '') $inbox = $inbox->whereRaw('( `messages`.`subject` LIKE(\'%'.$q.'%\') OR `messages`.`message` LIKE(\'%'.$q.'%\') )', array())->get();
		// return $this->belongsToMany('Message','user_messages')->where('user_messages.status', '=', 'read')->orWhere('user_messages.status', '=', 'unread');
		return $inbox;

	}

	public function unreadbox( $q = '' ){

		$unreadbox = $this->belongsToMany('Message','user_messages')->where('user_messages.status', '=', 'unread')->orderBy('user_messages.created_at', 'DESC');

		if($q != '') $unreadbox = $unreadbox->whereRaw('( `messages`.`subject` LIKE(\'%'.$q.'%\') OR `messages`.`message` LIKE(\'%'.$q.'%\') )', array())->get();
		
		return  $unreadbox;

	}

	public function readbox( $q = '' ){

		$readbox = $this->belongsToMany('Message','user_messages')->where('user_messages.status', '=', 'read')->orderBy('user_messages.created_at', 'DESC');

		if($q != '') $readbox = $readbox->whereRaw('( `messages`.`subject` LIKE(\'%'.$q.'%\') OR `messages`.`message` LIKE(\'%'.$q.'%\') )', array())->get();
		
		return $readbox;

	}

	public function spambox( $q = '' ){

		$spambox = $this->belongsToMany('Message','user_messages')->where('user_messages.status', '=', 'spam')->orderBy('user_messages.created_at', 'DESC');
		
		if($q != '') $spambox = $spambox->whereRaw('( `messages`.`subject` LIKE(\'%'.$q.'%\') OR `messages`.`message` LIKE(\'%'.$q.'%\') )', array())->get();

		return $spambox;

	}

	public function trashbox( $q = '' ){

		$trashbox = $this->belongsToMany('Message','user_messages')->where('user_messages.status', '=', 'deleted')->orderBy('user_messages.created_at', 'DESC');

		if($q != '') $trashbox = $trashbox->whereRaw('( `messages`.`subject` LIKE(\'%'.$q.'%\') OR `messages`.`message` LIKE(\'%'.$q.'%\') )', array())->get();
		
		return $trashbox;

	}

	public function outbox( $q = '' ){

		$outbox = $this->hasMany('Message','author_id')->where('messages.status', '=', 'done')->orderBy('messages.created_at', 'DESC');

		if($q != '') $outbox = $outbox->whereRaw('( `messages`.`subject` LIKE(\'%'.$q.'%\') OR `messages`.`message` LIKE(\'%'.$q.'%\') )', array())->get();

		return $outbox;

	}

	public function draftbox( $q = '' ){

		$draftbox = $this->hasMany('Message','author_id')->where('messages.status', '=', 'draft')->orderBy('messages.created_at', 'DESC');

		if($q != '') $draftbox = $draftbox->whereRaw('( `messages`.`subject` LIKE(\'%'.$q.'%\') OR `messages`.`message` LIKE(\'%'.$q.'%\') )', array())->get();

		return $draftbox;

	}

	public function lessons(){

		return $this->belongsToMany('Lesson','user_lessons');
		
	}

	public function followers(){

		return $this->belongsToMany('User','follows','followed_id','follower_id')->where('follows.status','=','active');
		
	}

	public function follows(){

		return $this->hasMany('Follow','follower_id','id');
		
	}

	public function followsme(){

		return $this->hasMany('Follow','followed_id','id');
		
	}

	public function followed(){

		return $this->belongsToMany('User','follows','follower_id','followed_id')->where('follows.status','=','active');

	}

	public function _follows( $user, $status = 'active' ){

		$follow = null;

		if(!$follow = $user->getMyFollow()):

			$follow = new Follow();

		endif;

		$follow->follower_id = $this->id;
		$follow->followed_id = $user->id;
		$follow->status = $status;
		return $follow->save();

	}

	public function follow( $user ){

		$this->_follows($user, 'active');

	}

	public function unfollow( $user ){

		$this->_follows($user, 'inactive');

	}

	public function block( $user ){

		$this->_follows($user, 'block');

	}

	public function unblock( $user ){

		$this->_follows($user, 'active');

	}

	public function hasMyFollow(){

		$my_followed = Auth::user()->followed;

		$bool = false;

		foreach($my_followed as $followed):
			if(($followed->id == $this->id)):
				$follow = Follow::where('follower_id','=',Auth::user()->id)->where('followed_id','=',$this->id)->take(1)->get();
				if(isset($follow[0]) AND $follow[0]->status == 'active'):
			 		$bool = true;
			 	endif;
			 endif;
		endforeach;

		return $bool;
		
	}

	public function getMyFollow(){

		$my_followed = Auth::user()->follows;

		$bool = false;

		foreach($my_followed as $followed):
			if(($followed->followed_id == $this->id)):
			 	$bool = $followed;
			endif;
		endforeach;

		return $bool;
		
	}

	public function hasMyBlock(){

		$my_followed = Auth::user()->followed;

		$bool = false;

		foreach($my_followed as $followed):
			if(($followed->id == $this->id)):
				$follow = Follow::where('follower_id','=',Auth::user()->id)->where('followed_id','=',$this->id)->take(1)->get();
				if(isset($follow[0]) AND $follow[0]->status == 'block'):
			 		$bool = true;
			 	endif;
			 endif;
		endforeach;

		return $bool;

	}

	public function isStudent(){

		$role = $this->role;

		if($role->name == 'student') return true;
		else return false;
		
	}

	public function isTeacher(){

		$role = $this->role;

		if($role->name == 'teacher') return true;
		else return false;
		
	}

	public function isCoordinator(){

		$role = $this->role;

		if($role->name == 'coordinator') return true;
		else return false;

	}

	public function statistics(){

		$statistics = array(
			'lessons_viewed' => 0,
			'lessons_comments' => 0,
			'discussion_comments' => 0,
			'files_uploaded' => 0,
			'activities_tested' => 0,
			'average' => 0,
			'likes' => 0,
			'banned' => 0,
			'achievements' => 0
			);

		$courses = $this->historylearning;

		foreach($courses as $course):

			$statistics['lessons_viewed'] += $course->lessonParticipationOf($this);
			$statistics['lessons_comments'] += count($course->discussionsInLessonsOf($this));
			$statistics['discussion_comments'] += count($course->discussionsInDiscussionsOf($this));
			$statistics['files_uploaded'] += count($course->attachmentsInLessonsOf($this));
			$statistics['activities_tested'] += count($course->activitiesOf($this));
			$statistics['average'] += $course->averageOf($this);
			$statistics['likes'] += $course->discussionsInLessonsThumbsupsOf($this);
			$statistics['banned'] += $course->discussionsInLessonsBannedOf($this);
			$statistics['achievements'] += count($this->achievementFromCourse($course));

		endforeach;

		$statistics['average'] = round($statistics['average']/$courses->count()).'%';

		return $statistics;

	}

	/* -------- STATIC METHODS ----------- */

	public static function getCoordinators( $status = 'active' ){

		if( $role = Role::getByName( 'coordinator' ) ):

			$users = self::where( 'role_id', '=', $role->id );

			if( $status != 'all' ) $user = $users->where( 'status', '=', $status );

			return $users->get();

		else:

			return false;

		endif;

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

	public static function isValidUsername( $username, $id = '' ){

		if( $id != '' ):

			$user = self::where('username', '=', $username )->where('id', '!=', $id )->take(1)->get();

		else:

			$user = self::where('username', '=', $username )->first();

		endif;

		if($user != null):
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

	public static function search($q = ''){

		return self::where('email','LIKE','%'.$q.'%')->orWhere('first_name','LIKE','%'.$q.'%')->orWhere('last_name','LIKE','%'.$q.'%')->orWhere('username','LIKE','%'.$q.'%')->orWhere('display_name','LIKE','%'.$q.'%')->get();

	}

	public static function retrieveByUsername( $username ){

		$user = self::where('username','=',$username)->take(1)->get();

		if(isset($user[0])) return $user[0];

		else return null;

	}

}
