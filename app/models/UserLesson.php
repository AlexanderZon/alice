<?php

class UserLesson extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_lessons';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public static function hasViewed($lesson, $student){

    	$user_lesson = self::where('lesson_id','=',$lesson->id)->where('user_id','=',$student->id)->first();

    	return $user_lesson;

    }


}