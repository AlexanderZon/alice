
	<!-- BEGIN PICKERS LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/clockface/css/clockface.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
	<!-- END PICKERS LEVEL STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/pages/css/profile-old.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/select2/select2.css"/>
	<link href="/assets/admin/pages/css/todo.css" rel="stylesheet" type="text/css"/>
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

			<div class="portlet light">

				<!-- END PAGE CONTENT INNER -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="portlet-title">
							<h4 class="profile-usertitle-name">Discusiones de la Lección "{{ $lesson->title }}"	
								<a href="javascript:;" class="btn blue-madison pull-right tooltips lessons-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
									<i class="fa fa-arrow-left"></i>
								</a>
							</h4>
						</div>
						<div class="portlet-body form discussions" data-lesson="{{ Hashids::encode($lesson->id) }}" data-course="{{ Hashids::encode($course->id) }}">
							<!-- BEGIN FORM-->
							<div class="tab-pane" id="tab_1_4">
								<div class="row">&nbsp;</div>
								<div class="row">&nbsp;</div>
								<div class="row">
									<div class="tab-pane active" id="tab_1">
										<!-- TASK COMMENTS -->
										<div class="form-group">
											<div class="col-md-12">
												<ul class="media-list">
													<li class="media">
														<a class="pull-left" href="javascript:;">
														<img class="todo-userpic" src="/assets/admin/layout4/img/avatar8.jpg" width="45px" height="45px">
														</a>
														<div class="media-body todo-comment">
															<p class="todo-comment-head">
																<span class="todo-comment-username">Christina Aguilera</span> &nbsp; 
																<span class="todo-comment-date">17 Sep 2014 at 2:05pm</span> &nbsp; 
																<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="Descargar archivo adjunto"><i class="fa fa-paperclip"></i></a> &nbsp; 
																<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="{{ '2' }} Me gustas"><i class="fa fa-thumbs-up"></i> 2</a> &nbsp; 
																<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="{{ '1' }} Respuestas"><i class="fa fa-mail-reply comment-reply-btn"></i> 1</a>
															</p>
															<p class="todo-text-color">
																 Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. <br>
															</p>
															<button type="button" class="todo-reply-btn btn btn-circle btn-default btn-xs comment-reply-btn">&nbsp; Responder &nbsp;</button>
															<button type="button" class="todo-like-btn btn btn-circle btn-default btn-xs">&nbsp; Me gusta &nbsp;</button>
															<!-- Nested media object -->
															<div class="media">
																<a class="pull-left" href="javascript:;">
																<img class="todo-userpic" src="/assets/admin/layout4/img/avatar4.jpg" width="45px" height="45px">
																</a>
																<div class="media-body">
																	<p class="todo-comment-head">
																		<span class="todo-comment-username">Carles Puyol</span> &nbsp; 
																		<span class="todo-comment-date">17 Sep 2014 at 4:30pm</span> &nbsp; 
																		<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="{{ '4' }} Me gustas"><i class="fa fa-thumbs-up"></i> 4</a> &nbsp; 
																	</p>
																	<p class="todo-text-color">
																		 Thanks so much my dear!
																	</p>
																</div>
															</div>
															<div class="media">
																<a class="pull-left" href="javascript:;">
																<img class="todo-userpic" src="/assets/admin/layout4/img/avatar4.jpg" width="45px" height="45px">
																</a>
																<div class="media-body">
																	<p class="todo-comment-head">
																		<span class="todo-comment-username">Carles Puyol</span> &nbsp; 
																		<span class="todo-comment-date">17 Sep 2014 at 4:30pm</span> &nbsp; 
																		<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="{{ '4' }} Me gustas"><i class="fa fa-thumbs-up"></i> 4</a> &nbsp; 
																	</p>
																	<p class="todo-text-color">
																		 Thanks so much my dear!
																	</p>
																</div>
															</div>
														</div>
													</li>
													<li class="media">
														<a class="pull-left" href="javascript:;">
														<img class="todo-userpic" src="/assets/admin/layout4/img/avatar5.jpg" width="45px" height="45px">
														</a>
														<div class="media-body todo-comment">
															<p class="todo-comment-head">
																<span class="todo-comment-username">Andres Iniesta</span> &nbsp; 
																<span class="todo-comment-date">18 Sep 2014 at 9:22am</span> &nbsp;
																<!-- <a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="Descargar {{ '2' }} archivos"><i class="fa fa-file"></i> 2</a> &nbsp;  -->
																<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="{{ '1' }} Me gustas"><i class="fa fa-thumbs-up"></i> 1</a> &nbsp; 
																<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="{{ '0' }} Respuestas"><i class="fa fa-mail-reply"></i> 0</a>
															</p>
															<p class="todo-text-color">
																 Cras sit amet nibh libero, in gravida nulla. Scelerisque ante sollicitudin commodo Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. <br>
															</p>
															<button type="button" class="todo-reply-btn btn btn-circle btn-default btn-xs comment-reply-btn">&nbsp; Responder &nbsp;</button>
															<button type="button" class="todo-like-btn btn btn-circle btn-default btn-xs">&nbsp; Me gusta &nbsp;</button>
														</div>
													</li>
													<li class="media">
														<a class="pull-left" href="javascript:;">
														<img class="todo-userpic" src="/assets/admin/layout4/img/avatar6.jpg" width="45px" height="45px">
														</a>
														<div class="media-body todo-comment">
															<p class="todo-comment-head">
																<span class="todo-comment-username">Olivia Wilde</span> &nbsp; <span class="todo-comment-date">18 Sep 2014 at 11:50am</span> &nbsp;
																<!-- <a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="Descargar {{ '2' }} archivos"><i class="fa fa-file"></i> 2</a> &nbsp;  -->
																<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="{{ '1' }} Me gustas"><i class="fa fa-thumbs-up"></i> 1</a> &nbsp; 
																<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="{{ '0' }} Respuestas"><i class="fa fa-mail-reply"></i> 0</a>
															</p>
															<p class="todo-text-color">
																 Cras sit amet nibh libero, in gravida nulla. Scelerisque ante sollicitudin commodo Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. <br>
															</p>
															<button type="button" class="todo-reply-btn btn btn-circle btn-default btn-xs comment-reply-btn">&nbsp; Responder &nbsp;</button>
															<button type="button" class="todo-like-btn btn btn-circle btn-default btn-xs">&nbsp; Me gusta &nbsp;</button>
														</div>
													</li>
												</ul>
											</div>
										</div>
										<!-- END TASK COMMENTS -->
										<!-- TASK COMMENT FORM -->
										<div class="form-group">
											<div class="col-md-12">
												<ul class="media-list">
													<li class="media">
														<img class="todo-userpic todo-user-left" src="/assets/admin/layout4/img/avatar4.jpg" width="45px" height="45px">
														<div class="media-body">
															<textarea class="summernote" rows="4" placeholder="Type comment..."></textarea>
														</div>
													</li>
												</ul>
												<button type="button" class="pull-right btn btn-sm btn-circle green-haze"> &nbsp; Submit &nbsp; </button>
											</div>
										</div>
										<!-- END TASK COMMENT FORM -->
									</div>

								</div>
							</div>

							<!-- END FORM-->
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT INNER -->
				
			</div>
					
			<!-- END PORTLET -->
		</div>
	</div>		

	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>

	<!-- BEGIN PAGE PLUGINS & SCRIPTS -->
	<script type="text/javascript" src="/assets/global/plugins/select2/select2.min.js"></script>
	<script src="/assets/global/plugins/bootstrap-summernote/summernote.js" type="text/javascript"></script>
	<!-- END PAGE PLUGINS & SCRIPTS -->
	
	<script type="text/javascript">

		//$('div.media:last').after('<div class="media"><a class="pull-left" href="javascript:;"><img class="todo-userpic" src="/assets/admin/layout4/img/avatar4.jpg" width="45px" height="45px"></a><div class="media-body"><textarea class="summernote" rows="1" placeholder="Type comment..."></textarea></div><div class="reply-submit-btn"><button type="button" class="pull-right btn btn-sm btn-circle green-haze"> &nbsp; Responder &nbsp; </button></div></div>');

		/**
		Comments Module
		**/

		var CommentsManager = function() {

			var reply_form = '<div class="media"><a class="pull-left" href="javascript:;"><img class="todo-userpic" src="/assets/admin/layout4/img/avatar4.jpg" width="45px" height="45px"></a><div class="media-body"><textarea class="summernote" rows="1" placeholder="Type comment..."></textarea></div><div class="reply-submit-btn"><button type="button" class="pull-right btn btn-sm btn-circle green-haze"> &nbsp; Responder &nbsp; </button><span class="pull-right"> &nbsp; </span><div class="pull-right fileinput fileinput-new" data-provides="fileinput"><span class="btn default btn-file btn-sm btn-circle green-haze"><span class="fileinput-new">Añadir Adjunto </span><span class="fileinput-exists"> Cambiar </span><input type="file" name="..."></span><span class="fileinput-filename"></span>&nbsp; <a href="#" class="close fileinput-exists" data-dismiss="fileinput"></a></div></div></div>';

			var discussionsReply = function(el){

				var parent = $(el.parents('div.media-body')).children('div.media:last').after(reply_form);

				$('#evaluation-form-loader').removeClass('hidden');
				console.log('click');

				ComponentsEditors.init();
				
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
						$('#questions-list > li > a[href=#question_' + data.question.hashids + '] > span').html(data.question.question.slice(0, 25) + '...');
						$('#questions-list > li > a[href=#question_' + data.question.hashids + '] > i').removeClass('font-red');
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
									'<i class="fa fa-cube"></i><span>' + data.question.question.slice(0, 25) + '</span></a>' +
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
										'<input type="text" placeholder="Plantee la pregunta en esta caja de texto" class="form-control" name="question" value="' + data.question.question + '" maxlength="254" required/>' +
									'</div>' +
									'<div class="form-group">' +
										'<label class="control-label">Respuesta</label>' +
										'<input type="text" placeholder="Indique la respuesta a la Pregunta anterior" class="form-control" name="answer" value="' + data.question.answer + '" maxlength="254" required/>' +
									'</div>' +
									'<div class="form-group">' +
										'<div class="btn green submit-question-form">Guardar</div>' +
										'<div class="btn red delete-question" style="margin-left:3px">Eliminar</div>' +
									'</div>' +
								'</form>' +
							'</div>');
						
						Metronic.init();

					}
				});

			}

			return {

				init: function (){

					$('.discussions').on('click', '.comment-reply-btn', function(event) {
						event.preventDefault();
						discussionsReply($(this));
						/* Act on the event */
					});

				}
			}

		}();

		/**
		Todo Module
		**/
		var Todo = function () {

		    // private functions & variables

		    var _initComponents = function() {
		        
		        // init datepicker
		        $('.todo-taskbody-due').datepicker({
		            rtl: Metronic.isRTL(),
		            orientation: "left",
		            autoclose: true
		        });

		        // init tags        
		        $(".todo-taskbody-tags").select2({
		            tags: ["Testing", "Important", "Info", "Pending", "Completed", "Requested", "Approved"]
		        });
		    }

		    var _handleProjectListMenu = function() {
		        if (Metronic.getViewPort().width <= 992) {
		            $('.todo-project-list-content').addClass("collapse");
		        } else {
		            $('.todo-project-list-content').removeClass("collapse").css("height", "auto");
		        }
		    }

		    // public functions
		    return {

		        //main function
		        init: function () {
		            _initComponents();     
		            _handleProjectListMenu();

		            Metronic.addResizeHandler(function(){
		                _handleProjectListMenu();    
		            });       
		        }

		    };

		}();

		var ComponentsEditors = function () {

		    var handleSummernote = function () {
		        $('.summernote').summernote({
		        	height: 75,
		        });
		        //API:
		        //var sHTML = $('#summernote_1').code(); // get code
		        //$('#summernote_1').destroy(); // destroy
		    }

		    return {
		        //main function to initiate the module
		        init: function () {
		            handleSummernote();
		        }
		    };

		}();

		ComponentsEditors.init();
		Todo.init();
		CommentsManager.init();

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->main_picture }}" class="img-responsive" alt="">');

	</script>