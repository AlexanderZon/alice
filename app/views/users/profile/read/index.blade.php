@extends ('layouts.master')

@section('css')
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-summernote/summernote.css">

	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<!-- END PAGE LEVEL STYLES -->
@stop

@section('toolbar')
	
	<div class="page-toolbar">
		<!-- BEGIN THEME PANEL -->
		
		<!-- <div class="btn-group btn-theme-panel">
			<a href="{{ $route }}" class="btn tooltips" data-toggle="Añadir un nuevo registro" data-container="body" data-placement="left" data-html="true"  data-original-title="Volver al Listado de Usuarios"><i class="icon-arrow-left"></i></a>
		</div> -->
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
						<i class="fa fa-user"></i>Perfil de Usuario
					</div>
					<div class="tools">
						<!-- <a href="{{ $route }}" class="label bg-green-haze"><i class="fa fa-arrow-circle-left"></i> Volver</a> -->
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
											<input name="first_name" type="text" class="form-control" placeholder="Ingrese el nombre del Usuario" value="{{ $user->first_name }}">
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group {{ false ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Apellido</label>
										<div class="col-md-9">
											<input name="last_name" type="text" class="form-control" placeholder="Ingrese el nombre del Usuario" value="{{ $user->last_name }}">
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-2">Imágenes</label>
									<div class="col-md-10">
										<div class="fileinput fileinput-new col-md-4" data-provides="main_picture">
											<div>Imagen Principal</div>
											<div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
												<!-- <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/> -->
												<img src="{{ $profile->main_picture != '' ? $profile->main_picture : UserProfile::DEFAULT_MAIN_PICTURE }}" alt=""/>
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;">
											</div>
											<div>
												<span class="btn default btn-file">
												<span class="fileinput-new">
												Seleccionar Imagen </span>
												<span class="fileinput-exists">
												Cambiar </span>
												<input type="file" name="main_picture">
												</span>
												<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="main_picture">
												Remover </a>
											</div>
										</div>
										<div class="fileinput fileinput-new col-md-8" data-provides="cover_picture">
											<div>Imagen de Portada</div>
											<div class="fileinput-new thumbnail col-md-12">
												<!-- <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/> -->
												<img src="{{ $profile->cover_picture != '' ? $profile->cover_picture : UserProfile::DEFAULT_COVER_PICTURE }}" alt=""/>
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;">
											</div>
											<div>
												<span class="btn default btn-file">
												<span class="fileinput-new">
												Seleccionar Imagen </span>
												<span class="fileinput-exists">
												Cambiar </span>
												<input type="file" name="cover_picture">
												</span>
												<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="cover_picture">
												Remover </a>
											</div>
										</div>
										<!-- <div class="fileinput fileinput-new" data-provides="thumbnail_picture">
											<div>Imagen Miniatura</div>
											<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
												<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
												<img src="{{ $profile->thumbnail_picture != '' ? $profile->thumbnail_picture : UserProfile::DEFAULT_THUMBNAIL_PICTURE }}" alt=""/>
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;">
											</div>
											<div>
												<span class="btn default btn-file">
												<span class="fileinput-new">
												Seleccionar Imagen </span>
												<span class="fileinput-exists">
												Cambiar </span>
												<input type="file" name="thumbnail_picture">
												</span>
												<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="thumbnail_picture">
												Remover </a>
											</div>
										</div> -->
									</div>
								</div>
								<!--/span-->
							</div>
							<div class="row">
								<div class="col-md-12">&nbsp;</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_born_date_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Fecha de Nacimiento</label>
										<div class="col-md-9">
											<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-end-date="+0d">
												<input name="born_date" type="text" placeholder="Ingrese la Fecha de Nacimiento" class="form-control"  value="{{ date('d-m-Y', strtotime($profile->born_date)) }}" required readonly>
												<soan class="input-group-btn">
													<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</soan>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_born_place_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Lugar de Nacimiento</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-map-marker"></i>
												<input name="born_place" type="text" placeholder="Ingrese el Correo Electrónico" class="form-control"  value="{{ $profile->born_place }}" required>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_sex_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Sexo</label>
										<div class="col-md-9">
											<div class="input-group ">
												<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<select name="sex" class="form-control select2me" data-placeholder="Seleccione un rol de usuario..." required>
													<option value>--- SELECCIONE UN SEXO ---</option>
													<option value="male" {{ $profile->sex == 'male' ? 'selected' : '' }}>Masculino</option>
													<option value="female" {{ $profile->sex == 'female' ? 'selected' : '' }}>Femenino</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>

							<h3 class="form-section">Sobre Mí</h3>
							<!--/row-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_about_me_err' ? 'has-error' : '' }}">
										<div class="col-md-12">
											<textarea class="col-md-12 summernote" name="about_me">
												{{ $profile->about_me }}
											</textarea>
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
							</div>

							<h3 class="form-section">Actividades</h3>
							<!--/row-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_activities_err' ? 'has-error' : '' }}">
										<div class="col-md-12">
											<textarea class="col-md-12 summernote" name="activities">
												{{ $profile->activities }}
											</textarea>
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
							</div>

							<h3 class="form-section">Intereses</h3>
							<!--/row-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_interests_err' ? 'has-error' : '' }}">
										<div class="col-md-12">
											<textarea class="col-md-12 summernote" name="interests">
												{{ $profile->interests }}
											</textarea>
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
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_username_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Usuario</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-user"></i>
												<input name="username" type="text" class="form-control" placeholder="Ingrese el nombre del Usuario" value="{{ $user->username }}" readonly required>
											</div>
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">Nombre para mostrar</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-eye"></i>
												<input name="display_name" type="text" class="form-control" placeholder="Ingrese el nombre para mostrar" value="{{ $user->display_name }}">
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
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_email_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Correo</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-envelope"></i>
												<input name="email" type="email" placeholder="Ingrese el Correo Electrónico" class="form-control"  value="{{ $user->email }}" required>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_website_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Website</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-keyboard-o"></i>
												<input name="website" type="text" placeholder="Ingrese la URL de su Página Web" class="form-control"  value="{{ $profile->website }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_address_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Direccion</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-map-marker"></i>
												<input name="address" type="text" placeholder="Ingrese su Dirección" class="form-control"  value="{{ $profile->address }}">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_phones_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Teléfono</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-phone"></i>
												<input name="phones" type="text" placeholder="Ingrese su Número de Teléfono" class="form-control"  value="{{ $profile->phones }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<h3 class="form-section">Cambiar Contraseña</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_password_err' ? 'has-error' : '' }}">
										<label for="inputPassword1" class="col-md-3 control-label">Contraseña</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-lock"></i>
												<input name="password_1" type="password" class="form-control" id="inputPassword1" placeholder="Ingrese la Nueva Contraseña">
											</div>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'users_profile_password_err' ? 'has-error' : '' }}">
										<label for="inputPassword1" class="col-md-3 control-label">Repita la Contraseña</label>
										<div class="col-md-9">
											<div class="input-icon right">
												<i class="fa fa-lock"></i>
												<input name="password_2" type="password" class="form-control" id="inputPassword1" placeholder="Ingrese de nuevo la Nueva Contraseña">
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
											<button type="submit" class="btn green">Actualizar</button>
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

	<script type="text/javascript" src="/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<script src="/assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-summernote/summernote.js" type="text/javascript"></script>

	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	
	<script type="text/javascript">

	var ComponentsPickers = function () {

	    var handleDatePickers = function () {

	        if (jQuery().datepicker) {
	            $('.date-picker').datepicker({
	                rtl: Metronic.isRTL(),
	                orientation: "right",
	                language: "es",
	                autoclose: true
	            });
	            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
	        }

	    }	   

	    return {
	        //main function to initiate the module
	        init: function () {
	            handleDatePickers();
	        }
	    };

	}();

		var ComponentsEditors = function () {

		    var handleSummernote = function () {
		        $('.summernote').summernote({
		        	height: 300,
		        });
		        //API:
		        //var sHTML = $('#summernote_1').code(); // get code
		        //$('#summernote_1').destroy(); // destroy
		    }

		    return {
		        //main function to initiate the module
		        init: function () {
		            handleSummernote();
		        }
		    };

		}();

        jQuery(document).ready(function() {  
           	Metronic.init(); // init metronic core components
			Layout.init(); // init current layout
			Demo.init(); // init demo features
			ComponentsEditors.init();
			ComponentsPickers.init();
        });
	</script>

@stop