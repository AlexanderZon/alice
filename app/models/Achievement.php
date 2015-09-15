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

   	public static $numbers = array(
      5,    # bronze
      10,   # bronze
      25,   # bronze
      50,   # silver
      100,  # silver
      200,  # gold
      500,  # gold
      1000, # diamond
   		);

    public static $percentages = array(
      70,   # bronze
      75,   # bronze
      80,   # bronze
      85,   # bronze
      90,   # silver
      92,   # silver
      94,   # silver
      95,   # silver
      96,   # gold
      97,   # gold
      98,   # gold
      99,   # diamond
      100,  # diamond
      );

    public function users(){

    	return $this->belongsToMany('User', 'user_achievements', 'id_user', 'id_achievement');

    }

    public static function numberBreakingPoint($value){

      $tmp = null; 

      foreach(self::$numbers as $number):
        if($value >= $number) $tmp = $number;
      endforeach;

      return $tmp;

    }

    public static function percentageBreakingPoint($value){

      $tmp = null; 

      foreach(self::$percentages as $percentage):
        if($value >= $percentage) $tmp = $percentage;
      endforeach;

      return $tmp;

    }

    public static function getAchievement($type, $value){

      return self::where('name','=',$type)->where('value','=',$value)->first();

    }

}