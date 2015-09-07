<?php

class CourseQuestion extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'course_questions';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function course(){

    	return $this->belongsTo('Course', 'course_id');

    }

    public function isIncomplete(){

    	return ($this->question == '' OR $this->answer == '' OR $this->reference == '');
    	
    }

}