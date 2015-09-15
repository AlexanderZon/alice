<?php namespace Students\Courses\Lessons;

use \Course as Course;
use \Module as Module;
use \Lesson as Lesson;
use \Discussion as Discussion;
use \DiscussionKarma as DiscussionKarma;
use \Attachment as Attachment;
use \Note as Note;
use \User as User;
use \UserLesson as UserLesson;
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

class ReadController extends \Students\Courses\ReadController {

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
	public function postIndex( $course_name = '' )
	{

		$course =  Course::getByName($course_name);

		self::addArgument('hashid', Hashids::encode($course->id));

		self::addArgument('course', $course);

		self::addArgument('modules', $course->modules);
		
		self::addArgument('sidebar_closed', true);

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /editlesson
	 *
	 * @return Response
	 */
	public function getViewlesson( $course_name = '' )
	{

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		$course = Course::getByName($course_name);

		if(!$user_lesson = UserLesson::hasViewed($lesson, Auth::user())):
			$user_lesson = new UserLesson();
			$user_lesson->lesson_id = $lesson->id;
			$user_lesson->user_id = Auth::user()->id;
			$user_lesson->status = 'active';
			$user_lesson->save();
		else:
			$user_lesson->status = 'inactive';
			$user_lesson->save();
			$user_lesson->status = 'active';
			$user_lesson->save();
		endif;

		self::addArgument('module', $lesson->module);

		self::addArgument('lesson', $lesson);

		self::addArgument('course', $course);

		return self::make('viewlesson');

	}

	/* ------- COMMENTS -------- */

	/**
	 * Display a listing of the resource.
	 * GET /comments
	 *
	 * @return Response
	 */

	public function getComments( $course_name = '' ){

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));

		self::addArgument('module', $lesson->module);

		self::addArgument('lesson', $lesson);

		self::addArgument('comments', $lesson->discussions);

		self::addArgument('course', Course::getByName($course_name));

		return self::make('comments');

	}

	/**
	 * Display a listing of the resource.
	 * POST /comments
	 *
	 * @return Response
	 */

	public function postComments( $course_name = '' ){


		$course = Course::getByName($course_name);
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
			$response['attachment_crypt'] = Crypt::encrypt($attachment->id);

		endif;

		if($parent == 0):

			\Event::fire('notification.lessons_write_comment', array(Auth::user(), $lesson, $discussion));
			\Event::fire('achievement.comments', array(Auth::user()));

		else:
		
			\Event::fire('notification.lessons_reply_comment', array(Auth::user(), $lesson, $discussion, $discussion->parent));
			\Event::fire('achievement.comments', array(Auth::user()));

		endif;

		return Response::json($response);

	}

	/**
	 * Display a listing of the resource.
	 * PUT /comments
	 *
	 * @return Response
	 */

	public function putComments( $course_name = '' ){

		$course = Course::getByName($course_name);
		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));
		$parent = Hashids::decode(Input::get('parent_id'));

		$discussion = Discussion::find(Hashids::decode(Input::get('comment_id')));
		$discussion->content = Input::get('comment');
		$discussion->save();

		$response = array(
			'id' => Hashids::encode($discussion->id),
			'user_id' => Hashids::encode($discussion->user_id),
			'content' => $discussion->content,
			'thumbsups' => $discussion->thumbsups->count(),
			'hasMyThumbsup' => $discussion->iThumbsupIt(),
			'thumbsupers' => $discussion->peopleThumbsupIt(),
			'replies' => $discussion->children->count(),
			'created_at' => $discussion->created_at,
			'attachment' => null
			);

		return Response::json($response);

	}

	/**
	 * Display a listing of the resource.
	 * DELETE /comments
	 *
	 * @return Response
	 */

	public function deleteComments( $course_name = '' ){

		$discussion = Discussion::find(Hashids::decode(Input::get('comment')));
		$discussion->delete();

		return Response::json(Input::all());

	}

	/**
	 * Display a listing of the resource.
	 * POST /like
	 *
	 * @return Response
	 */

	public function postLike( $course_name = '' ){

		$course = Course::getByName($course_name);
		$discussion = Discussion::find(Hashids::decode(Input::get('comment')));
		$user = Hashids::decode(Input::get('user'));

		$response = array(
			'thumbsup' => true,
			'thumbsupers' => '',
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
			\Event::fire('notification.lessons_like_comment', array(Auth::user(), $discussion));
			\Event::fire('achievement.likes', array($discussion->author));
		endif;

		$response['thumbsupers'] = $discussion->peopleThumbsupIt();

		return Response::json($response);

	}

	/**
	 * Display a listing of the resource.
	 * POST /banned
	 *
	 * @return Response
	 */

	public function postBanned( $course_name = '' ){

		$course = Course::getByName($course_name);
		$discussion = Discussion::find(Hashids::decode(Input::get('comment')));
		$user = Hashids::decode(Input::get('user'));

		$response = array(
			'banned' => true,
			'banneders' => '',
			);

		if($discussion->isBanned()):

			$discussion->status = 'active';
			$discussion->save();

			$response['banned'] = false;

		else:

			$discussion->status = 'banned';
			$discussion->save();

			$banned = new DiscussionKarma();

			if($my_banned = $discussion->hasBanned(Auth::user()->id)) $banned = $my_banned;

			$banned->user_id = $user;
			$banned->discussion_id = $discussion->id;
			$banned->type = 'banned';
			$banned->save();

			\Event::fire('notification.lessons_banned_comment', array(Auth::user(), $discussion));

		endif;

		$response['banneders'] = $discussion->peopleBannedIt();

		return Response::json($response);

	}

	/**
	 * Display a listing of the resource.
	 * GET /download
	 *
	 * @return Response
	 */

	public function getDownload( $course_name = '' ){

		$attachment = Attachment::find(Crypt::decrypt(Input::get('attachment')));

		return Response::download(public_path().$attachment->route, $attachment->name);

	}

	/**
	 * Display a listing of the resource.
	 * POST /notes
	 *
	 * @return Response
	 */

	public function postNotes( $course_name = '' ){


		$course = Course::getByName($course_name);
		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));
		$parent = Hashids::decode(Input::get('parent_id'));

		$note = new Note();
		$note->user_id = Auth::user()->id;
		$note->lesson_id = $lesson->id;
		$note->content = Input::get('comment');
		$note->save();

		$response = array(
			'id' => Hashids::encode($note->id),
			'user_id' => Hashids::encode($note->user_id),
			'content' => $note->content,
			'created_at' => $note->created_at
			);

		return Response::json($response);

	}

	/**
	 * Display a listing of the resource.
	 * PUT /notes
	 *
	 * @return Response
	 */

	public function putNotes( $course_name = '' ){

		$course = Course::getByName($course_name);
		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));
		$parent = Hashids::decode(Input::get('parent_id'));

		$note = Note::find(Hashids::decode(Input::get('comment_id')));
		$note->content = Input::get('comment');
		$note->save();

		$response = array(
			'id' => Hashids::encode($note->id),
			'user_id' => Hashids::encode($note->user_id),
			'content' => $note->content,
			'created_at' => $note->created_at
			);

		return Response::json($response);

	}

	/**
	 * Display a listing of the resource.
	 * DELETE /notes
	 *
	 * @return Response
	 */

	public function deleteNotes( $course_name = '' ){

		$note = Note::find(Hashids::decode(Input::get('note')));
		$note->delete();

		return Response::json(Input::all());

	}

	/**
	 * Display a listing of the resource.
	 * GET /notes
	 *
	 * @return Response
	 */

	public function getNotes( $course_name = '' ){

		$lesson = Lesson::find(Hashids::decode(Input::get('lesson_id')));
		
		$notes = $lesson->myNotes();

		$args = array(
			'lesson' => $lesson,
			'course' => $lesson->module->course,
			'notes' => $notes
			);

		$pdf = new \Thujohn\Pdf\Pdf();
	   	$pdf->load(\View::make('pdf.mynotes')->with($args), 'A4', 'portrait')->show();;

		return Response::json($notes);

	}


}