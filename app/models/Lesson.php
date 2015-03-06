<?php

class Lesson extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lessons';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function attachments(){

    	return $this->morphMany('Attachment', 'attachmentable');

    }

    public function discussionable(){

    	return $this->morphMany('Discussion', 'discussionable');

    }

    public function module(){

    	return $this->belongsTo('Module', 'module_id');

    }

    public function course(){

    	return $this->hasManyThrough('Course', 'Module');

    }

    public function evaluations(){

    	return $this->hasMany('Evaluation', 'evaluation_id');

    }

    public function users(){

    	return $this->belongsToMany('User','user_lessons')->orderBy('created_at','ASC')->get();

    }

    public function recentViewed(){

    	return $this->belongsToMany('User','user_lessons')->orderBy('updated_at','DESC')->get();

    }

    public function links(){

    	return $this->hasMany('Link','lesson_id');

    }

    public function notes(){

    	return $this->hasMany('Note','lesson_id');

    }

    public function myNotes( $user ){

    	return $this->hasMany('Note','lesson_id')->where('user_id','=',$user->id);

    }

    public function tests(){

    	return $this->hasManyThrough('Test','Evaluation');

    }

    public function myTests( $user ){

    	return $this->hasManyThrough('Test','Evaluation')->where('user_id','=',$user->id);

    }


}