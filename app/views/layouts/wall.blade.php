@extends ('layouts.master')

@section('toolbar')
	
	<div class="page-toolbar">
		<!-- BEGIN THEME PANEL -->
		<div class="btn-group btn-theme-panel">
			@if(Auth::user()->hasCap('security_user_get_create'))
				<a href="/{{ Auth::user()->username }}" class="btn tooltips" data-toggle="Ir a mi perfil" data-container="body" data-placement="left" data-html="true"  data-original-title="Ir a mi perfil"><i class="icon-arrow-right"></i></a>
			@endif
		</div>
		<!-- END THEME PANEL -->
	</div>

@stop

@section ("content")

	<div class="row">

		<div class="col-md-12">
			<!-- BEGIN PROFILE SIDEBAR -->
			<div class="profile-sidebar col-md-2" >
				<!-- PORTLET MAIN -->
				<div class="portlet light profile-sidebar-portlet">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						<img src="{{ $profile->getAvatar() }}" class="img-responsive" alt="">
					</div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							 {{ $user->display_name }}
						</div>
						<div class="profile-usertitle-job">
							 {{ $user->role->title }}
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						
						<a href="{{ $route }}/follow" type="button" class="btn btn-large green-haze btn-sm follow-btn {{ ($hasMyFollow OR $user->id == Auth::user()->id ) ? 'hidden' : '' }}"><i class="fa fa-thumbs-o-up"></i> Seguir</a>
						<a href="{{ $route }}/unfollow" type="button" class="btn btn-large btn-danger btn-sm unfollow-btn {{ (!$hasMyFollow OR $user->id == Auth::user()->id ) ? 'hidden' : '' }}"><i class="fa fa-thumbs-o-down"></i> Dejar de Seguir</a>
						<!-- <a href="{{ $route }}/follow" type="button" class="btn green-haze btn-sm follow-btn"><i class="fa fa-thumbs-o-up"></i> Seguir</a>
						<a href="{{ $route }}/unfollow" type="button" class="btn btn-danger btn-sm unfollow-btn"><i class="fa fa-thumbs-o-down"></i> Dejar de Seguir</a>  -->

					</div>
					<div class="profile-userbuttons">
						
						<!-- <a href="{{ $route }}/follow" type="button" class="btn btn-circle green-haze btn-sm follow-btn {{ ($hasMyFollow OR $user->id == Auth::user()->id ) ? 'hidden' : '' }}">Seguir</a>
						<a href="{{ $route }}/unfollow" type="button" class="btn btn-circle btn-danger btn-sm unfollow-btn {{ (!$hasMyFollow OR $user->id == Auth::user()->id ) ? 'hidden' : '' }}">Dejar de Seguir</a> -->
						
						<a href="{{ $route }}/block" type="button" class="btn btn-danger btn-sm block-btn"><i class="fa fa-ban"></i> Bloquear</a> 
						<a href="{{ $route }}/message" type="button" class="btn green-haze btn-sm message-btn"><i class="fa fa-envelope-o"></i> Mensaje</a> 

					</div>
					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->
					<div class="profile-usermenu">
						<ul class="nav">
							@if(UserProfile::hasSection('index', $role))
								<li class="{{ $section == 'index' ? 'active' : '' }}">
									<a href="{{ $route }}" class="index-btn">
									<i class="icon-home"></i>
									General </a>
								</li>
							@endif
							@if(UserProfile::hasSection('learning', $role))
								<li class="{{ $section == 'learning' ? 'active' : '' }}">
									<a href="{{ $route }}/learning" class="learning-btn">
									<i class="icon-graduation"></i>
									Aprendiendo </a>
								</li>
							@endif
							@if(UserProfile::hasSection('teaching', $role))
								<li class="{{ $section == 'teaching' ? 'active' : '' }}">
									<a href="{{ $route }}/teaching" class="teaching-btn">
									<i class="icon-notebook"></i>
									Enseñando </a>
								</li>
							@endif
							@if(UserProfile::hasSection('contributing', $role))
								<li class="{{ $section == 'contributing' ? 'active' : '' }}">
									<a href="{{ $route }}/contributing" class="contributing-btn">
									<i class="icon-eyeglasses"></i>
									Contribuciones </a>
								</li>
							@endif
							@if(UserProfile::hasSection('discussions', $role))
								<li class="{{ $section == 'discussions' ? 'active' : '' }}">
									<a href="{{ $route }}/discussions" class="discussions-btn">
									<i class="icon-bubbles"></i>
									Discusiones </a>
								</li>
							@endif
							@if(UserProfile::hasSection('achievements', $role))
								<li class="{{ $section == 'achievements' ? 'active' : '' }}">
									<a href="{{ $route }}/achievements" class="achievements-btn">
									<i class="icon-badge"></i>
									Medallero </a>
								</li>
							@endif
							@if(UserProfile::hasSection('statistics', $role))
								<li class="{{ $section == 'statistics' ? 'active' : '' }}">
									<a href="{{ $route }}/statistics" class="statistics-btn">
									<i class="icon-graph"></i>
									Estadísticas </a>
								</li>
							@endif
							@if(UserProfile::hasSection('followers', $role))
								<li class="{{ $section == 'followers' ? 'active' : '' }}">
									<a href="{{ $route }}/followers" class="followers-btn">
									<i class="icon-user-following"></i>
									Seguidores </a>
								</li>
							@endif
							@if(UserProfile::hasSection('following', $role))
								<li class="{{ $section == 'following' ? 'active' : '' }}">
									<a href="{{ $route }}/following" class="following-btn">
									<i class="icon-user-follow"></i>
									Siguiendo </a>
								</li>
							@endif
							<!-- <li>
								<a href="extra_profile_account.html">
								<i class="icon-settings"></i>
								Account Settings </a>
							</li>
							<li>
								<a href="page_todo.html" target="_blank">
								<i class="icon-check"></i>
								Tasks </a>
							</li>
							<li>
								<a href="extra_profile_help.html">
								<i class="icon-info"></i>
								Help </a>
							</li> -->
						</ul>
					</div>
					<!-- END MENU -->
				</div>
				<!-- END PORTLET MAIN -->
				<!-- PORTLET MAIN -->
				<!-- END PORTLET MAIN -->
			</div>
			<!-- END BEGIN PROFILE SIDEBAR -->
			<!-- BEGIN PROFILE CONTENT -->
			<div class="profile-content">
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN PORTLET -->
			
						@yield('content_profile')

						<!-- END PORTLET -->
					</div>
				</div>
			</div>
			<!-- END PROFILE CONTENT -->
		</div>

	</div>

	<!-- END PAGE CONTENT INNER -->

@stop

@section('javascripts')
	
	<!-- END PAGE LEVEL SCRIPTS -->
	<script type="text/javascript">
		var Wall = function () {

		    var content = $('.inbox-content');
		    var loading = $('.inbox-loading');
		    var listListing = '';

		    var searchForm = function (el){

		    	console.log('submit');

		    	var url = '{{$route}}/search';

		        loading.show();
		        content.html('');
		        toggleButton(el);

		    	$.ajax({
		    		type: 'GET',
		    		cache: false,
		    		url: url,
		    		data: el.serialize(),
		    		dataType: 'html',
		    		success: function(res)
		    		{
						toggleButton(el);/*

		                $('.inbox-nav > li.active').removeClass('active');
		                if(name == 'outbox'){
		                	$('.inbox-nav > li.sent').addClass('active');		                	
		                }
		                $('#search-type').val(name);
		                $('.inbox-nav > li.' + name).addClass('active');
		                $('.inbox-header > h1').text(title);*/

		                loading.hide();
		                content.html(res);
		                if (Layout.fixContentHeight) {
		                    Layout.fixContentHeight();
		                }
		                Metronic.initUniform();
		    		},
		    	})

		    }

		    var loadWall = function (el, name) {
		        var url = '{{$route}}/' + name;
		        var title = $('.inbox-nav > li.' + name + ' a').attr('data-title');
		        listListing = name;

		        loading.show();
		        content.html('');
		        toggleButton(el);

		        $.ajax({
		            type: "GET",
		            cache: false,
		            url: url,
		            dataType: "html",
		            success: function(res) 
		            {
		                toggleButton(el);

		                $('.inbox-nav > li.active').removeClass('active');
		                if(name == 'outbox'){
		                	$('.inbox-nav > li.sent').addClass('active');		                	
		                }
		                $('#search-type').val(name);
		                $('.inbox-nav > li.' + name).addClass('active');
		                $('.inbox-header > h1').text(title);

		                loading.hide();
		                content.html(res);
		                if (Layout.fixContentHeight) {
		                    Layout.fixContentHeight();
		                }
		                Metronic.initUniform();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });

		        // handle group checkbox:
		        jQuery('body').on('change', '.mail-group-checkbox', function () {
		            var set = jQuery('.mail-checkbox');
		            var checked = jQuery(this).is(":checked");
		            jQuery(set).each(function () {
		                $(this).attr("checked", checked);
		            });
		            jQuery.uniform.update(set);
		        });
		    }

		    var paginateBox = function (el) {
		    	if($(el).attr('data-box') == 'q-inbox' || $(el).attr('data-box') == 'q-outbox' || $(el).attr('data-box') == 'q-draft' || $(el).attr('data-box') == 'q-trash'){
		        	var url = '{{$route}}/search?';		    		
		    	}
		    	else{
		        	var url = '{{$route}}/paginate?';		    		
		    	}
		        
		        listListing = name;

		        loading.show();
		        content.html('');
		        toggleButton(el);

		        $.ajax({
		            type: "GET",
		            cache: false,
		            url: url,
		            data: {
		            	page: $(el).attr('data-paginateid'),
		            	box: $(el).attr('data-box'),
		            	q: $('input[name=q]').val(),
		            	type: $('#search-type').val()
		            },
		            dataType: "html",
		            success: function(res) 
		            {
		                loading.hide();
		                content.html(res);
		                if (Layout.fixContentHeight) {
		                    Layout.fixContentHeight();
		                }
		                Metronic.initUniform();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });

		        // handle group checkbox:
		        jQuery('body').on('change', '.mail-group-checkbox', function () {
		            var set = jQuery('.mail-checkbox');
		            var checked = jQuery(this).is(":checked");
		            jQuery(set).each(function () {
		                $(this).attr("checked", checked);
		            });
		            jQuery.uniform.update(set);
		        });
		    }

		    var viewMessage = function (el, name, resetMenu) {
		        var url = '{{$route}}/view';

		        loading.show();
		        content.html('');
		        toggleButton(el);

		        var message_id = el.parent('tr').attr("data-messageid");  
		        
		        $.ajax({
		            type: "GET",
		            cache: false,
		            url: url,
		            dataType: "html",
		            data: {'message_id': message_id},
		            success: function(res) 
		            {
		                toggleButton(el);

		                if (resetMenu) {
		                    $('.inbox-nav > li.active').removeClass('active');
		                }
		                $('.inbox-header > h1').text('Ver Mensaje');

		                loading.hide();
		                content.html(res);
		                Layout.fixContentHeight();
		                Metronic.initUniform();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });
		    }

		    var reviewMessage = function (el, name, resetMenu) {
		        var url = '{{$route}}/review';

		        loading.show();
		        content.html('');
		        toggleButton(el);

		        var message_id = el.parent('tr').attr("data-messageid");  
		        
		        $.ajax({
		            type: "GET",
		            cache: false,
		            url: url,
		            dataType: "html",
		            data: {'message_id': message_id},
		            success: function(res) 
		            {
		                toggleButton(el);

		                if (resetMenu) {
		                    $('.inbox-nav > li.active').removeClass('active');
		                }
		                $('.inbox-header > h1').text('Ver Mensaje');

		                loading.hide();
		                content.html(res);
		                Layout.fixContentHeight();
		                Metronic.initUniform();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });
		    }

		    var recomposeMessage = function (el, name, resetMenu) {
		        var url = '{{$route}}/recompose';

		        loading.show();
		        content.html('');
		        toggleButton(el);

		        var message_id = el.parent('tr').attr("data-messageid");  
		        
		        $.ajax({
		            type: "GET",
		            cache: false,
		            url: url,
		            dataType: "html",
		            data: {'message_id': message_id},
		            success: function(res) 
		            {
		                toggleButton(el);

		                if (resetMenu) {
		                    $('.inbox-nav > li.active').removeClass('active');
		                }
		                $('.inbox-header > h1').text('Ver Mensaje');

		                loading.hide();
		                content.html(res);
		                Layout.fixContentHeight();
		                Metronic.initUniform();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });
		    }

		    var downloadAll = function (el) {
		        var message_id = el.attr("data-messageid"); 
		        var url = '{{$route}}/downloadall/'+message_id;

		        // loading.show();
		        // content.html('');
		        // toggleButton(el);

		        // console.log(message_id);
		        
		        $.ajax({
		            type: "GET",
		            cache: false,
		            url: url,
		            // dataType: "html",
		            // data: {'message_id': message_id},
		            success: function(res) 
		            {
		            	window.open(res.destination);
		                // console.log(res);
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });
		    }

		    var downloadFile = function (el) {
		        var attachment_id = el.attr("data-attachmentid"); 
		        var url = '{{$route}}/download/'+attachment_id;
		        // loading.show();
		        // content.html('');
		        // toggleButton(el);

		        // console.log(attachment_id);
		        
		        $.ajax({
		            type: "GET",
		            cache: false,
		            url: url,
		            // dataType: "html",
		            // data: {'message_id': message_id},
		            success: function(res) 
		            {
		            	window.open(res.destination);
		                // console.log(res);
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });
		    }

		    var initWysihtml5 = function () {
		        $('.inbox-wysihtml5').wysihtml5({
		            "stylesheets": ["/assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
		        });
		    }

		    var initFileupload = function () {

		        /*$('#compose-mail').fileupload({
		            // Uncomment the following to send cross-domain cookies:
		            //xhrFields: {withCredentials: true},
					formData: {
						_id: 0,
					},
		            url: '{{$route}}/upload',
		            // url: '/uploads/messages/index.php',
		            // url: '/assets/global/plugins/jquery-file-upload/server/php/',
		            autoUpload: true,
		            success: function(data){
		            	console.log(data);
		            }
		        });

		        // Upload server status check for browsers with CORS support:
		        if ($.support.cors) {
		            $.ajax({
		                url: '{{$route}}/upload',
		                type: 'HEAD'
		            }).fail(function () {
		                $('<span class="alert alert-error"/>')
		                    .text('Subida al servidor temporalmente no disponible - ' +
		                    new Date())
		                    .appendTo('#compose-mail');
		            });
		        }*/

		    }

		    var loadCompose = function (el) {
		        var url = '{{$route}}/compose';

		        loading.show();
		        content.html('');
		        toggleButton(el);

		        // load the form via ajax
		        $.ajax({
		            type: "GET",
		            cache: false,
		            url: url,
		            dataType: "html",
		            success: function(res) 
		            {
		                toggleButton(el);

		                $('.inbox-nav > li.active').removeClass('active');
		                $('.inbox-header > h1').text('Escribir');

		                loading.hide();
		                content.html(res);

		                initFileupload();
		                initWysihtml5();

		                $('.inbox-wysihtml5').focus();
		                Layout.fixContentHeight();
		                Metronic.initUniform();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });
		    }

		    var loadReply = function (el) {
		        var messageid = $(el).attr("data-messageid");
		        var url = '{{$route}}/reply?message_id=' + messageid;
		        
		        loading.show();
		        content.html('');
		        toggleButton(el);

		        // load the form via ajax
		        $.ajax({
		            type: "GET",
		            cache: false,
		            url: url,
		            dataType: "html",
		            success: function(res) 
		            {
		                toggleButton(el);

		                $('.inbox-nav > li.active').removeClass('active');
		                $('.inbox-header > h1').text('Responder');

		                loading.hide();
		                content.html(res);
		                $('[name="message"]').val($('#reply_email_content_body').html());

		                handleCCInput(); // init "CC" input field

		                initFileupload();
		                initWysihtml5();
		                Layout.fixContentHeight();
		                Metronic.initUniform();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });
		    }

		    var loadForward = function (el) {
		        var messageid = $(el).attr("data-messageid");
		        var url = '{{$route}}/forward?messageid=' + messageid;
		        
		        loading.show();
		        content.html('');
		        toggleButton(el);

		        // load the form via ajax
		        $.ajax({
		            type: "GET",
		            cache: false,
		            url: url,
		            dataType: "html",
		            success: function(res) 
		            {
		                toggleButton(el);

		                $('.inbox-nav > li.active').removeClass('active');
		                $('.inbox-header > h1').text('Reenviar');

		                loading.hide();
		                content.html(res);
		                $('[name="message"]').val($('#reply_email_content_body').html());

		                handleCCInput(); // init "CC" input field

		                initFileupload();
		                initWysihtml5();
		                Layout.fixContentHeight();
		                Metronic.initUniform();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });
		    }

		    var loadSpam = function(el) {

		    	//

		    }

		    var sendMail = function(el) {

		    	// 
		    	
		    }

		    var discardMail = function(el) {

		        var messageid = $(el).attr("data-messageid");
		    	var url = '{{$route}}/discard/' + messageid;

		    	$('input[name=action]').val('discard');

		    	/*console.log($('#compose-mail').serializeArray());
		    	console.log($('#compose-mail').serialize());*/

		    	$('textarea[name=message]').html($('.note-editable').html());

		    	var data = $('#compose-mail').serialize();

		        /*var data = {
		        	'token': $('input[name=token]').val(),
		        	'subject': $('input[name=subject]').val(),
		        	'to': $('select[name=to]').val(),
		        	'message': $('textarea[name=message]').val(),
		        }*/

		        loading.show();
		        content.html('');
		        toggleButton(el);

		        // console.log(data);

		        $.ajax({
		            type: "POST",
		            cache: false,
		            url: url,
		            data: data,
		            dataType: "html",
		            success: function(res) 
		            {
		            	$('.inbox-nav > li.active').removeClass('active');
		                $('.inbox-nav > li.inbox').addClass('active');
		                $('.inbox-header > h1').text('Bandeja de Entrada');

		                loading.hide();
		                content.html(res);
		                if (Layout.fixContentHeight) {
		                    Layout.fixContentHeight();
		                }
		                Metronic.initUniform();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });

		        // handle group checkbox:
		        jQuery('body').on('change', '.mail-group-checkbox', function () {
		            var set = jQuery('.mail-checkbox');
		            var checked = jQuery(this).is(":checked");
		            jQuery(set).each(function () {
		                $(this).attr("checked", checked);
		            });
		            jQuery.uniform.update(set);
		        });
		    	
		    }

		    var draftMail = function(el) {

		    	var messageid = $(el).attr("data-messageid");
		    	var url = '{{$route}}/draft/' + messageid;

		    	$('input[name=action]').val('draft');

		    	/*console.log($('#compose-mail').serializeArray());
		    	console.log($('#compose-mail').serialize());*/

		    	// console.log($('.note-editable').html());

		    	$('textarea[name=message]').html($('.note-editable').html());

		    	// var data = $('#compose-mail').serialize();

		        var data = {
		        	'token': $('#token').val(),
		        	'subject': $('#message-subject').val(),
		        	'to': $('#to-select').val(),
		        	'message': $('#message-content').html(),
		        };

		        loading.show();
		        content.html('');
		        toggleButton(el);

		        // console.log(data);

		        $.ajax({
		            type: "POST",
		            cache: false,
		            url: url,
		            data: data,
		            dataType: "html",
		            success: function(res) 
		            {

		                $('.inbox-nav > li.active').removeClass('active');
		                $('.inbox-nav > li.draft').addClass('active');
		                $('.inbox-header > h1').text('Borradores');

		                loading.hide();
		                content.html(res);
		                if (Layout.fixContentHeight) {
		                    Layout.fixContentHeight();
		                }
		                Metronic.initUniform();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });

		        // handle group checkbox:
		        jQuery('body').on('change', '.mail-group-checkbox', function () {
		            var set = jQuery('.mail-checkbox');
		            var checked = jQuery(this).is(":checked");
		            jQuery(set).each(function () {
		                $(this).attr("checked", checked);
		            });
		            jQuery.uniform.update(set);
		        });

		    }

		    var deleteMail = function(el) {

		    	// 

		    }

		    var cancelAttachment = function(el) {

		    	var attachmentid = $(el).attr("data-attachmentid");
		    	var url = '{{$route}}/cancel/' + attachmentid;

		    	$('input[name=action]').val('discard');

		    	/*console.log($('#compose-mail').serializeArray());
		    	console.log($('#compose-mail').serialize());*/

		    	$('textarea[name=message]').html($('.note-editable').html());

		    	// var data = $('#compose-mail').serialize();

		        /*var data = {
		        	'token': $('input[name=token]').val(),
		        	'subject': $('input[name=subject]').val(),
		        	'to': $('select[name=to]').val(),
		        	'message': $('textarea[name=message]').val(),
		        }*/

		        /*loading.show();
		        content.html('');
		        toggleButton(el);*/

		        // console.log(data);

		        $.ajax({
		            type: "POST",
		            cache: false,
		            url: url,
		            // data: data,
		            // dataType: "html",
		            success: function(res) 
		            {
		                /*loading.hide();
		                content.html(res);
		                if (Layout.fixContentHeight) {
		                    Layout.fixContentHeight();
		                }
		                Metronic.initUniform();*/
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                // toggleButton(el);
		            },
		            async: false
		        });

		        // handle group checkbox:
		        /*jQuery('body').on('change', '.mail-group-checkbox', function () {
		            var set = jQuery('.mail-checkbox');
		            var checked = jQuery(this).is(":checked");
		            jQuery(set).each(function () {
		                $(this).attr("checked", checked);
		            });
		            jQuery.uniform.update(set);
		        });*/

		    }

		    var favoriteMail = function(el) {

		    	var url = '{{$route}}/favorite';

		    	if($(el).attr("data-favorite") == 1){
		    		$(el).attr("data-favorite", 0);
    				$(el).html('<i class="fa fa-star inbox-not-started"></i>');
    			}
    			else{
		    		$(el).attr("data-favorite", 1);
    				$(el).html('<i class="fa fa-star inbox-started"></i>');
    			}

		    	$.ajax({
		    		url: url,
		    		type: 'POST',
		    		data: {
		    			message_id: $(el).attr("data-messageid"),
		    		},
		    		success: function(data){
		    			$(el).attr("data-favorite", data.favorite);
		    			console.log(data);
		    		}
		    	});

		    }

		    var markAsRead = function(el) {

		    	var messages = [];

		    	$('.ids:checked').each(function(){

		    		messages.push($(this).val());

		    	});

		    	$('.ids:checked').parents('tr').removeClass('unread');

		    	$.ajax({
		    		url: '{{ $route }}/markasread',
		    		type: 'GET',
		    		data: {messages: messages},
		    		success: function(data){
		    			console.log(data);
		    		}
		    	});

		    }

		    var markAsNoneRead = function(el) {

		    	var messages = [];

		    	$('.ids:checked').each(function(){

		    		messages.push($(this).val());

		    	});

		    	$('.ids:checked').parents('tr').addClass('unread');

		    	$.ajax({
		    		url: '{{ $route }}/markasnoneread',
		    		type: 'GET',
		    		data: {messages: messages},
		    		success: function(data){
		    			console.log(data);
		    		}
		    	});

		    }

		    var markAsSpam = function(el) {

		    	var messages = [];

		    	$('.ids:checked').each(function(){

		    		messages.push($(this).val());

		    	});

		    	$('.ids:checked').parents('tr').remove();

		    	$('#pagination-total').html(parseInt($('#pagination-total').html())-messages.length);

		    	$('#pagination-to').html(parseInt($('#pagination-to').html())-messages.length);

		    	$.ajax({
		    		url: '{{ $route }}/markasspam',
		    		type: 'GET',
		    		data: {messages: messages},
		    		success: function(data){
		    			console.log(data);
		    		}
		    	});

		    }

		    var markAsDeleted = function(el) {

		    	var messages = [];

		    	$('.ids:checked').each(function(){

		    		messages.push($(this).val());

		    	});

		    	$('.ids:checked').parents('tr').remove();

		    	$('#pagination-total').html(parseInt($('#pagination-total').html())-messages.length);

		    	$('#pagination-to').html(parseInt($('#pagination-to').html())-messages.length);

		    	$.ajax({
		    		url: '{{ $route }}/markasdeleted',
		    		type: 'GET',
		    		data: {messages: messages},
		    		success: function(data){
		    			console.log(data);
		    		}
		    	});

		    }

		    var markAsNoneDeleted = function(el) {

		    	var messages = [];

		    	$('.ids:checked').each(function(){

		    		messages.push($(this).val());

		    	});

		    	console.log(messages);

		    	$('.ids:checked').parents('tr').remove();

		    	$('#pagination-total').html(parseInt($('#pagination-total').html())-messages.length);

		    	$('#pagination-to').html(parseInt($('#pagination-to').html())-messages.length);

		    	$.ajax({
		    		url: '{{ $route }}/markasnonedeleted',
		    		type: 'GET',
		    		data: {messages: messages},
		    		success: function(data){
		    			console.log(data);
		    		}
		    	});

		    }

		    var markAsDiscard = function(el) {

		    	var messages = [];

		    	$('.ids:checked').each(function(){

		    		messages.push($(this).val());

		    	});

		    	console.log(messages);

		    	$('.ids:checked').parents('tr').remove();

		    	$('#pagination-total').html(parseInt($('#pagination-total').html())-messages.length);

		    	$('#pagination-to').html(parseInt($('#pagination-to').html())-messages.length);

		    	$.ajax({
		    		url: '{{ $route }}/markasdiscard',
		    		type: 'GET',
		    		data: {messages: messages},
		    		success: function(data){
		    			console.log(data);
		    		}
		    	});

		    }

		    var deleteFromBox = function(el) {

		    	var messages = [];

		    	$('.ids:checked').each(function(){

		    		messages.push($(this).val());

		    	});

		    	console.log(messages);

		    	$('.ids:checked').parents('tr').remove();

		    	$('#pagination-total').html(parseInt($('#pagination-total').html())-messages.length);

		    	$('#pagination-to').html(parseInt($('#pagination-to').html())-messages.length);

		    	$.ajax({
		    		url: '{{ $route }}/deletefrombox',
		    		type: 'GET',
		    		data: {messages: messages},
		    		success: function(data){
		    			console.log(data);
		    		}
		    	});

		    }

		    var loadSearchResults = function (el) {
		        var url = '{{$route}}/search';

		        loading.show();
		        content.html('');
		        toggleButton(el);

		        $.ajax({
		            type: "GET",
		            cache: false,
		            url: url,
		            dataType: "html",
		            success: function(res) 
		            {
		                toggleButton(el);

		                $('.inbox-nav > li.active').removeClass('active');
		                $('.inbox-header > h1').text('Búsqueda');

		                loading.hide();
		                content.html(res);
		                Layout.fixContentHeight();
		                Metronic.initUniform();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: false
		        });
		    }

		    var handleCCInput = function () {
		        var the = $('.inbox-compose .mail-to .inbox-cc');
		        var input = $('.inbox-compose .input-cc');
		        the.hide();
		        input.show();
		        $('.close', input).click(function () {
		            input.hide();
		            the.show();
		        });
		    }

		    var handleBCCInput = function () {

		        var the = $('.inbox-compose .mail-to .inbox-bcc');
		        var input = $('.inbox-compose .input-bcc');
		        the.hide();
		        input.show();
		        $('.close', input).click(function () {
		            input.hide();
		            the.show();
		        });
		    }

		    var toggleButton = function(el) {
		        if (typeof el == 'undefined') {
		            return;
		        }
		        if (el.attr("disabled")) {
		            el.attr("disabled", false);
		        } else {
		            el.attr("disabled", true);
		        }
		    }

		    return {
		        //main function to initiate the module
		        init: function () {

		        	$('.inbox').on('submit', '#search-form', function(event) {
		        		event.preventDefault();
		        		/* Act on the event */
		        		if($('#search-form input[name=q]').val() != '') searchForm($(this));
		        		return false;
		        	});

		        	/*$('.inbox').on('keyup', '#search-form input[name=q]', function(event) {
		        		
		        		console.log(event.keyCode);
		        		if(event.keyCode == 8 || (event.keyCode >= 32 && event.keyCode <=))
		        		searchForm($('#search-form'));
		        	});*/

		            // handle compose btn click
		            $('.inbox').on('click', '.compose-btn a', function () {
		                loadCompose($(this));
		            });

		            /*// handle discard btn
		            $('.inbox').on('click', '.inbox-discard-btn', function(e) {
		                e.preventDefault();
		            	console.log($('#compose-mail').attr('action'));
		                loadWall($(this), listListing);
		            });*/

		            // handle reply and forward button click
		            $('.inbox').on('click', '.reply-btn', function () {
		                loadReply($(this));
		            });

		            // handle forward and forward button click
		            $('.inbox').on('click', '.forward-btn', function () {
		                loadForward($(this));
		            });

		            // handle spam and forward button click
		            $('.inbox').on('click', '.spam-btn', function () {
		                loadSpam($(this));
		            });

		            // handle sned and forward button click
		            $('.inbox').on('click', '.sned-btn', function () {
		                sendMail($(this));
		            });

		            // handle discard and forward button click
		            $('.inbox').on('click', '.discard-btn', function (e) {
		            	e.preventDefault();
		                discardMail($(this));
		            });

		            // handle draft and forward button click
		            $('.inbox').on('click', '.draft-btn', function (e) {
		            	e.preventDefault();
		                draftMail($(this));
		            });

		            // handle delete and forward button click
		            $('.inbox').on('click', '.delete-btn', function () {
		                deleteMail($(this));
		            });

		            // handle mark as read and forward button click
		            $('.inbox').on('click', '.markasread-btn', function () {
		                markAsRead($(this));
		            });

		            // handle mark as read and forward button click
		            $('.inbox').on('click', '.markasnoneread-btn', function () {
		                markAsNoneRead($(this));
		            });

		            // handle mark as spam and forward button click
		            $('.inbox').on('click', '.markasspam-btn', function () {
		                markAsSpam($(this));
		            });

		            // handle mark as deleted and forward button click
		            $('.inbox').on('click', '.markasdeleted-btn', function () {
		                markAsDeleted($(this));
		            });

		            // handle mark as deleted and forward button click
		            $('.inbox').on('click', '.markasnonedeleted-btn', function () {
		                markAsNoneDeleted($(this));
		            });

		            // handle mark as deleted and forward button click
		            $('.inbox').on('click', '.markasdiscard-btn', function () {
		                markAsDiscard($(this));
		            });

		            // handle mark as deleted and forward button click
		            $('.inbox').on('click', '.deletefrombox-btn', function () {
		                deleteFromBox($(this));
		            });

		            // handle delete and forward button click
		            $('.inbox').on('click', '.cancel', function () {
		            	cancelAttachment($(this));
		            });

		            // handle favorite and forward button click
		            $('.inbox').on('click', '.favorite-btn', function () {
		                favoriteMail($(this));
		            });

		            // handle view message
		            $('.inbox-content').on('click', '.view-message', function () {
		                viewMessage($(this));
		            });

		            // handle review message
		            $('.inbox-content').on('click', '.review-message', function () {
		                reviewMessage($(this));
		            });

		            // handle recompose message
		            $('.inbox-content').on('click', '.recompose-message', function () {
		                recomposeMessage($(this));
		            });

		            // handle download-all attachments
		            $('.inbox-content').on('click', '.download-all-btn', function () {
		                downloadAll($(this));
		            });

		            // handle download-all attachments
		            $('.inbox-content').on('click', '.download-btn', function () {
		                downloadFile($(this));
		            });

		            // handle download-all attachments
		            $('.inbox-content').on('click', '.paginate-btn', function () {
		                paginateBox($(this));
		            });

		            // handle inbox listing
		            $('.inbox-nav > li.inbox > a').click(function () {
		                loadWall($(this), 'inbox');
		            });

		            // handle sent listing
		            $('.inbox-nav > li.sent > a').click(function () {
		                loadWall($(this), 'outbox');
		            });

		            // handle draft listing
		            $('.inbox-nav > li.draft > a').click(function () {
		                loadWall($(this), 'draft');
		            });

		            // handle trash listing
		            $('.inbox-nav > li.trash > a').click(function () {
		                loadWall($(this), 'trash');
		            });

		            //handle compose/reply cc input toggle
		            $('.inbox-content').on('click', '.mail-to .inbox-cc', function () {
		                handleCCInput();
		            });

		            //handle compose/reply bcc input toggle
		            $('.inbox-content').on('click', '.mail-to .inbox-bcc', function () {
		                handleBCCInput();
		            });

		            //handle loading content based on URL parameter
		            if (Metronic.getURLParameter("a") === "view") {
		                viewMessage();
		            } else if (Metronic.getURLParameter("a") === "compose") {
		                loadCompose();
		            } else {
		               $('.inbox-nav > li.inbox > a').click();
		            }

		        }

		    };

		}();
	</script>

	<script>
        jQuery(document).ready(function() {  
           	Metronic.init(); // init metronic core components
			Layout.init(); // init current layout
			Demo.init(); // init demo features
			Wall.init();
			moment.locale('es');
		 	jQuery('.timeago').each(function(e){
		 		jQuery(this).html(moment(jQuery(this).html()).fromNow());
		 	});
   			jQuery('.fancybox').fancybox();
   			
        });

	</script>

@stop
