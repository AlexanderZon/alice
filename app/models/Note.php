<?php

class Note extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notes';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function lesson(){

    	return $this->belongsTo('Lesson', 'lesson_id');

    }

    public function author(){

    	return $this->belongsTo('User','user_id');

    }

    public function course(){

    	return $this->lesson->module->course;
    	
    }

}