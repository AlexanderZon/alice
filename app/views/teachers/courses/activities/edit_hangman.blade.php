
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
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css"/>
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

			<div class="portlet light evaluation">
				<!-- END PAGE CONTENT INNER -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="portlet-title">
							<h4 class="profile-usertitle-name">Actividad del Curso "{{ $course->title }}"	
								<a href="javascript:;" class="btn blue-madison pull-right tooltips course-activities-back" data-placement="left" data-original-title="Ir al listado de Actividades" data-course="{{ Hashids::encode($course->id) }}">
									<i class="fa fa-arrow-left"></i>
								</a>
							</h4>
						</div>
						<div class="portlet-body form" data-activity="{{ Hashids::encode($evaluation->id) }}">
							<form id="edit-form" action="" method="post" class="form-horizontal evaluation-ajax-form" data-url="{{ $route }}/edit" enctype="multipart/form-data">
								<input type="hidden" name="activity_id" value="{{ Hashids::encode($evaluation->id) }}">
								<div class="form-body"> 
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-5">Nombre de la Actividad</label>
												<div class="col-md-7">
													<input name="title" type="text" class="form-control" placeholder="Ingrese el Nombre o Tema de la Actividad" value="{{ $evaluation->title }}" required>
													<!-- <span class="help-block">This is inline help</span> -->
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="col-md-12">
												<input name="status" value="active" type="checkbox" class="make-switch" data-on-text="&nbsp;Activo&nbsp;&nbsp;" data-off-text="&nbsp;Inactivo&nbsp;" {{ ($evaluation->status == 'active') ? 'checked="checked"' : '' }}>
												<!-- <span class="help-block">This is inline help</span> -->
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-5">Intérvalo de Tiempo</label>
												<div class="col-md-7">
													<div class="input-group" id="defaultrange">
														<input type="text" class="form-control" name="daterange" value="{{ date('d/m/Y', strtotime($evaluation->date_start)) . ' - ' . date('d/m/Y', strtotime($evaluation->date_end))}}">
														<span class="input-group-btn">
														<button class="btn default date-range-toggle" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-5">Descripción de la Actividad</label>
												<div class="col-md-7">
													<input name="description" type="text" class="form-control" placeholder="Ingrese la Descripción de la Actividad" value="{{ $evaluation->description }}" required>
													<!-- <span class="help-block">This is inline help</span> -->
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="col-md-6">
												<input type="submit" class="btn blue-madison" value="Guardar">
											</div>
											<div class="col-md-6">
												<img id="evaluation-form-loader" class="col-md-8 hidden" src="/assets/loaders/rubiks-cube.gif">
											</div>
										</div>
									</div>
								</div>
							</form>
							<!-- END PAGE CONTENT INNER -->
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-8">
									<h3 class="col-md-6">Lista de Preguntas 
										<div class="btn green tooltips activity-questions-add" data-original-title="Añadir Nueva Pregunta">
											<i class="fa fa-plus"></i>
										</div>
									</h3>
									 
									<div class="col-md-4">
										<img id="questions-form-loader" class="col-md-8 hidden" src="/assets/loaders/rubiks-cube.gif">
									</div>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-4">
									<ul id="questions-list" class="ver-inline-menu tabbable margin-bottom-10">
										@if($evaluation->hangman->count() > 0 AND ($counter = 0) == 0)
											@foreach($evaluation->hangman as $question)
												<li class="{{ $counter++ == 0 ? 'active' : ''}}">
													<a data-toggle="tab" href="#question_{{ Hashids::encode($question->id) }}">
													<i class="fa fa-cube {{ $question->isIncomplete() ? 'font-red' : '' }}"></i><span>{{ substr($question->question, 0, 25).'...'}}</span></a>
													<span class="after">

													</span>
												</li>
											@endforeach
										@endif
										<!-- <li class="active">
											<a data-toggle="tab" href="#tab_1-1">
											<i class="fa fa-cube"></i>Primera Pregunta...</a>
											<span class="after">
											</span>
										</li>
										<li>
											<a data-toggle="tab" href="#tab_2-2">
											<i class="fa fa-cube"></i>Segunda Pregunta...</a>
										</li>
										<li>
											<a data-toggle="tab" href="#tab_3-3">
											<i class="fa fa-cube"></i>Tercera Pregunta... </a>
										</li>
										<li>
											<a data-toggle="tab" href="#tab_4-4">
											<i class="fa fa-cube"></i>Cuarta Pregunta... </a>
										</li> -->
									</ul>
								</div>
								<div class="col-md-8">
									<div id="questions-content" class="tab-content">
										@if($evaluation->hangman->count() > 0 AND ($counter = 0) == 0)
											@foreach($evaluation->hangman as $question)
												<div id="question_{{ Hashids::encode($question->id) }}" class="tab-pane question-pane {{ $counter++ == 0 ? 'active' : ''}}">
													<form role="form" action="#" class="question-ajax-form">
														<input type="hidden" name="evaluation_id" value="{{ Hashids::encode($question->evaluation_id) }}">
														<input type="hidden" name="id" value="{{ Hashids::encode($question->id) }}">
														<div class="form-group">
															<label class="control-label">Pregunta</label>
															<input type="text" placeholder="Plantee la pregunta en esta caja de texto" class="form-control" name="question" value="{{ $question->question }}" required/>
														</div>
														<div class="form-group">
															<label class="control-label">Palabra</label>
															<input type="text" placeholder="Indique la respuesta a la Pregunta anterior" class="form-control" name="word" value="{{ $question->word }}" maxlength="254" required/>
														</div>
														<div class="form-group">
															<label class="control-label">Segundos</label>
															<input type="text" placeholder="Indique el tiempo que tendrá el estudiante en responder" class="form-control" name="seconds" value="{{ $question->seconds }}" required/>
														</div>
														<div class="form-group">
															<label class="control-label">Referencia Bibliográfica</label>
															<input type="text" placeholder="Indique una referencia" class="form-control" name="reference" value="{{ $question->reference }}"/>
														</div>
														<div class="form-group">
															<input type="submit" class="btn green" value="Guardar" />
															<div class="btn red delete-question">Eliminar</div>
														</div>
													</form>
												</div>
											@endforeach
										@endif
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

	<script type="text/javascript" src="/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<script src="/assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-summernote/summernote.js" type="text/javascript"></script>
	<!-- BEGIN PICKERS LEVEL PLUGINS -->
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/clockface/js/clockface.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/moment/moment.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<!-- END PICKERS LEVEL PLUGINS -->	

	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
	<!-- END PAGE LEVEL SCRIPTS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="/assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->

	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	
	<script type="text/javascript">

		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "positionClass": "toast-top-right",
		  "onclick": null,
		  "showDuration": "1000",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}

		var QuestionsManager = function() {

			var submitEvaluationForm = function(el){

				$('#evaluation-form-loader').removeClass('hidden');

				$.ajax({
					url: '{{ $route }}/edit',
					type: 'POST',
					datatype: 'json',
					data: el.serialize(),
					success: function(data){
						$('#evaluation-form-loader').addClass('hidden');
						toastr['success']("Los datos de la actividad han sido modificados con éxito!", "Actividad Modificada");
						console.log(data);
					},
					error: function(xhr){
						toastr['error']("No se han podido guardar los datos de la actividad", "ERROR");
						console.log(xhr);
					}
				});
			}

			var submitQuestionForm = function(el){

				console.log('Submit Question Form');

				var data = el.serialize();

				console.log(data);

				$('#questions-form-loader').removeClass('hidden');

				$.ajax({
					url: '{{ $route }}/question',
					type: 'PUT',
					datatype: 'json',
					data: data,
					success: function(data){
						console.log(data);
						$('#questions-form-loader').addClass('hidden');
						if(data.question.word != '' && data.question.question != '' && data.question.seconds != '' && data.question.seconds > 0){	
							$('#questions-list > li > a[href=#question_' + data.question.hashids + '] > i').removeClass('font-red');
						}else{
							$('#questions-list > li > a[href=#question_' + data.question.hashids + '] > i').addClass('font-red');
						}
						$('#questions-list > li > a[href=#question_' + data.question.hashids + '] > span').html(data.question.question.slice(0, 25) + '...');
						toastr['success']("Los datos de la pregunta han sido modificados con éxito!", "Pregunta Modificada");
					},
					error: function(xhr){
						toastr['error']("No se han podido guardar los datos de la pregunta", "ERROR");
						console.log(xhr);
					}
				});
			}

			var deleteQuestionConfirm = function(el){

				var data = $(el.parents('form')[0]).serialize();

                bootbox.confirm("¿Está usted seguro que desea eliminar esta pregunta?", function(result) {
                	if(result){

						$('#questions-form-loader').removeClass('hidden');

                		$.ajax({
                			url: '{{ $route }}/question',
                			type: 'DELETE',
                			datatype: 'json',
                			data: data,
                			async: true,
                			success: function(data){
								$('#questions-form-loader').addClass('hidden');
								$($('ul#questions-list > li > a[href=#question_' + data.hashids + ']').parents('li')[0]).remove();
								$('div#question_' + data.hashids).remove();
								$('div.question-pane').last().addClass('active');
								$('ul#questions-list li').last().addClass('active');
								console.log(data);
								toastr['success']("La pregunta ha sido eliminada con éxito!", "Pregunta Eliminada");
                			},
                			error: function(xhr){
                				console.log(xhr);
								toastr['error']("No se han podido eliminar la pregunta", "ERROR");
                			}
                		})
                	}
                	else{

                	}
                   console.log(result);
                }); 

			}

			var activityQuestionAdd = function(el){

				var activity = el.parents('.portlet-body').data('activity');

				$('#questions-form-loader').removeClass('hidden');

				$.ajax({
					url: '{{ $route }}/question',
					type: 'POST',
					datatype: 'json',
					async: true,
					data: {
						activity_id: activity,
					},
					success: function(data){

						$('ul#questions-list > li').removeClass('active');

						$('.question-pane').removeClass('active');

						$('#questions-form-loader').addClass('hidden');

						$('#questions-list').append(''+
							'<li class="active">' +
								'<a data-toggle="tab" href="#question_' + data.question.hashids + '">'+
									'<i class="fa fa-cube font-red"></i><span>' + data.question.question.slice(0, 25) + '</span></a>' +
								'<span class="after">' +
								'</span>' +
							'</li>');
						
						$('#questions-content').append('' +

							'<div id="question_' + data.question.hashids + '" class="tab-pane question-pane active">' +
								'<form role="form" action="#" class="question-ajax-form">' +
									'<input type="hidden" name="evaluation_id" value="' + data.evaluation.hashids + '">' +
									'<input type="hidden" name="id" value="' + data.question.hashids + '">' +
									'<div class="form-group">' +
										'<label class="control-label">Pregunta</label>' +
										'<input type="text" placeholder="Plantee la pregunta en esta caja de texto" class="form-control" name="question" value="' + data.question.question + '"  required/>' +
									'</div>' +
									'<div class="form-group">' +
										'<label class="control-label">Palabra</label>' +
										'<input type="text" placeholder="Indique la respuesta a la Pregunta anterior" class="form-control" name="word" value="' + data.question.word + '" maxlength="254" required/>' +
									'</div>' +
									'<div class="form-group">' +
										'<label class="control-label">Segundos</label>' +
										'<input type="text" placeholder="Indique una Opción Errónea" class="form-control" name="seconds" value="' + data.question.seconds + '" required/>' +
									'</div>' +
									'<div class="form-group">' +
										'<label class="control-label">Referencia Bibliográfica</label>' +
										'<input type="text" placeholder="Indique una referencia" class="form-control" name="reference" value="' + data.question.reference + '" required/>' +
									'</div>' +
									'<div class="form-group">' +
										'<div class="btn green submit-question-form">Guardar</div>' +
										'<div class="btn red delete-question" style="margin-left:3px">Eliminar</div>' +
									'</div>' +
								'</form>' +
							'</div>');
						
						Metronic.init();

					},
					error: function(xhr){
						console.log(xhr);
					}
				});

			}

			return {

				init: function (){

					$('.evaluation').on('submit', '.evaluation-ajax-form', function(event) {
						event.preventDefault();
						submitEvaluationForm($(this));
						/* Act on the event */
					});

					$('.evaluation').on('submit', '.question-ajax-form', function(event) {
						event.preventDefault();
						submitQuestionForm($(this));
						/* Act on the event */
					});

					$('.evaluation').on('click', '.submit-question-form', function(event) {
						event.preventDefault();
						$($(this).parents('form')[0]).submit();
						/* Act on the event */
					});

					$('.evaluation').on('click', '.delete-question', function(event) {
						event.preventDefault();
						deleteQuestionConfirm($(this));
						/* Act on the event */
					});

					$('.evaluation').on('click', '.activity-questions-add', function(event) {
						activityQuestionAdd($(this));
						/* Act on the event */
					});

				}
			}

		}();

		var ComponentsPickers = function () {

		    var handleDatePickers = function () {

		       	if (!jQuery().daterangepicker) {
		            return;
		        }
		        moment.locale('es');

		        $('#defaultrange').daterangepicker({
		                opens: (Metronic.isRTL() ? 'left' : 'right'),
		                format: 'DD/MM/YYYY',
		                locale: {
			                applyLabel: 'Aplicar',
			                cancelLabel: 'Cancelar',
			                fromLabel: 'Desde',
			                toLabel: 'Hasta',
			                weekLabel: 'W',
			                customRangeLabel: 'Custom Range',
			                daysOfWeek: moment.weekdaysMin(),
			                monthNames: moment.monthsShort(),
			                firstDay: moment.localeData()._week.dow
			            },
		                separator: ' to ',
		                startDate: moment("{{ date('Ymd', strtotime($evaluation->date_start)) }}", "YYYYMMDD" ),
		                endDate: moment("{{ date('Ymd', strtotime($evaluation->date_end)) }}", "YYYYMMDD" ),
		            },
		            function (start, end) {
		            	console.log('change;');
		                $('#defaultrange input').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
		            }
		        ); 

		    }	   

		    return {
		        //main function to initiate the module
		        init: function () {
		            handleDatePickers();
		        }
		    };

		}();

		ComponentsPickers.init();
		QuestionsManager.init();

		window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=activities&action=edit&activity_id={{ Hashids::encode($evaluation->id) }}');
		document.title = 'Alyce | {{ $course->title }} | Editar Actividad';

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->getMainPicture() }}" class="img-responsive" alt="">');

	</script>