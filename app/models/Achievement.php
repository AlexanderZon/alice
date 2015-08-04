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

   	public static $defaults = array(
   		'/uploads/achievements/defaults/icon_1.png',
   		'/uploads/achievements/defaults/icon_2.png',
   		'/uploads/achievements/defaults/icon_3.png',
   		'/uploads/achievements/defaults/icon_4.png',
   		'/uploads/achievements/defaults/icon_5.png',
   		'/uploads/achievements/defaults/icon_6.png',
   		'/uploads/achievements/defaults/icon_7.png',
   		'/uploads/achievements/defaults/icon_8.png',
   		'/uploads/achievements/defaults/icon_9.png',
   		'/uploads/achievements/defaults/icon_10.png',
   		'/uploads/achievements/defaults/icon_11.png',
   		'/uploads/achievements/defaults/icon_12.png',
   		'/uploads/achievements/defaults/icon_13.png',
   		'/uploads/achievements/defaults/icon_14.png',
   		'/uploads/achievements/defaults/iconos_1.png',
   		'/uploads/achievements/defaults/iconos_2.png',
   		'/uploads/achievements/defaults/iconos_3.png',
   		'/uploads/achievements/defaults/iconos_4.png',
   		'/uploads/achievements/defaults/iconos_5.png',
   		'/uploads/achievements/defaults/iconos_6.png',
   		'/uploads/achievements/defaults/iconos_7.png',
   		'/uploads/achievements/defaults/iconos_8.png',
   		'/uploads/achievements/defaults/iconos_9.png',
   		'/uploads/achievements/defaults/iconos_10.png',
   		'/uploads/achievements/defaults/iconos_11.png',
   		'/uploads/achievements/defaults/iconos_12.png',
   		'/uploads/achievements/defaults/iconos_13.png',
   		'/uploads/achievements/defaults/iconos_14.png',
   		'/uploads/achievements/defaults/iconos_15.png',
   		'/uploads/achievements/defaults/iconos_16.png',
   		'/uploads/achievements/defaults/iconos_17.png',
   		'/uploads/achievements/defaults/iconos_18.png',
   		'/uploads/achievements/defaults/iconos_19.png',
   		'/uploads/achievements/defaults/iconos_20.png',
   		'/uploads/achievements/defaults/iconos_21.png',
   		'/uploads/achievements/defaults/iconos_22.png',
   		'/uploads/achievements/defaults/iconos_23.png',
   		'/uploads/achievements/defaults/iconos_24.png',
   		'/uploads/achievements/defaults/iconos_25.png',
   		'/uploads/achievements/defaults/iconos_26.png',
   		);

    public function users(){

    	return $this->belongsToMany('User', 'user_achievements', 'id_user', 'id_achievement');

    }

}