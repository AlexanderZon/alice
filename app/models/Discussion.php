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

    public function thumbsupers(){

        return $this->belongsToMany('User','discussions_karma')->where('discussions_karma.type','=','thumbsup')->where('discussions_karma.deleted_at','=',null);

    }

    public function banned(){

        return $this->hasMany('DiscussionKarma', 'discussion_id')->where('discussions_karma.type','=','banned');

    }

    public function banneders(){

        return $this->belongsToMany('User','discussions_karma')->where('discussions_karma.type','=','banned')->where('discussions_karma.deleted_at','=',null);

    }

    public function favorites(){

    	return $this->hasMany('DiscussionKarma', 'discussion_id')->where('discussions_karma.type','=','favorite');

    }

    public function hasThumbsup( $user_id ){

        $thumbsups = $this->thumbsups;

        if($thumbsups->count() > 0 ):
            foreach($thumbsups as $thumbsup):
                if($thumbsup->user_id == $user_id) return $thumbsup;
            endforeach;
        endif;

        return false;

    }

    public function iThumbsupIt(){

        if($this->hasThumbsup(Auth::user()->id)) return true;

        return false;

    }

    public function peopleWho( $karmaters ){

        $people = '';
        $my = false;
        $another = false;

        foreach($karmaters as $user):
            if($user->id != Auth::user()->id):
                $people .= $user->display_name . ', ';
                $another = true;
            else:
                $my = true;
            endif;
        endforeach;

        if($my):
            if($another):
                $people = substr($people, 0, -2);
                $people = ' y Yo.';
            else:
                $people = 'Solo Yo.';
            endif;
        else:
            if($another):
                $people = substr($people, 0, -2);
                $people = '.';
            else:
                $people = '';
            endif;
        endif;

        return $people;

    }

    public function peopleThumbsupIt(){

        return $this->peopleWho($this->thumbsupers);

    }

    public function peopleBannedIt(){

        return $this->peopleWho($this->banneders);

    }

    public function hasBanned($user_id){

        $banned = $this->banned;

        if($banned->count() > 0 ):
            foreach($banned as $ban):
                if($ban->user_id == $user_id) return $ban;
            endforeach;
        endif;

        return false;

    }

    public function isBanned(){

        if($this->status == 'banned') return true;
        else return false;

    }

    public function isMarkedAsBanned(){

        if($this->banned->count() > 0) return true;
        else return false;

    }

    public function hasFavorite($user_id){

        $favorites = $this->favorites;

        if($favorites->count() > 0 ):
            foreach($favorites as $favorite):
                if($favorite->user_id == $user_id) return $favorite;
            endforeach;
        endif;

        return false;

    }

    public function isMyFavorite(){

        if($this->hasFavorite(Auth::user()->id) != false) return true;
        else return false;

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

    public function isMine(){

        if($this->user_id == Auth::user()->id) return true;

        else return false;

    }

    public function isFrom( $user_id ){

        if($this->user_id == $user_id) return true;

        else return false;

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