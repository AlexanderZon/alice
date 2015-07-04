<?php namespace Teachers\Courses\Lessons;

use \Course as Course;
use \Module as Module;
use \Lesson as Lesson;
use \Discussion as Discussion;
use \DiscussionKarma as DiscussionKarma;
use \Attachment as Attachment;
use \User as User;
use \Input as Input;
use \Response as Response;
use \Hashids as Hashids;
use \Auth as Auth;
use \Crypt as Crypt;
use \GUID as GUID;
use \Evaluation as Evaluation;
use \Games\Hangman\Question as Hangman;
use \Games\Memory\Question as Memory;
use \Games\Roulette\Question as Roulette;
use \Games\Roulette\Answer as RouletteAnswer;
use \Games\RPSLS\Question as RPSLS;
use \Games\RPSLS\Answer as RPSLSAnswer;

class ReadController extends \Teachers\Courses\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');   

		self::setModule('read');
		
		self::pushViews('lessons');    

		self::pushRoute('lessons');       

		self::setModule('lessons');

		self::pushName('lessons');

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

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /addmodule
	 *
	 * @return Response
	 */
	public function getAddmodule( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		return self::make('addmodule');

	}

	/**
	 * Display a listing of the resource.
	 * POST /addmodule
	 *
	 * @return Response
	 */
	public function postAddmodule( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		$module = new Module();
		$module->course_id = $course->id;
		$module->title = Input::get('title');
		$module->name = Module::setPermalink(Input::get('title'));
		$module->date_start = date('Y-m-d', strtotime(str_replace('/','-',strstr(Input::get('daterange'),' - ', true))));
		$module->date_end = date('Y-m-d', strtotime(str_replace('/','-',str_replace(' - ','',strstr(Input::get('daterange'),' - ', false)))));
		$module->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		$module->order = Module::getLastPosition($course);
		$module->save();

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /editmodule
	 *
	 * @return Response
	 */
	public function getEditmodule( $course_id = '' )
	{

		$module = Module::find(Hashids::decode(Input::get('module_id')));

		self::addArgument('course', $module->course);

		self::addArgument('module', $module);

		return self::make('editmodule');

	}

	/**
	 * Display a listing of the resource.
	 * POST /editmodule
	 *
	 * @return Response
	 */
	public function postEditmodule( $course_id = '' )
	{

		$module = Module::find(Crypt::decrypt(Input::get('module_id')));
		$module->title = Input::get('title');
		$module->name = Module::setPermalink(Input::get('title'));
		$module->date_start = date('Y-m-d', strtotime(str_replace('/','-',strstr(Input::get('daterange'),' - ', true))));
		$module->date_end = date('Y-m-d', strtotime(str_replace('/','-',str_replace(' - ','',strstr(Input::get('daterange'),' - ', false)))));
		$module->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		$module->save();

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /deletemodule
	 *
	 * @return Response
	 */
	public function getDeletemodule( $course_id = '' )
	{

		$module = Module::find(Hashids::decode(Input::get('module_id')));

		self::addArgument('course', $module->course);

		self::addArgument('module', $module);

		return self::make('deletemodule');

	}

	/**
	 * Display a listing of the resource.
	 * POST /deletemodule
	 *
	 * @return Response
	 */
	public function postDeletemodule( $course_id = '' )
	{

		$module = Module::find(Crypt::decrypt(Input::get('module_id')));
		$module->delete();

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /ordermodule
	 *
	 * @return Response
	 */
	public function getOrdermodules( $course_id = '' )
	{

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		return self::make('ordermodules');

	}

	/**
	 * Display a listing of the resource.
	 * POST /ordermodule
	 *
	 * @return Response
	 */
	public function postOrdermodules( $course_id = '' )
	{

		$position = 0;

		foreach( Input::get('order') as $order ):
			$module = Module::find(Hashids::decode($order['id']));
			$module->order = $position;
			$module->save();
			$position++;
		endforeach;

		return Response::json(Input::get('order'));

	}

	/**
	 * Display a listing of the resource.
	 * GET /addlesson
	 *
	 * @return Response
	 */
	public function getAddlesson( $course_id = '' )
	{

		$module = Module::find(Hashids::decode(Input::get('module_id')));

		self::addArgument('module', $module);

		self::addArgument('course', $module->course);

		return self::make('addlesson');

	}

	/**
	 * Display a listing of the resource.
	 * POST /addlesson
	 *
	 * @return Response
	 */
	public function postAddlesson( $course_id = '' )
	{

		$module = Module::find(Hashids::decode(Input::get('module_id')));

		$lesson = new Lesson();
		$lesson->module_id = $module->id;
		$lesson->previous_id = Input::get('previous_id') != null ? Input::get('previous_id') : 0;
		$lesson->title = Input::get('title');
		$lesson->name = Lesson::setPermalink(Input::get('title'));
		$lesson->approval_percentage = (Input::get('approval_percentage')/100);
		$lesson->content = Input::get('content');
		// $lesson->date_start = date('Y-m-d', strtotime(str_replace('/','-',strstr(Input::get('daterange'),' - ', true))));
		// $lesson->date_end = date('Y-m-d', strtotime(str_replace('/','-',str_replace(' - ','',strstr(Input::get('daterange'),' - ', false)))));
		$lesson->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		$lesson->order = Lesson::getLastPosition($module);
		$lesson->save();

		$directory = $lesson->makeFullDirectory();

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /editlesson
	 *
	 * @return Response
	 */
	public function getEditlesson( $course_id = '' )
	{

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		self::addArgument('module', $lesson->module);

		self::addArgument('lesson', $lesson);

		self::addArgument('course', Course::find(Hashids::decode($course_id)));

		return self::make('editlesson');

	}

	/**
	 * Display a listing of the resource.
	 * POST /editlesson
	 *
	 * @return Response
	 */
	public function postEditlesson( $course_id = '' )
	{

		$lesson = Lesson::find(Crypt::decrypt(Input::get('lesson_id')));
		$lesson->previous_id = Input::get('previous_id') != null ? Input::get('previous_id') : 0;
		$lesson->title = Input::get('title');
		$lesson->approval_percentage = (Input::get('approval_percentage')/100);
		$lesson->content = Input::get('content');
		// $lesson->date_start = date('Y-m-d', strtotime(str_replace('/','-',strstr(Input::get('daterange'),' - ', true))));
		// $lesson->date_end = date('Y-m-d', strtotime(str_replace('/','-',str_replace(' - ','',strstr(Input::get('daterange'),' - ', false)))));
		$lesson->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		$lesson->save();

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /deletelesson
	 *
	 * @return Response
	 */
	public function getDeletelesson( $course_id = '' )
	{

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		self::addArgument('course', Course::find(Hashids::decode( $course_id )));

		self::addArgument('lesson', $lesson);

		return self::make('deletelesson');

	}

	/**
	 * Display a listing of the resource.
	 * POST /deletelesson
	 *
	 * @return Response
	 */
	public function postDeletelesson( $course_id = '' )
	{

		$lesson = Lesson::find(Crypt::decrypt(Input::get('lesson_id')));
		$lesson->delete();

		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /orderlesson
	 *
	 * @return Response
	 */
	public function getOrderlessons( $course_id = '' )
	{

		$module = Module::find(Hashids::decode(Input::get('module_id')));

		self::addArgument('module', $module);

		self::addArgument('course', $module->course);

		return self::make('orderlessons');

	}

	/**
	 * Display a listing of the resource.
	 * POST /orderlesson
	 *
	 * @return Response
	 */
	public function postOrderlessons( $course_id = '' )
	{

		$position = 0;

		foreach( Input::get('order') as $order ):
			$lesson = Lesson::find(Hashids::decode($order['id']));
			$lesson->order = $position;
			$lesson->save();
			$position++;
		endforeach;

		return Response::json(Input::get('order'));

	}

	public function postStatuslesson( $course_id = '' ){

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));
		$lesson->status = $lesson->status == 'active' ? 'inactive' : 'active';
		$lesson->save();

		return Response::json(array('status' => $lesson->status));

	}

	/* ------------ ATTACHMENTS ----------- */

	/**
	 * Display a listing of the resource.
	 * GET /attachments
	 *
	 * @return Response
	 */
	public function getAttachments( $course_id = '' )
	{

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		self::addArgument('module', $lesson->module);

		self::addArgument('lesson', $lesson);

		self::addArgument('course', Course::find(Hashids::decode($course_id)));

		return self::make('attachments');

	}

	/**
	 * Display a listing of the resource.
	 * GET /uploadattachments
	 *
	 * @return Response
	 */
	public function getUploadattachments( $course_id = '' )
	{

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		$json = array(
			'files' => array()
			);


		if($lesson->attachments->count() > 0):

			foreach( $lesson->attachments as $file ):

		    	$json['files'][] = array(
	    			'_id' => Hashids::encode($file->id),
					'name' => $file->name,
					'size' => $file->size,
					'type' => $file->mime,
					'url' => $file->route,
					'thumbnailUrl' => $file->image(),
					'deleteType' => 'DELETE',
					'deleteUrl' => self::$route.'/attachment/'.Hashids::encode($file->id),
		    		);

			endforeach;

		endif;

		return Response::json($json);

	}

	/**
	 * Display a listing of the resource.
	 * POST /uploadattachments
	 *
	 * @return Response
	 */
	public function postUploadattachments( $course_id = '' )
	{

		$files = Input::file('files');

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		$course = $lesson->module->course;

		$json = array(
			'files' => array()
			);

		foreach( $files as $file ):

	        $filename = $file->getClientOriginalName();
	        $path = GUID::generate().".".$file->getClientOriginalExtension();

	        $route = '/uploads/courses/'.$course->name.'/lessons/'.$lesson->name.'/attachments/';

			$attachment = new Attachment();
			$attachment->attachmentable_id = $lesson->id;
			$attachment->attachmentable_type = 'Lesson';
			$attachment->name = $file->getClientOriginalName();
			$attachment->mime = $file->getMimeType();
	    	$attachment->route = $route.$path;
	    	$attachment->size = $file->getSize();
	    	$attachment->save();

	    	$json['files'][] = array(
	    		'_id' => Hashids::encode($attachment->id),
				'name' => $filename,
				'size' => $file->getSize(),
				'type' => $file->getMimeType(),
				'thumbnailUrl' => $attachment->image(),
				'url' => $route.$path,
				'deleteType' => 'DELETE',
				'deleteUrl' => self::$route.'/attachment/'.Hashids::encode($attachment->id),
	    		);

	    	$upload = $file->move( public_path().$route, $path );

		endforeach;

		return Response::json($json);

	}


	/**
	 * Display a listing of the resource.
	 * DELETE /attachments
	 *
	 * @return Response
	 */
	public function deleteAttachment( $course_id = '', $file = '' ){

		$attachment = Attachment::find(Hashids::decode($file));
		$attachment->delete();

		return Response::json(Input::all());

	}

	/* ------- ACTIVITIES -------- */

	/**
	 * Display a listing of the resource.
	 * GET /activities
	 *
	 * @return Response
	 */
	public function getActivities( $course_id = '' ){

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		self::addArgument('module', $lesson->module);

		self::addArgument('lesson', $lesson);

		self::addArgument('course', Course::find(Hashids::decode($course_id)));

		return self::make('activities');

	}

	/**
	 * Display a listing of the resource.
	 * GET /addactivity
	 *
	 * @return Response
	 */
	public function getAddactivity( $course_id = '' ){

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		self::addArgument('module', $lesson->module);

		self::addArgument('lesson', $lesson);

		self::addArgument('course', Course::find(Hashids::decode($course_id)));

		return self::make('addactivity');

	}

	/**
	 * Display a listing of the resource.
	 * GET /addactivity
	 *
	 * @return Response
	 */
	public function postAddactivity( $course_id = '' ){

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		$module = $lesson->module;

		$type = Input::get('type');

		$evaluation = new Evaluation();
		$evaluation->lesson_id = $lesson->id;
		$evaluation->type = $type;
		$evaluation->date_start = date('Y-m-d', strtotime($module->date_start));
		$evaluation->date_end = date('Y-m-d', strtotime($module->date_end));
		$evaluation->save();

		self::addArgument('evaluation', $evaluation);

		self::addArgument('module', $lesson->module);

		self::addArgument('lesson', $lesson);

		self::addArgument('course', Course::find(Hashids::decode($course_id)));

		return self::make('editactivity_'.$type);

	}

	/**
	 * Display a listing of the resource.
	 * GET /editactivity
	 *
	 * @return Response
	 */
	public function getEditactivity( $course_id = '' ){

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		$evaluation = Evaluation::find(Hashids::decode(Input::get('activity_id')));

		self::addArgument('evaluation', $evaluation);

		self::addArgument('module', $lesson->module);

		self::addArgument('lesson', $lesson);

		self::addArgument('course', Course::find(Hashids::decode($course_id)));

		return self::make('editactivity_'.$evaluation->type);

	}

	/**
	 * Display a listing of the resource.
	 * POST /editactivity
	 *
	 * @return Response
	 */
	public function postEditactivity( $course_id = '' ){

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

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
				$question->seconds = 0;
				$question->evaluation_id = $evaluation->id;
				$question->save();
				$question->hashids = Hashids::encode($question->id);
				$evaluation->hashids = Hashids::encode($evaluation->id);
				break;
			case 'memory':
				$question = new Memory();
				$question->question = 'Pregunta #'.($evaluation->memory->count()+1);
				$question->answer = '';
				$question->evaluation_id = $evaluation->id;
				$question->save();
				$question->hashids = Hashids::encode($question->id);
				$evaluation->hashids = Hashids::encode($evaluation->id);
				break;
			case 'rpsls':
				$question = new RPSLS();
				$question->question = 'Pregunta #'.($evaluation->rpsls->count()+1);
				$question->evaluation_id = $evaluation->id;
				$question->save();
				$tmp = array(
					'id' => $question->id,
					'hashids' => Hashids::encode($question->id),
					'question' => $question->question,
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
				$question->save();
				$tmp = array(
					'id' => $question->id,
					'hashids' => Hashids::encode($question->id),
					'question' => $question->question,
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
				$question->save();
				$question->hashids = Hashids::encode($question->id);
				$evaluation->hashids = Hashids::encode($evaluation->id);
				break;
			case 'memory':
				$question = Memory::find(Hashids::decode(Input::get('id')));
				$question->question = Input::get('question');
				$question->answer = Input::get('answer');
				$question->evaluation_id = $evaluation->id;
				$question->save();
				$question->hashids = Hashids::encode($question->id);
				$evaluation->hashids = Hashids::encode($evaluation->id);
				break;
			case 'rpsls':
				$question = RPSLS::find(Hashids::decode(Input::get('id')));
				$question->question = Input::get('question');
				$question->evaluation_id = $evaluation->id;
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

	public function getComments( $course_id = '' ){

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		self::addArgument('module', $lesson->module);

		self::addArgument('lesson', $lesson);

		self::addArgument('comments', $lesson->discussions);

		self::addArgument('course', Course::find(Hashids::decode($course_id)));

		return self::make('comments');

	}

	public function postComments( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));
		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));
		$parent = Hashids::decode(Input::get('parent_id'));

		$discussion = new Discussion();
		$discussion->user_id = Auth::user()->id;
		$discussion->discussionable_id = $parent != 0 ? $parent : $lesson->id;
		$discussion->discussionable_type = $parent != 0 ? 'Discussion' : 'Lesson';
		$discussion->content = Input::get('comment');
		$discussion->status = 'active';
		$discussion->save();

		$response = array(
			'id' => Hashids::encode($discussion->id),
			'user_id' => Hashids::encode($discussion->user_id),
			'content' => $discussion->content,
			'created_at' => $discussion->created_at,
			'attachment' => null
			);

		$file = Input::file('attachment');

		if($file):

	        $filename = $file->getClientOriginalName();
	        $path = GUID::generate().".".$file->getClientOriginalExtension();

	        $route = '/uploads/courses/'.$course->name.'/lessons/'.$lesson->name.'/discussion/';

			$attachment = new Attachment();
			$attachment->attachmentable_type = 'Discussion';
			$attachment->attachmentable_id = $discussion->id;
			$attachment->name = $file->getClientOriginalName();
			$attachment->mime = $file->getMimeType();
	    	$attachment->route = $route.$path;
	    	$attachment->size = $file->getSize();
	    	$attachment->save();

	    	$upload = $file->move( public_path().$route, $path );

			$response['attachment'] = $attachment->getSize();

		endif;

		return Response::json($response);

	}

	public function putComments( $course_id = '' ){

		return Response::json(Input::all());

	}

	public function deleteComments( $course_id = '' ){

		return Response::json(Input::all());

	}

	public function postLike( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));
		$discussion = Discussion::find(Hashids::decode(Input::get('comment')));
		$user = Hashids::decode(Input::get('user'));

		$response = array(
			'thumbsup' => true,
			);

		if($my_thumbsup = $discussion->hasThumbsup($user)):
			$my_thumbsup->delete();
			$response['thumbsup'] = false;
		else:
			$thumbsup = new DiscussionKarma();
			$thumbsup->user_id = $user;
			$thumbsup->discussion_id = $discussion->id;
			$thumbsup->type = 'thumbsup';
			$thumbsup->save();
		endif;

		return Response::json($response);

	}

}
