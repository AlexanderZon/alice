<?php namespace Games\Hangman;

class Question extends \Eloquent {

	protected $table = 'hangman_questions';

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
				'question' => $question->question,
				'word' => $question->word,
				'seconds' => $question->seconds,
				);

		endforeach;

		return json_encode($questions);

	}
}