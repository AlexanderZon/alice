<?php

class Message extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'messages';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function from(){

    	return $this->belongsTo('User', 'user_id');

    }

    public function to(){

    	return $this->belongsToMany('User', 'user_messages', 'message_id', 'user_id');
    	
    }

}