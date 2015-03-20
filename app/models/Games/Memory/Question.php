<?php namespace Games\Memory;

class Question extends \Eloquent {

	protected $table = 'memory_questions';

	protected $fillable = [];

    use \SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function evaluation(){

    	return $this->morphMany('Evaluation', 'evaluationable');

    }

    public static function json(){

    	$questions = array();

		foreach(self::all() as $question):

			$questions[] = array(
				'id' => md5($question->id),
				'question' => $question->question,
				'answer' => $question->answer,
				);

		endforeach;

		return json_encode($questions);

	}

}