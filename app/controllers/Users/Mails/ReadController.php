<?php namespace Users\Mails;

use \Input as Input;
use \Response as Response;
use \GUID as GUID;
use \Image as Image;
use \Auth as Auth;
use \Crypt as Crypt;
use \User as User;
use \Message as Message;
use \UserMessage as UserMessage;
use \Attachment as Attachment;

class ReadController extends \BaseController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::$views = 'users.mails.read';

		self::$route = '/messages';

		self::$name = 'messages';

		self::$title = 'Correo';

		self::$description = 'Módulo de Correos del Sistema';

		self::fixSection('index', 'Correo');

		self::setArguments();

	}

	public function getIndex(){

		return self::make('index');

	}

	public function postIndex(){

		$message = Message::find(Crypt::decrypt(Input::get('token')));
		$message->subject = Input::get('subject');
		$message->message = Input::get('message');

		switch(Input::get('action')){
			case 'send':
				$message->status = 'done';
				break;
			case 'draft':
				$message->status = 'draft';
				break;
			case 'discard':
				$message->status = 'done';
				break;
			default:
				$message->status = 'draft';
				break;
		}

		$message->save();

		if(Input::get('action') == 'send'):

			$to = array();

			if(count(Input::get('to')) > 0):
				foreach(Input::get('to') as $user):
					$to[] = Crypt::decrypt($user);
				endforeach;
			endif;

			$message->to()->sync($to);
			$message->save();

			// $user_messages = UserMessage::where('message_id', '=', $message->id)->get();

			if(count($message->user_messages()) > 0):

				foreach($message->user_messages() as $user_message):
					$user_message->status = 'unread';
					$user_message->save();
					$user_message->created_at = $user_message->updated_at;
					$user_message->save();
				endforeach;

			endif;

			if(count($message->attachments) > 0):

				foreach($message->attachments as $attachment):
					$attachment->status = 'uploaded';
					$attachment->save();
				endforeach;

			endif;

		elseif(Input::get('action') == 'discard'):

			$message->delete();

		endif;
	
		self::setSuccess('users_mails_create', 'Mensaje Enviado', 'El mensaje ' . $message->subject . ' fue enviado exitósamente');

		return self::go( 'index' );

	}

	public function getInbox(){

		self::addArgument('inbox', Auth::user()->inbox()->paginate(50));

		return self::make('inbox');

	}

	public function getDraft(){

		self::addArgument('outbox', Auth::user()->draftbox()->paginate(50));

		return self::make('draftbox');

	}

	public function getOutbox(){

		self::addArgument('outbox', Auth::user()->outbox()->paginate(50));

		return self::make('outbox');

	}

	public function getTrash(){

		self::addArgument('inbox', Auth::user()->trashbox()->paginate(50));

		return self::make('inbox');

	}

	public function getCompose(){

		$message = new Message();
		$message->author_id = Auth::user()->id;
		$message->save();

		self::addArgument('token', Crypt::encrypt($message->id));

		self::addArgument('tousers', User::all());
		
		return self::make('compose');

	}

	public function getRecompose(){

		$message = Message::find(Crypt::decrypt(Input::get('message_id')));

		self::addArgument('token', Crypt::encrypt($message->id));

		self::addArgument('message', $message);

		self::addArgument('tousers', User::all());
		
		return self::make('forward');

	}

	public function getReply(){

		self::addArgument('tousers', User::all());

		return self::make('reply');

	}

	public function getForward(){

		self::addArgument('tousers', User::all());

		return self::make('forward');

	}

	public function getSearch(){

		return self::make('search');

	}

	public function getView(){

		self::addArgument('message', Message::find(Crypt::decrypt(Input::get('message_id'))));

		return self::make('view');

	}

	public function getReview(){

		self::addArgument('message', Message::find(Crypt::decrypt(Input::get('message_id'))));

		return self::make('review');

	}

	public function getUpload(){

		return "OK";

	}

	public function getTousers(){

		$users = User::where('username','LIKE', '%'.Input::get('q').'%')->orWhere('first_name','LIKE', '%'.Input::get('q').'%')->orWhere('last_name','LIKE', '%'.Input::get('q').'%')->orWhere('email','LIKE', '%'.Input::get('q').'%')->orWhere('display_name','LIKE', '%'.Input::get('q').'%')->take(5)->get();

		return Response::json(array('users' => $users));

	}

	public function postUpload(){

		$files = Input::file('files');

		$json = array(
			'files' => array()
			);

		foreach( $files as $file ):

	        $filename = $file->getClientOriginalName();
	        $path = GUID::generate().".".$file->getClientOriginalExtension();

			$attachement = new Attachment();
			$attachement->attachmentable_id = Crypt::decrypt(Input::get('_id'));
			$attachement->attachmentable_type = 'Message';
			$attachement->name = $file->getClientOriginalName();
			$attachement->mime = $file->getMimeType();
	    	$attachement->route = '/uploads/messages/files/'.$path;
	    	$attachement->size = $file->getSize();
	    	$attachement->save();


	    	$json['files'][] = array(
				'name' => $filename,
				'size' => $file->getSize(),
				'type' => $file->getMimeType(),
				'url' => '/uploads/messages/files/'.$path,
				'deleteType' => 'DELETE',
				'deleteUrl' => self::$route.'/deleteFile/'.$path,
	    		);

	    	$upload = $file->move( public_path().'/uploads/messages/files', $path );

		endforeach;

		return Response::json($json);

	}

}