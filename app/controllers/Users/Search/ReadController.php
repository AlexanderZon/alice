<?php namespace Users\Search;

use \Course as Course;
use \Lesson as Lesson;
use \User as User;
use \Role as Role;
use \Input as Input;
use \Response as Response;

class ReadController extends \BaseController {
	
	public $deleted_words = array(
		'a',
		'e',
		'y',
		'de',
		'del',
		'la',
		'las',
		'el',
		'lo',
		'los',
		'que',
		'para',
		'con',
		'un',
		'una',
		 );

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::$views = 'users.search.read';

		self::$route = '/search';

		self::$name = 'users_profile';

		self::$title = 'Búsqueda';

		self::$description = 'Módulo de Búsqueda del Sistema';

		self::fixSection('index', 'Búsqueda');

		self::setArguments();

	}

	public function getIndex(){

		$teachers_role = Role::getByName('teacher');
		$students_role = Role::getByName('student');

		$quest = Input::get('q');

		$results = array(
			/*'courses' => $this->courses( $quest ),
			'lessons' => $this->lessons( $quest ),
			'students' => $this->users( $quest , $students_role),*/
			'teachers' => $this->usersEngine( $quest, $teachers_role),
			);

		return Response::json($results);

		self::addArgument('results', $results);

		return self::make('index');

	}

	public function courses( $quest ){

		$results = Course::whereNested(function($query) use($quest){

			$query->where('title', 'LIKE', '%'.$quest.'%');
			$query->where('name', 'LIKE', '%'.$quest.'%');
			$query->where('description', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function lessons( $quest ){

		$results = Lesson::whereNested(function($query) use($quest){

			$query->where('title', 'LIKE', '%'.$quest.'%');
			$query->where('name', 'LIKE', '%'.$quest.'%');
			$query->where('content', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function usersDisplayName( $quest, $role ){

		$results = User::where('role_id','=',$role->id)->where('status','=','active')->whereNested(function($query) use($quest){

			$query->where('display_name', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function usersLastName( $quest, $role ){

		$results = User::where('role_id','=',$role->id)->where('status','=','active')->whereNested(function($query) use($quest){

			$query->where('last_name', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function usersFirstName( $quest, $role ){

		$results = User::where('role_id','=',$role->id)->where('status','=','active')->whereNested(function($query) use($quest){

			$query->where('first_name', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function usersUsername( $quest, $role ){

		$results = User::where('role_id','=',$role->id)->where('status','=','active')->whereNested(function($query) use($quest){

			$query->where('username', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function usersEmail( $quest, $role ){

		$results = User::where('role_id','=',$role->id)->where('status','=','active')->whereNested(function($query) use($quest){

			$query->where('email', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function usersEngine($quest, $role){

		$display_name_results = $this->usersDisplayName($quest, $role);
		$last_name_results = $this->usersLastName($quest, $role);
		$first_name_results = $this->usersFirstName($quest, $role);
		$username_results = $this->usersUsername($quest, $role);
		$email_results = $this->usersEmail($quest, $role);

		$top_results = $this->arrayMergin($display_name_results, $last_name_results);
		$top_results = $this->arrayMergin($top_results, $first_name_results);
		$top_results = $this->arrayMergin($top_results, $username_results);
		$top_results = $this->arrayMergin($top_results, $email_results);

		$pieces = strtolower(trim($quest));

		$pieces = $this->explodePieces($pieces);

		//Contruyendo Expresion regular a partir de las palabras de la busqueda
		$regexp = $this->arrayToText($pieces, '|');

		//Campo al cual se le hara la busqueda
		$fields = array(
			'display_name',
			'first_name',
			'last_name',
			'username',
			'email',
			);

		//Busqueda de coincidencias en el Modelo por expresion regular
		$results = User::where('role_id','=',$role->id)->where('status','=','active');

		foreach($fields as $field):
			$results = $results->whereNested(function($query) use($field, $regexp){

				$query->whereRaw($field.' REGEXP "('.$regexp.')"');

			});
		endforeach;
		
		$results = $results->select(array('id'))
			->get();

		//Inicializacion de pesos e ids
		$weights = array();
		$ids = array();

		//Llenando estructura de pesos
		foreach( $results as $result ):
			$coincidences = 0;
			foreach($fields as $field):
				$coincidences += count($this->multiexplode($pieces, $result->$field));
			endforeach;
			$weights[] = $coincidences;
			$ids[] = $result->$primary_key;
		endforeach;

		//Ordenando arreglos por peso
		array_multisort($weights, SORT_DESC, $ids );

		$list = $this->arrayMergin($top_results, $ids);

		$ins = $this->arrayToText($list, ',');

		if($ins == '') $ins = '0';

		return array(
			'pieces' => $pieces,
			'regexp' => $regexp,
			'ins' => $ins
			);

		//Busqueda de registros ordenados por pesos
		/*$results = ORGAssociates::whereNested(function($query) use($pieces, $regexp, $ins, $primary_key){

			$query->whereRaw($primary_key.' in ('.$ins.') ');

		})->select(array('id_asociado','nombre_completo','email', 'telefone_res','ddi_res','sexo','classificados_conteudo','classificados_imagem'))
		  ->orderByRaw(\DB::raw("FIELD(".$primary_key.", ".$ins.")"))->paginate(2);

		foreach( $results as $result ):
			$result->nombre_completo = str_replace($quest, ' <span style="background-color:#FFFF00">'.trim($quest).'</span> ', $result->nombre_completo);
			$result->email = str_replace($quest, ' <span style="background-color:#FFFF00">'.trim($quest).'</span> ', $result->email);
			$result->classificados_conteudo = str_replace($quest, ' <span style="background-color:#FFFF00">'.trim($quest).'</span> ', $result->classificados_conteudo);
			$result->classificados_conteudo = str_replace(mb_strtoupper($quest, 'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_strtoupper($quest, 'UTF-8')).'</span> ', $result->classificados_conteudo);
			$result->classificados_conteudo = str_replace(mb_strtolower($quest, 'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_strtolower($quest, 'UTF-8')).'</span> ', $result->classificados_conteudo);
			$result->classificados_conteudo= str_replace(mb_convert_case($quest, MB_CASE_TITLE, 'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_convert_case($quest, MB_CASE_TITLE, 'UTF-8')).'</span> ', $result->classificados_conteudo);
			foreach( $pieces as $piece ):
				$result->classificados_conteudo= str_replace($piece, ' <span style="background-color:#FFFF00">'.trim($piece).'</span> ', $result->classificados_conteudo);
				$result->classificados_conteudo= str_replace(mb_strtoupper($piece,'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_strtoupper($piece,'UTF-8')).'</span> ', $result->classificados_conteudo);
				$result->classificados_conteudo= str_replace(mb_strtolower($piece,'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_strtolower($piece,'UTF-8')).'</span> ', $result->classificados_conteudo);
				$result->classificados_conteudo= str_replace(mb_convert_case($piece, MB_CASE_TITLE, 'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_convert_case($piece, MB_CASE_TITLE, 'UTF-8')).'</span> ', $result->classificados_conteudo);
				//var_dump($result->classificados_conteudo);
				//var_dump('<br>');
				//var_dump($piece);
				//var_dump('<br>');
				//var_dump(strtoupper($piece));
				//var_dump('<br>');
				//var_dump(mb_strtoupper($piece,'UTF-8'));
				//var_dump('<br>');
				//var_dump(utf8_encode($piece));
				//var_dump('<br>');
				//var_dump(utf8_decode($piece));
				//var_dump('<br>');
				//var_dump('<br>');
			endforeach;
		endforeach;

		//Parametros para la vista
		$args = array(
			'results' => $results,
			'weights' => $weights,
			'list' => $list
			);

		//Construccion de vista con parametros ordenados
		return $results;*/

	}

	//Funcion para busqueda de coincidencias de un array en un string
	function multiexplode ($delimiters,$string) {
    
	    $ready = str_replace($delimiters, '############', $string);
	    $launch = explode('############', $ready);
	    return  $launch;

	}

	public function arrayToText($array, $separator){

		$text = '';
		$position = 0;

		//Contruyendo expresion regular a partir de los ids ordenados para hacer busqueda ordenada
		foreach ($array as $element) :
			# code...
			if($position++ > 0) $text .= $separator;
			$text .= $element;
		endforeach;

		return $text;

	}

	public function modelToArray($results, $pk){

		$array = array();

		foreach($results as $result):
			$array[] = $result->$pk;
		endforeach;

		return $array;

	}

	public function arrayMergin($array1, $array2){

		for($i = 0 ; $i < count($array2) ; $i++):
			$bool = false;
			for($j = 0 ; $j < count($array1) ; $j++):
				if($array2[$i] == $array1[$j]):
					$bool = true;
				endif;
			endfor;
			if(!$bool):
				$array1[] = $array2[$i];
			endif;
		endfor;

		return $array1;

	}

	public function explodePieces( $pieces ){

		$pieces = explode(" ",$pieces);	

		$deleted_positions = array();

		//Registrar posiciones de palabras a eliminar
		for ($position = 0; $position < count($pieces); $position++) :
			# code...
			if(in_array($pieces[$position], $this->deleted_words)):
				$deleted_positions[] = $position;
			else:
				$pieces[$position] = ' '.$pieces[$position].' ';
			endif;

		endfor;

		//Eliminacion de palabras en el listado anterior
		foreach ($deleted_positions as $position) :
			# code...
			unset($pieces[$position]);
		endforeach;

		return $pieces;

	}

}