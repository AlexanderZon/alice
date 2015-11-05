
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

			<div class="portlet light lesson">
				<!-- END PAGE CONTENT INNER -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="portlet-title">
							<h4 class="profile-usertitle-name">Enlaces de la Lección "{{ $lesson->title }}"	
								<a href="javascript:;" class="btn blue-madison pull-right tooltips lessons-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones" data-course="{{ Hashids::encode($course->id) }}" data-lesson="{{ Hashids::encode($lesson->id) }}">
									<i class="fa fa-arrow-left"></i>
								</a>
							</h4>
						</div>
						<div class="portlet-body form" data-lesson="{{ Hashids::encode($lesson->id) }}">
							<!-- END PAGE CONTENT INNER -->
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-8">
									<h3 class="col-md-6">Lista de Enlaces 
										<div class="btn green tooltips lesson-links-add" data-original-title="Añadir Nuevo Enlace">
											<i class="fa fa-plus"></i>
										</div>
									</h3>
									 
									<div class="col-md-4">
										<img id="links-form-loader" class="col-md-8 hidden" src="/assets/loaders/rubiks-cube.gif">
									</div>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-4">
									<ul id="links-list" class="ver-inline-menu tabbable margin-bottom-10">
										@if($links->count() > 0 AND ($counter = 0) == 0)
											@foreach($links as $link)
												<li class="{{ $counter++ == 0 ? 'active' : ''}}">
													<a data-toggle="tab" href="#link_{{ Hashids::encode($link->id) }}">
													<i class="fa fa-link"></i><span>{{ substr($link->title, 0, 25).'...'}}</span></a>
													<span class="after">

													</span>
												</li>
											@endforeach
										@endif
										<!-- <li class="active">
											<a data-toggle="tab" href="#tab_1-1">
											<i class="fa fa-link"></i>Primera Enlace...</a>
											<span class="after">
											</span>
										</li>
										<li>
											<a data-toggle="tab" href="#tab_2-2">
											<i class="fa fa-link"></i>Segunda Enlace...</a>
										</li>
										<li>
											<a data-toggle="tab" href="#tab_3-3">
											<i class="fa fa-link"></i>Tercera Enlace... </a>
										</li>
										<li>
											<a data-toggle="tab" href="#tab_4-4">
											<i class="fa fa-link"></i>Cuarta Enlace... </a>
										</li> -->
									</ul>
								</div>
								<div class="col-md-8">
									<div id="links-content" class="tab-content">
										@if($links->count() > 0 AND ($counter = 0) == 0)
											@foreach($links as $link)
												<div id="link_{{ Hashids::encode($link->id) }}" class="tab-pane link-pane {{ $counter++ == 0 ? 'active' : ''}}">
													<form role="form" action="#" class="link-ajax-form">
														<input type="hidden" name="lesson_id" value="{{ Hashids::encode($link->lesson_id) }}">
														<input type="hidden" name="id" value="{{ Hashids::encode($link->id) }}">
														<div class="form-group">
															<label class="control-label">Nombre</label>
															<input type="text" placeholder="Nombre del Enlace" class="form-control" name="title" value="{{ $link->title }}" required/>
														</div>
														<div class="form-group">
															<label class="control-label">Palabra</label>
															<input type="text" placeholder="URL del Enlace" class="form-control" name="url" value="{{ $link->url }}" maxlength="254" required/>
														</div>
														<div class="form-group">
															<input type="submit" class="btn green" value="Guardar" />
															<div class="btn red delete-link">Eliminar</div>
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

		var LinksManager = function() {

			var submitEvaluationForm = function(el){

				$('#lesson-form-loader').removeClass('hidden');

				$.ajax({
					url: '{{ $route }}/link',
					type: 'POST',
					datatype: 'json',
					data: el.serialize(),
					success: function(data){
						$('#lesson-form-loader').addClass('hidden');
						toastr['success']("Los datos de la actividad han sido modificados con éxito!", "Actividad Modificado");
						console.log(data);
					},
					error: function(xhr){
						toastr['error']("No se han podido guardar los datos de la actividad", "ERROR")
						console.log(xhr);
					}
				});
			}

			var submitLinkForm = function(el){

				console.log('Submit Link Form');

				var data = el.serialize();

				console.log(data);

				$('#links-form-loader').removeClass('hidden');

				$.ajax({
					url: '{{ $route }}/link',
					type: 'PUT',
					datatype: 'json',
					data: data,
					success: function(data){
						console.log(data);
						$('#links-form-loader').addClass('hidden');
						$('#links-list > li > a[href=#link_' + data.link.hashids + '] > span').html(data.link.title.slice(0, 25) + '...');
						toastr['success']("Los datos del enlace han sido modificados con éxito!", "Enlace Modificado");
					},
					error: function(xhr){
						toastr['error']("No se han podido guardar los datos del enlace", "ERROR");
						console.log(xhr);
					}
				});
			}

			var deleteLinkConfirm = function(el){

				var data = $(el.parents('form')[0]).serialize();

                bootbox.confirm("¿Está usted seguro que desea eliminar este enlace?", function(result) {
                	if(result){

						$('#links-form-loader').removeClass('hidden');

                		$.ajax({
                			url: '{{ $route }}/link',
                			type: 'DELETE',
                			datatype: 'json',
                			data: data,
                			async: true,
                			success: function(data){
								$('#links-form-loader').addClass('hidden');
								$($('ul#links-list > li > a[href=#link_' + data.hashids + ']').parents('li')[0]).remove();
								$('div#link_' + data.hashids).remove();
								$('div.link-pane').last().addClass('active');
								$('ul#links-list li').last().addClass('active');
								console.log(data);
								toastr['success']("El enlace ha sido eliminado con éxito!", "Enlace Eliminado");
                			},
                			error: function(xhr){
                				console.log(xhr);
								toastr['error']("No se han podido eliminar el enlace", "ERROR");
                			}
                		})
                	}
                	else{

                	}
                   console.log(result);
                }); 

			}

			var lessonLinkAdd = function(el){

				var lesson = el.parents('.portlet-body').data('lesson');

				$('#links-form-loader').removeClass('hidden');

				$.ajax({
					url: '{{ $route }}/link',
					type: 'POST',
					datatype: 'json',
					async: true,
					data: {
						lesson_id: lesson,
					},
					success: function(data){

						$('ul#links-list > li').removeClass('active');

						$('.link-pane').removeClass('active');

						$('#links-form-loader').addClass('hidden');

						$('#links-list').append(''+
							'<li class="active">' +
								'<a data-toggle="tab" href="#link_' + data.link.hashids + '">'+
									'<i class="fa fa-link"></i><span>' + data.link.title.slice(0, 25) + '</span></a>' +
								'<span class="after">' +
								'</span>' +
							'</li>');
						
						$('#links-content').append('' +

							'<div id="link_' + data.link.hashids + '" class="tab-pane link-pane active">' +
								'<form role="form" action="#" class="link-ajax-form">' +
									'<input type="hidden" name="lesson_id" value="' + data.lesson.hashids + '">' +
									'<input type="hidden" name="id" value="' + data.link.hashids + '">' +
									'<div class="form-group">' +
										'<label class="control-label">Nombre</label>' +
										'<input type="text" placeholder="Indique el nombre del Enlace" class="form-control" name="title" value="' + data.link.title + '"  required/>' +
									'</div>' +
									'<div class="form-group">' +
										'<label class="control-label">URL</label>' +
										'<input type="text" placeholder="Indique la URL del Enlace" class="form-control" name="url" value="' + data.link.url + '" maxlength="254" required/>' +
									'</div>' +
									'<div class="form-group">' +
										'<div class="btn green submit-link-form">Guardar</div>' +
										'<div class="btn red delete-link" style="margin-left:3px">Eliminar</div>' +
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

					$('.lesson').on('submit', '.lesson-ajax-form', function(event) {
						event.preventDefault();
						submitEvaluationForm($(this));
						/* Act on the event */
					});

					$('.lesson').on('submit', '.link-ajax-form', function(event) {
						event.preventDefault();
						submitLinkForm($(this));
						/* Act on the event */
					});

					$('.lesson').on('click', '.submit-link-form', function(event) {
						event.preventDefault();
						$($(this).parents('form')[0]).submit();
						/* Act on the event */
					});

					$('.lesson').on('click', '.delete-link', function(event) {
						event.preventDefault();
						deleteLinkConfirm($(this));
						/* Act on the event */
					});

					$('.lesson').on('click', '.lesson-links-add', function(event) {
						lessonLinkAdd($(this));
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
		                startDate: moment("{{ date('Ymd', strtotime($lesson->date_start)) }}", "YYYYMMDD" ),
		                endDate: moment("{{ date('Ymd', strtotime($lesson->date_end)) }}", "YYYYMMDD" ),
		                minDate: moment("{{ date('Ymd', strtotime($module->date_start)) }}", "YYYYMMDD" ),
		                maxDate: moment("{{ date('Ymd', strtotime($module->date_end)) }}", "YYYYMMDD" ),
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
		LinksManager.init();

		window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=lessons&action=links&lesson_id={{ Hashids::encode($lesson->id) }}');
		document.title = 'Alice | {{ $course->title }} | {{ $lesson->title }} | Enlaces';

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->getMainPicture() }}" class="img-responsive" alt="">');

	</script>