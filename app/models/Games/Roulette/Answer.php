<?php namespace Games\Roulette;

class Answer extends \Eloquent {

	protected $table = 'roulette_answers';

	protected $fillable = [];

    use \SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function question(){

    	return $this->belongsTo('Games\\Roulette\\Question', 'question_id');
    	
    }

}