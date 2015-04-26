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

    public function user_messages(){

        return UserMessage::where('message_id', '=', $this->id)->get();

        return $this->hasMany('UserMessage', 'message_id');

    }

    public function make_diff( $from_datetime ){

        $from_datetime = date_create($from_datetime);
        $today_datetime = date_create(date('Y-m-d H:m:i'));
        $interval = date_diff($from_datetime, $today_datetime);
        return (int) $interval->format('%r%a');

    }

    public function created_diff(){

        return $this->make_diff($this->created_at);

    }

    public function updated_diff(){

        return $this->make_diff($this->updated_at);

    }

    public function deleted_diff(){

        return $this->deleted_at != null ? $this->make_diff($this->deleted_at) : 0;

    }

    public function hasTo( $user ){

        $bool = false;

        if(count($this->to) > 0):
            foreach($this->to as $to):
                if($to->user_id == $user->id) $bool = true;
            endforeach;
        endif;

        return $bool;

    }

}