@extends ('layouts.master')

@section('toolbar')
	
	<div class="page-toolbar">
		<!-- BEGIN THEME PANEL -->
		
		<div class="btn-group btn-theme-panel">
			<a href="{{ $route }}" class="btn tooltips" data-toggle="Añadir un nuevo registro" data-container="body" data-placement="left" data-html="true"  data-original-title="Volver al Listado de Usuarios"><i class="icon-arrow-left"></i></a>
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
						<i class="fa fa-user"></i>Creación de Usuarios
					</div>
					<div class="tools">
						<a href="{{ $route }}" class="label bg-green-haze"><i class="fa fa-arrow-circle-left"></i> Volver</a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="" method="post" class="form-horizontal">
						<div class="form-body">
							<h3 class="form-section">Información Personal</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">Nombre</label>
										<div class="col-md-9">
											<input name="first_name" type="text" class="form-control" placeholder="Ingrese el nombre del Usuario">
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group {{ false ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Apellido</label>
										<div class="col-md-9">
											<input name="last_name" type="text" class="form-control" placeholder="Ingrese el nombre del Usuario">
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<h3 class="form-section">Información de Usuario</h3>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'security_user_username_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Usuario</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-user"></i>
												<input name="username" type="text" class="form-control" placeholder="Ingrese el nombre del Usuario" required>
											</div>
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">Nombre a mostrar</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-eye"></i>
												<input name="display_name" type="text" class="form-control" placeholder="Ingrese el nombre para mostrar">
											</div>
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'security_user_email_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Correo</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-envelope"></i>
												<input name="email" type="email" placeholder="Ingrese el Correo Electrónico" class="form-control" required>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'security_user_role_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Rol</label>
										<div class="col-md-9">
											<div class="input-group ">
												<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<select name="role_id" class="form-control select2me" data-placeholder="Seleccione un rol de usuario..." required>
													<option value="0">--- SELECCIONE UN ROL DE USUARIO ---</option>
													@foreach( $roles as $role )
														<option value="{{ $role->id }}">{{ $role->title }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'security_user_password_err' ? 'has-error' : '' }}">
										<label for="inputPassword1" class="col-md-3 control-label">Contraseña</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-lock"></i>
												<input name="password_1" type="password" class="form-control" id="inputPassword1" placeholder="Ingrese la Contraseña del usuario" required>
											</div>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'security_user_password_err' ? 'has-error' : '' }}">
										<label for="inputPassword1" class="col-md-3 control-label">Repita la Contraseña</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-lock"></i>
												<input name="password_2" type="password" class="form-control" id="inputPassword1" placeholder="Ingrese de nuevo la Contraseña para el usuario" required>
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
											<button type="submit" class="btn green">Agregar</button>
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