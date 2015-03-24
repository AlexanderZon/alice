<?php

class Auditory extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'auditories';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function capability(){

    	return $this->belongsTo('Capability', 'capability_id');
    	
    }

}