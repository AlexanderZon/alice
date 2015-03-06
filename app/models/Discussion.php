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

    public function karma(){

    	return $this->hasMany('DiscussionKarma', 'discussion_id');

    }

    public function author(){

    	return $this->belongsTo('User', 'user_id');

    }

    public function users(){

    	return $this->belongsToMany('User','discussions_karma');

    }

    public function children(){

    	return $this->morphMany('Discussions', 'discussionable');

    }

}