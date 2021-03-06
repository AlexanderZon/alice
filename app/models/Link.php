<?php

class Link extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'links';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function lesson(){

    	return $this->belongsTo('Lesson', 'lesson_id');

    }

}