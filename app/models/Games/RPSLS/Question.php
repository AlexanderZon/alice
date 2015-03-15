<?php namespace Games\RPSLS;

class Question extends \Eloquent {

	protected $table = 'rpsls_questions';

	protected $fillable = [];

    use \SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function evaluation(){

    	return $this->morphMany('Evaluation', 'evaluationable');

    }

    public function answers(){

    	return $this->hasMany('Games\\RPSLS\\Answer', 'question_id');

    }

    public static function json(){

    	$questions = array();

		foreach(self::all() as $question):

			$answers = array();
			$figures = array('rock', 'paper', 'scissors', 'lizard', 'spock');
			$tmp = array();

			for($i = 0 ; $i < 5; $i++):

				$rand = rand(0, count($figures)-1);
				$tmp[] = $figures[$rand];

				for ($j=$rand; $j < count($figures) - 1; $j++) $figures[$j] = $figures[$j+1];

				unset($figures[count($figures)-1]);

			endfor;

			$count = 0;

			foreach($question->answers as $answer):

				$answers[] = array(
					'id' => $answer->id,
					'figure' => $tmp[$count],
					'name' => $answer->answer,
					'answer' => $answer->is_correct ? true : false,
					);
				$count++;

			endforeach;

			$questions[] = array(
				'question' => $question->question,
				'options' => $answers,
				'seconds' => $question->seconds,
				);

		endforeach;

		return json_encode($questions);

	}

}