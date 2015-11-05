
	<!-- BEGIN PICKERS LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/clockface/css/clockface.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"/>
	<!-- END PICKERS LEVEL STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/pages/css/profile-old.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-summernote/summernote.css">

	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<!-- END PAGE LEVEL STYLES -->

	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PORTLET -->

			<div class="portlet light" >
				<!-- END PAGE CONTENT INNER -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="portlet-title">
							<h4 class="profile-usertitle-name">Nueva Actividad para la Lección "{{ $lesson->title }}"	
								<a href="javascript:;" class="btn blue-madison pull-right tooltips lesson-activities-back" data-placement="left" data-original-title="Ir al listado de Lecciones" data-course="{{ Hashids::encode($course->id) }}" data-lesson="{{ Hashids::encode($lesson->id) }}">
									<i class="fa fa-arrow-left"></i>
								</a>
							</h4>
						</div>
						<div class="portlet-body form" data-course="{{ Hashids::encode($course->id) }}" data-lesson="{{ Hashids::encode($lesson->id) }}">
					
							<!-- END PAGE CONTENT INNER -->
							<div class="row">&nbsp;</div>
							<div class="row"><h3 class="col-md-12">Seleccione el Tipo de Actividad que desea Crear</h3></div>
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-6">
									<div class="top-news">
										<a href="javascript:;" class="btn red lesson-activities-new" data-type="rpsls">
										<span>
										Piedra, Papel, Tijeras, Iguana, y Garra </span>
										<em>Una pregunta y Cinco Posibles Respuestas</em>
										<em>
										<i class="fa fa-info"></i>
										Basado en el clásico juego de Piedra, Papel o Tijera</em>
										<i class="fa fa-cube top-news-icon"></i>
										</a>
									</div>
								</div>
								<div class="col-md-6">
									<div class="top-news">
										<a href="javascript:;" class="btn green lesson-activities-new" data-type="roulette">
										<span>
										Corona del Ganador </span>
										<em>Una pregunta y Cuatro posibles Respuestas</em>
										<em>
										<i class="fa fa-info"></i>
										Juego de Ruleta con comodines, preguntas y respuestas </em>
										<i class="fa fa-cube top-news-icon"></i>
										</a>
									</div>
								</div>
								<div class="col-md-6">
									<div class="top-news">
										<a href="javascript:;" class="btn blue lesson-activities-new" data-type="memory">
										<span>
										La Taguara </span>
										<em>Una Pregunta y una Respuesta</em>
										<em>
										<i class="fa fa-info"></i>
										Selección de una pregunta y su respectiva respuesta </em>
										<i class="fa fa-cube top-news-icon"></i>
										</a>
									</div>
								</div>
								<div class="col-md-6">
									<div class="top-news">
										<a href="javascript:;" class="btn yellow lesson-activities-new" data-type="hangman">
										<span>
										Krapula </span>
										<em>Una pregunta y una respuesta</em>
										<em>
										<i class="fa fa-info"></i>
										Basado en el Juego del Ahorcado </em>
										<i class="fa fa-cube top-news-icon"></i>
										</a>
									</div>
								</div>
							</div>
							<!-- END PAGE CONTENT INNER -->

						</div>
					</div>
				</div>
				
			</div>
					
			<!-- END PORTLET -->
		</div>
	</div>		

	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	
	<script type="text/javascript">

		window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=lessons&action=addactivity&lesson_id={{ Hashids::encode($lesson->id) }}');
		document.title = 'Alice | {{ $course->title }} | {{ $lesson->title }} | Añadir una nueva actividad';

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->getMainPicture() }}" class="img-responsive" alt="">');

	</script>