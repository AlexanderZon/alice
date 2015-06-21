<?php namespace Games\Roulette;

class Question extends \Eloquent {

	protected $table = 'roulette_questions';

	protected $fillable = [];

    use \SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function evaluation(){

    	return $this->belongsTo('\\Evaluation');

    }

    public function answers(){

    	return $this->hasMany('Games\\Roulette\\Answer', 'question_id');

    }

    public static function json(){

    	$questions = array();

		foreach(self::all() as $question):

			$answers = array();
			$answer = null;
			$figures = array('rock', 'paper', 'scissors', 'lizard', 'spock');
			$tmp = array();

			for($i = 0 ; $i < 5; $i++):

				$rand = rand(0, count($figures)-1);
				$tmp[] = $figures[$rand];

				for ($j=$rand; $j < count($figures) - 1; $j++) $figures[$j] = $figures[$j+1];

				unset($figures[count($figures)-1]);

			endfor;

			$count = 0;

			foreach($question->answers as $ans):

				if($ans->is_correct) $answer = $ans->answer;

				$answers[] = array(
					'id' => $ans->id,
					'figure' => $tmp[$count],
					'name' => $ans->answer,
					'answer' => $ans->is_correct ? true : false,
					);
				$count++;

			endforeach;

			$questions[] = array(
				'question' => $question->question,
				'options' => $answers,
				'answer' => $answer,
				'seconds' => $question->seconds,
				);

		endforeach;

		return json_encode($questions);

	}

}