@extends ('layouts.master')

@section ("content")

		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat2">
					<div class="display">
						<div class="number">
							<h3 class="font-green-sharp"><span class="currency">{{ count($all_teachers) }}</span> <small class="font-green-sharp"></small></h3>
							<small>PROFESORES</small>
						</div>
						<div class="icon">
							<i class="icon-graduation"></i>
						</div>
					</div>
					<div class="progress-info">
						<div class="progress">
							<span style="width: {{ count($active_teachers) > 0 ? count($active_teachers)*100/count($all_teachers) : '0' }}%;" class="progress-bar progress-bar-success green-sharp">
							<span class="sr-only"><span class="currency">{{ count($active_teachers) > 0 ? round(count($active_teachers)*100/count($all_teachers)) : '0' }}</span> Activos</span>
							</span>
						</div>
						<div class="status">
							<div class="status-title">porcentaje activo</div>
							<div class="status-number">{{ count($active_teachers) > 0 ? round(count($active_teachers)*100/count($all_teachers)) : '0' }}%</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat2">
					<div class="display">
						<div class="number">
							<h3 class="font-red-haze">{{ count($all_students) }}<small class="font-red-haze"></small></h3>
							<small>ESTUDIANTES</small>
						</div>
						<div class="icon">
							<i class="icon-emoticon-smile"></i>
						</div>
					</div>
					<div class="progress-info">
						<div class="progress">
							<span style="width: {{ count($active_students) > 0 ? round(count($active_students)*100/count($all_students)) : '0' }}%;" class="progress-bar progress-bar-success red-haze">
							<span class="sr-only"></span>
							</span>
						</div>
						<div class="status">
							<div class="status-title">porcentaje activo</div>
							<div class="status-number">{{ count($active_students) > 0 ? round(count($active_students)*100/count($all_students)) : '0' }}%</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat2">
					<div class="display">
						<div class="number">
							<h3 class="font-blue-sharp">{{ count($all_courses) }}</h3>
							<small>CURSOS</small>
						</div>
						<div class="icon">
							<i class="icon-notebook"></i>
						</div>
					</div>
					<div class="progress-info">
						<div class="progress">
							<span style="width: {{ count($active_courses) > 0 ? round(count($active_courses)*100/count($all_courses)) : '0' }}%;" class="progress-bar progress-bar-success blue-sharp">
							<span class="sr-only">80% grow</span>
							</span>
						</div>
						<div class="status">
							<div class="status-title">en ejecución</div>
							<div class="status-number">{{ count($active_courses) > 0 ? round(count($active_courses)*100/count($all_courses)) : '0' }}%</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat2">
					<div class="display">
						<div class="number">
							<h3 class="font-purple-soft">{{ count($all_discussions )}}</h3>
							<small>DISCUSIONES</small> 
						</div>
						<div class="icon">
							<i class="icon-speech"></i>
						</div>
					</div>
					<div class="progress-info">
						<div class="progress">
							<span style="width: {{ count($active_discussions) > 0 ? round(count($active_discussions)*100/count($all_discussions)) : '0' }}%;" class="progress-bar progress-bar-success purple-soft">
							<span class="sr-only">56% change</span>
							</span>
						</div>
						<div class="status">
							<div class="status-title">ACTIVAS</div>
							<div class="status-number">{{ count($active_discussions) > 0 ? round(count($active_discussions)*100/count($all_discussions)) : '0' }}%</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- <div class="col-md-6 col-sm-12">
				BEGIN PORTLET
				<div class="portlet light ">
					<div class="portlet-title">
						<div class="caption caption-md">
							<i class="icon-bar-chart theme-font-color hide"></i>
							<span class="caption-subject theme-font-color bold uppercase">Movimientos</span>
							<span class="caption-helper hide">estadísticas semanales...</span>
						</div>
						<div class="actions">
								<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">Anual</label>
							<div class="btn-group btn-group-devided" data-toggle="buttons">
								<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
								<input type="radio" name="options" class="toggle" id="option1">Hoy</label>
								<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
								<input type="radio" name="options" class="toggle" id="option2">Semana</label>
								<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
								<input type="radio" name="options" class="toggle" id="option2">Mes</label>
							</div>
						</div>
					</div>
					<div class="portlet-body">
						<div class="row list-separated">
							<div class="col-md-3 col-sm-3 col-xs-6">
								<div class="font-grey-mint font-sm">
									Recibidos
								</div>
								<div class="uppercase font-hg font-green">
									<span class="currency">0</span> <span class="font-lg font-grey-mint">Bs.</span>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6">
								<div class="font-grey-mint font-sm">
									Ventas Totales
								</div>
								<div class="uppercase font-hg theme-font-color">
									<span class="currency">0</span> <span class="font-lg font-grey-mint">Bs.</span>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6">
								<div class="font-grey-mint font-sm">
									Pagos
								</div>
								<div class="uppercase font-hg font-yellow-casablanca">
									9,760 <span class="font-lg font-grey-mint">$</span>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6">
								<div class="font-grey-mint font-sm">
									Gastos Estimado Total
								</div>
								<div class="uppercase font-hg font-red-flamingo">
									13,760 <span class="font-lg font-grey-mint">$</span>
								</div>
							</div>
						</div>
						<ul class="list-separated list-inline-xs hide">
							<li>
								<div class="font-grey-mint font-sm">
									Total Sales
								</div>
								<div class="uppercase font-hg font-red-flamingo">
									13,760 <span class="font-lg font-grey-mint">$</span>
								</div>
							</li>
							<li>
							</li>
							<li class="border">
								<div class="font-grey-mint font-sm">
									Revenue
								</div>
								<div class="uppercase font-hg theme-font-color">
									4,760 <span class="font-lg font-grey-mint">$</span>
								</div>
							</li>
							<li class="divider">
							</li>
							<li>
								<div class="font-grey-mint font-sm">
									Expenses
								</div>
								<div class="uppercase font-hg font-purple">
									11,760 <span class="font-lg font-grey-mint">$</span>
								</div>
							</li>
							<li class="divider">
							</li>
							<li>
								<div class="font-grey-mint font-sm">
									Growth
								</div>
								<div class="uppercase font-hg font-blue-sharp">
									9,760 <span class="font-lg font-grey-mint">$</span>
								</div>
							</li>
						</ul>
						<div id="sales_statistics" class="portlet-body-morris-fit morris-chart" style="height: 260px"></div>
					</div>
				</div>
				END PORTLET
			</div> -->
			<div class="col-md-12 col-sm-12">
				<!-- BEGIN PORTLET-->
				<div class="portlet light ">
					<div class="portlet-title">
						<div class="caption caption-md">
							<i class="icon-bar-chart theme-font-color hide"></i>
							<span class="caption-subject theme-font-color bold uppercase">Cursos en Ejecución</span>
							<!-- <span class="caption-helper hide">estadísticas semanales...</span> -->
						</div>
						<div class="actions">
							<!-- <div class="btn-group btn-group-devided" data-toggle="buttons">
								<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
								<input type="radio" name="options" class="toggle" id="option1">Hoy</label>
								<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
								<input type="radio" name="options" class="toggle" id="option2">Semana</label>
								<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
								<input type="radio" name="options" class="toggle" id="option2">Mes</label>
							</div> -->
						</div>
					</div>
					<div class="portlet-body">
						<div class="row number-stats margin-bottom-30">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="stat-left">
									<div class="stat-chart">
										<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
										<div id="sparkline_bar"> </div>
									</div>
									<div class="stat-number">
										<div class="title">
											Profesores
										</div>
										<div class="number">
											{{ count($active_teachers) }}
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="stat-right">
									<div class="stat-chart">
										<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
										<div id="sparkline_bar2"> </div>
									</div>
									<div class="stat-number">
										<div class="title">
											Media de Lecciones por Curso
										</div>
										<div class="number">
											{{ count($active_courses) > 0 ? round(count($active_lessons)/count($active_courses), 2 ) : 0 }}
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="scroller" style="height: 244px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
						<!-- <div class="table-scrollable table-scrollable-borderless"> -->
							<table class="table table-hover table-light">
								<thead>
									<tr class="uppercase">
										<!-- <th colspan="2">
											PROYECTO
										</th> -->
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
								@foreach($active_courses as $course)
									<tr>
										<td class="fit">
											<img class="user-pic" src="{{ $course->thumbnail_picture != '' ? $course->thumbnail_picture : Course::DEFAULT_THUMBNAIL_PICTURE }}">
										</td>
										<td>
											<a href="javascript:;" class="primary-link">{{ $course->title }}</a>
										</td>
										<td>
											{{ $course->teacher->first_name }} {{ $course->teacher->last_name }}
										</td>
										<td>
											{{ count($course->students) }}
										</td>
										<td>
											{{ count($course->lessons) }}
										</td>
										<td>
											<span class="bold theme-font-color">{{ $course->average() }}</span>
										</td>
									</tr>
								@endforeach
							</table>
						<!-- </div> -->
						</div>
					</div>
				</div>
				<!-- END PORTLET-->
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