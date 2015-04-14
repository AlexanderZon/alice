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

    protected $slug_counter = 0;

    public function contributors(){

    	return $this->belongsToMany('User', 'contributors', 'course_id', 'user_id');

    }

    public function author(){

    	return $this->belongsTo('User','author_id');

    }

    public function inscriptions(){

    	return $this->hasMany('Inscription', 'course_id');

    }

    public function postulations(){

    	return $this->hasMany('Inscription', 'course_id')->where('status','=','inactive')->get();

    }

    public function accepted(){

    	return $this->hasMany('Inscription', 'course_id')->where('status','=','active')->get();

    }

    public function denied(){

    	return $this->hasMany('Inscription', 'course_id')->where('status','=','rejected')->get();

    }

    public function postulates(){

    	return $this->belongsToMany('User', 'inscriptions')->where('status','=','inactive')->get();

    }

    public function students(){

    	return $this->belongsToMany('User', 'inscriptions')->where('status','=','active')->get();

    }

    public function rejected(){

    	return $this->belongsToMany('User', 'inscriptions')->where('status','=','rejected')->get();

    }

    public function auditories(){

    	return $this->hasMany('Auditory', 'course_id');

    }

    public function followStudent( $user ){

    	return $this->hasMany('Auditory', 'course_id')->where('user_id','=', $user->id );

    }

    public function modules(){

    	return $this->hasMany('Module', 'course_id');

    }

    public function lessons(){

    	return $this->hasManyThrough('Lesson', 'Module');

    }

    public function discussions(){

    	return $this->morphMany('Discussion','discussionable');

    }

    public function achievements(){

    	return $this->hasMany('CourseAchievement', 'course_id');

    }

    public static function findPermalinkCounter( $name ){

        $slug = $name.'-'.(++$slug_counter);

        if( $course = self::where('name', '=', $slug)->get() ):

            return self::findPermalinkCounter( $name );

        else:

            return $slug;

        endif;

    }

    public static function setPermalink( $title ){

        $name = Str::slug( $title );

        if( $counter = count(self::where('name', '=', $name)->get()) ):

            return self::findPermalinkCounter( $name );

        else:

            return $name;

        endif;

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