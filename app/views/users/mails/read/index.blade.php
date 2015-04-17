@extends ('layouts.master')

@section('css')

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet"/>
<!-- BEGIN:File Upload Plugin CSS files-->
<link href="/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
<link href="/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>
<!-- END:File Upload Plugin CSS files-->
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/admin/pages/css/inbox.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="/assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="/assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css"/>
<link href="/assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>


@stop

@section('toolbar')
	<!-- BEGIN PAGE TOOLBAR -->
	<div class="page-toolbar">
		<!-- BEGIN THEME PANEL -->
		<div class="btn-group btn-theme-panel">
			
		</div>
		<!-- END THEME PANEL -->
	</div>
	<!-- END PAGE TOOLBAR -->
@stop

@section ("content")

	<!-- END PAGE HEADER-->
	<div class="portlet light">
		<div class="portlet-body">
			<div class="row inbox">
				<div class="col-md-2">
					<ul class="inbox-nav margin-bottom-10">
						<li class="compose-btn">
							<a href="javascript:;" data-title="Compose" class="btn green">
							<i class="fa fa-edit"></i> Compose </a>
						</li>
						<li class="inbox active">
							<a href="javascript:;" class="btn" data-title="Inbox">
							Inbox(3) </a>
							<b></b>
						</li>
						<li class="sent">
							<a class="btn" href="javascript:;" data-title="Sent">
							Sent </a>
							<b></b>
						</li>
						<li class="draft">
							<a class="btn" href="javascript:;" data-title="Draft">
							Draft </a>
							<b></b>
						</li>
						<li class="trash">
							<a class="btn" href="javascript:;" data-title="Trash">
							Trash </a>
							<b></b>
						</li>
					</ul>
				</div>
				<div class="col-md-10">
					<div class="inbox-header">
						<h1 class="pull-left">Inbox</h1>
						<form class="form-inline pull-right" action="index.html">
							<div class="input-group input-medium">
								<input type="text" class="form-control" placeholder="Password">
								<span class="input-group-btn">
								<button type="submit" class="btn green"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>
					<div class="inbox-loading">
						 Loading...
					</div>
					<div class="inbox-content">
					</div>
				</div>
			</div>
		</div>
	</div>
		
@stop

@section('javascripts')
	
	<script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN: Page level plugins -->
	<script src="/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
	<!-- BEGIN:File Upload Plugin JS files-->
	<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script src="/assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
	<!-- The Templates plugin is included to render the upload/download listings -->
	<script src="/assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script src="/assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
	<script src="/assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
	<!-- blueimp Gallery script -->
	<script src="/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
	<!-- The File Upload processing plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
	<!-- The File Upload image preview & resize plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
	<!-- The File Upload audio preview plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
	<!-- The File Upload video preview plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
	<!-- The File Upload validation plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
	<!-- The File Upload user interface plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
	<!-- The main application script -->
	<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
	<!--[if (gte IE 8)&(lt IE 10)]>
	    <script src="/assets/global/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
	    <![endif]-->
	<!-- END:File Upload Plugin JS files-->
	<!-- END: Page level plugins -->
	<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="/assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
	<script src="/assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>

	<!-- END:File Upload Plugin JS files-->
	<!-- END: Page level plugins -->
	<script type="text/javascript">
		var Inbox = function () {

	    var content = $('.inbox-content');
	    var loading = $('.inbox-loading');
	    var listListing = '';

	    var loadInbox = function (el, name) {
	        var url = '{{ $route }}/inbox';
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

	    var loadMessage = function (el, name, resetMenu) {
	        var url = 'inbox_view.html';

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
	                $('.inbox-header > h1').text('View Message');

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

	    var initWysihtml5 = function () {
	        $('.inbox-wysihtml5').wysihtml5({
	            "stylesheets": ["/assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
	        });
	    }

	    var initFileupload = function () {

	        $('#fileupload').fileupload({
	            // Uncomment the following to send cross-domain cookies:
	            //xhrFields: {withCredentials: true},
	            url: '/assets/global/plugins/jquery-file-upload/server/php/',
	            autoUpload: true
	        });

	        // Upload server status check for browsers with CORS support:
	        if ($.support.cors) {
	            $.ajax({
	                url: '/assets/global/plugins/jquery-file-upload/server/php/',
	                type: 'HEAD'
	            }).fail(function () {
	                $('<span class="alert alert-error"/>')
	                    .text('Upload server currently unavailable - ' +
	                    new Date())
	                    .appendTo('#fileupload');
	            });
	        }
	    }

	    var loadCompose = function (el) {
	        var url = '{{ $route }}/compose';

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
	                $('.inbox-header > h1').text('Compose');

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
	        var url = '{{$route}}/reply?messageid=' + messageid;
	        
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
	                $('.inbox-header > h1').text('Reply');

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

	    var loadSearchResults = function (el) {
	        var url = '{{ $route }}/search';

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
	                $('.inbox-header > h1').text('Search');

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

	            // handle compose btn click
	            $('.inbox').on('click', '.compose-btn a', function () {
	                loadCompose($(this));
	            });

	            // handle discard btn
	            $('.inbox').on('click', '.inbox-discard-btn', function(e) {
	                e.preventDefault();
	                loadInbox($(this), listListing);
	            });

	            // handle reply and forward button click
	            $('.inbox').on('click', '.reply-btn', function () {
	                loadReply($(this));
	            });

	            // handle view message
	            $('.inbox-content').on('click', '.view-message', function () {
	                loadMessage($(this));
	            });

	            // handle inbox listing
	            $('.inbox-nav > li.inbox > a').click(function () {
	                loadInbox($(this), 'inbox');
	            });

	            // handle sent listing
	            $('.inbox-nav > li.sent > a').click(function () {
	                loadInbox($(this), 'sent');
	            });

	            // handle draft listing
	            $('.inbox-nav > li.draft > a').click(function () {
	                loadInbox($(this), 'draft');
	            });

	            // handle trash listing
	            $('.inbox-nav > li.trash > a').click(function () {
	                loadInbox($(this), 'trash');
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
	                loadMessage();
	            } else if (Metronic.getURLParameter("a") === "compose") {
	                loadCompose();
	            } else {
	               $('.inbox-nav > li.inbox > a').click();
	            }

	        }

	    };

	}();
	</script>


	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {    
		   	Metronic.init(); // init metronic core componets
		   	Layout.init(); // init layout
		   	Demo.init(); // init demo features 
		    Index.init(); // init index page
   			Inbox.init();
		 	Tasks.initDashboardWidget(); // init tash dashboard widget  
		 	moment.locale('es');
		 	jQuery('.timeago').each(function(e){
		 		jQuery(this).html(moment(jQuery(this).html()).fromNow());
		 	});
		});
	</script>

@stop