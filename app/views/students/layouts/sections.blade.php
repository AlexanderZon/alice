@extends ('layouts.master')

@section('css')
	
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css"/>
	<!-- END PAGE LEVEL STYLES -->

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
				<div class="portlet light profile-sidebar-portlet" data-course="{{ Hashids::encode($course->id) }}">
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

						@if(Auth::user()->isStudent() AND !$course->iveAccepted())
							<div class="row students-postulation-container" data-course="{{ Hashids::encode($course->id) }}">
								@if($course->ivePostuled())
									<a class="btn green students-notpostulation-btn" href="javascript:;">
										Dejar de Postular <i class="fa fa-history"></i>
									</a>
									<!-- {{ $route }}/nopostular/{{ Hashids::encode($course->id) }} -->
								@else
									<a class="btn blue students-postulation-btn" href="javascript:;">
										Postularme <i class="fa fa-sign-in"></i>
									</a>
									<!-- {{ $route }}/postular/{{ Hashids::encode($course->id) }} -->
								@endif
							</div>
						@endif
						
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
							@if($course->iveAccepted())
								<li id="lessons-section" class="{{ $section == 'lessons' ? 'active' : '' }}">
									<a href="javascript:;" class="lessons-btn">
									<i class="icon-notebook"></i>
									Lecciones </a>
								</li>
								<li id="students-section" class="{{ $section == 'students' ? 'active' : '' }}">
									<a href="javascript:;" class="students-btn">
									<i class="icon-graduation"></i>
									Compañeros </a>
								</li>
								<li id="discussions-section" class="{{ $section == 'discussions' ? 'active' : '' }}">
									<a href="javascript:;" class="discussions-btn">
									<i class="icon-bubbles"></i>
									Discusiones </a>
								</li>
								<li id="contributors-section" class="{{ $section == 'contributing' ? 'active' : '' }}">
									<a href="javascript:;" class="contributors-btn">
									<i class="icon-eyeglasses"></i>
									Contribuidores </a>
								</li>
								<li id="achievements-section" class="{{ $section == 'achievements' ? 'active' : '' }}">
									<a href="javascript:;" class="achievements-btn">
									<i class="icon-badge"></i>
									Premios </a>
								</li>
								<li id="statistics-section" class="{{ $section == 'statistics' ? 'active' : '' }}">
									<a href="javascript:;" class="statistics-btn">
									<i class="icon-graph"></i>
									Estadísticas </a>
								</li>
								<li id="questions-section" class="{{ $section == 'questions' ? 'active' : '' }}">
									<a href="javascript:;" class="questions-btn">
									<i class="icon-question"></i>
									Preguntas </a>
								</li>
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
	
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- END PAGE LEVEL SCRIPTS -->
	<script type="text/javascript">

		var Wall = function () {

		    var content = $('.profile-content');
		    var loading = $('.profile-loading');
		    var loader = '<div class="portlet light"><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row"><div class="col-md-5 col-sm-5 col-xs-5">&nbsp;</div><img class="col-md-2 col-sm-2 col-xs-2" src="/assets/loaders/rubiks-cube.gif"/><div class="col-md-5 col-sm-5 col-xs-5">&nbsp;</div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div></div>';
		    var listListing = '';

		    var initWall = function (el, name) {

		        var url = '{{$route}}/' + name;
		        console.log(url);
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
		                console.log(xhr);
		            },
		            async: true
		        });

		    }

		    var initAction = function (el, name, section, data, method, callback) {

		        var url = '{{$route}}/' + name + '/' + section;

		        console.log(el);
		        // toggleButton(el);

		        $.ajax({
		            type: method,
		            cache: false,
		            url: url,
		            data: data,
		            dataType: "html",
		            success: function(res) 
		            {
		                $('.profile-usermenu li').removeClass('active');
		                el.parents('li').addClass('active');	

		                loading.hide();
		                content.html(res);
		                if (Layout.fixContentHeight) {
		                    Layout.fixContentHeight();
		                }
		                Metronic.init();
		                callback();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                console.log(xhr);
		            },
		            async: true,
		        });

		    }

		    var loadWall = function (el, name) {

		        var url = '{{$route}}/' + name;

		        console.log(el);
		        console.log(url);

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
		                console.log(xhr);
		            },
		            async: true
		        });

		    }

		    var backWall = function (el, name) {

		        var url = '{{$route}}/' + name;

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
		            	console.log(xhr);
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
			        url: '{{ $route }}/{{ $hashid }}/general/save',
			        type: 'POST',
			        data: formData,
			        async: true,
			        success: function (data) {
			        	content.html(data);
			            // console.log(data);
			        },
			        error: function(xhr){
			        	console.log(xhr);
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
			        	// console.log(html);
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
		    		url: '{{$route}}/lessons/addmodule',
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
		    		url: '{{$route}}/lessons/editmodule',
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
		    		url: '{{$route}}/lessons/deletemodule',
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
		    		url: '{{$route}}/lessons/ordermodules',
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

		    var lessonsLessonView = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var lesson = el.parents('.timeline-blue-steel').data('lesson');

		    	if( typeof lesson == 'undefined') lesson = el.parents('.timeline-grey-silver').data('lesson');

		        console.log(lesson);

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/lessons/viewlesson',
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
		    			console.log('View lesson');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    /*
		    var lessonsLessonAdd = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var module = el.parents('.timeline-green-meadow').data('module');

		    	if( typeof module == 'undefined') module = el.parents('.timeline-transparent').data('module');

		        console.log(el);

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/lessons/addlesson',
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
		    		url: '{{$route}}/lessons/editlesson',
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
		    		url: '{{$route}}/lessons/deletelesson',
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
		    		url: '{{$route}}/lessons/orderlessons',
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

		    	el.removeClass('blue-steel');
		    	el.removeClass('grey-silver');	
		        el.html('<img src="/assets/loaders/rubiks-cube.gif" class="col-md-12"/>');

		    	$.ajax({
		    		url: '{{$route}}/lessons/statuslesson',
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
		    			console.log(res);
		    			console.log('Status lesson Form');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    */

		    var lessonsLessonAttachments = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var lesson = el.parents('.timeline-blue-steel').data('lesson');

		    	if( typeof lesson == 'undefined') lesson = el.parents('.timeline-grey-silver').data('lesson');

		        console.log(lesson);

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/lessons/attachments',
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
		    		url: '{{$route}}/lessons/activities',
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
		    		url: '{{$route}}/lessons/addactivity',
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
		    			console.log('Activities Add');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsLessonActivitiesNew = function(el) {

		    	var course = el.parents('.portlet-body').data('course');
		    	var lesson = el.parents('.portlet-body').data('lesson');
		    	var type = el.data('type');

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/lessons/addactivity',
		    		type: 'POST',
		    		data: {
		    			lesson_id: lesson,
		    			type: type,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Activities New');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsLessonActivitiesEdit = function(el) {

		    	var course = el.parents('.portlet-body').data('course');
		    	var lesson = el.parents('.portlet-body').data('lesson');
		    	var activity = el.parents('.activity-block').data('activity');

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/lessons/editactivity',
		    		type: 'GET',
		    		data: {
		    			lesson_id: lesson,
		    			activity_id: activity,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Activities Edit');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsLessonActivitiesBack = function(el) {

		    	var course = el.data('course');
		    	var lesson = el.data('lesson');

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/lessons/activities',
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

		    var lessonsLessonComments = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var lesson = el.parents('.timeline-blue-steel').data('lesson');

		    	if( typeof lesson == 'undefined') lesson = el.parents('.timeline-grey-silver').data('lesson');

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/lessons/comments',
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
		    			console.log('Comments List');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var lessonsLessonStudents = function(el) {

		    	var course = el.parents('.timeline').data('course');
		    	var lesson = el.parents('.timeline-blue-steel').data('lesson');

		    	if( typeof lesson == 'undefined') lesson = el.parents('.timeline-grey-silver').data('lesson');

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/lessons/students',
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
		    			console.log('Students List');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var discussionsAdd = function(el){

		    	var course = el.parents('.portlet').data('course');

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/discussions/add',
		    		type: 'GET',
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Add Discussion');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var discussionsEdit = function(el){

		    	var course = el.parents('.discussions').data('course');
		    	var discussion = el.parents('.discussion-block').data('discussion');

		    	if( typeof discussion == 'undefined') discussion = el.parents('.top-news').data('discussion');
		    	if( typeof discussion == 'undefined') discussion = el.parents('.discussions').data('discussion');

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/discussions/edit',
		    		type: 'GET',
		    		data: {
		    			discussion_id: discussion,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Edit Discussion');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var discussionsDelete = function(el){

		    	var course = el.parents('.portlet').data('course');
		    	var discussion = el.parents('.portlet').data('discussion');

		    	// if( typeof discussion == 'undefined') discussion = el.parents('.portlet-grey-silver').data('discussion');

		        loading.show();
		        content.html(loader);

		    	$.ajax({
		    		url: '{{$route}}/discussions/delete',
		    		type: 'GET',
		    		data: {
		    			discussion_id: discussion,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Delete Discussion');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var discussionsComments = function(el){

		    	var course = el.parents('.portlet').data('course');
		    	var discussion = el.parents('.portlet').data('discussion');

		    	if( typeof discussion == 'undefined') discussion = el.parents('.discussion-block').data('discussion');

		        loading.show();
		        content.html(loader);
		        console.log(discussion);

		    	$.ajax({
		    		url: '{{$route}}/discussions/comments',
		    		type: 'GET',
		    		data: {
		    			discussion_id: discussion,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Comments Discussion');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var studentsPostulation = function(el){

		    	var course = el.parents('.students-postulation-container').data('course');
		    	var teacher = el.data('teacher');
		    	var container = el.parents('.students-postulation-container');

		    	container.html('<img src="/assets/loaders/rubiks-cube.gif" class="col-md-12"/>');

		    	$.ajax({
		    		url: '/cursos/postular/' + course,
		    		type: 'POST',
		    		async: true,
		    		data: {
		    			teacher_id: teacher
		    		},
		    		success: function(html) {

				        loading.hide();
		                Metronic.init();
		    			container.html('<a class="btn green students-notpostulation-btn" href="javascript:;">Dejar de Postular <i class="fa fa-history"></i></a>');
						toastr['success']("Debes esperar a que tu postulación sea aceptada por el profesor encargado de este curso", "Postulación Enviada");
		    			console.log('Contributors Add');
		    		},
		    		error: function(xhr) {
						toastr['error']("No se han podido enviar la Postulación", "ERROR");
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var studentsNotPostulation = function(el){

		    	var course = el.parents('.students-postulation-container').data('course');
		    	var teacher = el.data('teacher');
		    	var container = el.parents('.students-postulation-container');

		    	container.html('<img src="/assets/loaders/rubiks-cube.gif" class="col-md-12"/>');

		    	$.ajax({
		    		url: '/cursos/nopostular/' + course,
		    		type: 'POST',
		    		async: true,
		    		data: {
		    			teacher_id: teacher
		    		},
		    		success: function(html) {

				        loading.hide();
		                Metronic.init();
		    			container.html('<a class="btn blue students-postulation-btn" href="javascript:;">Postularme <i class="fa fa-sign-in"></i></a>');
						toastr['success']("Has cancelado la postulación para entrar al contenido de este curso", "Postulación Cancelada");
		    			console.log('Contributors Add');
		    		},
		    		error: function(xhr) {
						toastr['error']("No se ha podido cancelar la postulación", "ERROR");
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var evaluationTest = function(el){

		    	var course = el.parents('.portlet').data('course');
		    	var evaluation = el.data('evaluation');

		        loading.show();
		        content.html(loader);
		        console.log(evaluation);

		    	$.ajax({
		    		url: '{{$route}}/activities/test',
		    		type: 'GET',
		    		data: {
		    			evaluation_id: evaluation,
		    		},
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                // Metronic.init();
		    			// console.log(html);
		    			console.log('Evaluation Test');
		    		},
		    		error: function(xhr) {
		    			console.log(xhr);
		    		}
		    	});

		    }

		    var evaluationBack = function(el){

		    	var course = el.parents('.portlet').data('course');
		    	var evaluationable_type = el.data('evaluationable-type');
		    	var evaluationable_id = el.data('evaluationable-id');

		        loading.show();
		        content.html(loader);
		        console.log(evaluationable_id);

		        var url = null;
		        var data = null;

		        if(evaluationable_type == 'Lesson'){
		        	url = '{{$route}}/lessons/viewlesson';
		        	data = {
		        		lesson_id: evaluationable_id
		        	};
		        }
		        else if(evaluationable_type == 'Course'){
		        	url = '{{$route}}/activities';
		        }

		    	$.ajax({
		    		url: url,
		    		type: 'GET',
		    		data: data,
		    		async: true,
		    		success: function(html) {

				        loading.hide();
				        content.html(html);
		                Metronic.init();
		    			// console.log(html);
		    			console.log('Evaluation Back');
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

		            // handle inscriptions button click
		            $('.profile').on('click', '.inscriptions-btn', function (e) {
		                loadWall($(this), 'inscriptions');
		            });

		            // handle inscriptions button click
		            $('.profile').on('click', '.inscriptions-back-btn', function (e) {
		                backWall($(this), 'inscriptions');
		            });

		            // handle questions button click
		            $('.profile').on('click', '.questions-btn', function (e) {
		                loadWall($(this), 'questions');
		            });

		            // handle questions button click
		            $('.profile').on('click', '.questions-back-btn', function (e) {
		                backWall($(this), 'questions');
		            });

		            // handle activities button click
		            $('.profile').on('click', '.activities-btn', function (e) {
		                loadWall($(this), 'activities');
		            });

		            // handle activities button click
		            $('.profile').on('click', '.activities-back-btn', function (e) {
		                backWall($(this), 'activities');
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

		            // handle add lesson button click
		            $('.profile').on('click', '.lesson-view', function (e) {
		                lessonsLessonView($(this));
		            });
		            /*
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
					*/
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

		            // handle order lesson button click
		            $('.profile').on('click', '.lesson-activities-new', function (e) {
		                lessonsLessonActivitiesNew($(this));
		            });

		            // handle order lesson button click
		            $('.profile').on('click', '.lesson-activities-edit', function (e) {
		                lessonsLessonActivitiesEdit($(this));
		            });

		            // handle order lesson button click
		            $('.profile').on('click', '.lesson-activities-back', function (e) {
		                lessonsLessonActivitiesBack($(this));
		            });

		            // handle order lesson button click
		            $('.profile').on('click', '.lesson-comments', function (e) {
		                lessonsLessonComments($(this));
		            });

		            // handle order lesson button click
		            $('.profile').on('click', '.lesson-students', function (e) {
		                lessonsLessonStudents($(this));
		            });

		            /* Discussions Events */

		            // handle add discussion button click
		            $('.profile').on('click', '.discussion-add', function (e) {
		                discussionsAdd($(this));
		            });

		            // handle edit discussion button click
		            $('.profile').on('click', '.discussion-edit', function (e) {
		                discussionsEdit($(this));
		            });

		            // handle delete discussion button click
		            $('.profile').on('click', '.discussion-delete', function (e) {
		                discussionsDelete($(this));
		            });

		            // handle view discussion button click
		            $('.profile').on('click', '.discussion-comments', function (e) {
		                discussionsComments($(this));
		            });

		            /* Postulation Events Handlers */

		            // handle add students button click
		            $('.profile').on('click', '.students-postulation-btn', function (e) {
		                studentsPostulation($(this));
		            });

		            // handle add students button click
		            $('.profile').on('click', '.students-notpostulation-btn', function (e) {
		                studentsNotPostulation ($(this));
		            });

		            /* Evaluations Events Handlers */

		            // handle add students button click
		            $('.profile').on('click', '.evaluation-test-btn', function (e) {
		                evaluationTest($(this));
		            });

		            // handle add students button click
		            $('.profile').on('click', '.evaluation-back-btn', function (e) {
		                evaluationBack($(this));
		            });

		            //handle loading content based on URL parameter
		            if (Metronic.getURLParameter("a") === "view") {
		                viewMessage();
		            }
		            if (Metronic.getURLParameter("action") != null) {

		            	var callback = function(){};

		            	if(Metronic.getURLParameter("focusable") === "true"){
		            		var focuskey = 'data-' + Metronic.getURLParameter("focuskey");
		            		var focusvalue = Metronic.getURLParameter("focusvalue");
		            		var element_highlight = $('['+focuskey+'='+focusvalue+']');
		            		callback = function(){
		            			$('html,body').animate({
        							scrollTop: $('['+focuskey+'='+focusvalue+']').offset().top-100},
        							'slow', function(){
        								$('['+focuskey+'='+focusvalue+']').effect("highlight", {}, 3000);
        							});
		            		}
		            	}
		            	var search = location.search.substring(1);
						var data = search?JSON.parse('{"' + search.replace(/&/g, '","').replace(/=/g,'":"') + '"}', function(key, value) { return key===""?value:decodeURIComponent(value) }):{}
						// section=lessons&action=comments&type=get&lesson_id=3B4727529D&focusable=true&focuskey=comment&focusvalue=58324AE2E7
		            	initAction($('.' + data.section + '-btn'), data.section, data.action, data, data.method, callback);

		            }
		            else if (Metronic.getURLParameter("section") != null) {
		            	switch(Metronic.getURLParameter("section")){
		            		case 'lesson':
		        				initWall($('.lessons-btn'), 'lessons');
		        				break;
		            		case 'lessons':
		        				initWall($('.lessons-btn'), 'lessons');
		        				break;
		            		case 'general':
		        				initWall($('.general-btn'), 'general');
		        				break;
		            		case 'students':
		        				initWall($('.students-btn'), 'students');
		        				break;
		            		case 'contributors':
		        				initWall($('.contributors-btn'), 'contributors');
		        				break;
		            		case 'discussions':
		        				initWall($('.discussions-btn'), 'discussions');
		        				break;
		        			default:
		        				initWall($('.general-btn'), 'general');
		        				break;
		            	}
		            } else if (Metronic.getURLParameter("section") === "general") {
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
