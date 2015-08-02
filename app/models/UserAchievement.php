<?php

class UserAchievement extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_achievements';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function achievement(){

    	return $this->belongsTo('Achievement','achievement_id');

    }

    public function user(){

    	return $this->belongsTo('User','user_id');
    	
    }

}