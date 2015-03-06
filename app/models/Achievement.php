<?php

class Achievement extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'achievements';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function users(){

    	return $this->belongsToMany('User', 'user_achievements', 'id_user', 'id_achievement');

    }

}