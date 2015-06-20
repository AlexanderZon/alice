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

    public function hangman(){

        return $this->hamsMany('\Games\Hangman\Question');
        
    }

    public function memory(){

        return $this->hamsMany('\Games\Memory\Question');
        
    }

    public function roulette(){

        return $this->hamsMany('\Games\Roulette\Question');
        
    }

    public function rpsls(){

        return $this->hamsMany('\Games\RPSLSL\Question');

    }

    public function tests(){

    	return $this->hasMany('Test', 'evaluation_id');

    }

    public function testers(){

    	return $this->belongsToMany('User', 'tests');

    }

    public function lesson(){

    	return $this->belongsTo('Lesson','lesson_id');
    	
    }

}