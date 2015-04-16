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

    public function students(){

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

    	return $this->hasMany('Note','lesson_id')->where('user_id','=',$user->id)->get();

    }

    public function tests(){

    	return $this->hasManyThrough('Test','Evaluation')->orderBy('percentage','DESC')->get();

    }

    public function approvedTests(){

    	return $this->hasManyThrough('Test','Evaluation')->where('percentage','>=',$this->approval_percentage)->orderBy('percentage','DESC')->get();

    }

    public function myTests( $user ){

    	return $this->hasManyThrough('Test','Evaluation')->where('user_id','=',$user->id)->get();

    }

    public function haveApproved( $user ){

    	foreach($this->myTests($user) as $test) if($test->isApproved()) return true;

    	return false;

    }

    public function studentsApproved(){

    	$students = new User();

    	foreach($this->approvedTests() as $test) $students = $students->orWhere('id','=',$test->user->id);

    	return $students->get();

    }

    public static function _get( $status = 'active' ){

        return self::where( 'status', '=', $status )->get();

    }

    public static function actives(){

        return self::_get('active');

    }

    public static function inactives(){

        return self::_get('inactive');

    }


}