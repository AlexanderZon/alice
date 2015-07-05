
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

	<style type="text/css">
		div.banned{
			border: 2px solid #DD3333 !important;
			padding: 10px;
		}
		li.banned > div.media-body{
			border-left: 2px solid #DD3333 !important;
		}
		li.banned > div.media-body > div.todo-text-color{  
			border: 2px solid #dd3333;
			padding: 5px;
			margin-bottom: 10px;
		}
	</style>

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
													@if($comments->count() > 0)
														@foreach($comments as $comment)
														    <!-- Vista Profesor puede visualizar todos los comentarios -->
														    <!-- Vista Estudiante solo puede visualizar los comentarios no Banneados -->
															<?php $comment_user = $comment->author; ?>
															<?php $attachments = $comment->attachments; ?>
															<?php $thumbsups = $comment->thumbsups; ?>
															<?php $replies = $comment->children; ?>
															<li class="media {{ $comment->isBanned() ? 'banned' : '' }}" data-comment="{{ Hashids::encode($comment->id) }}">
																<a class="pull-left" href="javascript:;">
																<img class="todo-userpic" src="{{ $comment_user->profile->getAvatar() }}" width="45px" height="45px">
																</a>
																<div class="media-body todo-comment">
																	<p class="todo-comment-head">
																		<span class="todo-comment-username">{{ $comment_user->display_name }}</span> &nbsp; 
																		<span class="todo-comment-date moment-fromnow">{{ $comment->created_at }}</span> &nbsp; 
																		@if($attachments->count() > 0)
																			<?php $attachment = $comment->attachments->first() ?>
																			<a href="javascript:;" class="btn font-blue-chambray tooltips download-attachment" data-original-title="Descargar archivo adjunto ({{ $attachment->getSize() }})"><i class="fa fa-paperclip" data-route="{{ $attachment->route }}"></i></a> &nbsp; 
																		@endif
																		<a href="javascript:;" class="btn {{ $comment->hasThumbsup(Auth::user()->id) ? 'font-blue' : 'font-blue-chambray' }} tooltips comment-like-btn" data-original-title="{{ $thumbsups->count() }} Me gusta. {{ $comment->peopleThumbsupIt() }}"><i class="fa fa-thumbs-up"></i> <span class="thumbsups-counter">{{ $thumbsups->count() }}</span></a> &nbsp; 
																		<a href="javascript:;" class="btn font-blue-chambray tooltips comment-reply-btn" data-original-title="{{ $replies->count() }} Respuestas"><i class="fa fa-comments-o"></i> <span class="replies-counter">{{ $replies->count() }}</span></a>
																		@if($comment->isMarkedAsBanned())
																			<a href="javascript:;" class="btn font-red tooltips comment-ban-btn pull-right" data-original-title="Marcado como no deseado por {{ $comment->peopleBannedIt() }}."><i class="fa fa-ban"></i></a>
																		@else
																			<a href="javascript:;" class="btn font-grey-silver tooltips comment-ban-btn pull-right" data-original-title="No deseo ver esto"><i class="fa fa-ban"></i></a>
																		@endif
																		@if($comment->isMine())
																			<a href="javascript:;" class="btn font-grey-silver tooltips comment-edit-btn pull-right" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
																			<a href="javascript:;" class="btn font-grey-silver tooltips comment-delete-btn pull-right" data-original-title="Eliminar"><i class="fa fa-trash-o"></i></a>
																		@endif
																	</p>
																	<div class="todo-text-color">
																		 {{ $comment->content }} <br>
																	</div>
																	<div class="children-comments">
																		@if($replies->count() > 0)
																			@foreach($replies as $reply)
																				<?php $comment_user = $reply->author; ?>
																				<?php $attachments = $reply->attachments; ?>
																				<?php $thumbsups = $reply->thumbsups; ?>
																				<?php $replies = $reply->children; ?>
																				<div class="media {{ $reply->isBanned() ? 'banned' : '' }}" data-comment="{{ Hashids::encode($reply->id) }}">
																					<a class="pull-left" href="javascript:;">
																					<img class="todo-userpic" src="{{ $comment_user->profile->getAvatar() }}" width="45px" height="45px">
																					</a>
																					<div class="media-body">
																						<p class="todo-comment-head">
																							<span class="todo-comment-username">{{ $comment_user->display_name }}</span> &nbsp; 
																							<span class="todo-comment-date moment-fromnow">{{ $reply->created_at }}</span> &nbsp; 
																							@if($attachments->count() > 0)
																								<?php $attachment = $reply->attachments->first() ?>
																								<a href="javascript:;" class="btn font-blue-chambray tooltips download-attachment" data-original-title="Descargar archivo adjunto ({{ $attachment->getSize() }})"><i class="fa fa-paperclip" data-route="{{ $attachment->route }}"></i></a> &nbsp; 
																							@endif
																							<a href="javascript:;" class="btn {{ $reply->hasThumbsup(Auth::user()->id) ? 'font-blue' : 'font-blue-chambray' }} tooltips comment-like-btn" data-original-title="{{ $reply->thumbsups->count() }} Me gusta. {{$reply->peopleThumbsupIt()}}"><i class="fa fa-thumbs-up"></i> <span class="thumbsups-counter">{{ $reply->thumbsups->count() }}</span></a> &nbsp; 
																							@if($reply->isMarkedAsBanned())
																								<!-- Solo los profesores pueden ver esto -->
																								<a href="javascript:;" class="btn font-red tooltips comment-ban-btn pull-right" data-original-title="Marcado como no deseado por {{ $reply->peopleBannedIt() }}"><i class="fa fa-ban"></i></a>
																							@else
																								<a href="javascript:;" class="btn font-grey-silver tooltips comment-ban-btn pull-right" data-original-title="No deseo ver esto"><i class="fa fa-ban"></i></a>
																							@endif
																							@if($comment->isMine())
																								<a href="javascript:;" class="btn font-grey-silver tooltips comment-edit-btn pull-right" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
																								<a href="javascript:;" class="btn font-grey-silver tooltips comment-delete-btn pull-right" data-original-title="Eliminar"><i class="fa fa-trash-o"></i></a>
																							@endif
																						</p>
																						<div class="todo-text-color">
																							 {{ $reply->content }}
																						</div>
																					</div>
																				</div>
																			@endforeach
																		@endif															
																	</div>
																</div>
															</li>
														@endforeach
													@else
														<li class="btn yellow col-md-12 be-firts-comment" style="margin-bottom:15px">Sé el/la primero/a en hacer comentario en esta lección</li>
													@endif
													<li class="media">
														<a class="pull-left" href="javascript:;">
															<img class="todo-userpic" src="{{ Auth::user()->profile->getAvatar() }}" width="45px" height="45px">
														</a>
														<div class="media-body">
															<form class="comment-form-ajax" enctype="multipart/form-data">
																<input type="hidden" name="lesson_id" value="{{ Hashids::encode($lesson->id) }}"/>
																<input type="hidden" name="parent_id" value="{{ Hashids::encode(0) }}"/>
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

		/**
		Comments Module
		**/

		var MomentManager = function(){

			var fromNow = function(){
				$('.moment-fromnow').each(function(e){
					var time = $(this).html();
					$(this).html(moment(time).fromNow());
					$(this).removeClass('moment-fromnow');
				});
			}

			return {

				init: function (){

					moment.locale('es');

					fromNow();

				}
			}
		}();

		var CommentsManager = function() {

			var display_comment = null;

			var image_loader = '<img src="/assets/loaders/rubiks-cube.gif" width="50px"/>';

			var generatePostForm = function(parent){

				var reply_form = '' +
				'<div class="media commenting">' +
					'<a class="pull-left" href="javascript:;">' +
						'<img class="todo-userpic" src="{{ Auth::user()->profile->getAvatar() }}" width="45px" height="45px">' +
					'</a>' +
					'<div class="media-body waiting_comment">' +
						'<form class="comment-form-ajax" enctype="multipart/form-data">' +
							'<input type="hidden" name="lesson_id" value="{{ Hashids::encode($lesson->id) }}"/>' +
							'<input type="hidden" name="parent_id" value="' + parent + '"/>' +
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

				return reply_form;
				
			}

			var generatePutForm = function(comment, content){

				var reply_form = '' +
				'<div class="commenting" style="margin-bottom:30px">' +
					'<form class="comment-form-ajax" enctype="multipart/form-data">' +
						'<input type="hidden" name="lesson_id" value="{{ Hashids::encode($lesson->id) }}"/>' +
						'<input type="hidden" name="comment_id" value="' + comment + '"/>' +
						'<div class="reply-textarea-content">' +
							'<textarea class="summernote" rows="1" placeholder="Escribe un comentario..." name="comment">' + content + '</textarea>' +
						'</div>' +
						'<div class="reply-submit-btn">' +
							'<button type="button" class="pull-right btn btn-sm btn-circle green-haze comment-put-btn"> &nbsp; Editar &nbsp; </button>' +
							'<span class="pull-right"> &nbsp; </span>' +
							'<!--<div class="pull-right fileinput fileinput-new" data-provides="fileinput">' +
								'<span class="btn default btn-file btn-sm btn-circle green-haze">' +
									'<span class="fileinput-new">Añadir Adjunto </span>' +
									'<span class="fileinput-exists"> Cambiar </span>' +
									'<input type="file" name="attachment">' +
								'</span>' +
								'<span class="fileinput-filename"></span>&nbsp; ' +
								'<a href="#" class="close fileinput-exists" data-dismiss="fileinput"></a>' +
							'</div>-->' +
						'</div>' +
					'</form>' +
				'</div>';

				return reply_form;
				
			}

			var generatePutReplyForm = function(comment, content){

				var reply_form = '' +
				'<div class="media commenting" data-comment="' + comment + '">' +
					'<a class="pull-left" href="javascript:;">' +
						'<img class="todo-userpic" src="{{ Auth::user()->profile->getAvatar() }}" width="45px" height="45px">' +
					'</a>' +
					'<div class="media-body waiting_comment">' +
						'<form class="comment-form-ajax" enctype="multipart/form-data">' +
							'<input type="hidden" name="lesson_id" value="{{ Hashids::encode($lesson->id) }}"/>' +
							'<input type="hidden" name="comment_id" value="' + comment + '"/>' +
							'<div class="reply-textarea-content">' +
								'<textarea class="summernote" rows="1" placeholder="Escribe un comentario..." name="comment">' + content + '</textarea>' +
							'</div>' +
							'<div class="reply-submit-btn">' +
								'<button type="button" class="pull-right btn btn-sm btn-circle green-haze comment-reply-put-btn"> &nbsp; Editar &nbsp; </button>' +
								'<span class="pull-right"> &nbsp; </span>' +
								'<!--<div class="pull-right fileinput fileinput-new" data-provides="fileinput">' +
									'<span class="btn default btn-file btn-sm btn-circle green-haze">' +
										'<span class="fileinput-new">Añadir Adjunto </span>' +
										'<span class="fileinput-exists"> Cambiar </span>' +
										'<input type="file" name="attachment">' +
									'</span>' +
									'<span class="fileinput-filename"></span>&nbsp; ' +
									'<a href="#" class="close fileinput-exists" data-dismiss="fileinput"></a>' +
								'</div>-->' +
							'</div>' +
						'</form>' +
					'</div>' +
				'</div>';

				return reply_form;
				
			}

			var discussionsLike = function(el){

				var like = {
					user: '{{ Hashids::encode(Auth::user()->id) }}',
					comment: 0
				};

				var reply_like = el.parents('div.media').data('comment');
				var comment_like = el.parents('li.media').data('comment');

				var parent = (typeof reply_like == "undefined") ? 'li.media' : 'div.media';
				like.comment = (typeof reply_like == "undefined") ? comment_like : reply_like;

				var comment_like_element = el.parents(parent).children('.media-body').children('.todo-comment-head').children('.comment-like-btn');

				comment_like_element.removeClass('font-blue-chambray');
				comment_like_element.removeClass('font-blue');
				comment_like_element.addClass('font-grey');

				$.ajax({
					url: '{{ $route }}/like',
					type: 'POST',
					dataType: 'json',
					data: like,
					async: true,
					success: function(data){
						// console.log(data);
						var counter = parseInt(comment_like_element.children('.thumbsups-counter').html());
						console.log(counter);
						var thumbsup_color = (data.thumbsup) ? 'font-blue' : 'font-blue-chambray';
						var thumbsup_counter = (data.thumbsup) ? counter+1 : counter-1;
						// console.log(thumbsup_counter);

						comment_like_element.attr('data-original-title', thumbsup_counter + ' Me gusta. ' + data.thumbsupers);
						comment_like_element.children('.thumbsups-counter').html(thumbsup_counter);
						comment_like_element.addClass(thumbsup_color);
						comment_like_element.removeClass('font-grey');
					},
					error: function(xhr){
						console.log(xhr);
					}
				});

				ComponentsEditors.init();
				MomentManager.init();
				Metronic.init();
				
			}

			var discussionsEdit = function(el){

				var data = {
					user: '{{ Hashids::encode(Auth::user()->id) }}',
					comment: 0,
					content: '',
				};

				var reply_edit = el.parents('div.media').data('comment');
				var comment_edit = el.parents('li.media').data('comment');

				console.log(reply_edit);
				console.log(comment_edit);

				var parent = (typeof reply_edit == "undefined") ? 'li.media' : 'div.media';
				data.comment = (typeof reply_edit == "undefined") ? comment_edit : reply_edit;
				data.content = el.parents(parent).children('div.media-body').children('div.todo-text-color').html();

				if(typeof reply_edit == "undefined"){
					console.log('PARENT');
					var container = el.parents(parent).children('div.media-body');
					container.children('div.children-comments').before(generatePutForm(data.comment, data.content));
					container.children('p.todo-comment-head').remove();
					container.children('div.todo-text-color').remove();
				}
				else{
					el.parents(parent).html(generatePutReplyForm(data.comment, data.content));
				}

				ComponentsEditors.init();
				MomentManager.init();
				Metronic.init();
				
			}

			var discussionsDelete = function(el){

				var data = {
					user: '{{ Hashids::encode(Auth::user()->id) }}',
					comment: 0
				};

				var reply_delete = el.parents('div.media').data('comment');
				var comment_delete = el.parents('li.media').data('comment');

				var parent = (typeof reply_delete == "undefined") ? 'li.media' : 'div.media';
				data.comment = (typeof reply_delete == "undefined") ? comment_delete : reply_delete;

				var container = el.parents(parent);
				var media_body = el.parents(parent).children('div.media-body');

				media_body.children('div.todo-text-color').html(image_loader);
				media_body.children('p.todo-comment-head').children('span.todo-comment-date').html('Eliminando');
				media_body.children('div.children-comments').remove();
				media_body.children('p.todo-comment-head').children('a').remove();


				$.ajax({
					url: '{{ $route }}/comments',
					type: 'DELETE',
					dataType: 'json',
					data: data,
					async: true,
					success: function(data){
						console.log(container);
						container.remove();
						console.log(data);
					},
					error: function(xhr){
						console.log(xhr);
					}
				});

				ComponentsEditors.init();
				MomentManager.init();
				Metronic.init();
				
			}

			var discussionsBan = function(el){

				var data = {
					user: '{{ Hashids::encode(Auth::user()->id) }}',
					comment: 0
				};

				var reply_ban = el.parents('div.media').data('comment');
				var comment_ban = el.parents('li.media').data('comment');

				var parent = (typeof reply_ban == "undefined") ? 'li.media' : 'div.media';
				data.comment = (typeof reply_ban == "undefined") ? comment_ban : reply_ban;

				var container = el.parents(parent);

				if(container.hasClass('banned')){
					el.addClass('font-grey-silver');
					el.removeClass('font-red');
				}
				else{
					el.removeClass('font-grey-silver');
					el.addClass('font-red');
				}

				$.ajax({
					url: '{{ $route }}/banned',
					type: 'POST',
					dataType: 'json',
					data: data,
					async: true,
					success: function(data){
						if(data.banned){
							container.addClass('banned');
							el.attr('data-original-title', 'Marcado como no deseado por ' + data.banneders );
						}
						else{
							container.removeClass('banned');
							el.attr('data-original-title', 'Marcado como no deseado por ' + data.banneders);
							el.removeClass('font-grey-silver');
							el.addClass('font-red');
						}
						console.log(container);
						console.log(data);
					},
					error: function(xhr){
						console.log(xhr);
					}
				});

				ComponentsEditors.init();
				MomentManager.init();
				Metronic.init();
				
			}

			var discussionsReply = function(el){

				$('div.commenting').remove();

				var parent = el.parents('li.media').data('comment');

				console.log(parent);

				if($(el.parents('div.media-body').children('div.children-comments')).children('div.media').length > 0){
					$(el.parents('div.media-body').children('div.children-comments')).children('div.media:last').after(generatePostForm(parent));
				}
				else{
					$(el.parents('div.media-body')).children('div.children-comments').html(generatePostForm(parent));
				}

				$('#evaluation-form-loader').removeClass('hidden');

				ComponentsEditors.init();
				MomentManager.init();
				Metronic.init();
				
			}

			var discussionsReplySubmit = function(el){

				var form = $(el.parents('form.comment-form-ajax')[0]);

				var comment = $(form.children('div.reply-textarea-content')).children('textarea.summernote').val();

				var media_body = $(form.parents('div.media-body')[0]);

				reply_html = '' +
					'<p class="todo-comment-head">' +
						'<span class="todo-comment-username">' + '{{ Auth::user()->display_name }}' + '</span> &nbsp; ' +
						'<span class="todo-comment-date">Enviando</span> &nbsp; ' +
					'</p>' +
					'<div class="todo-text-color">' + image_loader + '</div>';

				media_body.html(reply_html);
				media_body.parents('div.media').removeClass('commenting');

				console.log(form.serialize());

				var formData = new FormData(el.parents('form.comment-form-ajax')[0]);

				$.ajax({
					url: '{{ $route }}/comments',
					type: 'POST',
					dataType: 'json',
					data: formData,
					async: true,
					success: function(data) {

						reply_html = '' +
							'<p class="todo-comment-head">' +
								'<span class="todo-comment-username">' + '{{ Auth::user()->display_name }}' + '</span> &nbsp; ' +
								'<span class="todo-comment-date moment-fromnow">' + data.created_at.date + '</span> &nbsp; ' + 
								( data.attachment != null ? '<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="Descargar archivo (' + data.attachment + ')"><i class="fa fa-paperclip"></i></a> &nbsp;' : '' ) +
								'<a href="javascript:;" class="btn font-blue-chambray tooltips comment-like-btn" data-original-title="0 Me gusta. "><i class="fa fa-thumbs-up"></i> <span class="thumbsups-counter">0</span></a> &nbsp; ' +
								'<a href="javascript:;" class="btn font-grey-silver tooltips comment-edit-btn pull-right" data-original-title="Editar"><i class="fa fa-pencil"></i></a>' +
								'<a href="javascript:;" class="btn font-grey-silver tooltips comment-delete-btn pull-right" data-original-title="Eliminar"><i class="fa fa-trash-o"></i></a>' +
							'</p>' +
							'<div class="todo-text-color">' +
								 comment +
							'</div>';

						var comment_element = $('div.waiting_comment');
						comment_element.html(reply_html);
						comment_element.removeClass('waiting_comment');
						comment_element.data('comment', data.id);

						var replies_tooltip = comment_element.parents('li.media').children('.media-body').children('.todo-comment-head').children('.comment-reply-btn');
						var replies = replies_tooltip.children('.replies-counter');
						var counter_replies = parseInt(replies.html())+1;
						replies.html(counter_replies);
						replies_tooltip.attr('data-original-title', counter_replies + ' Respuestas');
						console.log(counter_replies);

						MomentManager.init();
						Metronic.init();

					},
					error: function(xhr, status) {
						console.log(xhr);
						console.log(xhr.status);
					},
			        cache: false,
			        contentType: false,
			        processData: false
				});

			}

			var discussionsSubmit = function(el){

				var form = $(el.parents('form.comment-form-ajax')[0]);

				var comment = $(form.children('div.reply-textarea-content')).children('textarea.summernote').val();

				var media_body = form.parents('ul.media-list').children('li.media:last');

				// media_body.parents('div.media').removeClass('commenting');
				console.log(form.serialize());

				var formData = new FormData(el.parents('form.comment-form-ajax')[0]);

				comment_html = '' +
					'<li class="media waiting_comment">' +
						'<a class="pull-left" href="javascript:;">' +
						'<img class="todo-userpic" src="{{ Auth::user()->profile->getAvatar() }}" width="45px" height="45px">' +
						'</a>' +
						'<div class="media-body todo-comment">' +
							'<p class="todo-comment-head">' +
								'<span class="todo-comment-username">{{ Auth::user()->display_name }}</span> &nbsp; <span class="todo-comment-date">Enviando</span> &nbsp;' +
							'</p>' +
							'<div class="todo-text-color" style="min-width:700px">' + image_loader + '</div>'
							'<div class="children-comments">' +
								'<!-- COMMENTS HERE -->' +
							'</div>' +
						'</div>' +
					'</li>';

				media_body.before(comment_html);

				$.ajax({
					url: '{{ $route }}/comments',
					type: 'POST',
					dataType: 'json',
					data: formData,
					async: true,
					success: function(data) {

						$('li.be-firts-comment').remove();

						comment_html = '' +
								'<a class="pull-left" href="javascript:;">' +
								'<img class="todo-userpic" src="{{ Auth::user()->profile->getAvatar() }}" width="45px" height="45px">' +
								'</a>' +
								'<div class="media-body todo-comment">' +
									'<p class="todo-comment-head">' +
										'<span class="todo-comment-username">{{ Auth::user()->display_name }}</span> &nbsp; <span class="todo-comment-date moment-fromnow">' + data.created_at.date + '</span> &nbsp;' +
										( data.attachment != null ?	'<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="Descargar archivo (' + data.attachment + ')"><i class="fa fa-paperclip"></i></a> &nbsp;' : '' ) +
										'<a href="javascript:;" class="btn font-blue-chambray tooltips comment-like-btn" data-original-title="0 Me gusta"><i class="fa fa-thumbs-up"></i> <span class="thumbsups-counter">0</span></a> &nbsp; ' +
										'<a href="javascript:;" class="btn font-blue-chambray tooltips comment-reply-btn" data-original-title="0 Respuestas"><i class="fa fa-comments-o"></i> <span class="replies-counter">0</span></a>' +
										'<a href="javascript:;" class="btn font-grey-silver tooltips comment-edit-btn pull-right" data-original-title="Editar"><i class="fa fa-pencil"></i></a>' +
										'<a href="javascript:;" class="btn font-grey-silver tooltips comment-delete-btn pull-right" data-original-title="Eliminar"><i class="fa fa-trash-o"></i></a>' +
									'</p>' +
									'<div class="todo-text-color" style="min-width:700px">' + data.content + '</div>' +
									'<div class="children-comments">' +
										'<!-- COMMENTS HERE -->' +
									'</div>' +
								'</div>';

						var comment_element = $('li.waiting_comment');
						comment_element.html(comment_html);
						comment_element.data('comment', data.id);
						comment_element.removeClass('waiting_comment');
						console.log(data);

						el.parents('form.comment-form-ajax').children('div.reply-textarea-content').children('div.note-editor').children('div.note-editable').html('');

						MomentManager.init();
						Metronic.init();

					},
					error: function(xhr) {
						console.log(xhr);
					},
			        cache: false,
			        contentType: false,
			        processData: false
				});

			}

			var discussionsReplyPutSubmit = function(el){

				var form = $(el.parents('form.comment-form-ajax')[0]);

				var comment = $(form.children('div.reply-textarea-content')).children('textarea.summernote').val();

				var media_body = $(form.parents('div.media-body')[0]);

				reply_html = '' +
					'<p class="todo-comment-head">' +
						'<span class="todo-comment-username">' + '{{ Auth::user()->display_name }}' + '</span> &nbsp; ' +
						'<span class="todo-comment-date">Enviando</span> &nbsp; ' +
					'</p>' +
					'<div class="todo-text-color">' + image_loader + '</div>';

				media_body.html(reply_html);
				media_body.parents('div.media').removeClass('commenting');

				console.log(form.serialize());

				var formData = new FormData(el.parents('form.comment-form-ajax')[0]);

				$.ajax({
					url: '{{ $route }}/comments',
					type: 'PUT',
					dataType: 'json',
					data: form.serialize(),
					async: true,
					success: function(data) {

						console.log(data);

						reply_html = '' +
							'<p class="todo-comment-head">' +
								'<span class="todo-comment-username">' + '{{ Auth::user()->display_name }}' + '</span> &nbsp; ' +
								'<span class="todo-comment-date moment-fromnow">' + data.created_at.date + '</span> &nbsp; ' + 
								( data.attachment != null ? '<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="Descargar archivo (' + data.attachment + ')"><i class="fa fa-paperclip"></i></a> &nbsp;' : '' ) +
								'<a href="javascript:;" class="btn ' + (data.hasMyThumbsup ? 'font-blue' : 'font-blue-chambray' ) + ' tooltips comment-like-btn" data-original-title="' + data.thumbsups + ' Me gusta. ' + data.thumbsupers + '"><i class="fa fa-thumbs-up"></i> <span class="thumbsups-counter">' + data.thumbsups + '</span></a> &nbsp; ' +
								'<a href="javascript:;" class="btn font-grey-silver tooltips comment-edit-btn pull-right" data-original-title="Editar"><i class="fa fa-pencil"></i></a>' +
								'<a href="javascript:;" class="btn font-grey-silver tooltips comment-delete-btn pull-right" data-original-title="Eliminar"><i class="fa fa-trash-o"></i></a>' +
							'</p>' +
							'<div class="todo-text-color">' +
								 comment +
							'</div>';

						var comment_element = $('div.waiting_comment');
						comment_element.html(reply_html);
						comment_element.removeClass('waiting_comment');
						// comment_element.data('comment', data.id);

						MomentManager.init();
						Metronic.init();

					},
					error: function(xhr, status) {
						console.log(xhr);
						console.log(xhr.status);
					}
				});

			}

			var discussionsPutSubmit = function(el){

				var form = $(el.parents('form.comment-form-ajax')[0]);

				var comment = $(form.children('div.reply-textarea-content')).children('textarea.summernote').val();

				var media_body = el.parents('div.media-body');

				// media_body.parents('div.media').removeClass('commenting');
				console.log(form.serialize());

				var formData = new FormData(el.parents('form.comment-form-ajax')[0]);

				comment_html = '' +
					'<p class="todo-comment-head">' +
						'<span class="todo-comment-username">{{ Auth::user()->display_name }}</span> &nbsp; <span class="todo-comment-date">Enviando</span> &nbsp;' +
					'</p>' +
					'<div class="todo-text-color" style="min-width:700px">' + image_loader + '</div>';

				media_body.children('div.children-comments').before(comment_html);
				media_body.children('div.commenting').remove();

				$.ajax({
					url: '{{ $route }}/comments',
					type: 'PUT',
					dataType: 'json',
					data: form.serialize(),
					async: true,
					success: function(data) {

						console.log(data);

						var todo_comment_head = '' +
							'<span class="todo-comment-username">{{ Auth::user()->display_name }}</span> &nbsp; <span class="todo-comment-date moment-fromnow">' + data.created_at.date + '</span> &nbsp;' +
							( data.attachment != null ?	'<a href="javascript:;" class="btn font-blue-chambray tooltips" data-original-title="Descargar archivo (' + data.attachment + ')"><i class="fa fa-paperclip"></i></a> &nbsp;' : '' ) +
							'<a href="javascript:;" class="btn font-blue-chambray tooltips comment-like-btn" data-original-title="' + data.thumbsups + ' Me gusta. ' + data.thumbsupers + '"><i class="fa fa-thumbs-up"></i> <span class="thumbsups-counter">' + data.thumbsups + '</span></a> &nbsp; ' +
							'<a href="javascript:;" class="btn font-blue-chambray tooltips comment-reply-btn" data-original-title="' + data.replies + ' Respuestas"><i class="fa fa-comments-o"></i> <span class="replies-counter">' + data.replies + '</span></a>' +
							'<a href="javascript:;" class="btn font-grey-silver tooltips comment-edit-btn pull-right" data-original-title="Editar"><i class="fa fa-pencil"></i></a>' +
							'<a href="javascript:;" class="btn font-grey-silver tooltips comment-delete-btn pull-right" data-original-title="Eliminar"><i class="fa fa-trash-o"></i></a>';

						var todo_text_color = data.content;

						media_body.children('p.todo-comment-head').html(todo_comment_head);
						media_body.children('div.todo-text-color').html(todo_text_color);

						MomentManager.init();
						Metronic.init();

					},
					error: function(xhr) {
						console.log(xhr);
					}
				});

			}

			var updateSummernoteTextarea = function(el){

				var textarea = $($($(el.parents('div.note-editor')).siblings('textarea.summernote'))[0]);
				// console.log(el.html());
				// console.log(el.text());
				// console.log($.parseHTML(el.html()));
				textarea.html(el.html());

			}

			return {

				init: function (){

					$('.discussions').on('click', '.comment-reply-btn', function(event) {
						event.preventDefault();
						discussionsReply($(this));
						/* Act on the event */
					});

					$('.discussions').on('click', '.comment-like-btn', function(event) {
						event.preventDefault();
						discussionsLike($(this));
						/* Act on the event */
					});

					$('.discussions').on('click', '.comment-delete-btn', function(event) {
						event.preventDefault();
						discussionsDelete($(this));
						/* Act on the event */
					});

					$('.discussions').on('click', '.comment-edit-btn', function(event) {
						event.preventDefault();
						discussionsEdit($(this));
						/* Act on the event */
					});

					$('.discussions').on('click', '.comment-ban-btn', function(event) {
						event.preventDefault();
						discussionsBan($(this));
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

					$('.discussions').on('click', '.comment-reply-put-btn', function(event) {
						event.preventDefault();
						discussionsReplyPutSubmit($(this));
						/* Act on the event */
					});

					$('.discussions').on('click', '.comment-put-btn', function(event) {
						event.preventDefault();
						discussionsPutSubmit($(this));
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
		MomentManager.init();

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->main_picture }}" class="img-responsive" alt="">');

	</script>