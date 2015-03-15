<?php namespace Games\Memory;

class Question extends \Eloquent {

	protected $table = 'memory_questions';

	protected $fillable = [];

    use \SoftDeletingTrait;

    protected $dates = ['deleted_at'];

}