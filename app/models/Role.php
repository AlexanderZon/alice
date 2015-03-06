<?php

class Role extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

	protected $fillable = [];

    protected $dates = ['deleted_at'];

	public function capabilities(){

		return $this->belongsToMany('Capabilities', 'role_capabilities', 'id_role', 'id_capability');

	}

	public function users(){

		return $this->hasMany('Users', 'id_role', 'id');
		
	}

	public static function hasName( $name, $id = '' ){

		$role = self::where('name','=',$name)->where('id','!=',$id)->take(1)->get();

		if(isset($role[0])):

			return true;

		else:

			return false;

		endif;

	}

	public static function hasCapability( $role, $cap ){

		$capabilities = $role->capabilities;
		$bool = false;

		foreach($capabilities as $capability):

			if($capability->id == $cap->id) $bool = true;

		endforeach;

		return $bool;

	}

	public static function getActive(){

		return self::where('status','=','active')->get();
		
	}

}