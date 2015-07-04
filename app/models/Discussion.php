<?php

class Discussion extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'discussions';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function discussionable(){

    	return $this->morphTo();

    }

    public function attachments(){

    	return $this->morphMany('Attachment','attachmentable');
    	
    }

    public function thumbsups(){

    	return $this->hasMany('DiscussionKarma', 'discussion_id')->where('discussions_karma.type','=','thumbsup');

    }

    public function karmater(){

    	return $this->belongsToMany('User','discussions_karma');

    }

    public function author(){

        return $this->belongsTo('User', 'user_id');

    }

    public function children(){

    	return $this->morphMany('Discussion', 'discussionable');

    }

    public static function _get( $type = 'Course', $status = 'active' ){

        $discussions = self::where( 'discussionable_type', '=', $type );

        if( $status != 'all' ) $discussions = $discussions->where( 'status', '=', $status );
        
        return $discussions->get();

    }

    public static function fromCourses( $status = 'active' ){

        return self::_get('Course', $status);

    }

    public static function allFromCourses(){

        return self::fromCourses('all');

    }

    public static function activesFromCourses(){

        return self::fromCourses('active');

    }

    public static function inactivesFromCourses(){

        return self::fromCourses('inactive');

    }

    public static function fromLessons( $status = 'active' ){

        return self::_get('Lesson', $status);

    }

    public static function allFromLessons(){

        return self::fromLessons('all');

    }

    public static function activesFromLessons(){

        return self::fromLessons('active');

    }

    public static function inactivesFromLessons(){

        return self::fromLessons('inactive');

    }

}