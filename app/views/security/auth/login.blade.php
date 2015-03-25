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
					<strong>¡Error!</strong> Usuario o Contraseña inválida.
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
</div>
<div class="copyright">
	 2014 © Magicmedia Inc. Todos los Derechos Reservados.
</div>
<!-- END LOGIN -->
@stop