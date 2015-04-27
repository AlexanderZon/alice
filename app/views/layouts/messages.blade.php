@extends('layouts.menu')

@section('before')

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


@section('after')

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
	<script src="/assets/global/plugins/respond.min.js"></script>
	<script src="/assets/global/plugins/excanvas.min.js"></script> 
	<![endif]-->
	<script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN: Page level plugins -->
	<script src="/assets/global/plugins/fancybox/source/jquery.fancybox.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="/assets/global/plugins/moment/moment.js"></script>
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
	<script type="text/javascript">
		var Inbox = function () {

		    var content = $('.inbox-content');
		    var loading = $('.inbox-loading');
		    var listListing = '';

		    var loadInbox = function (el, name) {
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


		        console.log(message_id);
		        
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
		        var url = '{{$route}}/downloada/'+attachment_id;

		        // loading.show();
		        // content.html('');
		        // toggleButton(el);


		        console.log(message_id);
		        
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

		    	// 
		    	
		    }

		    var draftMail = function(el) {

		    	// 

		    }

		    var deleteMail = function(el) {

		    	// 

		    }

		    var favoriteMail = function(el) {

		    	// 

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
		            $('.inbox').on('click', '.discard-btn', function () {
		                discardMail($(this));
		            });

		            // handle draft and forward button click
		            $('.inbox').on('click', '.draft-btn', function () {
		                draftMail($(this));
		            });

		            // handle delete and forward button click
		            $('.inbox').on('click', '.delete-btn', function () {
		                deleteMail($(this));
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

		            // handle inbox listing
		            $('.inbox-nav > li.inbox > a').click(function () {
		                loadInbox($(this), 'inbox');
		            });

		            // handle sent listing
		            $('.inbox-nav > li.sent > a').click(function () {
		                loadInbox($(this), 'outbox');
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
	   // initiate layout and plugins
	   Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	   Inbox.init();
	});
	</script>

@stop