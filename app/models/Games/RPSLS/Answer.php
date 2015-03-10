<?php namespace Games\RPSLS;

class Answer extends \Eloquent {

	protected $table = 'rpsls_answers';

	protected $fillable = [];

    use \SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function question(){

    	return $this->belongsTo('Games\\RPSLS\\Question', 'question_id');
    	
    }

}