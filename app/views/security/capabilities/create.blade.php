@extends ('layouts.master')

@section('toolbar')
		
	<div class="page-toolbar">
		<!-- BEGIN THEME PANEL -->
		
		<div class="btn-group btn-theme-panel">
			<a href="{{ $route }}" class="btn tooltips" data-toggle="Añadir un nuevo registro" data-container="body" data-placement="left" data-html="true"  data-original-title="Volver al Listado de Capacidades"><i class="icon-arrow-left"></i></a>
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
						<i class="fa fa-key"></i>Creación de Capacidades
					</div>
					<div class="tools">
						<a href="{{ $route }}" class="label bg-green-haze"><i class="fa fa-arrow-circle-left"></i> Volver</a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="" method="post" class="form-horizontal">
						<div class="form-body">
							<h3 class="form-section">Información de Capacidad</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">Título</label>
										<div class="col-md-9">
											<input name="title" type="text" class="form-control" placeholder="Ingrese el título de la Capacidad">
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group {{ false ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Descripción</label>
										<div class="col-md-9">
											<input name="description" type="text" class="form-control" placeholder="Ingrese la Descripción de la Capacidad">
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<h3 class="form-section">Información de Sistema</h3>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'security_capability_name_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Slug</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-code"></i>
												<input name="name" type="text" class="form-control" placeholder="Ingrese el nombre del Capacidad" required>
											</div>
											<span class="help-block"><em>e.j.: name_of_capability</em></span> 
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'security_capability_controller_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Controlador</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-crosshairs"></i>
												<input name="controller" type="text" class="form-control" placeholder="Ingrese el nombre para mostrar" required>
											</div>
											<span class="help-block"><em>e.j.: ControllerName@actionName</em></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'security_capability_crud_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">CRUD</label>
										<div class="col-md-9">
											<div class="input-group ">
												<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<select name="crud" class="form-control select2me" data-placeholder="Seleccione un rol de usuario..." required>
													<option value>--- SELECCIONE UN TIPO DE CRUD ---</option>
													<option value="CREATE">CREATE</option>
													<option value="READ">READ</option>
													<option value="UPDATE">UPDATE</option>
													<option value="DELETE">DELETE</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
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