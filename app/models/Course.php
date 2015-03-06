<?php

class Course extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'courses';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

}