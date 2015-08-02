
	<!-- BEGIN PICKERS LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/clockface/css/clockface.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-image-picker/image-picker/image-picker.css"/>
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

			<div class="portlet light lesson" data-course="{{ Hashids::encode($course->id) }}">
				<!-- END PAGE CONTENT INNER -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="portlet-title">
							<h4 class="profile-usertitle-name">Insignias de Premios para este curso ({{ $course->achievements->count() }})
								<a href="javascript:;" class="btn blue-madison pull-right tooltips achievements-back-btn" data-placement="left" data-original-title="Ir a las premiaciones por estudiante" data-course="{{ Hashids::encode($course->id) }}">
									<i class="fa fa-arrow-left"></i>
								</a>
								<span class="pull-right">&nbsp;</span>
								<a href="javascript:;" class="btn green-haze pull-right tooltips achievements-bunch-btn" data-placement="left" data-original-title="Manojo de Insignias" data-course="{{ Hashids::encode($course->id) }}">
									<i class="fa fa-trophy"></i>
								</a>
							</h4>
						</div>
						<div class="portlet-body form" data-course="{{ Hashids::encode($course->id) }}">
							<!-- END PAGE CONTENT INNER -->
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-8">
									<h3 class="col-md-6">Lista de Insignias
										<div class="btn green tooltips course-achievements-add" data-original-title="Añadir Nueva Insignia">
											<i class="fa fa-plus"></i>
										</div>
									</h3>
									 
									<div class="col-md-4">
										<img id="achievements-form-loader" class="col-md-8 hidden" src="/assets/loaders/rubiks-cube.gif">
									</div>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-4">
									<ul id="achievements-list" class="ver-inline-menu tabbable margin-bottom-10">
										@if($achievements->count() > 0 AND ($counter = 0) == 0)
											@foreach($achievements as $achievement)
												<li class="{{ $counter++ == 0 ? 'active' : ''}}">
													<a data-toggle="tab" href="#achievement_{{ Hashids::encode($achievement->id) }}">
													<i class="fa fa-trophy"></i><span>{{ substr($achievement->title, 0, 25).'...'}}</span></a>
													<span class="after">

													</span>
												</li>
											@endforeach
										@endif
										<!-- <li class="active">
											<a data-toggle="tab" href="#tab_1-1">
											<i class="fa fa-trophy"></i>Primera Insignia...</a>
											<span class="after">
											</span>
										</li>
										<li>
											<a data-toggle="tab" href="#tab_2-2">
											<i class="fa fa-trophy"></i>Segunda Insignia...</a>
										</li>
										<li>
											<a data-toggle="tab" href="#tab_3-3">
											<i class="fa fa-trophy"></i>Tercera Insignia... </a>
										</li>
										<li>
											<a data-toggle="tab" href="#tab_4-4">
											<i class="fa fa-trophy"></i>Cuarta Insignia... </a>
										</li> -->
									</ul>
								</div>
								<div class="col-md-8">
									<div id="achievements-content" class="tab-content">
										@if($achievements->count() > 0 AND ($counter = 0) == 0)
											@foreach($achievements as $achievement)
												<div id="achievement_{{ Hashids::encode($achievement->id) }}" class="tab-pane achievement-pane {{ $counter++ == 0 ? 'active' : ''}}">
													<form role="form" action="#" class="achievement-ajax-form">
														<div class="col-lg-9 col-md-8">
															<input type="hidden" name="course_id" value="{{ Hashids::encode($achievement->course_id) }}">
															<input type="hidden" name="id" value="{{ Hashids::encode($achievement->id) }}">
															<div class="form-group">
																<label class="control-label">Titulo</label>
																<input type="text" placeholder="Nombre de la Insignia" class="form-control" name="title" value="{{ $achievement->title }}" required/>
															</div>
															<div class="form-group">
																<label class="control-label">Descripción</label>
																<input type="text" placeholder="Nombre de la Insignia" class="form-control" name="description" value="{{ $achievement->description }}" required/>
															</div>
														</div>
														<div class="col-lg-3 col-md-4">
															<img src="{{ $achievement->picture }}" class="col-md-12 img-circle selected-image-container">
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<label class="control-label">Imagen</label>
																<select class="image-picker" name="picture">
																	<?php $counter = 0; ?>
																	@foreach(Achievement::$defaults as $icon)
																		<?php $counter++; ?>
																  		<option data-img-src="{{ $icon }}" value="{{ $icon }}" {{ $icon == $achievement->picture ? 'selected' : '' }}>  Icono {{ $counter }}  </option>
																	@endforeach
																  	<!--
																  		<option data-img-src="img/02.png" value="2">  Icono 2  </option>
																  		<option data-img-src="img/03.png" value="3">  Icono 3  </option>
																  		<option data-img-src="img/04.png" value="4">  Icono 4  </option>
																  		<option data-img-src="img/05.png" value="5">  Icono 5  </option>
																  		<option data-img-src="img/06.png" value="6">  Icono 6  </option>
																  		<option data-img-src="img/07.png" value="7">  Icono 7  </option>
																  		<option data-img-src="img/08.png" value="8">  Icono 8  </option>
																  		<option data-img-src="img/09.png" value="9">  Icono 9  </option>
																  		<option data-img-src="img/10.png" value="10"> Icono 10 </option>
																  		<option data-img-src="img/11.png" value="11"> Icono 11 </option>
																  		<option data-img-src="img/12.png" value="12"> Icono 12 </option>
																  	-->
																</select>
															</div>
														</div>
														<div class="form-group">
															<input type="submit" class="btn green" value="Guardar" />
															<div class="btn red delete-achievement">Eliminar</div>
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
	<script src="/assets/global/plugins/bootstrap-image-picker/image-picker/image-picker.js" type="text/javascript"></script>
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

		var ImagePicker = function(){

			var submitBunched = function(el){

				console.log($($(el.parents('.achievement-pane')).children('form').children('div').children('img')[0]).attr('src', el.val()));
			}

			return {

				init: function(){
				    $(".image-picker").imagepicker({
				    	changed: function(data){
				    		console.log($(this).val());
				    		submitBunched($(this));
				    		console.log(data);
				    	}
				    });
				}

			}

		}();

		var AchievementsManager = function() {

			var icons_url = {{ json_encode(Achievement::$defaults) }};

			var submitEvaluationForm = function(el){

				$('#lesson-form-loader').removeClass('hidden');

				$.ajax({
					url: '{{ $route }}/achievement',
					type: 'POST',
					datatype: 'json',
					data: el.serialize(),
					success: function(data){
						$('#lesson-form-loader').addClass('hidden');
						toastr['success']("Los datos de la actividad han sido modificadas con éxito!", "Actividad Modificada");
						console.log(data);
					},
					error: function(xhr){
						toastr['error']("No se han podido guardar los datos de la actividad", "ERROR")
						console.log(xhr);
					}
				});
			}

			var submitAchievementForm = function(el){

				console.log('Submit Achievement Form');

				var data = el.serialize();

				console.log(data);

				$('#achievements-form-loader').removeClass('hidden');

				$.ajax({
					url: '{{ $route }}/achievement',
					type: 'PUT',
					datatype: 'json',
					data: data,
					success: function(data){
						console.log(data);
						$('#achievements-form-loader').addClass('hidden');
						$('#achievements-list > li > a[href=#achievement_' + data.achievement.hashids + '] > span').html(data.achievement.title.slice(0, 25) + '...');
						toastr['success']("Los datos de la insignia han sido modificadas con éxito!", "Insignia Modificada");
					},
					error: function(xhr){
						toastr['error']("No se han podido guardar los datos de la insignia", "ERROR");
						console.log(xhr);
					}
				});
			}

			var deleteAchievementConfirm = function(el){

				var data = $(el.parents('form')[0]).serialize();

                bootbox.confirm("¿Está usted seguro que desea eliminar esta insignia?", function(result) {
                	if(result){

						$('#achievements-form-loader').removeClass('hidden');

                		$.ajax({
                			url: '{{ $route }}/achievement',
                			type: 'DELETE',
                			datatype: 'json',
                			data: data,
                			async: true,
                			success: function(data){
								$('#achievements-form-loader').addClass('hidden');
								$($('ul#achievements-list > li > a[href=#achievement_' + data.hashids + ']').parents('li')[0]).remove();
								$('div#achievement_' + data.hashids).remove();
								$('div.achievement-pane').last().addClass('active');
								$('ul#achievements-list li').last().addClass('active');
								console.log(data);
								toastr['success']("La insignia ha sido eliminada con éxito!", "Insignia Eliminada");
                			},
                			error: function(xhr){
                				console.log(xhr);
								toastr['error']("No se han podido eliminar la insignia", "ERROR");
                			}
                		})
                	}
                	else{

                	}
                   console.log(result);
                }); 

			}

			var lessonAchievementAdd = function(el){

				var course = el.parents('.portlet-body').data('course');

				$('#achievements-form-loader').removeClass('hidden');

				$.ajax({
					url: '{{ $route }}/achievement',
					type: 'POST',
					datatype: 'json',
					async: true,
					data: {
						course_id: course,
					},
					success: function(data){

						console.log(data);

						$('ul#achievements-list > li').removeClass('active');

						$('.achievement-pane').removeClass('active');

						$('#achievements-form-loader').addClass('hidden');

						$('#achievements-list').append(''+
							'<li class="active">' +
								'<a data-toggle="tab" href="#achievement_' + data.achievement.hashids + '">'+
									'<i class="fa fa-trophy"></i><span>' + data.achievement.title.slice(0, 25) + '</span></a>' +
								'<span class="after">' +
								'</span>' +
							'</li>');

						var select = '<select class="image-picker" name="picture"><option value=""></option>';

						for(var i = 0; i < icons_url.length; i++){
							select += '<option data-img-src="' + icons_url[i] + '" value="' + icons_url[i] + '">  Icono ' + i + '  </option>';
						}

						select += '</select>';
						
						$('#achievements-content').append('' +

							'<div id="achievement_' + data.achievement.hashids + '" class="tab-pane achievement-pane active">' +
								'<form role="form" action="#" class="achievement-ajax-form">' +
									'<input type="hidden" name="course_id" value="' + data.course.hashids + '">' +
									'<input type="hidden" name="id" value="' + data.achievement.hashids + '">' +
									'<div class="form-group">' +
										'<label class="control-label">Nombre</label>' +
										'<input type="text" placeholder="Indique el nombre de la Insignia" class="form-control" name="title" value="' + data.achievement.title + '"  required/>' +
									'</div>' +
									'<div class="form-group">' +
										'<label class="control-label">Descripción</label>' +
										'<input type="text" placeholder="Indique la Descripción de la Insignia" class="form-control" name="description" value="' + data.achievement.description + '"  required/>' +
									'</div>' +
									'<div class="form-group">' +
										'<label class="control-label">Imágen</label>' +
										select +
									'</div>' +
									'<div class="form-group">' +
										'<div class="btn green submit-achievement-form">Guardar</div>' +
										'<div class="btn red delete-achievement" style="margin-left:3px">Eliminar</div>' +
									'</div>' +
								'</form>' +
							'</div>');
						
						Metronic.init();
						ImagePicker.init();
						$('.image-picker').imagepicker();

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

					$('.lesson').on('submit', '.achievement-ajax-form', function(event) {
						event.preventDefault();
						submitAchievementForm($(this));
						/* Act on the event */
					});

					$('.lesson').on('click', '.submit-achievement-form', function(event) {
						event.preventDefault();
						$($(this).parents('form')[0]).submit();
						/* Act on the event */
					});

					$('.lesson').on('click', '.delete-achievement', function(event) {
						event.preventDefault();
						deleteAchievementConfirm($(this));
						/* Act on the event */
					});

					$('.lesson').on('click', '.course-achievements-add', function(event) {
						lessonAchievementAdd($(this));
						/* Act on the event */
					});

				}
			}

		}();

		AchievementsManager.init();
		ImagePicker.init();

		window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=achievements&action=edit');
		document.title = 'Alice | {{ $course->title }} | {{ $course->title }} | Insignias';

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->main_picture }}" class="img-responsive" alt="">');

	</script>