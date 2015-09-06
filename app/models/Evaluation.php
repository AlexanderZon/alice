<?php

class Evaluation extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'evaluations';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public $max_attempts = 2;

    public function evaluationable(){

        return $this->morphTo();

    }

    public function hangman(){

        return $this->hasMany('\Games\Hangman\Question');
        
    }

    public function json($type = 'hangman'){

        $questions = array();

        switch($type):

            case 'hangman':

                foreach($this->hangman as $question):

                    if($question->question != '' AND $question->word != ''):

                        $questions[] = array(
                            'question' => $question->question,
                            'word' => $question->word,
                            'seconds' => $question->seconds,
                            );

                    endif;

                endforeach;

            break;

            case 'memory':

                foreach($this->memory as $question):

                    $questions[] = array(
                        'id' => md5($question->id),
                        'question' => $question->question,
                        'answer' => $question->answer,
                        );

                endforeach;

            break; 

            case 'roulette':

                foreach($this->roulette as $question):

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

            break;   

            case 'rpsls':

                foreach($this->rpsls as $question):

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

            break;           

        endswitch;

        return json_encode($questions);

    }

    public function memory(){

        return $this->hasMany('\Games\Memory\Question');
        
    }

    public function roulette(){

        return $this->hasMany('\Games\Roulette\Question');
        
    }

    public function rpsls(){

        return $this->hasMany('\Games\RPSLS\Question');

    }

    public function tests(){

        return $this->hasMany('Test', 'evaluation_id')->orderBy('percentage','DESC');

    }

    public function testers(){

        return $this->belongsToMany('User', 'tests');

    }

    public function lesson(){

        return $this->belongsTo('Lesson','lesson_id');
        
    }

    public function image(){

        return '/uploads/activities/defaults/'.$this->type.'.png';

    }

    public function average(){

        if($this->tests->count() > 0):
            $average = 0;
            foreach( $this->tests as $test):
                $average += round($test->percentage);
            endforeach;

            $average = $average/$this->tests->count();

        else:

            $average = 0;

        endif;

        return $average;

    }

    public function testsOf( $user ){

        return $this->tests()->where('tests.user_id','=',$user->id)->get();

    }

    public function testOf( $user ){

        return $this->tests()->where('tests.user_id','=',$user->id)->first();

    }

    public function myTest(){

        return $this->testOf(Auth::user());

    }

    public function averageOf( $user ){

        $tests = $this->testsOf($user);
        $points = 0;

        if(count($tests) > 0):
            foreach($tests as $test):
                $points += $test->percentage;
            endforeach;
        else:
            return 0;
        endif;

        return $points/count($tests);

    }

    public function isAvailable(){

        $start_ts = strtotime($this->date_start);
        $end_ts = strtotime($this->date_end);
        $user_ts = strtotime('now');

        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));

    }

    public function isAvailableToTest(){

        if($test = $this->myTest()):

            if($test->attempts >= $this->max_attempts):

                return false;

            else: 

                return true;

            endif;

        else:

            return true;

        endif;

    }

}