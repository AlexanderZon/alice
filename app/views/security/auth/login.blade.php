@extends('layouts.login')

@section('login')
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" method="post">
		<input type="hidden" name="redirect_to" value="{{ $redirect_to }}"/>
		<h3 class="form-title">Iniciar Sesión</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Ingrese un usuario y una contraseña. </span>
		</div>
		@if( $msg_error != null )
			<div class="form-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<div class="alert alert-danger">
					<strong>¡Error!</strong> {{ $msg_error }}
				</div>
			</div>
		@endif
		@if( $msg_warning != null )
			<div class="form-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<div class="alert alert-warning">
					<strong>¡Advertencia!</strong> {{ $msg_warning['description'] }}
				</div>
			</div>
		@endif
		@if( $msg_success != null )
			<div class="form-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<div class="alert alert-success">
					<strong>¡Excelente!</strong> {{ $msg_success['description'] }}
				</div>
			</div>
		@endif
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Usuario</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="username"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Contraseña</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="password"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Entrar</button>
			<label class="rememberme check">
			<input type="checkbox" name="remember" value="1"/>Recordar </label>
			<a href="javascript:;" id="forget-password" class="forget-password">Olvidé mi contraseña</a>
		</div>
		<div class="create-account">
			<p>
				<a href="javascript:;" id="register-btn" class="uppercase">Registrate</a>
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="{{ $route }}/forgot" method="post">
		<h3>Olvidaste tu contraseña?</h3>
		<p>
			Introduce tu Correo Electrónico aquí para recuperarla
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Atras</button>
			<button type="submit" class="btn btn-success uppercase pull-right">Enviar</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	<form class="register-form" action="{{ $route }}/signup" method="post">
		<h3>Registro</h3>
		<p class="hint">
			 Introduce tus datos Personales:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Nombre</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Nombre" name="first_name"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Apellidos</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Apellidos" name="last_name"/>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Correo</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Correo" name="email"/>
		</div>
		<p class="hint">
			 Datos de Cuenta:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Usuario</label>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="username"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Contraseña</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Contraseña" name="password"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Repita su contraseña</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Repita su contraseña" name="rpassword"/>
		</div>
		<div class="form-group margin-top-20 margin-bottom-20">
			<label class="check">
			<input type="checkbox" name="tnc"/> Yo acepto los <a href="javascript:;">
			Terminos de Servicio </a>
			y las <a href="javascript:;">
			Políticas de Privacidad </a>
			</label>
			<div id="register_tnc_error">
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="register-back-btn" class="btn btn-default">Atrás</button>
			<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Enviar</button>
		</div>
	</form>
</div>
<div class="copyright">
	 2014 © Magicmedia Inc. Todos los Derechos Reservados.
</div>
<!-- END LOGIN -->
@stop