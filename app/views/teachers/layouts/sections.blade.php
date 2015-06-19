@extends ('layouts.master')

@section('css')

	@yield('content_css')

@stop

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

	<div class="row profile">

		<div class="col-md-12">
			<!-- BEGIN PROFILE SIDEBAR -->
			<div class="profile-sidebar col-md-2" >
				<!-- PORTLET MAIN -->
				<div class="portlet light profile-sidebar-portlet">
					<!-- SIDEBAR USERPIC -->
					<div id="course-main-image" class="profile-userpic">
						<img src="{{ $course->main_picture }}" class="img-responsive" alt="">
					</div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle">
						<div id="course-title" class="profile-usertitle-name">
							 {{ $course->title }}
						</div>
						<div id="course-teacher-name" class="profile-usertitle-job">
							 {{ $course->teacher->display_name }}
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						
						<!-- <a href="javascript:;" type="button" class="btn btn-large green-haze btn-sm follow-btn {{ ($course->id == Auth::user()->id ) ? 'hidden' : '' }}"><i class="fa fa-thumbs-o-up"></i> Seguir</a>
						<a href="javascript:;" type="button" class="btn btn-large btn-danger btn-sm unfollow-btn {{ (!$course->id == Auth::user()->id ) ? 'hidden' : '' }}"><i class="fa fa-thumbs-o-down"></i> Dejar de Seguir</a> -->

					</div>
					<div class="profile-userbuttons">
						
						<!-- <a href="javascript:;" type="button" class="btn btn-danger btn-sm block-btn"><i class="fa fa-ban"></i> Bloquear</a> 
						<a href="/messages?a=compose&profile={{ Crypt::encrypt($course->id) }}" type="button" class="btn green-haze btn-sm message-btn"><i class="fa fa-envelope-o"></i> Mensaje</a>  -->

					</div>
					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->
					<div class="profile-usermenu">
						<ul class="nav">
							@if(true)
								<li id="general-section" class="{{ $section == 'show' ? 'active' : '' }}">
									<a href="javascript:;" class="general-btn">
									<i class="icon-home"></i>
									General </a>
								</li>
							@endif
							@if(true)
								<li id="lessons-section" class="{{ $section == 'lessons' ? 'active' : '' }}">
									<a href="javascript:;" class="lessons-btn">
									<i class="icon-notebook"></i>
									Lecciones </a>
								</li>
							@endif
							@if(true)
								<li id="students-section" class="{{ $section == 'students' ? 'active' : '' }}">
									<a href="javascript:;" class="students-btn">
									<i class="icon-graduation"></i>
									Estudiantes </a>
								</li>
							@endif
							@if(true)
								<li id="discussions-section" class="{{ $section == 'discussions' ? 'active' : '' }}">
									<a href="javascript:;" class="discussions-btn">
									<i class="icon-bubbles"></i>
									Discusiones </a>
								</li>
							@endif
							@if(true)
								<li id="contributors-section" class="{{ $section == 'contributing' ? 'active' : '' }}">
									<a href="javascript:;" class="contributors-btn">
									<i class="icon-eyeglasses"></i>
									Contribuidores </a>
								</li>
							@endif
							@if(true)
								<li id="achievements-section" class="{{ $section == 'achievements' ? 'active' : '' }}">
									<a href="javascript:;" class="achievements-btn">
									<i class="icon-badge"></i>
									Premiaciones </a>
								</li>
							@endif
							@if(true)
								<li id="statistics-section" class="{{ $section == 'statistics' ? 'active' : '' }}">
									<a href="javascript:;" class="statistics-btn">
									<i class="icon-graph"></i>
									Estadísticas </a>
								</li>
							@endif
							@if(true)
								<li id="inscriptions-section" class="{{ $section == 'inscriptions' ? 'active' : '' }}">
									<a href="javascript:;" class="inscriptions-btn">
									<i class="icon-user-following"></i>
									Inscripciones </a>
								</li>
							@endif
							@if(true)
								<li id="questions-section" class="{{ $section == 'questions' ? 'active' : '' }}">
									<a href="javascript:;" class="questions-btn">
									<i class="icon-question"></i>
									Preguntas </a>
								</li>
							@endif
							@if(true)
								<li id="activities-section" class="{{ $section == 'activities' ? 'active' : '' }}">
									<a href="javascript:;" class="activities-btn">
									<i class="icon-chemistry"></i>
									Actividades </a>
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
			
				@yield('course_content')

			</div>
			<!-- END PROFILE CONTENT -->
		</div>

	</div>

	<!-- END PAGE CONTENT INNER -->

	

@stop

@section('javascripts')

	@yield('content_javascripts')
	
	<!-- END PAGE LEVEL SCRIPTS -->
	<script type="text/javascript">

		var Wall = function () {

		    var content = $('.profile-content');
		    var loading = $('.profile-loading');
		    var loader = '<div class="portlet light"><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row"><div class="col-md-5 col-sm-5 col-xs-5">&nbsp;</div><img class="col-md-2 col-sm-2 col-xs-2" src="/assets/loaders/rubiks-cube.gif"/><div class="col-md-5 col-sm-5 col-xs-5">&nbsp;</div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div></div>';
		    var listListing = '';

		    var initWall = function (el, name) {

		        var url = '{{$route}}/{{$hashid}}/' + name;

		        console.log(el);
		        // toggleButton(el);

		        $.ajax({
		            type: "POST",
		            cache: false,
		            url: url,
		            dataType: "html",
		            success: function(res) 
		            {
		            	console.log(name);
		                $('.profile-usermenu li').removeClass('active');
		                el.parents('li').addClass('active');	

		                loading.hide();
		                content.html(res);
		                if (Layout.fixContentHeight) {
		                    Layout.fixContentHeight();
		                }
		                Metronic.init();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                // toggleButton(el);
		            },
		            async: true
		        });

		    }

		    var loadWall = function (el, name) {

		        var url = '{{$route}}/{{$hashid}}/' + name;

		        console.log(el);

		        loading.show();
		        content.html(loader);
		        // toggleButton(el);

		        $.ajax({
		            type: "POST",
		            cache: false,
		            url: url,
		            dataType: "html",
		            success: function(res) 
		            {
		            	console.log(name);
		                $('.profile-usermenu li').removeClass('active');
		                el.parents('li').addClass('active');	

		                loading.hide();
		                content.html(res);
		                if (Layout.fixContentHeight) {
		                    Layout.fixContentHeight();
		                }
		                Metronic.init();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                // toggleButton(el);
		            },
		            async: true
		        });

		    }

		    var backWall = function (el, name) {

		        var url = '{{$route}}/{{$hashid}}/' + name;

		        console.log(el);

		        loading.show();
		        content.html(loader);
		        // toggleButton(el);

		        $.ajax({
		            type: "POST",
		            cache: false,
		            url: url,
		            dataType: "html",
		            success: function(res) 
		            {	

		                loading.hide();
		                content.html(res);
		                if (Layout.fixContentHeight) {
		                    Layout.fixContentHeight();
		                }
		                Metronic.init();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                // toggleButton(el);
		            },
		            async: true
		        });

		    }

		    var loadCompose = function (el) {

		        var url = '{{$route}}/compose';

		        // loading.show();
		        content.html(loader);

		        // load the form via ajax
		        $.ajax({
		            type: "POST",
		            cache: false,
		            url: url,
		            dataType: "html",
		            success: function(res) 
		            {
		                toggleButton(el);

		                $('.profile-nav > li.active').removeClass('active');
		                $('.profile-header > h1').text('Escribir');

		                content.html(res);

		                initFileupload();
		                initWysihtml5();

		                $('.profile-wysihtml5').focus();
		                Layout.fixContentHeight();
		                Metronic.initUniform();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		            	console.log(xhr);
		            },
		            async: true
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

		    var loadPaginate = function (el) {

		        var url = '{{$route}}/' + el.data('section');

		        console.log(el);

		        loading.show();
		        content.html(loader);
		        // toggleButton(el);

		        $.ajax({
		            type: "POST",
		            cache: false,
		            url: url,
		            data: {
		            	page: el.data('page')
		            },
		            dataType: "html",
		            success: function(res) 
		            {
		            	console.log(name);
		                $('.profile-usermenu li').removeClass('active');
		                el.parents('li').addClass('active');	

		                loading.hide();
		                content.html(res);
		                if (Layout.fixContentHeight) {
		                    Layout.fixContentHeight();
		                }
		                Metronic.init();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                // toggleButton(el);
		            },
		            async: true
		        });

		    }

		    var submitCourseForm = function (el){

		        content.html(loader);
		    	
		    	var formData = new FormData(el[0]);

			    $.ajax({
			        url: '{{ $route }}/show/{{ $hashid }}',
			        type: 'POST',
			        data: formData,
			        async: true,
			        success: function (data) {
			        	content.html(data);
			            console.log(data);
			        },
			        cache: false,
			        contentType: false,
			        processData: false
			    });

			    return false;

		    }

		    var handleCCInput = function () {

		        var the = $('.profile-compose .mail-to .profile-cc');
		        var input = $('.profile-compose .input-cc');
		        the.hide();
		        input.show();
		        $('.close', input).click(function () {
		            input.hide();
		            the.show();
		        });

		    }

		    var handleBCCInput = function () {

		        var the = $('.profile-compose .mail-to .profile-bcc');
		        var input = $('.profile-compose .input-bcc');
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

		    /* Ajax Forms */

		    var submitAjaxForm = function(el) {

		        content.html(loader);

		        var url = el.data('url');
		        var method = el.attr('method');

		        console.log(url);
		    	
		    	var formData = new FormData(el[0]);

			    $.ajax({
			        url: url,
			        type: method,
			        data: formData,
			        async: true,
			        success: function (html) {
			        	content.html(html);
			        	console.log(html);
		                Metronic.init();
			            console.log('Ajax Form Sent!');
			        },
			        error: function(xhr) {
			        	console.log(xhr);
			        },
			        cache: false,
			        contentType: false,
			        processData: false
			    });

			    return false;

		    }

		    /* Lessons Function */

		    var lessonsModuleAdd = function(el) {

		    	var course = el.parents('.timeline').data('course');

		    	if( typeof course == 'undefined') course = el.data('course');

		        console.log(el);

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/' + course + '/lessons/addmodule',
		    		type: 'GET',
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Add module Form');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsModuleEdit = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var module = el.parents('.timeline-green-meadow').data('module');

		        console.log(el);

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/' + course + '/lessons/editmodule',
		    		type: 'GET',
		    		data: {
		    			module_id: module,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Edit module Form');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsModuleDelete = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var module = el.parents('.timeline-green-meadow').data('module');

		        console.log(el);

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/' + course + '/lessons/deletemodule',
		    		type: 'GET',
		    		data: {
		    			module_id: module,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Delete module Form');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsModuleOrder = function(el) {

		    	var course = el.data('course');

		        console.log(el);

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/' + course + '/lessons/ordermodules',
		    		type: 'GET',
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Order modules Form');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsLessonAdd = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var module = el.parents('.timeline-green-meadow').data('module');

		    	if( typeof module == 'undefined') module = el.parents('.timeline-transparent').data('module');

		        console.log(el);

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/' + course + '/lessons/addlesson',
		    		type: 'GET',
		    		data: {
		    			module_id: module
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Add lesson Form');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsLessonEdit = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var lesson = el.parents('.timeline-blue-steel').data('lesson');

		    	if( typeof lesson == 'undefined') lesson = el.parents('.timeline-grey-silver').data('lesson');

		        console.log(lesson);

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/' + course + '/lessons/editlesson',
		    		type: 'GET',
		    		data: {
		    			lesson_id: lesson,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Edit lesson Form');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsLessonDelete = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var lesson = el.parents('.timeline-blue-steel').data('lesson');

		    	if( typeof lesson == 'undefined') lesson = el.parents('.timeline-grey-silver').data('lesson');

		        console.log(lesson);

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/' + course + '/lessons/deletelesson',
		    		type: 'GET',
		    		data: {
		    			lesson_id: lesson,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Delete lesson Form');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsLessonOrder = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var module = el.parents('.timeline-green-meadow').data('module');

		        console.log(el);

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/' + course + '/lessons/orderlessons',
		    		type: 'GET',
		    		data: {
		    			module_id: module,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Order lessons Form');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsLessonStatus = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var lesson = el.parents('.timeline-blue-steel').data('lesson');

		    	if( typeof lesson == 'undefined') lesson = el.parents('.timeline-grey-silver').data('lesson');

		        console.log(lesson);

		        /*loading.show();
		        content.html(loader);*/

		    	el.removeClass('blue-steel');
		    	el.removeClass('grey-silver');	
		        el.html('<img src="/assets/loaders/rubiks-cube.gif" class="col-md-12"/>');

		    	$.ajax({
		    		url: '{{$route}}/' + course + '/lessons/statuslesson',
		    		type: 'POST',
		    		data: {
		    			lesson_id: lesson,
		    		},
		    		async: true,
		    		success: function(res) {

		    			el.html('<i class="fa fa-power-off"></i>');

		    			if(res.status == 'active'){
		    				console.log('active');
		    				var parent = $(el.parents('.timeline-grey-silver'));
		    				el.addClass('grey-silver');
		    				el.attr('data-original-title', 'Desactivar esta Lección');
		    				parent.removeClass('timeline-grey-silver');
		    				parent.addClass('timeline-blue-steel');
		    			}
		    			else{
		    				console.log('inactive');
		    				var parent = $(el.parents('.timeline-blue-steel'));
		    				el.addClass('blue-steel');
		    				el.attr('data-original-title', 'Activar esta Lección');
		    				parent.removeClass('timeline-blue-steel');
		    				parent.addClass('timeline-grey-silver');
		    			}

				        /*loading.hide();
				        content.html(html);
		                Metronic.init();*/
		    			console.log(res);
		    			console.log('Status lesson Form');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsLessonAttachments = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var lesson = el.parents('.timeline-blue-steel').data('lesson');

		    	if( typeof lesson == 'undefined') lesson = el.parents('.timeline-grey-silver').data('lesson');

		        console.log(lesson);

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/' + course + '/lessons/attachments',
		    		type: 'GET',
		    		data: {
		    			lesson_id: lesson,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Upload Attachments Form');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsLessonActivities = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var lesson = el.parents('.timeline-blue-steel').data('lesson');

		    	if( typeof lesson == 'undefined') lesson = el.parents('.timeline-grey-silver').data('lesson');

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/' + course + '/lessons/activities',
		    		type: 'GET',
		    		data: {
		    			lesson_id: lesson,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Activities List');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsLessonActivitiesAdd = function(el) {

		    	var course = el.data('course');
		    	var lesson = el.data('lesson');

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/' + course + '/lessons/addactivity',
		    		type: 'GET',
		    		data: {
		    			lesson_id: lesson,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Activities List');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    return {
		        //main function to initiate the module
		        init: function () {

		        	console.log('init');

		        	$('.profile').on('submit', '#course-form', function (e) {
		        		/* Act on the event */
		        		e.preventDefault();
		        		submitCourseForm($(this));

					});

		        	$('.profile').on('submit', '.ajax-form', function (e) {
		        		/* Act on the event */
		        		e.preventDefault();
		        		submitAjaxForm($(this));

					});

		            // handle compose btn click
		            /*$('.profile').on('click', '.message-btn', function () {
		            	console.log('click');
		                loadCompose($(this));
		            });*/

		            // handle reply and forward button click
		            $('.profile').on('click', '.follow-btn', function (e) {
		            	e.preventDefault();
		                follow($(this));
		            });

		            // handle forward and forward button click
		            $('.profile').on('click', '.unfollow-btn', function (e) {
		            	e.preventDefault();
		                unfollow($(this));
		            });

		            // handle spam and forward button click
		            $('.profile').on('click', '.general-btn', function (e) {
		            	e.preventDefault();
		                loadWall($(this), 'general');
		            });

		            // handle spam and forward button click
		            $('.profile').on('click', '.general-back-btn', function (e) {
		            	e.preventDefault();
		                backWall($(this), 'general');
		            });

		            // handle sned and forward button click
		            $('.profile').on('click', '.lessons-btn', function (e) {
		            	e.preventDefault();
		                loadWall($(this), 'lessons');
		            });

		            // handle sned and forward button click
		            $('.profile').on('click', '.lessons-back-btn', function (e) {
		            	e.preventDefault();
		                backWall($(this), 'lessons');
		            });

		            // handle discard and forward button click
		            $('.profile').on('click', '.students-btn', function (e) {
		            	e.preventDefault();
		                loadWall($(this),'students');
		            });

		            // handle discard and forward button click
		            $('.profile').on('click', '.students-back-btn', function (e) {
		            	e.preventDefault();
		                backWall($(this),'students');
		            });

		            // handle draft and forward button click
		            $('.profile').on('click', '.contributors-btn', function (e) {
		            	e.preventDefault();
		                loadWall($(this), 'contributors');
		            });

		            // handle draft and forward button click
		            $('.profile').on('click', '.contributors-back-btn', function (e) {
		            	e.preventDefault();
		                backWall($(this), 'contributors');
		            });

		            // handle discussions and forward button click
		            $('.profile').on('click', '.discussions-btn', function (e) {
		                loadWall($(this), 'discussions');
		            });

		            // handle discussions and forward button click
		            $('.profile').on('click', '.discussions-back-btn', function (e) {
		                backWall($(this), 'discussions');
		            });

		            // handleachievements button click
		            $('.profile').on('click', '.achievements-btn', function (e) {
		                loadWall($(this), 'achievements');
		            });

		            // handleachievements button click
		            $('.profile').on('click', '.achievements-back-btn', function (e) {
		                backWall($(this), 'achievements');
		            });

		            // handle statistics button click
		            $('.profile').on('click', '.statistics-btn', function (e) {
		                loadWall($(this), 'statistics');
		            });

		            // handle statistics button click
		            $('.profile').on('click', '.statistics-back-btn', function (e) {
		                backWall($(this), 'statistics');
		            });

		            // handle followers button click
		            $('.profile').on('click', '.followers-btn', function (e) {
		                loadWall($(this), 'followers');
		            });

		            // handle following button click
		            $('.profile').on('click', '.following-btn', function (e) {
		                loadWall($(this), 'following');
		            });

		            // handle following button click
		            $('.profile').on('click', '.paginate-btn', function (e) {
		                loadPaginate($(this));
		            });

		            /* Lessons Events */

		            // handle add module button click
		            $('.profile').on('click', '.module-add', function (e) {
		                lessonsModuleAdd($(this));
		            });

		            // handle edit module button click
		            $('.profile').on('click', '.module-edit', function (e) {
		                lessonsModuleEdit($(this));
		            });

		            // handle delete module button click
		            $('.profile').on('click', '.module-delete', function (e) {
		                lessonsModuleDelete($(this));
		            });

		            // handle order module button click
		            $('.profile').on('click', '.module-order', function (e) {
		                lessonsModuleOrder($(this));
		            });

		            // handle add lesson button click
		            $('.profile').on('click', '.lesson-add', function (e) {
		                lessonsLessonAdd($(this));
		            });

		            // handle edit lesson button click
		            $('.profile').on('click', '.lesson-edit', function (e) {
		                lessonsLessonEdit($(this));
		            });

		            // handle delete lesson button click
		            $('.profile').on('click', '.lesson-delete', function (e) {
		                lessonsLessonDelete($(this));
		            });

		            // handle order lesson button click
		            $('.profile').on('click', '.lesson-order', function (e) {
		                lessonsLessonOrder($(this));
		            });

		            // handle order lesson button click
		            $('.profile').on('click', '.lesson-status', function (e) {
		                lessonsLessonStatus($(this));
		            });

		            // handle order lesson button click
		            $('.profile').on('click', '.lesson-attachments', function (e) {
		                lessonsLessonAttachments($(this));
		            });

		            // handle order lesson button click
		            $('.profile').on('click', '.lesson-activities', function (e) {
		                lessonsLessonActivities($(this));
		            });

		            // handle order lesson button click
		            $('.profile').on('click', '.lesson-activities-add', function (e) {
		                lessonsLessonActivitiesAdd($(this));
		            });

		            //handle loading content based on URL parameter
		            if (Metronic.getURLParameter("a") === "view") {
		                viewMessage();
		            } else if (Metronic.getURLParameter("section") === "lessons") {
		        		initWall($('.lessons-btn'), 'lessons');
		            } else {
		        		initWall($('.general-btn'), 'general');
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
