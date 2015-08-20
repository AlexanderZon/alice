@extends ('layouts.master')

@section('css')
	<link href="/assets/admin/pages/css/todo.css" rel="stylesheet" type="text/css"/>
@stop

@section ("content")

		<div class="row">
			<div class="col-md-12 col-sm-12">
				<!-- BEGIN PORTLET-->
				<div class="portlet light ">
					<div class="portlet-title">
						<div class="caption caption-md">
							<i class="icon-bar-chart theme-font-color hide"></i>
							<span class="caption-subject theme-font-color bold uppercase">Notificaciones ({{ Auth::user()->newnotifications->count() }})</span>
							<!-- <span class="caption-helper hide">estadísticas semanales...</span> -->
						</div>
						<div class="actions">
							<a href="javascript:;" class="btn green-haze">Marcar todas como leidas</a>
						</div>
					</div>
					<div class="portlet-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="scroller" style="max-height: 800px;" data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
									<div class="todo-tasklist">
										@foreach($notifications as $notification)
											<div class="todo-tasklist-item todo-tasklist-item-border-{{ str_replace('bg-','',$notification->badge) }} notification-go" data-notification="{{ Crypt::encrypt($notification->id) }}" style="{{ $notification->status == 'catched' ? 'background-color:#DEE8EA' : '' }}">
												<img class="todo-userpic pull-left" src="{{ $notification->picture }}" width="27px" height="27px">
												<div class="todo-tasklist-item-title">
													 {{ $notification->title }}
												</div>
												<div class="todo-tasklist-item-text">
													 {{ $notification->description }}
												</div>
												<div class="todo-tasklist-controls pull-left">
													<span class="todo-tasklist-date"><i class="fa {{ $notification->icon }}"></i><span class="timeago">{{ $notification->created_at }}</span></span>
													<!-- <span class="todo-tasklist-badge badge badge-roundless">Urgent</span> -->
												</div>
											</div>
										@endforeach
										<div class="todo-tasklist-item todo-tasklist-item-border-green">
											<img class="todo-userpic pull-left" src="../../assets/admin/layout4/img/avatar4.jpg" width="27px" height="27px">
											<div class="todo-tasklist-item-title">
												 Slider Redesign
											</div>
											<div class="todo-tasklist-item-text">
												 Lorem dolor sit amet ipsum dolor sit consectetuer dolore.
											</div>
											<div class="todo-tasklist-controls pull-left">
												<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 21 Sep 2014 </span>
												<span class="todo-tasklist-badge badge badge-roundless">Urgent</span>
											</div>
										</div>
										<div class="todo-tasklist-item todo-tasklist-item-border-red">
											<img class="todo-userpic pull-left" src="../../assets/admin/layout4/img/avatar5.jpg" width="27px" height="27px">
											<div class="todo-tasklist-item-title">
												 Homepage Alignments to adjust
											</div>
											<div class="todo-tasklist-item-text">
												 Lorem ipsum dolor sit amet, consectetuer dolore dolor sit amet.
											</div>
											<div class="todo-tasklist-controls pull-left">
												<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 14 Sep 2014 </span>
												<span class="todo-tasklist-badge badge badge-roundless">Important</span>
											</div>
										</div>
										<div class="todo-tasklist-item todo-tasklist-item-border-green">
											<img class="todo-userpic pull-left" src="../../assets/admin/layout4/img/avatar9.jpg" width="27px" height="27px">
											<div class="todo-tasklist-item-title">
												 Slider Redesign
											</div>
											<div class="todo-tasklist-controls pull-left">
												<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 10 Feb 2015 </span>
												<span class="todo-tasklist-badge badge badge-roundless">Important</span>&nbsp;
											</div>
										</div>
										<div class="todo-tasklist-item todo-tasklist-item-border-blue">
											<img class="todo-userpic pull-left" src="../../assets/admin/layout4/img/avatar6.jpg" width="27px" height="27px">
											<div class="todo-tasklist-item-title">
												 Contact Us Map Location changes
											</div>
											<div class="todo-tasklist-item-text">
												 Lorem ipsum amet, consectetuer dolore dolor sit amet.
											</div>
											<div class="todo-tasklist-controls pull-left">
												<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 04 Oct 2014 </span>
												<span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp; <span class="todo-tasklist-badge badge badge-roundless">Test</span>
											</div>
										</div>
										<div class="todo-tasklist-item todo-tasklist-item-border-purple">
											<img class="todo-userpic pull-left" src="../../assets/admin/layout4/img/avatar7.jpg" width="27px" height="27px">
											<div class="todo-tasklist-item-title">
												 Projects list new Forms
											</div>
											<div class="todo-tasklist-item-text">
												 Lorem ipsum dolor sit amet, consectetuer dolore psum dolor sit.
											</div>
											<div class="todo-tasklist-controls pull-left">
												<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 19 Dec 2014 </span>
											</div>
										</div>
										<div class="todo-tasklist-item todo-tasklist-item-border-yellow">
											<img class="todo-userpic pull-left" src="../../assets/admin/layout4/img/avatar8.jpg" width="27px" height="27px">
											<div class="todo-tasklist-item-title">
												 New Search Keywords
											</div>
											<div class="todo-tasklist-item-text">
												 Lorem ipsum dolor sit amet, consectetuer sit amet ipsum dolor, consectetuer ipsum consectetuer sit amet dolore.
											</div>
											<div class="todo-tasklist-controls pull-left">
												<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 02 Feb 2015 </span>
												<span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp;
											</div>
										</div>
										<div class="todo-tasklist-item todo-tasklist-item-border-green">
											<img class="todo-userpic pull-left" src="../../assets/admin/layout4/img/avatar9.jpg" width="27px" height="27px">
											<div class="todo-tasklist-item-title">
												 Slider Redesign
											</div>
											<div class="todo-tasklist-controls pull-left">
												<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 10 Feb 2015 </span>
												<span class="todo-tasklist-badge badge badge-roundless">Important</span>&nbsp;
											</div>
										</div>
										<div class="todo-tasklist-item todo-tasklist-item-border-red">
											<img class="todo-userpic pull-left" src="../../assets/admin/layout4/img/avatar5.jpg" width="27px" height="27px">
											<div class="todo-tasklist-item-title">
												 Homepage Alignments to adjust
											</div>
											<div class="todo-tasklist-item-text">
												 Lorem ipsum dolor sit amet, consectetuer dolore psum dolor sit.
											</div>
											<div class="todo-tasklist-controls pull-left">
												<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 14 Sep 2014 </span>
												<span class="todo-tasklist-badge badge badge-roundless">Important</span>
											</div>
										</div>
										<div class="todo-tasklist-item todo-tasklist-item-border-blue">
											<img class="todo-userpic pull-left" src="../../assets/admin/layout4/img/avatar6.jpg" width="27px" height="27px">
											<div class="todo-tasklist-item-title">
												 Contact Us Improvement
											</div>
											<div class="todo-tasklist-item-text">
												 Lorem ipsum amet, psum dolor sit consectetuer dolore.
											</div>
											<div class="todo-tasklist-controls pull-left">
												<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 21 Feb 2015 </span>
												<span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp; <span class="todo-tasklist-badge badge badge-roundless">Primary</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END PORTLET-->
			</div>
		</div>
		
@stop

@section('javascripts')

	<script src="/assets/admin/pages/scripts/todo.js" type="text/javascript"></script>
	<script type="text/javascript" src="/assets/global/plugins/moment/moment.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>

	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {    
		   	Metronic.init(); // init metronic core componets
			Todo.init(); // init todo page 
		 	moment.locale('es');
		 	console.log('ready');
		 	jQuery('.timeago').each(function(e){
		 		console.log('timeago');
		 		jQuery(this).html(moment(jQuery(this).html()).fromNow());
		 	});
		});
	</script>

@stop