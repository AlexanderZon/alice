@extends ('layouts.master')

@section ("content")

		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="dashboard-stat2">
					<div class="display">
						<div class="number">
							<h3 class="font-green-sharp"><span class="currency">{{ count($courses) }}</span> <small class="font-green-sharp"></small></h3>
							<small>CURSOS</small>
						</div>
						<div class="icon">
							<i class="icon-graduation"></i>
						</div>
					</div>
					<!-- <div class="progress-info">
						<div class="progress">
							<span style="width: {{ '0' }}%;" class="progress-bar progress-bar-success green-sharp">
							<span class="sr-only"><span class="currency">{{ '0' }}</span> Activos</span>
							</span>
						</div>
						<div class="status">
							<div class="status-title">porcentaje activo</div>
							<div class="status-number">{{ '0' }}%</div>
						</div>
					</div> -->
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="dashboard-stat2">
					<div class="display">
						<div class="number">
							<h3 class="font-red-haze">{{ count($students) }}<small class="font-red-haze"></small></h3>
							<small>ESTUDIANTES</small>
						</div>
						<div class="icon">
							<i class="icon-emoticon-smile"></i>
						</div>
					</div>
					<!-- <div class="progress-info">
						<div class="progress">
							<span style="width: {{ '0' }}%;" class="progress-bar progress-bar-success red-haze">
							<span class="sr-only"></span>
							</span>
						</div>
						<div class="status">
							<div class="status-title">porcentaje activo</div>
							<div class="status-number">{{ '0' }}%</div>
						</div>
					</div> -->
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="dashboard-stat2">
					<div class="display">
						<div class="number">
							<h3 class="font-blue-sharp">{{ count($lessons) }}</h3>
							<small>LECCIONES</small>
						</div>
						<div class="icon">
							<i class="icon-notebook"></i>
						</div>
					</div>
					<!-- <div class="progress-info">
						<div class="progress">
							<span style="width: {{ '0' }}%;" class="progress-bar progress-bar-success blue-sharp">
							<span class="sr-only">{{ '0' }}%</span>
							</span>
						</div>
						<div class="status">
							<div class="status-title">en ejecución</div>
							<div class="status-number">{{ '0' }}%</div>
						</div>
					</div> -->
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat2">
					<div class="display">
						<div class="number">
							<h3 class="font-purple-soft">{{ count($contributing) }}</h3>
							<small>CONTRIBUCIONES</small> 
						</div>
						<div class="icon">
							<i class="icon-speech"></i>
						</div>
					</div>
					<!-- <div class="progress-info">
						<div class="progress">
							<span style="width: {{ '0' }}%;" class="progress-bar progress-bar-success purple-soft">
							<span class="sr-only">56% change</span>
							</span>
						</div>
						<div class="status">
							<div class="status-title">ACTIVAS</div>
							<div class="status-number">{{ '0' }}%</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<!--
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="portlet light ">
					<div class="portlet-title">
						<div class="caption caption-md">
							<i class="icon-bar-chart theme-font-color hide"></i>
							<span class="caption-subject theme-font-color bold uppercase">Cursos en Ejecución</span>
						</div>
					</div>
					<div class="portlet-body">
						<div class="row number-stats margin-bottom-30">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="stat-left">
									<div class="stat-chart">
										<div id="sparkline_bar"> </div>
									</div>
									<div class="stat-number">
										<div class="title">
											Profesores
										</div>
										<div class="number">
											{{ 0 }}
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="stat-right">
									<div class="stat-chart">
										<div id="sparkline_bar2"> </div>
									</div>
									<div class="stat-number">
										<div class="title">
											Media de Lecciones por Curso
										</div>
										<div class="number">
											{{ 0 }}
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="scroller" style="height: 244px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
							<table class="table table-hover table-light">
								<thead>
									<tr class="uppercase">
										<th colspan="2">
											CURSO
										</th>
										<th>
											PROFESOR
										</th>
										<th>
											ESTUDIANTES
										</th>
										<th>
											LECCIONES
										</th>
										<th>
											PROMEDIO
										</th>
									</tr>
								</thead>
								<tr>
									<td class="fit">
										<img class="user-pic" src="{{ Course::DEFAULT_THUMBNAIL_PICTURE }}">
									</td>
									<td>
										<a href="javascript:;" class="primary-link">{{ 'Titulo' }}</a>
									</td>
									<td>
										{{ 'Nombre' }} {{ 'Apellido' }}
									</td>
									<td>
										{{ 0 }}
									</td>
									<td>
										{{ 0 }}
									</td>
									<td>
										<span class="bold theme-font-color">{{ 0 }}</span>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		-->
		<link href="/assets/admin/pages/css/blog.css" rel="stylesheet" type="text/css"/>
		<link href="/assets/admin/pages/css/news.css" rel="stylesheet" type="text/css"/>

		<style type="text/css">
			.course-students{
				text-align: right;
				display: block;
			}
			.student-line-picture{
				width: 40px;
				height: 40px;
				display: inline-block;
				margin-left: 5px;
			}
			.full-width{
				width: 100%;
			}
		</style>

	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PORTLET -->

			<div class="portlet light">
				<!-- STAT -->
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-12 blog-page">
							<div class="row">
								<div class="col-md-12 col-sm-12 article-block">
									<!-- <h4 class="profile-desc-title">Aprendiendo ({{ $courses->count() }})</h4> -->
									@if($courses->count() > 0 )
										@foreach($courses as $course)
											<div class="row">
												<div class="col-lg-2 col-md-4 blog-img blog-tag-data">
													<div class="mask-circle">
														<img src="{{ $course->main_picture }}" alt="" class="img-responsive">			
													</div>
													<ul class="list-inline">
														<!--
														<li>
															<i class="fa fa-user"></i>
															<a href="{{ $course->teacher->username }}">
															{{ $course->teacher->display_name }} </a>
														</li>
														-->
														<li>
															<i class="fa fa-users"></i>
															{{ $course->students()->count() }} Estudiantes
														</li>
														<li>
															<i class="fa fa-book"></i>
															{{ $course->lessons()->count() }} Lecciones
														</li>
														<li>
															<i class="fa fa-comments"></i>
															{{ $course->discussions()->count() }} Discusiones
														</li>
														<li>
															<i class="fa fa-flask"></i>
															{{ $course->evaluations()->count() }} Actividades
														</li>
													</ul>
													<!-- <ul class="list-inline blog-tags">
														<li>
															<i class="fa fa-tags"></i>
															<a href="javascript:;">
															Technology </a>
															<a href="javascript:;">
															Education </a>
															<a href="javascript:;">
															Internet </a>
														</li>
													</ul> -->
												</div>
												<div class="col-lg-10 col-md-8 blog-article">
													<h3>
													<a href="{{ $course->getRoute() }}">{{ $course->title }}</a>
													</h3>
													<p class="justify">
														{{ $course->getSummary(2000) }}
													</p>
													<a class="btn blue" href="{{ $route }}/courses/show/{{ Hashids::encode($course->id) }}">
													Gestionar <i class="m-icon-swapright m-icon-white"></i>
													</a>
													<div class="course-students">
														<h5>Estudiantes destacados</h5>
															@if(count($course->beststudents()) > 0)
																@foreach($course->beststudents() as $student)
																	<a href="/{{ $student->username }}" class="student-line-picture tooltips" data-original-title="{{ $student->display_name }}"><img alt="" class="img-circle full-width" src="{{ $student->profile->getAvatar() }}"></a>
																@endforeach
															@else
																<span>No hay estudientes en este curso aún</span>
															@endif
														<!-- <a href="#" class="student-line-picture"><img alt="" class="img-circle full-width" src="/uploads/users/AlexanderZon/images/A5790167-359B-B89B-60CD-A405C4207010.jpg"></a>
														<a href="#" class="student-line-picture"><img alt="" class="img-circle full-width" src="/uploads/users/AlexanderZon/images/A5790167-359B-B89B-60CD-A405C4207010.jpg"></a>
														<a href="#" class="student-line-picture"><img alt="" class="img-circle full-width" src="/uploads/users/AlexanderZon/images/A5790167-359B-B89B-60CD-A405C4207010.jpg"></a> -->
													</div>
												</div>
											</div>
											<hr>
										@endforeach
									@else
										No has sido asignado a ningún curso como Profesor.
									@endif
								</div>
								<!--end col-md-12-->
							</div>
							@if( $courses->count() > 0 )
								{{ $courses->links('users.wall.read.paginate')->with(array('courses' => $courses, 'section' => 'list')) }}
							@endif
						</div>
					</div>
				</div>
			</div>
					
			<!-- END PORTLET -->
		</div>
	</div>	
		
@stop

@section('javascripts')
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {    
		   	Metronic.init(); // init metronic core componets
		   	Layout.init(); // init layout
		   	Demo.init(); // init demo features 
		    Index.init(); // init index page
		 	Tasks.initDashboardWidget(); // init tash dashboard widget  
		 	moment.locale('es');
		 	jQuery('.timeago').each(function(e){
		 		jQuery(this).html(moment(jQuery(this).html()).fromNow());
		 	});
		});
	</script>

@stop