<?php namespace Games\RPSLS;

class Question extends \Eloquent {

	protected $table = 'rpsls_questions';

	protected $fillable = [];

    use \SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function evaluation(){

    	return $this->morphMany('Evaluation', 'evaluationable');

    }

    public function answers(){

    	return $this->hasMany('Games\\RPSLS\\Answer', 'question_id');

    }

}