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
use \ZipArchive as ZipArchive;
use \File as File;

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

		self::$name = 'users_mails';

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

			$user_messages = $message->user_messages();

			if(count( $user_messages ) > 0):

				foreach($user_messages as $user_message):
					$user_message->status = 'unread';
					$user_message->save();
					$user_message->created_at = $user_message->updated_at;
					$user_message->save();
				endforeach;

			endif;

			$attachments = $message->attachments;

			if(count($attachments) > 0):

				foreach($attachments as $attachment):
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

		self::addArgument('inbox', Auth::user()->inbox()->paginate(25));

		return self::make('inbox');

	}

	public function getDraft(){

		self::addArgument('outbox', Auth::user()->draftbox()->paginate(25));

		return self::make('draftbox');

	}

	public function getOutbox(){

		self::addArgument('outbox', Auth::user()->outbox()->paginate(25));

		return self::make('outbox');

	}

	public function getTrash(){

		self::addArgument('trashbox', Auth::user()->trashbox()->paginate(25));

		return self::make('trashbox');

	}

	public function getPaginate(){

		$box = null;
		$view = Input::get('box');
		$variable = null;

		switch ($view) {
			case 'inbox':
				$variable = 'inbox';
				$box = Auth::user()->inbox()->paginate(25);
				break;
			case 'draftbox':
				$variable = 'outbox';
				$box = Auth::user()->draftbox()->paginate(25);
				break;
			case 'outbox':
				$variable = 'outbox';
				$box = Auth::user()->outbox()->paginate(25);
				break;
			case 'trashbox':
				$variable = 'trashbox';
				$box = Auth::user()->trashbox()->paginate(25);
				break;
			default:
				$variable = 'inbox';
				$box = Auth::user()->inbox()->paginate(25);
				break;
		}

		self::addArgument( $variable, $box);

		return self::make($view);

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

		$old = Message::find(Crypt::decrypt(Input::get('message_id')));

		$message = new Message();
		$message->author_id = Auth::user()->id;
		$message->subject = 'Re: '.$old->subject;
		$message->message = '
                &lt;br&gt;
                &lt;br&gt;
				&lt;blockquote style="font-size:1em" &gt;'.$old->message.'&lt;/blockquote&gt;';
		$message->save();
		$message->to()->sync(array($message->author_id));
		$message->save();

		self::addArgument('message', $message);

		self::addArgument('old', $old);

		self::addArgument('token', Crypt::encrypt($message->id));
		
		self::addArgument('tousers', User::all());

		return self::make('reply');

	}

	public function getForward(){

		self::addArgument('tousers', User::all());

		return self::make('forward');

	}

	public function getSearch(){

		$q = Input::get('q');

		$type = Input::get('type');

		self::addArgument('type', $type);
		self::addArgument('q', $q);

		$matches = array();
		
		$perPage = 5;

		$currentPage = Input::get('page') != null ? Input::get('page') - 1 : 0;

		if($q != ''):

			switch(Input::get('type')){

				case 'inbox':

					$users = User::search($q);

					$quest = Auth::user()->inbox($q);

					if(count($users) > 0):

						$messages = Auth::user()->inbox()->get();

						foreach($messages as $message):

							foreach($users as $user):

								if($message->author_id == $user->id):

									$bool = false;

									foreach($quest as $element):
										if($element->id == $message->id) $bool = true;
									endforeach;

									if(!$bool) $quest[] = $message;

								endif;

							endforeach;

						endforeach;

					endif;

					break;

				case 'outbox':

					$users = User::search($q);

					$quest = Auth::user()->outbox($q);

					if(count($users) > 0):

						$messages = Auth::user()->outbox()->get();

						foreach($messages as $message):

							foreach($message->to as $destinatary):

								foreach($users as $user):

									if($destinatary->id == $user->id):

										$bool = false;

										foreach($quest as $element):
											if($element->id == $message->id) $bool = true;
										endforeach;

										if(!$bool) $quest[] = $message;

									endif;

								endforeach;

							endforeach;

						endforeach;

					endif;

					break;
				case 'draft':

					$users = User::search($q);

					$quest = Auth::user()->draftbox($q);

					if(count($users) > 0):

						$messages = Auth::user()->outbox()->get();

						foreach($messages as $message):

							foreach($message->to as $destinatary):

								foreach($users as $user):

									if($destinatary->id == $user->id):

										$bool = false;

										foreach($quest as $element):
											if($element->id == $message->id) $bool = true;
										endforeach;

										if(!$bool) $quest[] = $message;

									endif;

								endforeach;

							endforeach;

						endforeach;

					endif;

					break;
				case 'trash':

					$users = User::search($q);

					$quest = Auth::user()->trashbox($q);

					if(count($users) > 0):

						$messages = Auth::user()->inbox()->get();

						foreach($messages as $message):

							foreach($users as $user):

								if($message->author_id == $user->id):

									$bool = false;

									foreach($quest as $element):
										if($element->id == $message->id) $bool = true;
									endforeach;

									if(!$bool) $quest[] = $message;

								endif;

							endforeach;

						endforeach;

					endif;

					break;
			}

			foreach($quest as $element):
				$matches[] = $element;
			endforeach;

		endif;

		$pagedData = array_slice($matches, $currentPage * $perPage, $perPage);

		$matches = \Paginator::make($pagedData, count($matches), $perPage);

		self::addArgument('matches', $matches);

		return self::make('search-'.$type);

	}

	public function getView(){

		$message = Message::find(Crypt::decrypt(Input::get('message_id')));
		$user_message = $message->user_message();
		$user_message->status = 'read';
		$user_message->save();

		self::addArgument('message', $message);

		return self::make('view');

	}

	public function getReview(){

		self::addArgument('message', Message::find(Crypt::decrypt(Input::get('message_id'))));

		return self::make('review');

	}

	public function getTousers(){

		$users = User::where('username','LIKE', '%'.Input::get('q').'%')->orWhere('first_name','LIKE', '%'.Input::get('q').'%')->orWhere('last_name','LIKE', '%'.Input::get('q').'%')->orWhere('email','LIKE', '%'.Input::get('q').'%')->orWhere('display_name','LIKE', '%'.Input::get('q').'%')->take(5)->get();

		return Response::json(array('users' => $users));

	}

	public function postDiscard( $id ){

		self::discardMessage($id);

		self::addArgument('inbox', Auth::user()->inbox()->paginate(25));

		return self::make('inbox');

	}

	public function postDraft( $id ){
		
		$message = Message::find(Crypt::decrypt($id));

		$message->subject = Input::get('subject');
		$message->message = Input::get('message');
		$message->save();

		$users = array();

		foreach(Input::get('to') as $to):
			$users[] = Crypt::decrypt($to);
		endforeach;

		$message->to()->sync($users);
		$message->save();

		self::addArgument('outbox', Auth::user()->draftbox()->paginate(25));

		return self::make('draftbox');

	}

	public function postCancel( $id ){

		$attachment = Attachment::find(Crypt::decrypt($id));
		$attachment->delete();

		return true;

	}

	public function getViewall( $id ){

		$message = Message::find(Crypt::decrypt($id));

		$attachments = $message->attachments;

		$images = array();

		if(count($attachments) > 0):
			
			foreach($attachments as $attachment):

				switch ($attachment->mime) {
		    		case 'image/png':
		    		case 'image/gif':
		    		case 'image/jpeg':
						$images[] = array(
							'route' => $attachment->route,
							'name' => $attachment->name
							);
						# code...
						break;
					
					default:
						# code...
						break;
				}		
		
			endforeach;

			 return Response::json(array('images' => $images));

		else:

			return false;

		endif;

	}

	public function getPrint( $id ){

		$message = Message::find(Crypt::decrypt($id));

    	\Debugbar::disable();

		return $message->message;

	}

	public function getViewimage( $id ){

		$attachment = Attachment::find(Crypt::decrypt($id));

		switch ($attachment->mime) {
    		case 'image/png':
    		case 'image/gif':
    		case 'image/jpeg':
    			\Debugbar::disable();
    			self::addArgument('attachment', $attachment);
    			return self::make('viewimage');
				// return '<img src="'.$attachment->route.'"/>';
				# code...
				break;
			
			default:
				\Debugbar::disable();
				return \View::make('security.auth.404');
				# code...
				break;
		}		

	}

	public function getDownloadall( $id ){

		$message = Message::find(Crypt::decrypt($id));

		$attachments = $message->attachments;

		$files = array();

		if(count($attachments) > 0):
			
			foreach($attachments as $attachment):
		
				$files[] = array(
					'route' => public_path().$attachment->route,
					'name' => $attachment->name
					);
		
			endforeach;

			$file = 'attachments-'.GUID::generate().'.zip';

			$destination = '/uploads/messages/compressed/';

			File::cleanDirectory(public_path().$destination);

			$zip_file = $this->createZip( $files, public_path().$destination.$file);

			if($zip_file) return Response::json(array('destination' => $destination.$file));
			else return false;

		else:

			return false;

		endif;

	}

	public function getDownload( $id ){

		$attachment = Attachment::find(Crypt::decrypt($id));

		return Response::json(array('destination' => $attachment->route));

	}

	public function postFavorite(){

		$message = Message::find(Crypt::decrypt(Input::get('message_id')));
		$user_message = $message->user_message();
		if($user_message->favorite == 1) $user_message->favorite = 0;
		else $user_message->favorite = 1;
		$user_message->save();

		return Response::json($user_message);

	}

	public function getMarkasread(){

		foreach (Input::get('messages') as $message_id):
			# code...
			self::markMessage($message_id, 'read');
		endforeach;
		
		return Response::json(Input::get('messages'));

	}

	public function getMarkasnoneread(){

		foreach (Input::get('messages') as $message_id):
			# code...
			self::markMessage($message_id, 'unread');
		endforeach;
		
		return Response::json(Input::get('messages'));

	}

	public function getMarkasspam(){

		foreach (Input::get('messages') as $message_id):
			# code...
			self::markMessage($message_id, 'spam');
		endforeach;
		
		return Response::json(Input::get('messages'));

	}

	public function getMarkasdeleted(){

		foreach (Input::get('messages') as $message_id):
			# code...
			self::markMessage($message_id, 'deleted');
		endforeach;
		
		return Response::json(Input::get('messages'));

	}

	public function getMarkasnonedeleted(){

		foreach (Input::get('messages') as $message_id):
			# code...
			self::markMessage($message_id, 'read');
		endforeach;
		
		return Response::json(Input::get('messages'));

	}

	public function getMarkasdiscard(){

		foreach (Input::get('messages') as $message_id):
			# code...
			self::discardMessage($message_id);

		endforeach;
		
		return Response::json(Input::get('messages'));

	}

	public function getDeletefrombox(){

		foreach (Input::get('messages') as $message_id):
			$message = Message::find(Crypt::decrypt($message_id));
			$message->status = 'deleted';
			$message->save();
		endforeach;
		
		return Response::json(Input::get('messages'));

	}

	public static function markMessage( $id, $status ){

		$message = Message::find(Crypt::decrypt($id));
		$user_message = $message->user_message();
		$user_message->status = $status;
		$user_message->save();

	}

	public static function discardMessage( $id ){

		$message = Message::find(Crypt::decrypt($id));

		$user_messages = $message->user_messages();

		$attachments = $message->attachments;

		foreach($user_messages as $user_message):
			$user_message->delete();
		endforeach;

		foreach ($attachments as $attachment):
			$attachment->delete();
		endforeach;

		$message->delete();

	}

	public function getUpload(){

		return "OK";

	}

	public function postUpload(){

		$files = Input::file('files');

		$json = array(
			'files' => array()
			);

		foreach( $files as $file ):

	        $filename = $file->getClientOriginalName();
	        $path = GUID::generate().".".$file->getClientOriginalExtension();

			$attachment = new Attachment();
			$attachment->attachmentable_id = Crypt::decrypt(Input::get('_id'));
			$attachment->attachmentable_type = 'Message';
			$attachment->name = $file->getClientOriginalName();
			$attachment->mime = $file->getMimeType();
	    	$attachment->route = '/uploads/messages/files/'.$path;
	    	$attachment->size = $file->getSize();
	    	$attachment->save();


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

	private function createZip($files = array(),$destination = '',$overwrite = false) {
	//if the zip file already exists and overwrite is false, return false
		if(file_exists($destination) && !$overwrite) return false;
		//vars
		$valid_files = array();
		//if files were passed in...
		if(is_array($files)):
			//cycle through each file
			foreach($files as $file):
				//make sure the file exists
				if(file_exists($file['route'])):
					$valid_files[] = $file;
				endif;
			endforeach;
		endif;
		//if we have good files...
		if(count($valid_files)):
			//create the archive
			$zip = new ZipArchive();
			if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true):
				return false;
			endif;
			//add the files
			foreach($valid_files as $file):
				$zip->addFile($file['route'],$file['name']);
			endforeach;
			//debug
			//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
			
			//close the zip -- done!
			$zip->close();
			
			//check to make sure the file exists
			return file_exists($destination);

		else:

			return false;

		endif;

	}

}