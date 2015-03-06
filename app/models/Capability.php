<?php

class Capability extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'capabilities';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	public function roles(){

		return $this->belongsToMany('Roles', 'role_capabilities', 'id_capability', 'id_role');

	}
	
	public static function getCapability( $request ){

		$capability = self::where('controller','=',$request['controller'])->take(1)->get();
		
		if(isset($capability[0])):
			$capability = $capability[0];
			return $capability;
		else:
			return false;
		endif;

	}

	public static function hasName( $name, $id = '' ){

		$capability = self::where('name','=',$name)->where('id','!=',$id)->take(1)->get();
		
		if(isset($capability[0])):
			return true;
		else:
			return false;
		endif;

	}

	public static function hasController( $controller, $id = '' ){

		$capability = self::where('controller','=',$controller)->where('id','!=',$id)->take(1)->get();
		
		if(isset($capability[0])):
			return true;
		else:
			return false;
		endif;

	}

}