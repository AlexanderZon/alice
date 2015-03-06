<?php

class UserAchievement extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_achivements';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

}