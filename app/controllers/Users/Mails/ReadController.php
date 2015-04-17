<?php namespace Users\Mails;

use \Input as Input;
use \Response as Response;
use \User as User;
use \Message as Message;
use \GUID as GUID;
use \Image as Image;

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

		self::setArguments();

	}

	public function getIndex(){

		return self::make('test');

	}

	public function postIndex(){

		dd(Input::all());

	}

	public function getInbox(){

		return self::make('inbox');

	}

	public function getCompose(){

		return self::make('compose');

	}

	public function getReply(){

		return self::make('reply');

	}

	public function getSearch(){

		return self::make('search');

	}

	public function getView(){

		return self::make('view');

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

	        $filename = GUID::generate().".".$file->getClientOriginalExtension();

	    	$json['files'][] = array(
				'name' => $filename,
				'size' => $file->getSize(),
				'type' => $file->getMimeType(),
				'url' => public_path().'/uploads/messages/files/'.$filename,
				'deleteType' => 'DELETE',
				'deleteUrl' => self::$route.'/deleteFile/'.$filename,
	    		);

	    	$upload = $file->move( public_path().'/uploads/messages/files', $filename );


		endforeach;

		return Response::json($json);

	}

}