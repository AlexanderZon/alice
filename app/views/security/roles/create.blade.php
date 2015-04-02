@extends ('layouts.master')

@section('toolbar')
		
	<div class="page-toolbar">
		<!-- BEGIN THEME PANEL -->
		
		<div class="btn-group btn-theme-panel">
			<a href="{{ $route }}" class="btn tooltips" data-toggle="Añadir un nuevo registro" data-container="body" data-placement="left" data-html="true"  data-original-title="Volver al Listado de Roles"><i class="icon-arrow-left"></i></a>
		</div>
		<!-- END THEME PANEL -->
	</div>

@stop

@section ("content")

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="portlet box green-haze">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-lock"></i>Creación de Roles
					</div>
					<div class="tools">
						<a href="{{ $route }}" class="label bg-green-haze"><i class="fa fa-arrow-circle-left"></i> Volver</a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="" method="post" class="form-horizontal">
						<div class="form-body">
							<h3 class="form-section">Información de Rol</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">Título</label>
										<div class="col-md-9">
											<input name="title" type="text" class="form-control" placeholder="Ingrese el Título del Rol">
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">Descripción</label>
										<div class="col-md-9">
											<input name="description" type="text" class="form-control" placeholder="Ingrese la Descripción del Rol">
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<div class="row"> 
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group {{ false ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Nombre</label>
										<div class="col-md-9">
											<input name="name" type="text" class="form-control" placeholder="Ingrese el Nombre del Rol">
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'security_user_role_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Escritorio</label>
										<div class="col-md-9">
											<div class="input-group ">
												<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<select name="dashboard_id" class="form-control select2me" data-placeholder="Seleccione un rol de usuario..." required>
													<option value>--- SELECCIONE UNA CAPACIDAD DE ESCRITORIO ---</option>
													@foreach( $capabilities as $capability )
														<option value="{{ $capability->id }}">{{ $capability->title }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Crear</button>
											<a href="{{ $route }}" class="btn default">Volver</a>
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