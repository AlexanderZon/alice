@extends ('layouts.master')

@section('toolbar')
	
	<div class="page-toolbar">
		<!-- BEGIN THEME PANEL -->
		
		<div class="btn-group btn-theme-panel">
			<a href="{{ $route }}" class="btn tooltips" data-toggle="Añadir un nuevo registro" data-container="body" data-placement="left" data-html="true"  data-original-title="Volver al Listado de Profesores"><i class="icon-arrow-left"></i></a>
		</div>
		<!-- END THEME PANEL -->
	</div>

@stop

@section ("content")

	<!-- END PAGE CONTENT INNER -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="portlet box green-haze">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-graduation-cap"></i>Eliminación de Profesores
					</div>
					<div class="tools">
						<a href="{{ $route }}/inactive" class="label bg-green-haze"><i class="fa fa-arrow-circle-left"></i> Volver</a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<div class="form-horizontal">
						<div class="form-body">
							<h3 >No se puede Eliminar el Profesor {{ $teacher->first_name }} {{ $teacher->last_name }} ya que tiene asociado {{ $courses->count() > 1 ? 'los cursos' : 'el curso'}}:</h3>
							<div class="row">
								<div class="col-md-1">&nbsp;</div>
								<div class="col-md-11">
									@foreach($courses as $course)
										<li><h4>{{ $course->title }}</h4></li>
									@endforeach
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">Para Proceder con la Eliminacion deberá eliminar los Cursos Asociados a este Profesor o Asignarlos a otro Profesor Activo</div>
							</div>
							<!--/row-->
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<!-- <button type="submit" class="btn btn-danger">Si, Eliminar</button> -->
											<a href="{{ $route }}/inactive" class="btn default">Volver</a>
										</div>
									</div>
								</div>
								<div class="col-md-6">
								</div>
							</div>
						</div>
					</div>
					<!-- END FORM-->
				</div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
		
@stop

@section('javascripts')
	<script type="text/javascript">
        jQuery(document).ready(function() {  
           	Metronic.init(); // init metronic core components
			Layout.init(); // init current layout
			Demo.init(); // init demo features
        });
	</script>
@stop