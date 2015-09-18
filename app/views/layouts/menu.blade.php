<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>{{ $app }} | {{ $title }}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="/assets/global/css/fonts.googleapis.com.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

@yield('before')
<style type="text/css">
	.badge-notification{
		height: 16px;
	    line-height: 1;
	    font-size: 6pt !important;
	    width: 16px;
	    padding-left: 3px;
	    margin-top: -2px;
	}
</style>

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
<body class="page-header-fixed page-sidebar-closed-hide-logo ppage-sidebar-closed-hide-logo {{ isset($sidebar_closed) ? 'page-sidebar-closed' : '' }}">

<!-- BEGIN HEADER -->
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="/">
				<img src="/assets/images/logo_main.png" alt="logo" class="logo-default" style="width:auto; height: 51px" />
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
			<!--
			<div class="page-actions">
				<div class="btn-group">
					<button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="hidden-sm hidden-xs">Acciones&nbsp;</span><i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="#">
							<i class="icon-docs"></i> New Post </a>
						</li>
						<li>
							<a href="#">
							<i class="icon-tag"></i> New Comment </a>
						</li>
						<li>
							<a href="#">
							<i class="icon-share"></i> Share </a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="#">
							<i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
							</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			-->
			<!-- END PAGE ACTIONS -->
			<!-- BEGIN PAGE TOP -->
			<div class="page-top">
				<!-- BEGIN HEADER SEARCH BOX -->
				<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
				<form class="search-form" action="/search" method="get">
					<div class="input-group">
						<input type="text" class="form-control input-sm" placeholder="Buscar..." name="q">
						<span class="input-group-btn">
						<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
						</span>
					</div>
				</form>
				<!-- END HEADER SEARCH BOX -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li class="separator hide"></li>
						<!-- BEGIN NOTIFICATION DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-inbox" id="header_notification_bar">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
							<?php Auth::user()->setnotifications(); ?>
							<?php $new_notifications = Auth::user()->newnotifications->count(); ?>
							@if($new_notifications > 0)
								<span class="badge badge-success notifications-counter">{{$new_notifications}} </span>
							@else
								<span class="badge notifications-counter">{{$new_notifications}} </span>
							@endif
							</a>
							<ul class="dropdown-menu">
								<?php $notifications = Auth::user()->notifications()->take(50)->get(); ?>
								<li class="external">
									<h3>Tu Tienes<span class="bold"> <span class="notifications-counter">{{ $new_notifications }}</span> Notificaciones</span> pendientes</h3>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller notifications-dropdown-list" style="height: 250px;" data-handle-color="#637283">
										@foreach($notifications as $notification)
										<li class="{{ $notification->status == 'viewed' ? 'active' : '' }}" data-notification="{{ Hashids::encode($notification->id) }}">
											<a href="/notifications/go/{{ Crypt::encrypt($notification->id) }}">
											<span class="photo">
											<img src="{{ $notification->picture }}" class="img-circle" alt="">
											</span>
											<span class="subject">
											<span class="from {{ $notification->status == 'viewed' ? '' : 'active' }}">{{ $notification->icon != '' ? '<span class="badge badge-notification '.$notification->badge.'"><i class="fa '.$notification->icon.'"></i></span>&nbsp;' : '' }}{{ $notification->title}}</span>
											<span class="time"><span class="moment-fromnow">{{ $notification->created_at }}</span></span>
											</span>
											<span class="message">{{ $notification->description }} </span>
											</a>
										</li>
										@endforeach
										<!--
										<li>
											<a href="/me/inbox/{{ Hashids::encode('2') }}">
											<span class="photo">
											<span class="label label-sm label-icon label-danger">
											<i class="fa fa-bolt"></i>
											</span>
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
											<a href="javascript:;">
											<span class="time">3 mins</span>
											<span class="details">
											<span class="label label-sm label-icon label-danger">
											<i class="fa fa-bolt"></i>
											</span>
											</span>
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
										-->
									</ul>
								</li>
								<li class="external">
									<h3>&nbsp;</h3>
									<div class="row">
										<div class="col-md-8">
											&nbsp;
										</div>
										<div class="col-md-3">
											<a href="/notifications">ver todas</a>
										</div>
									</div>
								</li>
							</ul>
						</li>
						<!-- END NOTIFICATION DROPDOWN -->
						<li class="separator hide"></li>
						<!-- BEGIN INBOX DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
							<?php $unreadbox = Auth::user()->unreadbox ?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-envelope-open"></i>
							@if(count($unreadbox) > 0)
								<span class="badge badge-danger"> {{ count($unreadbox)}} </span>
							@else
								<span class="badge"> {{ count($unreadbox)}} </span>
							@endif
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3>Tu Tienes <span class="bold">{{ count($unreadbox)}} Mensajes</span> nuevos</h3>
									<a href="/messages">ver todos</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
										<?php $unreadbox_counter = 0; ?>
										@foreach($unreadbox as $message)
											@if($unreadbox_counter <= 10)
												<?php $from = $message->from; ?>
												<li>
													<a href="/messages?a=view&id={{ Crypt::encrypt( $message->id ) }}">
														<span class="photo">
														<img src="{{ $from->profile->getAvatar() }}" class="img-circle" alt="">
														</span>
														<span class="subject">
														<span class="from">{{ $from->first_name}} {{ $from->last_name }} </span>
														<span class="time moment-date">{{ $message->user_message()->created_at }}</span>
														</span>
														<span class="message">{{ $message->subject }} @if(count($message->attachments)>0) <i class="fa fa-paperclip"></i> @endif</span>
													</a>
												</li>
											@endif
											<?php $unreadbox_counter++; ?>
										@endforeach
										@if($unreadbox_counter > 5)
											<li class="external center">
												<a href="/messages">Ver los demas Mensajes</a>
											</li>
										@endif
										<!-- <li>
											<a href="/me/inbox/{{ Hashids::encode('2') }}">
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
											<a href="/me/inbox/{{ Hashids::encode('3') }}">
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
											<a href="/me/inbox/{{ Hashids::encode('4') }}">
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
											<a href="/me/inbox/{{ Hashids::encode('5') }}">
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
										</li> -->
									</ul>
								</li>
							</ul>
						</li>
						<!-- END INBOX DROPDOWN -->
						<li class="separator hide"></li>
						<!-- BEGIN TODO DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<!--
						<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-pin"></i>
								<span class="badge badge-primary">4 </span>
							</a>
							<ul class="dropdown-menu extended tasks">
								<li class="external">
									<h3>Tu tienes <span class="bold">4 tareas pendientes</span></h3>
									<a href="/my/tasks">Ver todas</a>
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
						-->
						<!-- END TODO DROPDOWN -->
						<li class="separator hide"></li>
						<!-- BEGIN LANGUAGE BAR -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<!-- <li class="dropdown dropdown-language">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<img alt="" src="/assets/global/img/flags/us.png">
							<span class="langname">
							US </span>
							<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="#">
									<img alt="" src="/assets/global/img/flags/es.png"> Spanish </a>
								</li>
								<li>
									<a href="#">
									<img alt="" src="/assets/global/img/flags/de.png"> German </a>
								</li>
								<li>
									<a href="#">
									<img alt="" src="/assets/global/img/flags/ru.png"> Russian </a>
								</li>
								<li>
									<a href="#">
									<img alt="" src="/assets/global/img/flags/fr.png"> French </a>
								</li>
							</ul>
						</li> -->
						<!-- END LANGUAGE BAR -->
						<li class="separator hide"></li>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-user">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<span class="username username-hide-on-mobile">
								{{ Auth::user()->display_name }}
								</span>
								<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
								&nbsp;
								<img alt="" class="img-circle" src="{{ Auth::user()->profile->getAvatar() }}"/>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="/{{ Auth::user()->username }}">
									<i class="icon-user"></i> Mi Perfil </a>
								</li>
								<li>
									<a href="/my/calendar">
									<i class="icon-calendar"></i> Mi Calendario </a>
								</li>
								<li>
									<a href="/messages">
									<i class="icon-envelope-open"></i> Mi Buzón 
										@if(count($unreadbox) > 0)
											<span class="badge badge-danger">
												{{ count($unreadbox)}} 
											</span>
										@endif
									</a>
								</li>
								<!--
								<li>
									<a href="/my/tasks">
									<i class="icon-pin"></i> Mis Tareas 
										<span class="badge badge-primary">
										5 </span>
										</a>
								</li>
								-->
								<li class="divider">
								</li>
								<li>
									<a href="/auth/lock">
									<i class="icon-lock"></i> Bloquear Pantalla </a>
								</li>
								<li>
									<a href="/auth/logout">
									<i class="icon-key"></i> Cerrar Sesión </a>
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
	<div class="clearfix"></div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">

		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<div class="page-sidebar navbar-collapse collapse">
				<!-- BEGIN SIDEBAR MENU -->
				<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
				<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
				<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
				<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
				<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
				<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
				<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu1 {{ isset($sidebar_closed) ? 'page-sidebar-menu-closed' : '' }}" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="heading">
						<h3>GENERAL</h3>
					</li>
					@if(Auth::user()->hasCap('administrators_dashboard_get_index'))
					<li class="tooltips {{ $name == 'administrators_dashboard' ? 'active open' : '' }}">
						<a href="/">
						<i class="icon-home"></i>
						<span class="title">Escritorio</span>
						</a>
					</li>
					@endif

					<!-- Coordanators Module -->

					@if(Auth::user()->hasCap('coordinators_read_get_index'))
					<li class="tooltips {{ $name == 'coordinators' ? 'active open' : '' }}">
						<a href="/">
						<i class="icon-home"></i>
						<span class="title">Escritorio</span>
						</a>
					</li>
					@endif

					@if(Auth::user()->hasCap('coordinators_teachers_get_index'))
					<li class="tooltips {{ $name == 'coordinators_teachers_read' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Profesores">
						<a href="/coordinators/teachers">
						<i class="icon-graduation"></i>
						<span class="title">
						Profesores </span>
						<!-- <span class="arrow"></span> -->
						</a>
						<!--
						<ul class="sub-menu">

							@if(Auth::user()->hasCap('coordinators_teachers_get_index'))
							<li class="{{ $name == 'coordinators_teachers_read' ? 'active' : '' }}">
								<a href="/coordinators/teachers">
								<i class="icon-list"></i>
								Listado</a>
							</li>
							@endif

							@if(Auth::user()->hasCap('coordinators_teachers_get_inactive'))
							 <li class="{{ $name == 'coordinators_teachers_inactive' ? 'active' : '' }}">
								<a href="/coordinators/teachers/inactive">
								<i class="icon-ban"></i>
								Inactivos</a>
							</li> 
							@endif

						</ul>
						-->
					</li>
					@endif

					@if(Auth::user()->hasCap('coordinators_students_get_index'))
					<li class="tooltips {{ $name == 'coordinators_students_read' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Estudiantes">
						<a href="/coordinators/students">
						<i class="icon-emoticon-smile"></i>
						<span class="title">
						Estudiantes </span>
						<!-- <span class="arrow"></span> -->
						</a>
						<!-- <ul class="sub-menu">
						
							@if(Auth::user()->hasCap('coordinators_students_get_index'))
							<li class="{{ $name == 'coordinators_students_read' ? 'active' : '' }}">
								<a href="/coordinators/students">
								<i class="icon-list"></i>
								Listado</a>
							</li>
							@endif
						
							@if(Auth::user()->hasCap('coordinators_students_get_inactive'))
							<li class="{{ $name == 'coordinators_students_inactive' ? 'active' : '' }}">
								<a href="/coordinators/students/inactive">
								<i class="icon-ban"></i>
								Inactivos</a>
							</li>
							@endif
						
						</ul> -->
					</li>
					@endif

					@if(Auth::user()->hasCap('coordinators_courses_get_index'))
					<li class="tooltips {{ $name == 'coordinators_courses_read' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Cursos">
						<a href="/coordinators/courses">
							<i class="icon-notebook"></i>
							<span class="title">
							Cursos </span>
							<!-- <span class="arrow"></span> -->
						</a>
						<!-- <ul class="sub-menu">
						
							@if(Auth::user()->hasCap('coordinators_courses_get_index'))
							<li class="{{ $name == 'coordinators_courses_read' ? 'active' : '' }}">
								<a href="/coordinators/courses">
								<i class="icon-list"></i>
								Listado</a>
							</li>
							@endif
						
							@if(Auth::user()->hasCap('coordinators_courses_get_inactive'))
							<li class="{{ $name == 'coordinators_courses_inactive' ? 'active' : '' }}">
								<a href="/coordinators/courses/inactive">
								<i class="icon-ban"></i>
								Inactivos</a>
							</li> 
							@endif
						
						</ul> -->
					</li>
					@endif

					<!-- Security Module -->

					@if(Auth::user()->hasCap('security_user_get_index') || Auth::user()->hasCap('security_role_get_index') || Auth::user()->hasCap('security_capability_get_index'))
					<li class="tooltips {{ $name == 'security_user' || $name == 'security_role' || $name == 'security_capability' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Usuario, Roles y Capacidades">
						<a href="/security/users">
						<i class="icon-users"></i>
						<span class="title">
						Usuarios </span>
						<span class="arrow"></span>
						</a>
						<ul class="sub-menu">

							@if(Auth::user()->hasCap('security_user_get_index'))
							<li class="{{ $name == 'security_user' ? 'active' : '' }}">
								<a href="/security/users">
								<i class="icon-list"></i>
								Todos</a>
							</li>
							@endif

							@if(Auth::user()->hasCap('security_role_get_index'))
							<li class="{{ $name == 'security_role' ? 'active' : '' }}">
								<a href="/security/roles">
								<i class="icon-lock"></i>
								Roles</a>
							</li>
							@endif

							@if(Auth::user()->hasCap('security_capability_get_index'))
							<li class="{{ $name == 'security_capability' ? 'active' : '' }}">
								<a href="/security/capabilities">
								<i class="icon-key"></i>
								Capacidades</a>
							</li>
							@endif

						</ul>
					</li>
					@endif

					<!-- Teacehrs Module -->

					@if(Auth::user()->hasCap('teachers_read_get_index'))
					<li class="tooltips {{ $name == 'teachers' ? 'active open' : '' }}">
						<a href="/">
						<i class="icon-home"></i>
						<span class="title">Escritorio</span>
						</a>
					</li>
					@endif

					@if(Auth::user()->hasCap('teachers_courses_get_index'))
					<li class="tooltips {{ $name == 'teachers_courses' || $name == 'students_courses' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Cursos">
						<a href="/teachers/courses">
							<i class="icon-notebook"></i>
							<span class="title">
							Cursos </span>
							<!-- <span class="arrow"></span> -->
						</a>
						<!-- <ul class="sub-menu">
						
							@if(Auth::user()->hasCap('teachers_courses_get_index'))
							<li class="{{ $name == 'teachers_courses_read' ? 'active' : '' }}">
								<a href="/teachers/courses">
								<i class="icon-list"></i>
								Listado</a>
							</li>
							@endif
						
							@if(Auth::user()->hasCap('teachers_courses_get_inactive'))
							<li class="{{ $name == 'teachers_courses_inactive' ? 'active' : '' }}">
								<a href="/teachers/courses/inactive">
								<i class="icon-ban"></i>
								Inactivos</a>
							</li> 
							@endif
						
						</ul> -->
					</li>
					@endif

					@if(Auth::user()->hasCap('teachers_contributions_get_index'))
					<li class="tooltips {{ $name == 'teachers_contributions' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Contribuciones">
						<a href="/teachers/contributions">
							<i class="icon-eyeglasses"></i>
							<span class="title">
							Contribuciones </span>
							<!-- <span class="arrow"></span> -->
						</a>
						<!-- <ul class="sub-menu">
						
							@if(Auth::user()->hasCap('teachers_contributions_get_index'))
							<li class="{{ $name == 'teachers_contributions_read' ? 'active' : '' }}">
								<a href="/teachers/contributions">
								<i class="icon-list"></i>
								Listado</a>
							</li>
							@endif
						
							@if(Auth::user()->hasCap('teachers_contributions_get_inactive'))
							<li class="{{ $name == 'teachers_contributions_inactive' ? 'active' : '' }}">
								<a href="/teachers/contributions/inactive">
								<i class="icon-ban"></i>
								Inactivos</a>
							</li> 
							@endif
						
						</ul> -->
					</li>
					@endif

					<!-- Students Module -->

					@if(Auth::user()->hasCap('students_read_get_index'))
					<li class="tooltips {{ $name == 'students' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Inicio">
						<a href="/">
						<i class="icon-home"></i>
						<span class="title">
						Inicio </span>
						</a>
					</li>
					@endif

					@if(Auth::user()->hasCap('students_courses_get_index'))
					<li class="tooltips {{ $name == 'students_courses' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Todos los Cursos">
						<a href="/cursos">
						<i class="icon-notebook"></i>
						<span class="title">
						Cursos </span>
						</a>
					</li>
					@endif

					@if(Auth::user()->hasCap('students_teachers_get_index'))
					<li class="tooltips {{ $name == 'students_teachers' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Todos los Profesores">
						<a href="/profesores">
						<i class="icon-graduation"></i>
						<span class="title">
						Profesores </span>
						</a>
					</li>
					@endif

					@if(Auth::user()->hasCap('students_students_get_index'))
					<li class="tooltips {{ $name == 'students_students' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Todos los Estudiantes">
						<a href="/estudiantes">
						<i class="icon-emoticon-smile"></i>
						<span class="title">
						Estudiantes </span>
						</a>
					</li>
					@endif

					<!-- Users Module -->

					@if(Auth::user()->hasCap('users_mails_get_index'))
					<li class="tooltips {{ $name == 'users_mails' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Correos">
						<a href="/messages">
						<i class="icon-envelope-open"></i>
						<span class="title">
						Correo </span>
						</a>
					</li>
					@endif

					@if(Auth::user()->hasCap('users_profile_get_index'))
					<li class="tooltips {{ $name == 'users_profile' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Mi Perfil">
						<a href="/profile">
						<i class="icon-user"></i>
						<span class="title">
						Perfil </span>
						</a>
					</li>
					@endif


					<!-- END ANGULARJS LINK -->
					<!--
					<li>
						<a href="javascript:;">
						<i class="icon-basket"></i>
						<span class="title">eCommerce</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								<i class="icon-home"></i>
								Dashboard</a>
							</li>
							<li>
								<a href="index_extended.html">
								<i class="icon-basket"></i>
								Orders</a>
							</li>
							<li>
								<a href="index_extended.html">
								<i class="icon-tag"></i>
								Order View</a>
							</li>
							<li>
								<a href="index_extended.html">
								<i class="icon-handbag"></i>
								Products</a>
							</li>
							<li>
								<a href="index_extended.html">
								<i class="icon-pencil"></i>
								Product Edit</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-rocket"></i>
						<span class="title">Page Layouts</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-danger">new</span>Layout with Fontawesome Icons</a>
							</li>
							<li>
								<a href="index_extended.html">
								Layout with Glyphicon</a>
							</li>
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-warning">new</span>Full Height Content</a>
							</li>
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-warning">new</span>Right Sidebar Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Sidebar Fixed Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Sidebar Closed Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Content Loading via Ajax</a>
							</li>
							<li>
								<a href="index_extended.html">
								Disabled Menu Links</a>
							</li>
							<li>
								<a href="index_extended.html">
								Blank Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Fluid Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Language Switch Bar</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-diamond"></i>
						<span class="title">UI Features</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="ui_general.html">
								General Components</a>
							</li>
							<li>
								<a href="ui_buttons.html">
								Buttons</a>
							</li>
							<li>
								<a href="ui_confirmations.html">
								Popover Confirmations</a>
							</li>
							<li>
								<a href="ui_icons.html">
								<span class="badge badge-roundless badge-danger">new</span>Font Icons</a>
							</li>
							<li>
								<a href="ui_colors.html">
								Flat UI Colors</a>
							</li>
							<li>
								<a href="ui_typography.html">
								Typography</a>
							</li>
							<li>
								<a href="ui_tabs_accordions_navs.html">
								Tabs, Accordions & Navs</a>
							</li>
							<li>
								<a href="ui_tree.html">
								<span class="badge badge-roundless badge-danger">new</span>Tree View</a>
							</li>
							<li>
								<a href="ui_page_progress_style_1.html">
								<span class="badge badge-roundless badge-warning">new</span>Page Progress Bar</a>
							</li>
							<li>
								<a href="ui_blockui.html">
								Block UI</a>
							</li>
							<li>
								<a href="ui_notific8.html">
								Notific8 Notifications</a>
							</li>
							<li>
								<a href="ui_toastr.html">
								Toastr Notifications</a>
							</li>
							<li>
								<a href="ui_alert_dialog_api.html">
								<span class="badge badge-roundless badge-danger">new</span>Alerts & Dialogs API</a>
							</li>
							<li>
								<a href="ui_session_timeout.html">
								Session Timeout</a>
							</li>
							<li>
								<a href="ui_idle_timeout.html">
								User Idle Timeout</a>
							</li>
							<li>
								<a href="ui_modals.html">
								Modals</a>
							</li>
							<li>
								<a href="ui_extended_modals.html">
								Extended Modals</a>
							</li>
							<li>
								<a href="ui_tiles.html">
								Tiles</a>
							</li>
							<li>
								<a href="ui_datepaginator.html">
								<span class="badge badge-roundless badge-success">new</span>Date Paginator</a>
							</li>
							<li>
								<a href="ui_nestable.html">
								Nestable List</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-folder"></i>
						<span class="title">Multi Level Menu</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="javascript:;">
								<i class="icon-settings"></i> Item 1 <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="javascript:;">
										<i class="icon-user"></i>
										Sample Link 1 <span class="arrow"></span>
										</a>
										<ul class="sub-menu">
											<li>
												<a href="#"><i class="icon-power"></i> Sample Link 1</a>
											</li>
											<li>
												<a href="#"><i class="icon-paper-plane"></i> Sample Link 1</a>
											</li>
											<li>
												<a href="#"><i class="icon-star"></i> Sample Link 1</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#"><i class="icon-camera"></i> Sample Link 1</a>
									</li>
									<li>
										<a href="#"><i class="icon-link"></i> Sample Link 2</a>
									</li>
									<li>
										<a href="#"><i class="icon-pointer"></i> Sample Link 3</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="javascript:;">
								<i class="icon-globe"></i> Item 2 <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="#"><i class="icon-tag"></i> Sample Link 1</a>
									</li>
									<li>
										<a href="#"><i class="icon-pencil"></i> Sample Link 1</a>
									</li>
									<li>
										<a href="#"><i class="icon-graph"></i> Sample Link 1</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">
								<i class="icon-bar-chart"></i>
								Item 3 </a>
							</li>
						</ul>
					</li>
					<li class="heading">
						<h3>MORE FEATURES</h3>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-settings"></i>
						<span class="title">Form Stuff</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								Form Controls</a>
							</li>
							<li>
								<a href="index_extended.html">
								iCheck Controls</a>
							</li>
							<li>
								<a href="index_extended.html">
								Form Layouts</a>
							</li>
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-warning">new</span>Form X-editable</a>
							</li>
							<li>
								<a href="index_extended.html">
								Form Wizard</a>
							</li>
							<li>
								<a href="index_extended.html">
								Form Validation</a>
							</li>
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-danger">new</span>Image Cropping</a>
							</li>
							<li>
								<a href="index_extended.html">
								Multiple File Upload</a>
							</li>
							<li>
								<a href="index_extended.html">
								Dropzone File Upload</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-briefcase"></i>
						<span class="title">Data Tables</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								Basic Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Responsive Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Managed Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Editable Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Advanced Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Ajax Datatables</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-present"></i>
						<span class="title">Extra</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								About Us</a>
							</li>
							<li>
								<a href="index_extended.html">
								Contact Us</a>
							</li>
							<li>
								<a href="index_extended.html">
								Search Results</a>
							</li>
							<li>
								<a href="index_extended.html">
								Pricing Tables</a>
							</li>
							<li>
								<a href="index_extended.html">
								404 Page Option 1</a>
							</li>
							<li>
								<a href="index_extended.html">
								404 Page Option 2</a>
							</li>
							<li>
								<a href="index_extended.html">
								404 Page Option 3</a>
							</li>
							<li>
								<a href="index_extended.html">
								500 Page Option 1</a>
							</li>
							<li>
								<a href="index_extended.html">
								500 Page Option 2</a>
							</li>
						</ul>
					</li>
					-->
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>


		<!-- END SIDEBAR -->

		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<!-- BEGIN PAGE HEAD -->
				<div class="page-head">
					<!-- BEGIN PAGE TITLE -->
					<div class="page-title">
						<h1>{{ $title }} <small>{{ $description }}</small></h1>
					</div>
					<!-- END PAGE TITLE -->
					<!-- BEGIN PAGE TOOLBAR -->

					@yield('toolbar')
					
					<!-- END PAGE TOOLBAR -->
				</div>
				<!-- END PAGE HEAD -->
				<!-- BEGIN PAGE BREADCRUMB -->
				<ul class="page-breadcrumb breadcrumb">
					@foreach( $breadcrumbs as $breadcrumb )
					<li>
						<a href="{{ $breadcrumb['route'] }}">{{ $breadcrumb['name'] }}</a><i class="fa fa-circle"></i>
					</li>
					@endforeach
					<li class="active">
						{{ $sections[$section] }}
					</li>
				</ul>
				<!-- END PAGE BREADCRUMB -->
				<!-- BEGIN PAGE CONTENT INNER -->
				@if( $msg_danger != null )
					<div class="note note-danger">
						<h4>{{ $msg_danger['title'] }}</h4>
						<p>{{ $msg_danger['description'] }}</p>
					</div>
				@endif

				@if( $msg_warning != null )
					<div class="note note-warning">
						<h4>{{ $msg_warning['title'] }}</h4>
						<p>{{ $msg_warning['description'] }}</p>
					</div>
				@endif

				@if( $msg_success != null )
					<div class="note note-success">
						<h4>{{ $msg_success['title'] }}</h4>
						<p>{{ $msg_success['description'] }}</p>
					</div>
				@endif
				<!-- END PAGE CONTENT INNER -->

				@if( $msg_active != null )
					<div class="note note-active">
						<h4>{{ $msg_active['title'] }}</h4>
						<p>{{ $msg_active['description'] }}</p>
					</div>
				@endif

				@yield('content')

				<!-- END PAGE CONTENT INNER -->
			</div>
		</div>
		<!-- END CONTENT -->

	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner">
			2014 © Magicmedia Inc. Todos los Derechos Reservados.
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
	</div>

@yield('after')

<script type="text/javascript" src="/assets/global/plugins/noty/packaged/jquery.noty.packaged.js"></script>
<script type="text/javascript" src="/assets/global/scripts/notification.js"></script>

</body>
<!-- END BODY -->
</html>