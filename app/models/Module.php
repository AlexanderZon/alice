<?php

class Module extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'modules';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function course(){

    	return $this->belongsTo('Course','course_id');

    }

    public function lessons(){

    	return $this->hasMany('Lesson', 'module_id');

    }

}