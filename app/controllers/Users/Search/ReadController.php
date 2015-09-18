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
			'courses' => $this->coursesEngine( $quest ),
			'lessons' => $this->lessonsEngine( $quest ),
			'students' => $this->usersEngine( $quest , $students_role),
			'teachers' => $this->usersEngine( $quest, $teachers_role),
			);

		dd($results);

		self::addArgument('results', $results);

		return self::make('index');

	}

	# USER SEARCH ENGINE

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
			$ids[] = $result->id;
		endforeach;

		//Ordenando arreglos por peso
		array_multisort($weights, SORT_DESC, $ids );

		$list = $this->arrayMergin($top_results, $ids);


		$ins = $this->modelToText($list, ',');

		if($ins == '') $ins = '0';

		$results = User::whereNested(function($query) use($pieces, $regexp, $ins){

			$query->whereRaw('id in ('.$ins.') ');

		})
			// ->select(array('id','display_name','first_name','last_name','username','email'))
		  	->orderByRaw(\DB::raw("FIELD(id, ".$ins.")"))->get();

		/*foreach( $results as $result ):
			foreach($fields as $field):
				$result->$field = str_replace(trim($quest), '<span style="background-color:#FFFF00">'.trim($quest).'</span>', $result->$field);
				$result->$field = str_replace(mb_strtoupper(trim($quest), 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_strtoupper($quest, 'UTF-8')).'</span>', $result->$field);
				$result->$field = str_replace(mb_strtolower(trim($quest), 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_strtolower($quest, 'UTF-8')).'</span>', $result->$field);
				$result->$field = str_replace(mb_convert_case(trim($quest), MB_CASE_TITLE, 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_convert_case($quest, MB_CASE_TITLE, 'UTF-8')).'</span>', $result->$field);
				foreach( $pieces as $piece ):
					$result->$field	= str_replace($piece, ' <span style="background-color:#FFFF00">'.trim($piece).'</span> ', $result->$field);
					$result->$field	= str_replace(mb_strtoupper($piece,'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_strtoupper($piece,'UTF-8')).'</span> ', $result->$field);
					$result->$field	= str_replace(mb_strtolower($piece,'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_strtolower($piece,'UTF-8')).'</span> ', $result->$field);
					$result->$field	= str_replace(mb_convert_case($piece, MB_CASE_TITLE, 'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_convert_case($piece, MB_CASE_TITLE, 'UTF-8')).'</span> ', $result->$field);
				endforeach;
			endforeach;
		endforeach;*/

		return $results;

	}

	# COURSES SEARCH ENGINE

	public function coursesTitle( $quest ){

		$results = Course::where('status','=','active')->whereNested(function($query) use($quest){

			$query->where('title', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function coursesName( $quest ){

		$results = Course::where('status','=','active')->whereNested(function($query) use($quest){

			$query->where('name', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function coursesDescription( $quest ){

		$results = Course::where('status','=','active')->whereNested(function($query) use($quest){

			$query->where('description', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function coursesEngine($quest){

		$title_results = $this->coursesTitle($quest);
		$name_results = $this->coursesName($quest);
		$description_results = $this->coursesDescription($quest);

		$top_results = $this->arrayMergin($title_results, $name_results);
		$top_results = $this->arrayMergin($top_results, $description_results);

		$pieces = strtolower(trim($quest));

		$pieces = $this->explodePieces($pieces);

		//Contruyendo Expresion regular a partir de las palabras de la busqueda
		$regexp = $this->arrayToText($pieces, '|');

		//Campo al cual se le hara la busqueda
		$fields = array(
			'title',
			'name',
			'description',
			);

		//Busqueda de coincidencias en el Modelo por expresion regular
		$results = Course::where('status','=','active');

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
			$ids[] = $result->id;
		endforeach;

		//Ordenando arreglos por peso
		array_multisort($weights, SORT_DESC, $ids );

		$list = $this->arrayMergin($top_results, $ids);


		$ins = $this->modelToText($list, ',');

		if($ins == '') $ins = '0';

		$results = Course::whereNested(function($query) use($pieces, $regexp, $ins){

			$query->whereRaw('id in ('.$ins.') ');

		})
			// ->select(array('id','title','name','description'))
			->orderByRaw(\DB::raw("FIELD(id, ".$ins.")"))->get();

		/*foreach( $results as $result ):
			foreach($fields as $field):
				if($field == 'description'):
					$result->summary = html_entity_decode(strip_tags( $result->description ));
					$result->summary = str_replace(trim($quest), '<span style="background-color:#FFFF00">'.trim($quest).'</span>', $result->summary);
					$result->summary = str_replace(mb_strtoupper(trim($quest), 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_strtoupper($quest, 'UTF-8')).'</span>', $result->summary);
					$result->summary = str_replace(mb_strtolower(trim($quest), 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_strtolower($quest, 'UTF-8')).'</span>', $result->summary);
					$result->summary = str_replace(mb_convert_case(trim($quest), MB_CASE_TITLE, 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_convert_case($quest, MB_CASE_TITLE, 'UTF-8')).'</span>', $result->summary);
					$result->description = null;
				else:
					$result->$field = str_replace(trim($quest), '<span style="background-color:#FFFF00">'.trim($quest).'</span>', $result->$field);
					$result->$field = str_replace(mb_strtoupper(trim($quest), 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_strtoupper($quest, 'UTF-8')).'</span>', $result->$field);
					$result->$field = str_replace(mb_strtolower(trim($quest), 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_strtolower($quest, 'UTF-8')).'</span>', $result->$field);
					$result->$field = str_replace(mb_convert_case(trim($quest), MB_CASE_TITLE, 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_convert_case($quest, MB_CASE_TITLE, 'UTF-8')).'</span>', $result->$field);
				endif;
				foreach( $pieces as $piece ):
					$result->$field	= str_replace($piece, ' <span style="background-color:#FFFF00">'.trim($piece).'</span> ', $result->$field);
					$result->$field	= str_replace(mb_strtoupper($piece,'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_strtoupper($piece,'UTF-8')).'</span> ', $result->$field);
					$result->$field	= str_replace(mb_strtolower($piece,'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_strtolower($piece,'UTF-8')).'</span> ', $result->$field);
					$result->$field	= str_replace(mb_convert_case($piece, MB_CASE_TITLE, 'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_convert_case($piece, MB_CASE_TITLE, 'UTF-8')).'</span> ', $result->$field);
				endforeach;
			endforeach;
		endforeach;*/

		return $results;

	}

	public function lessonsTitle( $quest ){

		$results = Lesson::whereNested(function($query) use($quest){

			$query->where('title', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function lessonsName( $quest ){

		$results = Lesson::whereNested(function($query) use($quest){

			$query->where('name', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function lessonsContent( $quest ){

		$results = Lesson::whereNested(function($query) use($quest){

			$query->where('content', 'LIKE', '%'.$quest.'%');

		})->select(array( 'id' ))
		  ->get();

		return $results;

	}

	public function lessonsEngine($quest){

		$title_results = $this->lessonsTitle($quest);
		$name_results = $this->lessonsName($quest);
		$content_results = $this->lessonsContent($quest);

		$top_results = $this->arrayMergin($title_results, $name_results);
		$top_results = $this->arrayMergin($top_results, $content_results);

		$pieces = strtolower(trim($quest));

		$pieces = $this->explodePieces($pieces);

		//Contruyendo Expresion regular a partir de las palabras de la busqueda
		$regexp = $this->arrayToText($pieces, '|');

		//Campo al cual se le hara la busqueda
		$fields = array(
			'title',
			'name',
			'content',
			);

		//Busqueda de coincidencias en el Modelo por expresion regular
		$results = Lesson::where('status','=','active');

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
			$ids[] = $result->id;
		endforeach;

		//Ordenando arreglos por peso
		array_multisort($weights, SORT_DESC, $ids );

		$list = $this->arrayMergin($top_results, $ids);


		$ins = $this->modelToText($list, ',');

		if($ins == '') $ins = '0';

		$results = Lesson::whereNested(function($query) use($pieces, $regexp, $ins){

			$query->whereRaw('id in ('.$ins.') ');

		})
			// ->select(array('id','title','name','content'))
			->orderByRaw(\DB::raw("FIELD(id, ".$ins.")"))->get();

		/*foreach( $results as $result ):
			foreach($fields as $field):
				if($field == 'content'):
					$result->summary = html_entity_decode(strip_tags( $result->content ));
					$result->summary = str_replace(trim($quest), '<span style="background-color:#FFFF00">'.trim($quest).'</span>', $result->summary);
					$result->summary = str_replace(mb_strtoupper(trim($quest), 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_strtoupper($quest, 'UTF-8')).'</span>', $result->summary);
					$result->summary = str_replace(mb_strtolower(trim($quest), 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_strtolower($quest, 'UTF-8')).'</span>', $result->summary);
					$result->summary = str_replace(mb_convert_case(trim($quest), MB_CASE_TITLE, 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_convert_case($quest, MB_CASE_TITLE, 'UTF-8')).'</span>', $result->summary);
					$result->content = null;
				else:
					$result->$field = str_replace(trim($quest), '<span style="background-color:#FFFF00">'.trim($quest).'</span>', $result->$field);
					$result->$field = str_replace(mb_strtoupper(trim($quest), 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_strtoupper($quest, 'UTF-8')).'</span>', $result->$field);
					$result->$field = str_replace(mb_strtolower(trim($quest), 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_strtolower($quest, 'UTF-8')).'</span>', $result->$field);
					$result->$field = str_replace(mb_convert_case(trim($quest), MB_CASE_TITLE, 'UTF-8'), '<span style="background-color:#FFFF00">'.trim(mb_convert_case($quest, MB_CASE_TITLE, 'UTF-8')).'</span>', $result->$field);
				endif;
				foreach( $pieces as $piece ):
					$result->$field	= str_replace($piece, ' <span style="background-color:#FFFF00">'.trim($piece).'</span> ', $result->$field);
					$result->$field	= str_replace(mb_strtoupper($piece,'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_strtoupper($piece,'UTF-8')).'</span> ', $result->$field);
					$result->$field	= str_replace(mb_strtolower($piece,'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_strtolower($piece,'UTF-8')).'</span> ', $result->$field);
					$result->$field	= str_replace(mb_convert_case($piece, MB_CASE_TITLE, 'UTF-8'), ' <span style="background-color:#FFFF00">'.trim(mb_convert_case($piece, MB_CASE_TITLE, 'UTF-8')).'</span> ', $result->$field);
				endforeach;
			endforeach;
		endforeach;*/

		return $results;

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

	public function modelToText($array, $separator){

		$text = '';
		$position = 0;

		//Contruyendo expresion regular a partir de los ids ordenados para hacer busqueda ordenada
		foreach ($array as $element) :
			# code...
			if($position++ > 0) $text .= $separator;
			$text .= $element->id;
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