<?php

class Module extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'modules';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    protected static $slug_counter = 0;

    public function course(){

    	return $this->belongsTo('Course','course_id');

    }

    public function lessons(){

    	return $this->hasMany('Lesson', 'module_id')->orderBy('order', 'ASC');

    }

    public static function findPermalinkCounter( $name ){

        $slug = $name.'-'.(++self::$slug_counter);

        if( count(self::where('name', '=', $slug)->get()) > 0 ):

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

    public static function getLastPosition( $course ){

        return $course->modules->count() + 1;

    }

}