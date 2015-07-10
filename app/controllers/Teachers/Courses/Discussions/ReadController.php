<?php namespace Teachers\Courses\Discussions;

use \Course as Course;
use \Discussion as Discussion;
use \DiscussionKarma as DiscussionKarma;
use \Attachment as Attachment;
use \User as User;
use \Auth as Auth;
use \Input as Input;
use \Response as Response;
use \GUID as GUID;
use \Hash as Hash;
use \Hashids as Hashids;


class ReadController extends \Teachers\Courses\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory'); 

		self::setModule('read');  
		
		self::pushViews('discussions');    

		self::pushRoute('discussions');       

		self::setModule('discussions');

		self::pushName('discussions');

		self::addSection('inactive', 'Inactivos');

		self::$title = 'Discusiones';

		self::$description = 'Gestión de Discusiones de los Cursos';

		self::pushBreadCrumb('Discusiones', self::$route );

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

		self::addArgument('discussions', $course->recentdiscussions);

		return self::make('index');

	}

	public function getAdd( $course_id = '' )
	{
		$course = Course::find(Hashids::decode($course_id));

		self::addArgument('course', $course);

		return self::make('add');

	}

	public function postAdd( $course_id = '' )
	{
		$course = Course::find(Hashids::decode($course_id));

		$name = Discussion::setPermalink(Input::get('title'));
		$directory = Discussion::makeFullDirectory( $course->name, $name );

		$discussion = new Discussion();
		$discussion->discussionable_id = $course->id;
		$discussion->discussionable_type = 'Course';
		$discussion->name = $name;
		$discussion->title = Input::get('title');
		$discussion->content = Input::get('content');
		$discussion->user_id = Auth::user()->id;
		$discussion->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		
		$discussion->save();

		self::addArgument('course', $course);

		self::addArgument('discussions', $course->recentdiscussions);

		return self::make('index');
	}

	public function getEdit( $course_id = '' )
	{
		$course = Course::find(Hashids::decode($course_id));
		$discussion = Discussion::find(Hashids::decode(Input::get('discussion_id')));

		self::addArgument('course', $course);

		self::addArgument('discussion', $discussion);

		return self::make('edit');

	}

	public function postEdit( $course_id = '' )
	{
		$course = Course::find(Hashids::decode($course_id));

		$discussion = Discussion::find(Hashids::decode(Input::get('discussion_id')));
		$discussion->title = Input::get('title');
		$discussion->content = Input::get('content');
		$discussion->status = (Input::get('status') != null) ? Input::get('status') : 'inactive';
		$discussion->save();

		self::addArgument('course', $course);

		self::addArgument('discussions', $course->recentdiscussions);

		return self::make('index');
	}

	public function getDelete( $course_id = '' )
	{
		$course = Course::find(Hashids::decode($course_id));
		$discussion = Discussion::find(Hashids::decode(Input::get('discussion_id')));

		self::addArgument('course', $course);

		self::addArgument('discussion', $discussion);

		return self::make('delete');

	}

	public function postDelete( $course_id = '' )
	{
		$course = Course::find(Hashids::decode($course_id));

		$discussion = Discussion::find(Hashids::decode(Input::get('discussion_id')));
		$discussion->delete();

		self::addArgument('course', $course);

		self::addArgument('discussions', $course->recentdiscussions);

		return self::make('index');
	}
	/**
	 * Display a listing of the resource.
	 * GET /comments
	 *
	 * @return Response
	 */

	public function getComments( $course_id = '' ){

		$discussion = Discussion::find(Hashids::decode(Input::get('discussion_id')));

		self::addArgument('discussion', $discussion);

		self::addArgument('comments', $discussion->children);

		self::addArgument('course', Course::find(Hashids::decode($course_id)));

		return self::make('comments');

	}

	/**
	 * Display a listing of the resource.
	 * POST /comments
	 *
	 * @return Response
	 */

	public function postComments( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));
		$discussion = Discussion::find(Hashids::decode(Input::get('discussion_id')));
		$parent = Hashids::decode(Input::get('parent_id'));

		// return Response::json($parent);

		$comment = new Discussion();
		$comment->user_id = Auth::user()->id;
		$comment->discussionable_id = $parent != 0 ? $parent : $discussion->id;
		$comment->discussionable_type = $parent != 0 ? 'Discussion' : 'Discussion';
		$comment->content = Input::get('comment');
		$comment->status = 'active';
		$comment->save();

		$response = array(
			'id' => Hashids::encode($comment->id),
			'user_id' => Hashids::encode($comment->user_id),
			'content' => $comment->content,
			'created_at' => $comment->created_at,
			'attachment' => null
			);

		$file = Input::file('attachment');

		if($file):

	        $filename = $file->getClientOriginalName();
	        $path = GUID::generate().".".$file->getClientOriginalExtension();

	        $route = '/uploads/courses/'.$course->name.'/discussions/'.$discussion->name.'/';

			$attachment = new Attachment();
			$attachment->attachmentable_type = 'Discussion';
			$attachment->attachmentable_id = $comment->id;
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

	/**
	 * Display a listing of the resource.
	 * PUT /comments
	 *
	 * @return Response
	 */

	public function putComments( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));
		$discussion = Discussion::find(Hashids::decode(Input::get('discussion_id')));
		$parent = Hashids::decode(Input::get('parent_id'));

		$comment = Discussion::find(Hashids::decode(Input::get('comment_id')));
		$comment->content = Input::get('comment');
		$comment->save();

		$response = array(
			'id' => Hashids::encode($comment->id),
			'user_id' => Hashids::encode($comment->user_id),
			'content' => $comment->content,
			'thumbsups' => $comment->thumbsups->count(),
			'hasMyThumbsup' => $comment->iThumbsupIt(),
			'thumbsupers' => $comment->peopleThumbsupIt(),
			'replies' => $comment->children->count(),
			'created_at' => $comment->created_at,
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

	public function deleteComments( $course_id = '' ){

		$comment = Discussion::find(Hashids::decode(Input::get('comment')));
		$comment->delete();

		return Response::json(Input::all());

	}

	/**
	 * Display a listing of the resource.
	 * POST /like
	 *
	 * @return Response
	 */

	public function postLike( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));
		$comment = Discussion::find(Hashids::decode(Input::get('comment')));
		$user = Hashids::decode(Input::get('user'));

		$response = array(
			'thumbsup' => true,
			'thumbsupers' => '',
			);

		if($my_thumbsup = $comment->hasThumbsup($user)):
			$my_thumbsup->delete();
			$response['thumbsup'] = false;
		else:
			$thumbsup = new DiscussionKarma();
			$thumbsup->user_id = $user;
			$thumbsup->discussion_id = $comment->id;
			$thumbsup->type = 'thumbsup';
			$thumbsup->save();
		endif;

		$response['thumbsupers'] = $comment->peopleThumbsupIt();

		return Response::json($response);

	}

	/**
	 * Display a listing of the resource.
	 * POST /banned
	 *
	 * @return Response
	 */

	public function postBanned( $course_id = '' ){

		$course = Course::find(Hashids::decode($course_id));
		$comment = Discussion::find(Hashids::decode(Input::get('comment')));
		$user = Hashids::decode(Input::get('user'));

		$response = array(
			'banned' => true,
			'banneders' => '',
			);

		if($comment->isBanned()):

			$comment->status = 'active';
			$comment->save();

			$response['banned'] = false;

		else:

			$comment->status = 'banned';
			$comment->save();

			$banned = new DiscussionKarma();

			if($my_banned = $comment->hasBanned(Auth::user()->id)) $banned = $my_banned;

			$banned->user_id = $user;
			$banned->discussion_id = $comment->id;
			$banned->type = 'banned';
			$banned->save();

		endif;

		$response['banneders'] = $comment->peopleBannedIt();

		return Response::json($response);

	}

	/**
	 * Display a listing of the resource.
	 * GET /download
	 *
	 * @return Response
	 */

	public function getDownload( $course_id = '' ){

		$attachment = Attachment::find(Crypt::decrypt(Input::get('attachment')));

		return Response::download(public_path().$attachment->route, $attachment->name);

	}

}
