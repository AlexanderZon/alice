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

        return $this->hasMany('\Games\Hangman\Question');
        
    }

    public function memory(){

        return $this->hasMany('\Games\Memory\Question');
        
    }

    public function roulette(){

        return $this->hasMany('\Games\Roulette\Question');
        
    }

    public function rpsls(){

        return $this->hasMany('\Games\RPSLSL\Question');

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

    public function average(){

        if($this->tests->count() > 0):
            $average = 0;
            foreach( $this->tests as $test):
                $average += ($test->percentage*100);
            endforeach;

            $average = $average/$this->tests->count();

        else:

            $average = 0;

        endif;

        return $average;

    }

}