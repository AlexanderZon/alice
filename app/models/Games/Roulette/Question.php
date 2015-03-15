<?php namespace Games\Roulette;

class Question extends \Eloquent {

	protected $table = 'roulette_questions';

	protected $fillable = [];

    use \SoftDeletingTrait;

    protected $dates = ['deleted_at'];

}