<?php

class CourseAchievement extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'course_achievements';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function course(){

    	return $this->belongsTo('Course','course_id');

    }

    public function winners(){

    	return $this->belongsToMany('User','user_course_achievements');

    }

    public function taken(){

    	return $this->hasMany('UserCourseAchievement', 'course_achivement_id');

    }

}