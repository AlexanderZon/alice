<?php

class Capability extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'capabilities';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

}