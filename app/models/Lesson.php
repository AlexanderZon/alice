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

    protected $defaults_avatar_url = '/uploads/discussions/defaults';

    protected $defaults_avatar_colors = [
        'blue',
        'brown',
        'green',
        'orange',
        'pink',
        'purple'
    ];

    public function attachments(){

    	return $this->morphMany('Attachment', 'attachmentable');

    }

    public function discussions(){

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

    public function getAvatar(){

        $character = substr($this->title, 0, 1);

        $color = rand(0, count($this->defaults_avatar_colors)-1);

        return $this->defaults_avatar_url.$this->defaults_avatar_colors[$color];

    }

    public function getSummary( $length = 500 ){

        $text = html_entity_decode(strip_tags( $this->content ));

        if(strlen($text) > $length) return substr($text, 0, $length).'...';

        return $text;

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