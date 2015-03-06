<?php

class Contributor extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contributors';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function user(){

    	return $this->belongsTo('User','user_id');
    	
    }

    public function course(){

    	return $this->belongsTo('Course','course_id');

    }

}