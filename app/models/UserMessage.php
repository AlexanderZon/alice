<?php

class UserMessage extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_messages';

	protected $fillable = [];

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

}