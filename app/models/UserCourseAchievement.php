<?php

class UserCourseAchievement extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_course_achievements';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

}