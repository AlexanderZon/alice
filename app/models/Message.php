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

    public function from(){

    	return $this->belongsTo('User', 'author_id');

    }

    public function to(){

    	return $this->belongsToMany('User', 'user_messages', 'message_id', 'user_id');
    	
    }

    public function attachments(){

        return $this->morphMany('Attachment','attachmentable');
        
    }

    public function user_message( $user = '' ){

        if( $user == '' ) $user = Auth::user();

        $user_message = $this->hasMany('UserMessage', 'message_id')->where('user_messages.user_id','=',$user->id)->take(1)->get();

        if(isset($user_message[0])):

            return $user_message[0];

        else:

            return false;

        endif;

    }

}