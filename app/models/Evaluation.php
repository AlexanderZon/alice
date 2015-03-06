<?php

class Evaluation extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'evaluations';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function evaluationable(){

    	return $this->morphTo();

    }

    public function tests();{

    	return $this->hasMany('Test', 'evaluation_id');

    }

    public function testers(){

    	return $this->belongsToMany('User', 'tests');

    }

    public function lesson(){

    	return $this->belongsTo('Lesson','lesson_id');
    	
    }

}