<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * To apply the softDeleting.
	 *
	 * @var string
	 */
	
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function role(){

		return $this->belongsTo('Roles', 'id_role');

	}

	public function tasks(){

		return $this->belongsToMany('Tasks', 'user_tasks', 'id_user', 'id_task');
		
	}

	public function inbox(){

		return $this->belongsToMany('Messages', 'user_messages', 'id_user', 'id_messages');
		
	}

	public function outbox(){

		return $this->hasMany('Messages', 'id_user_from', 'id');

	}

	public function audits(){

		return $this->hasMany('Audits', 'id_user');
		
	}

	public function hasCapability( $capability ){

		$capabilities = $this->role->capabilities;

		$bool = false;

		foreach( $capabilities as $cap ):

			if($cap->name == $capability['name'] ) $bool = true;

		endforeach;

		return $bool;

	}

	public function hasCap( $capability ){

		$capabilities = $this->role->capabilities;

		$bool = false;

		foreach( $capabilities as $cap ):

			if($cap->name == $capability ) $bool = true;

		endforeach;

		return $bool;

	}

}
