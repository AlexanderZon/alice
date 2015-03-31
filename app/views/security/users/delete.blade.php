@extends ('layouts.master')

@section ("content")
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
			<div class="page-toolbar">
				<!-- BEGIN THEME PANEL -->
				
				<div class="btn-group btn-theme-panel">
					<a href="{{ $route }}" class="btn tooltips" data-toggle="Añadir un nuevo registro" data-container="body" data-placement="left" data-html="true"  data-original-title="Volver al Listado de Usuarios"><i class="icon-arrow-left"></i></a>
				</div>
				<!-- END THEME PANEL -->
			</div>
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
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="portlet box green-haze">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-user"></i>Eliminación de Usuarios
						</div>
						<div class="tools">
							<a href="{{ $route }}" class="label bg-green-haze"><i class="fa fa-arrow-circle-left"></i> Volver</a>
						</div>
					</div>
					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form action="" method="post" class="form-horizontal">
							<div class="form-body">
								<h3 >¿Desea eliminar el usuario {{ $user->first_name }} {{ $user->last_name }}?</h3>
								<input type="hidden" name="id" value="{{ $user->id }}"/>
								<!--/row-->
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<button type="submit" class="btn btn-danger">Si, Eliminar</button>
												<a href="{{ $route }}" class="btn default">No, Volver</a>
											</div>
										</div>
									</div>
									<div class="col-md-6">
									</div>
								</div>
							</div>
						</form>
						<!-- END FORM-->
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE CONTENT INNER -->
	</div>
</div>
<!-- END CONTENT -->
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