
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
																<a href="javascript:;" class="btn font-blue-chambray tooltips comment-reply-btn" data-original-title="{{ '1' }} Respuestas"><i class="fa fa-mail-reply"></i> 1</a>
															</p>
															<p class="todo-text-color">
																 Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. <br>
															</p>
															<button type="button" class="todo-reply-btn btn btn-circle btn-default btn-xs comment-reply-btn">&nbsp; Responder &nbsp;</button>
															<button type="button" class="todo-like-btn btn btn-circle btn-default btn-xs">&nbsp; Me gusta &nbsp;</button>
															<!-- Nested media object -->
															<div class="children-comments">
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
															<div class="children-comments">
																<!-- COMMENTS HERE -->
															</div>
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
															<div class="children-comments">
																<!-- COMMENTS HERE -->
															</div>
														</div>
													</li>
													<li class="media">
														<a class="pull-left" href="javascript:;">
															<img class="todo-userpic" src="{{ Auth::user()->profile->getAvatar() }}" width="45px" height="45px">
														</a>
														<div class="media-body">
															<form class="comment-form-ajax" enctype="multipart/form-data">
																<div class="reply-textarea-content">
																	<textarea class="summernote" rows="1" placeholder="Escribe un comentario..." name="comment"></textarea>
																</div>
																<div class="reply-submit-btn">
																	<button type="button" class="pull-right btn btn-sm btn-circle green-haze comment-form-btn"> &nbsp; Responder &nbsp; </button>
																	<span class="pull-right"> &nbsp; </span>
																	<div class="pull-right fileinput fileinput-new" data-provides="fileinput">
																		<span class="btn default btn-file btn-sm btn-circle green-haze">
																			<span class="fileinput-new">Añadir Adjunto </span>
																			<span class="fileinput-exists"> Cambiar </span>
																			<input type="file" name="attachment">
																		</span>
																		<span class="fileinput-filename"></span>&nbsp; 
																		<a href="#" class="close fileinput-exists" data-dismiss="fileinput"></a>
																	</div>
																</div>
															</form>
														</div>
													</li>
												</ul>
											</div>
										</div>
										<!-- END TASK COMMENTS -->
										<!-- TASK COMMENT FORM -->
										<!-- <div class="form-group">
											<div class="col-md-12">
												<div class="media">
													<a class="pull-left" href="javascript:;">
														<img class="todo-userpic" src="{{ Auth::user()->profile->getAvatar() }}" width="45px" height="45px">
													</a>
													<div class="media-body">
														<form class="comment-form-ajax" enctype="multipart/form-data">
															<div class="reply-textarea-content">
																<textarea class="summernote" rows="1" placeholder="Escribe un comentario..." name="comment"></textarea>
															</div>
															<div class="reply-submit-btn">
																<button type="button" class="pull-right btn btn-sm btn-circle green-haze comment-form-btn"> &nbsp; Responder &nbsp; </button>
																<span class="pull-right"> &nbsp; </span>
																<div class="pull-right fileinput fileinput-new" data-provides="fileinput">
																	<span class="btn default btn-file btn-sm btn-circle green-haze">
																		<span class="fileinput-new">Añadir Adjunto </span>
																		<span class="fileinput-exists"> Cambiar </span>
																		<input type="file" name="attachment">
																	</span>
																	<span class="fileinput-filename"></span>&nbsp; 
																	<a href="#" class="close fileinput-exists" data-dismiss="fileinput"></a>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div> -->
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

			var reply_form = '' +
			'<div class="media commenting">' +
				'<a class="pull-left" href="javascript:;">' +
					'<img class="todo-userpic" src="{{ Auth::user()->profile->getAvatar() }}" width="45px" height="45px">' +
				'</a>' +
				'<div class="media-body">' +
					'<form class="comment-form-ajax" enctype="multipart/form-data">' +
						'<div class="reply-textarea-content">' +
							'<textarea class="summernote" rows="1" placeholder="Escribe un comentario..." name="comment"></textarea>' +
						'</div>' +
						'<div class="reply-submit-btn">' +
							'<button type="button" class="pull-right btn btn-sm btn-circle green-haze comment-reply-form-btn"> &nbsp; Responder &nbsp; </button>' +
							'<span class="pull-right"> &nbsp; </span>' +
							'<div class="pull-right fileinput fileinput-new" data-provides="fileinput">' +
								'<span class="btn default btn-file btn-sm btn-circle green-haze">' +
									'<span class="fileinput-new">Añadir Adjunto </span>' +
									'<span class="fileinput-exists"> Cambiar </span>' +
									'<input type="file" name="attachment">' +
								'</span>' +
								'<span class="fileinput-filename"></span>&nbsp; ' +
								'<a href="#" class="close fileinput-exists" data-dismiss="fileinput"></a>' +
							'</div>' +
						'</div>' +
					'</form>' +
				'</div>' +
			'</div>';

			var discussionsReply = function(el){

				$('div.commenting').remove();

				if($(el.parents('div.media-body').children('div.children-comments')).children('div.media').length > 0){
					$(el.parents('div.media-body').children('div.children-comments')).children('div.media:last').after(reply_form);
				}
				else{
					$(el.parents('div.media-body')).children('div.children-comments').html(reply_form);
				}

				$('#evaluation-form-loader').removeClass('hidden');

				ComponentsEditors.init();
				Metronic.init();
				
			}

			var discussionsReplySubmit = function(el){

				var form = $(el.parents('form.comment-form-ajax')[0]);

				var comment = $(form.children('div.reply-textarea-content')).children('textarea.summernote').html();

				console.log(comment);

				var media_body = $(form.parents('div.media-body')[0]);

				reply_html = '' +
					'<p class="todo-comment-head">' +
						'<span class="todo-comment-username">' + '{{ Auth::user()->display_name }}' + '</span> &nbsp; ' +
						'<span class="todo-comment-date">Justo Ahora</span> &nbsp; ' +
						'<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="0 Me gustas"><i class="fa fa-thumbs-up"></i> 0</a> &nbsp; ' +
					'</p>' +
					'<p class="todo-text-color">' +
						 comment +
					'</p>';

				media_body.html(reply_html);
				media_body.parents('div.media').removeClass('commenting');

				var formData = new FormData(form);

				Metronic.init();

			}

			var discussionsSubmit = function(el){

				var form = $(el.parents('form.comment-form-ajax')[0]);

				var comment = $(form.children('div.reply-textarea-content')).children('textarea.summernote').html();

				console.log('SUBMIT');

				console.log(comment);

				var media_body = form.parents('ul.media-list').children('li.media:last');

				console.log(media_body);

				reply_html = '' +
					'<li class="media">' +
						'<a class="pull-left" href="javascript:;">' +
						'<img class="todo-userpic" src="{{ Auth::user()->profile->getAvatar() }}" width="45px" height="45px">' +
						'</a>' +
						'<div class="media-body todo-comment">' +
							'<p class="todo-comment-head">' +
								'<span class="todo-comment-username">{{ Auth::user()->display_name }}</span> &nbsp; <span class="todo-comment-date">Justo ahora</span> &nbsp;' +
								'<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="Descargar archivo"><i class="fa fa-file"></i></a> &nbsp;' +
								'<a href="javascript:;" class="btn font-blue-chambray tooltips comment-like-btn" data-original-title="0 Me gustas"><i class="fa fa-thumbs-up"></i> 0</a> &nbsp; ' +
								'<a href="javascript:;" class="btn font-blue-chambray tooltips comment-reply-btn" data-original-title="0 Respuestas"><i class="fa fa-mail-reply"></i> 0</a>' +
							'</p>' +
							'<p class="todo-text-color" style="min-width:700px">' + comment + '</p>' +
							'<button type="button" class="todo-reply-btn btn btn-circle btn-default btn-xs comment-reply-btn">&nbsp; Responder &nbsp;</button>' +
							'<button type="button" class="todo-like-btn btn btn-circle btn-default btn-xs comment-like-btn">&nbsp; Me gusta &nbsp;</button>' +
							'<div class="children-comments">' +
								'<!-- COMMENTS HERE -->' +
							'</div>' +
						'</div>' +
					'</li>';


				media_body.before(reply_html);
				// media_body.parents('div.media').removeClass('commenting');

				var formData = new FormData(form);

				Metronic.init();

			}

			var updateSummernoteTextarea = function(el){

				var textarea = $($(el.parents('div.note-editor')).siblings('textarea.summernote'));
				textarea.html($.parseHTML(el.html()));

			}

			return {

				init: function (){

					$('.discussions').on('click', '.comment-reply-btn', function(event) {
						event.preventDefault();
						discussionsReply($(this));
						/* Act on the event */
					});

					$('.discussions').on('click', '.comment-reply-form-btn', function(event) {
						event.preventDefault();
						discussionsReplySubmit($(this));
						/* Act on the event */
					});

					$('.discussions').on('click', '.comment-form-btn', function(event) {
						event.preventDefault();
						discussionsSubmit($(this));
						/* Act on the event */
					});

					$('.discussions').on('keyup', '.note-editable', function(event) {
						event.preventDefault();
						updateSummernoteTextarea($(this));
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