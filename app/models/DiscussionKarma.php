<?php

class DiscussionKarma extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'discussions_karma';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function user(){

    	return $this->belongsTo('User', 'user_id');

    }

    public function discussion(){

    	return $this->belongsTo('Discussion', 'discussion_id');
    	
    }

}