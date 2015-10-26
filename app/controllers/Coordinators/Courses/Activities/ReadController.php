<?php namespace Coordinators\Courses\Activities;

use \Course as Course;
use \Evaluation as Evaluation;
use \User as User;
use \Input as Input;
use \Hash as Hash;
use \Hashids as Hashids;
use \Response as Response;
use \Games\Hangman\Question as Hangman;
use \Games\Memory\Question as Memory;
use \Games\Roulette\Question as Roulette;
use \Games\Roulette\Answer as RouletteAnswer;
use \Games\RPSLS\Question as RPSLS;
use \Games\RPSLS\Answer as RPSLSAnswer;


class ReadController extends \Coordinators\Courses\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');   

		self::setModule('read');
		
		self::pushViews('activities');    

		self::pushRoute('activities');       

		self::setModule('activities');

		self::pushName('activities');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Lecciones';

		self::$description = 'Gestión de Lecciones de los Cursos';

		self::pushBreadCrumb('Lecciones', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function postIndex( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('evaluations', $course->evaluations);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /add
	 *
	 * @return Response
	 */
	public function getAdd( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		return self::make('add');

	}

	/**
	 * Display a listing of the resource.
	 * POST /add
	 *
	 * @return Response
	 */
	public function postAdd( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));

		$type = Input::get('type');

		$evaluation = new Evaluation();
		$evaluation->evaluationable_id = $course->id;
		$evaluation->evaluationable_type = 'Course';
		$evaluation->type = $type;
		$evaluation->date_start = date('Y-m-d', strtotime('now'));
		$evaluation->date_end = date('Y-m-d', strtotime('now'));
		$evaluation->save();

		self::addArgument('evaluation', $evaluation);

		self::addArgument('course', $course);

		return self::make('edit_'.$type);

	}

	/**
	 * Display a listing of the resource.
	 * GET /edit
	 *
	 * @return Response
	 */
	public function getEdit( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));

		$evaluation = Evaluation::find(Hashids::decode(Input::get('activity_id')));

		self::addArgument('evaluation', $evaluation);

		self::addArgument('course', $course);

		return self::make('edit_'.$evaluation->type);

	}

	/**
	 * Display a listing of the resource.
	 * POST /editactivity
	 *
	 * @return Response
	 */
	public function postEdit( $course_id = '' ){

		$evaluation = Evaluation::find(Hashids::decode(Input::get('activity_id')));

		$evaluation->title = Input::get('title');
		$evaluation->description = Input::get('description');
		$evaluation->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		$evaluation->date_start = date('Y-m-d', strtotime(str_replace('/','-',strstr(Input::get('daterange'),' - ', true))));
		$evaluation->date_end = date('Y-m-d', strtotime(str_replace('/','-',str_replace(' - ','',strstr(Input::get('daterange'),' - ', false)))));
		$evaluation->save();

		return Response::json(array('evaluation' => $evaluation));

	}

	/**
	 * Display a listing of the resource.
	 * POST /question
	 *
	 * @return Response
	 */
	public function postQuestion( $course_id = '' ){

		$evaluation = Evaluation::find(Hashids::decode(Input::get('activity_id')));

		$question = null;

		switch($evaluation->type):
			case 'hangman':
				$question = new Hangman();
				$question->question = 'Pregunta #'.($evaluation->hangman->count()+1);
				$question->word = '';
				$question->seconds = 30;
				$question->evaluation_id = $evaluation->id;
				$question->reference = '';
				$question->save();
				$question->hashids = Hashids::encode($question->id);
				$evaluation->hashids = Hashids::encode($evaluation->id);
				break;
			case 'memory':
				$question = new Memory();
				$question->question = 'Pregunta #'.($evaluation->memory->count()+1);
				$question->answer = '';
				$question->evaluation_id = $evaluation->id;
				$question->reference = '';
				$question->save();
				$question->hashids = Hashids::encode($question->id);
				$evaluation->hashids = Hashids::encode($evaluation->id);
				break;
			case 'rpsls':
				$question = new RPSLS();
				$question->question = 'Pregunta #'.($evaluation->rpsls->count()+1);
				$question->evaluation_id = $evaluation->id;
				$question->reference = '';
				$question->save();
				$tmp = array(
					'id' => $question->id,
					'hashids' => Hashids::encode($question->id),
					'question' => $question->question,
					'reference' => $question->reference,
					'correct' => '',
					'incorrect' => array(),
					);
				for( $i = 0 ; $i < 5 ; $i++):
					$answer = new RPSLSAnswer();
					$answer->question_id = $question->id;
					$answer->answer = '';
					$answer->is_correct = $i == 0 ? true : false;
					$answer->save();
					if($i == 0):
						$tmp['correct'] = $answer->answer;
					else:
						$tmp['incorrect'][] = $answer->answer;
					endif;
				endfor;
				$question = $tmp;
				$evaluation->hashids = Hashids::encode($evaluation->id);
				break;
			case 'roulette':
				$question = new Roulette();
				$question->question = 'Pregunta #'.($evaluation->roulette->count()+1);
				$question->evaluation_id = $evaluation->id;
				$question->reference = '';
				$question->save();
				$tmp = array(
					'id' => $question->id,
					'hashids' => Hashids::encode($question->id),
					'question' => $question->question,
					'reference' => $question->reference,
					'correct' => '',
					'incorrect' => array(),
					);
				for( $i = 0 ; $i < 4 ; $i++):
					$answer = new RouletteAnswer();
					$answer->question_id = $question->id;
					$answer->answer = '';
					$answer->is_correct = $i == 0 ? true : false;
					$answer->save();
					if($i == 0):
						$tmp['correct'] = $answer->answer;
					else:
						$tmp['incorrect'][] = $answer->answer;
					endif;
				endfor;
				$question = $tmp;
				$evaluation->hashids = Hashids::encode($evaluation->id);
				break;
		endswitch;

		$args = array(
			'question' => $question,
			'evaluation' => $evaluation,
			);

		return Response::json($args);

	}

	/**
	 * Display a listing of the resource.
	 * PUT /question
	 *
	 * @return Response
	 */
	public function putQuestion( $course_id = '' ){

		$evaluation = Evaluation::find(Hashids::decode(Input::get('evaluation_id')));

		$question = null;

		switch($evaluation->type):
			case 'hangman':
				$question = Hangman::find(Hashids::decode(Input::get('id')));
				$question->question = Input::get('question');
				$question->word = Input::get('word');
				$question->seconds = Input::get('seconds');
				$question->reference = Input::get('reference');
				$question->save();
				$question->hashids = Hashids::encode($question->id);
				$evaluation->hashids = Hashids::encode($evaluation->id);
				break;
			case 'memory':
				$question = Memory::find(Hashids::decode(Input::get('id')));
				$question->question = Input::get('question');
				$question->answer = Input::get('answer');
				$question->evaluation_id = $evaluation->id;
				$question->reference = Input::get('reference');
				$question->save();
				$question->hashids = Hashids::encode($question->id);
				$evaluation->hashids = Hashids::encode($evaluation->id);
				break;
			case 'rpsls':
				$question = RPSLS::find(Hashids::decode(Input::get('id')));
				$question->question = Input::get('question');
				$question->evaluation_id = $evaluation->id;
				$question->reference = Input::get('reference');
				$question->save();
				$tmp = array(
					'id' => $question->id,
					'hashids' => Hashids::encode($question->id),
					'question' => $question->question,
					'correct' => '',
					'incorrect' => array(),
					);
				$incorrect = Input::get('incorrect');
				$correct = Input::get('correct');
				$counter = 0;
				foreach($question->answers as $answer):
					if($counter == 0):
						$answer->answer = $correct;
					else:
						$answer->answer = $incorrect[$counter-1];
					endif;
					$answer->save();
					if($counter == 0):
						$tmp['correct'] = $answer->answer;
					else:
						$tmp['incorrect'][] = $answer->answer;
					endif;
					$counter++;
				endforeach;
				$question = $tmp;
				$evaluation->hashids = Hashids::encode($evaluation->id);
				break;
			case 'roulette':
				$question = Roulette::find(Hashids::decode(Input::get('id')));
				$question->question = Input::get('question');
				$question->evaluation_id = $evaluation->id;
				$question->reference = Input::get('reference');
				$question->save();
				$tmp = array(
					'id' => $question->id,
					'hashids' => Hashids::encode($question->id),
					'question' => $question->question,
					'correct' => '',
					'incorrect' => array(),
					);
				$incorrect = Input::get('incorrect');
				$correct = Input::get('correct');
				$counter = 0;
				foreach($question->answers as $answer):
					if($counter == 0):
						$answer->answer = $correct;
					else:
						$answer->answer = $incorrect[$counter-1];
					endif;
					$answer->save();
					if($counter == 0):
						$tmp['correct'] = $answer->answer;
					else:
						$tmp['incorrect'][] = $answer->answer;
					endif;
					$counter++;
				endforeach;
				$question = $tmp;
				$evaluation->hashids = Hashids::encode($evaluation->id);
				break;
		endswitch;

		$args = array(
			'question' => $question,
			'evaluation' => $evaluation,
			);

		return Response::json($args);

	}

	/**
	 * Display a listing of the resource.
	 * DELETE /question
	 *
	 * @return Response
	 */
	public function deleteQuestion( $course_id = '' ){

		$evaluation = Evaluation::find(Hashids::decode(Input::get('evaluation_id')));

		$question = null;

		switch($evaluation->type):
			case 'hangman':
				$question = Hangman::find(Hashids::decode(Input::get('id')));
				$question->delete();
				break;
			case 'memory':
				$question = Memory::find(Hashids::decode(Input::get('id')));
				$question->delete();
				break;
			case 'rpsls':
				$question = RPSLS::find(Hashids::decode(Input::get('id')));
				$question->delete();
				break;
			case 'roulette':
				$question = Roulette::find(Hashids::decode(Input::get('id')));
				$question->delete();
				break;
		endswitch;

		$args = array(
			'hashids' => Hashids::encode($question->id),
			);

		return Response::json($args);

	}

}
