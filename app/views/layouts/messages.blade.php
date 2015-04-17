@extends('layouts.menu')

@section('before')

	<!DOCTYPE html>
	<!-- 
	Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
	Version: 3.7.0
	Author: KeenThemes
	Website: http://www.keenthemes.com/
	Contact: support@keenthemes.com
	Follow: www.twitter.com/keenthemes
	Like: www.facebook.com/keenthemes
	Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
	License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
	-->
	<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
	<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
	<!--[if !IE]><!-->
	<html lang="en">
	<!--<![endif]-->
	<!-- BEGIN HEAD -->
	<head>
	<meta charset="utf-8"/>
	<title>Metronic | Pages - Inbox</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
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
	</head>
	<!-- END HEAD -->
	<!-- BEGIN BODY -->
	<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
	<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
	<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
	<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
	<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
	<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
	<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
	<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
	<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
	<body class="page-header-fixed page-sidebar-closed-hide-logo ">
	<!-- BEGIN HEADER -->
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="index.html">
				<img src="/assets/admin/layout4/img/logo-light.png" alt="logo" class="logo-default"/>
				</a>
				<div class="menu-toggler sidebar-toggler">
					<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
				</div>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
			</a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN PAGE ACTIONS -->
			<!-- DOC: Remove "hide" class to enable the page header actions -->
			<div class="page-actions">
				<div class="btn-group">
					<button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="hidden-sm hidden-xs">Actions&nbsp;</span><i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="javascript:;">
							<i class="icon-docs"></i> New Post </a>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-tag"></i> New Comment </a>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-share"></i> Share </a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
							</a>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- END PAGE ACTIONS -->
			<!-- BEGIN PAGE TOP -->
			<div class="page-top">
				<!-- BEGIN HEADER SEARCH BOX -->
				<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
				<form class="search-form" action="extra_search.html" method="GET">
					<div class="input-group">
						<input type="text" class="form-control input-sm" placeholder="Search..." name="query">
						<span class="input-group-btn">
						<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
						</span>
					</div>
				</form>
				<!-- END HEADER SEARCH BOX -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li class="separator hide">
						</li>
						<!-- BEGIN NOTIFICATION DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
							<span class="badge badge-success">
							7 </span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3><span class="bold">12 pending</span> notifications</h3>
									<a href="extra_profile.html">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
										<li>
											<a href="javascript:;">
											<span class="time">just now</span>
											<span class="details">
											<span class="label label-sm label-icon label-success">
											<i class="fa fa-plus"></i>
											</span>
											New user registered. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">3 mins</span>
											<span class="details">
											<span class="label label-sm label-icon label-danger">
											<i class="fa fa-bolt"></i>
											</span>
											Server #12 overloaded. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">10 mins</span>
											<span class="details">
											<span class="label label-sm label-icon label-warning">
											<i class="fa fa-bell-o"></i>
											</span>
											Server #2 not responding. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">14 hrs</span>
											<span class="details">
											<span class="label label-sm label-icon label-info">
											<i class="fa fa-bullhorn"></i>
											</span>
											Application error. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">2 days</span>
											<span class="details">
											<span class="label label-sm label-icon label-danger">
											<i class="fa fa-bolt"></i>
											</span>
											Database overloaded 68%. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">3 days</span>
											<span class="details">
											<span class="label label-sm label-icon label-danger">
											<i class="fa fa-bolt"></i>
											</span>
											A user IP blocked. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">4 days</span>
											<span class="details">
											<span class="label label-sm label-icon label-warning">
											<i class="fa fa-bell-o"></i>
											</span>
											Storage Server #4 not responding dfdfdfd. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">5 days</span>
											<span class="details">
											<span class="label label-sm label-icon label-info">
											<i class="fa fa-bullhorn"></i>
											</span>
											System Error. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">9 days</span>
											<span class="details">
											<span class="label label-sm label-icon label-danger">
											<i class="fa fa-bolt"></i>
											</span>
											Storage server failed. </span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- END NOTIFICATION DROPDOWN -->
						<li class="separator hide">
						</li>
						<!-- BEGIN INBOX DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-envelope-open"></i>
							<span class="badge badge-danger">
							4 </span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3>You have <span class="bold">7 New</span> Messages</h3>
									<a href="inbox.html">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
										<li>
											<a href="inbox.html?a=view">
											<span class="photo">
											<img src="/assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
											</span>
											<span class="subject">
											<span class="from">
											Lisa Wong </span>
											<span class="time">Just Now </span>
											</span>
											<span class="message">
											Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
											</a>
										</li>
										<li>
											<a href="inbox.html?a=view">
											<span class="photo">
											<img src="/assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
											</span>
											<span class="subject">
											<span class="from">
											Richard Doe </span>
											<span class="time">16 mins </span>
											</span>
											<span class="message">
											Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
											</a>
										</li>
										<li>
											<a href="inbox.html?a=view">
											<span class="photo">
											<img src="/assets/admin/layout3/img/avatar1.jpg" class="img-circle" alt="">
											</span>
											<span class="subject">
											<span class="from">
											Bob Nilson </span>
											<span class="time">2 hrs </span>
											</span>
											<span class="message">
											Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
											</a>
										</li>
										<li>
											<a href="inbox.html?a=view">
											<span class="photo">
											<img src="/assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
											</span>
											<span class="subject">
											<span class="from">
											Lisa Wong </span>
											<span class="time">40 mins </span>
											</span>
											<span class="message">
											Vivamus sed auctor 40% nibh congue nibh... </span>
											</a>
										</li>
										<li>
											<a href="inbox.html?a=view">
											<span class="photo">
											<img src="/assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
											</span>
											<span class="subject">
											<span class="from">
											Richard Doe </span>
											<span class="time">46 mins </span>
											</span>
											<span class="message">
											Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- END INBOX DROPDOWN -->
						<li class="separator hide">
						</li>
						<!-- BEGIN TODO DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-calendar"></i>
							<span class="badge badge-primary">
							3 </span>
							</a>
							<ul class="dropdown-menu extended tasks">
								<li class="external">
									<h3>You have <span class="bold">12 pending</span> tasks</h3>
									<a href="page_todo.html">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">New release v1.2 </span>
											<span class="percent">30%</span>
											</span>
											<span class="progress">
											<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
											</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">Application deployment</span>
											<span class="percent">65%</span>
											</span>
											<span class="progress">
											<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">65% Complete</span></span>
											</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">Mobile app release</span>
											<span class="percent">98%</span>
											</span>
											<span class="progress">
											<span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">98% Complete</span></span>
											</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">Database migration</span>
											<span class="percent">10%</span>
											</span>
											<span class="progress">
											<span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">10% Complete</span></span>
											</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">Web server upgrade</span>
											<span class="percent">58%</span>
											</span>
											<span class="progress">
											<span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">58% Complete</span></span>
											</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">Mobile development</span>
											<span class="percent">85%</span>
											</span>
											<span class="progress">
											<span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">85% Complete</span></span>
											</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">New UI release</span>
											<span class="percent">38%</span>
											</span>
											<span class="progress progress-striped">
											<span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">38% Complete</span></span>
											</span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- END TODO DROPDOWN -->
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-user dropdown-dark">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<span class="username username-hide-on-mobile">
							Nick </span>
							<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
							<img alt="" class="img-circle" src="/assets/admin/layout4/img/avatar9.jpg"/>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="extra_profile.html">
									<i class="icon-user"></i> My Profile </a>
								</li>
								<li>
									<a href="page_calendar.html">
									<i class="icon-calendar"></i> My Calendar </a>
								</li>
								<li>
									<a href="inbox.html">
									<i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
									3 </span>
									</a>
								</li>
								<li>
									<a href="page_todo.html">
									<i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
									7 </span>
									</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="extra_lock.html">
									<i class="icon-lock"></i> Lock Screen </a>
								</li>
								<li>
									<a href="login.html">
									<i class="icon-key"></i> Log Out </a>
								</li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul>
				</div>
				<!-- END TOP NAVIGATION MENU -->
			</div>
			<!-- END PAGE TOP -->
		</div>
		<!-- END HEADER INNER -->
	</div>
	<!-- END HEADER -->
	<div class="clearfix">
	</div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
@stop


@section('after')
	
	@yield('content')
		<!-- END CONTENT -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner">
			 2014 &copy; Metronic by keenthemes.
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
	<script src="/assets/global/plugins/respond.min.js"></script>
	<script src="/assets/global/plugins/excanvas.min.js"></script> 
	<![endif]-->
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
	<script type="text/javascript">
		var Inbox = function () {

		    var content = $('.inbox-content');
		    var loading = $('.inbox-loading');
		    var listListing = '';

		    var loadInbox = function (el, name) {
		        var url = '{{$route}}/inbox';
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
		            // url: '{{$route}}/upload',
		            url: '/uploads/messages/index.php',
		            // url: '/assets/global/plugins/jquery-file-upload/server/php/',
		            autoUpload: true,
		            success: function(data){
		            	console.log(data);
		            }
		        });

		        // Upload server status check for browsers with CORS support:
		        if ($.support.cors) {
		            $.ajax({
		                url: '/uploads/messages/index.php',
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
	<script>
	jQuery(document).ready(function() {       
	   // initiate layout and plugins
	   Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	   Inbox.init();
	});
	</script>
	<!-- END JAVASCRIPTS -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-37564768-1', 'keenthemes.com');
	  ga('send', 'pageview');
	</script>
	</body>

	<!-- END BODY -->
	</html>

@stop