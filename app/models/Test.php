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

}