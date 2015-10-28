<?php namespace Coordinators\Courses;

use \Course as Course;
use \User as User;
use \Input as Input;
use \Hash as Hash;
use \Hashids as Hashids;


class ReadController extends \Coordinators\ReadController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::pushViews('courses');    

		self::pushRoute('courses');       

		self::setModule('courses');

		self::pushName('courses_read');

		self::addSection('inactive', 'Inactivos');

		self::addSection('show', 'Informacion del Curso');

		self::$title = 'Cursos';

		self::$description = 'Gestión de Cursos del Sistema';

		self::pushBreadCrumb('Cursos', self::$route );

		# --- Put here your global args for this Controller --- #

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		self::addArgument('courses', Course::actives());

		return self::make('index');

	}

	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function getInactive()
	{

		self::addArgument('courses', Course::inactives());

		return self::make('inactive');

	}

	/**
	 * Show the form for updateing the specified resource.
	 * GET /courses/show/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{

		self::addArgument('course', Course::find(Hashids::decode($id)));

		return self::make('show');

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /courses/create
	 *
	 * @return Response
	 */
	public function getCreate()
	{

		self::addArgument('teachers', User::getTeachers());

		return self::make('create');

	}

	/**
	 * Show the form for creating a new resource.
	 * POST /courses/create
	 *
	 * @return Response
	 */
	public function postCreate()
	{

		if( Input::get('title') == '' ):

			self::setWarning('coordinators_courses_title_err', 'Error al agregar curso', 'por favor ingrese un Título, no puede dejar este campo vacío.');

			return self::go( 'create' );

		elseif( Input::get('author_id') == null ):

			self::setWarning('coordinators_courses_author_id_err', 'Error al agregar curso', 'Debe seleccionar un profesor encargado del Curso.');

			return self::go( 'create' );

		else:

			$name = Course::setPermalink(Input::get('title'));

			$directory = Course::makeFullDirectory( $name );

			$course = new Course();
			$course->author_id = Input::get('author_id');
			$course->title = Input::get('title');
			$course->name = $name;
			$course->description = Input::get('description');
			$course->status = 'inactive';
			$course->main_picture = Input::file('main_picture') != null ? Course::uploadMainPicture( Input::file('main_picture'), $name ) : '';
			$course->cover_picture = Input::file('cover_picture') != null ? Course::uploadCoverPicture( Input::file('cover_picture'), $name ) : '';
			$course->thumbnail_picture = Input::file('thumbnail_picture') != null ? Course::uploadThumbnailPicture( Input::file('thumbnail_picture'), $name ) : '';

			$teacher = User::find(Input::get('author_id'));

			
			if( $course->save() ):
	
				\Event::fire('notification.course_assigned', array($teacher, $course));
				self::setSuccess('coordinators_courses_create', 'Curso Agregado', 'El curso ' . $course->title . ' fue agregado exitósamente');

				return self::go( 'inactive' );

			else:

				self::setDanger('coordinators_courses_create_err', 'Error al agregar curso', 'Hubo un error al agregar el curso ' . $course->title);

				return self::go( 'create' );

			endif;

		endif;

	}

	/**
	 * Show the form for updateing the specified resource.
	 * GET /courses/update/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getUpdate($id)
	{

		self::addArgument('course', Course::find( Hashids::decode($id) ));

		self::addArgument('teachers', User::getTeachers());

		return self::make('update');

	}

	/**
	 * Show the form for updateing the specified resource.
	 * POST /courses/update/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id)
	{

		$course = Course::find(Hashids::decode($id));

		if( Input::get('title') == '' ):

			self::setWarning('coordinators_courses_title_err', 'Error al actualizar curso', 'por favor ingrese un Título, no puede dejar este campo vacío.');

			return self::go( 'create' );

		elseif( Input::get('author_id') == null ):

			self::setWarning('coordinators_courses_author_id_err', 'Error al actualizar curso', 'Debe seleccionar un profesor encargado del Curso.');

			return self::go( 'create' );

		else:

			$course->author_id = Input::get('author_id');
			$course->title = Input::get('title');
			$course->description = Input::get('description');
			$course->main_picture = Input::file('main_picture') != null ? Course::uploadMainPicture( Input::file('main_picture'), $course->name ) : $course->main_picture;
			$course->cover_picture = Input::file('cover_picture') != null ? Course::uploadCoverPicture( Input::file('cover_picture'), $course->name ) : $course->cover_picture;
			$course->thumbnail_picture = Input::file('thumbnail_picture') != null ? Course::uploadThumbnailPicture( Input::file('thumbnail_picture'), $course->name ) : $course->thumbnail_picture;
			
			if( $course->save() ):
				
				if(Input::get('author_id') != $course->author_id):
					$teacher = User::find(Input::get('author_id'));
					\Event::fire('notification.course_assigned', array($teacher, $course));
				endif;
	
				self::setSuccess('coordinators_courses_create', 'Curso Agregado', 'El curso ' . $course->title . ' fue actualizado exitósamente');

				return self::go( 'inactive' );

			else:

				self::setDanger('coordinators_courses_create_err', 'Error al actualizar curso', 'Hubo un error al actualizar el curso ' . $course->title);

				return self::go( 'create' );

			endif;

		endif;
	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /courses/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{

		self::addArgument('course', Course::find( Hashids::decode($id) ));

		return self::make('delete');

	}

	/**
	 * Show the form for deleting the specified resource.
	 * POST /courses/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($id)
	{
		$course = Course::find(Hashids::decode($id));

		if($course->delete()):

			self::setSuccess('coordinators_courses_delete', 'Curso Eliminado', 'El curso ' . $course->title . ' fue eliminado exitósamente');

			return self::go( 'inactive' );

		else:

			self::setDanger('coordinators_courses_delete_err', 'Error al eliminar curso', 'Hubo un error al eliminar el curso ' . $course->title);

			return self::go( 'delete/'.Crypt::encrypt($course->id) );

		endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /courses/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getActivate($id)
	{

		$course = Course::find( Hashids::decode($id) );

		$course->status = 'active';

		if($course->save()):

			self::setSuccess('coordinators_courses_activate', 'Curso Activado', 'El curso ' . $course->title . ' fue activado exitósamente');

			return self::go( 'inactive' );

		else:

			self::setDanger('coordinators_courses_activate_err', 'Error al activar curso', 'Hubo un error al activar el curso ' . $course->title);

			return self::go( 'inactive' );

		endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /courses/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDeactivate($id)
	{

		$course = Course::find( Hashids::decode($id) );

		$course->status = 'inactive';

		if($course->save()):

			self::setSuccess('coordinators_courses_deactivate', 'Curso Desactivado', 'El curso ' . $course->title . ' fue desactivado exitósamente');

			return self::go( 'index' );

		else:

			self::setDanger('coordinators_courses_deactivate_err', 'Error al desactivar curso', 'Hubo un error al desactivar el curso ' . $course->title);

			return self::go( 'index' );

		endif;

	}

}
