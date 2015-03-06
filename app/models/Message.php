<?php

class Message extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'messages';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
	
}