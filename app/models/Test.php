<?php

class Test extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tests';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function author(){

    	return $this->belongsTo('User', 'user_id');

    }

    public function evaluation(){

    	return $this->belonsTo('Evaluation','evaluation_id');

    }

    public function lesson(){

    	return $this->evaluation->lesson;

    }

    public function isApproved(){

    	return $this->percentage >= $this->lesson->approval_percentage ? true : false;
    	
    }

    public function percentage(){

        return round($this->percentage).'%';

    }

    public function duration(){

        $time = $this->duration;
        $cicles = 0;
        $sufix = null;

        while(($time/60 >= 1) AND $cicles <= 2):
            $cicles++;
            $time = $time/60 >= 1;
        endwhile;

        switch($cicles):
            case 0: 
                $sufix = ' seg';
                break;
            case 1:
                $sufix = ' min';
                break;
            default:
                $sufix = ' hrs';
                break;
        endswitch;

        return round($time).$sufix;

    }

}