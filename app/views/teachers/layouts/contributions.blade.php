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

	<div class="courses courses-content">
			
		@yield('content_courses')

	</div>

	<!-- END PAGE CONTENT INNER -->

	

@stop

@section('javascripts')
	
	<!-- END PAGE LEVEL SCRIPTS -->
	<script type="text/javascript">
		var Courses = function () {

		    var content = $('.courses-content');
		    var master = $('html');
		    var loading = $('.courses-loading');
		    var loader = '<div class="portlet light" style="text-align:center;"><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row"><div class="col-md-5">&nbsp;</div><img class="col-md-2" src="/assets/loaders/rubiks-cube.gif"/><div class="col-md-5">&nbsp;</div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div></div>';
		    var listListing = '';

		    var loadCourses = function (el, name) {
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
		            	console.log(name);
		                $('.courses-usermenu li').removeClass('active');
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

		                $('.courses-nav > li.active').removeClass('active');
		                $('.courses-header > h1').text('Escribir');

		                content.html(res);

		                initFileupload();
		                initWysihtml5();

		                $('.courses-wysihtml5').focus();
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
		                $('.courses-usermenu li').removeClass('active');
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

		    var handleCCInput = function () {
		        var the = $('.courses-compose .mail-to .courses-cc');
		        var input = $('.courses-compose .input-cc');
		        the.hide();
		        input.show();
		        $('.close', input).click(function () {
		            input.hide();
		            the.show();
		        });
		    }

		    var handleBCCInput = function () {

		        var the = $('.courses-compose .mail-to .courses-bcc');
		        var input = $('.courses-compose .input-bcc');
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

		        	console.log('init');

		        	$('.courses').on('submit', '#search-form', function(event) {
		        		event.preventDefault();
		        		/* Act on the event */
		        		if($('#search-form input[name=q]').val() != '') searchForm($(this));
		        		return false;
		        	});

		            // handle following button click
		            $('.courses').on('click', '.paginate-btn', function (e) {
		            	console.log('click')
		                loadPaginate($(this));
		            });

		            // handle following button click
		            $('.courses').on('click', '.profile-btn', function (e) {
		            	console.log('click')
		                loadProfile($(this));
		            });

		            //handle loading content based on URL parameter
		            if (Metronic.getURLParameter("a") === "view") {
		                viewMessage();
		            } else if (Metronic.getURLParameter("a") === "compose") {
		                loadCompose();
		            } else {
		               $('.courses-nav > li.courses > a').click();
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
			Courses.init();
			moment.locale('es');
		 	jQuery('.timeago').each(function(e){
		 		jQuery(this).html(moment(jQuery(this).html()).fromNow());
		 	});
   			jQuery('.fancybox').fancybox();
   			
        });

	</script>

@stop
