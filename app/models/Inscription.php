<?php

class Inscription extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inscriptions';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function course(){

    	return $this->belongsTo('Course', 'ourse_id');

    }

    public function student(){

    	return $this->belongsTo('User', 'user_id');
    	
    }

}