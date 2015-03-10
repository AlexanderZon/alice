<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title></title>

	<link href="/assets/global/css/fonts.googleapis.com.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<script type="text/javascript" src="/assets/global/plugins/jquery.min.js"></script>
</head>
<body>
	<form method="post">
	<div class="row">
		<div class="col-md-6">
			<div class="col-md-3"><label>Pregunta: </label></div>
			<div class="col-md-9"><textarea name="question" class="col-md-10"></textarea></div>
		</div>
		<div class="col-md-6">
			<div class="col-md-3"><label>Respuesta Correcta: </label></div>
			<div class="col-md-9"><textarea name="correct" class="col-md-10"></textarea></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="col-md-3"><label>Respuesta Incorrecta 1: </label></div>
			<div class="col-md-9"><textarea name="incorrect[]" class="col-md-10"></textarea></div>
		</div>
		<div class="col-md-6">
			<div class="col-md-3"><label>Respuesta Incorrecta 2: </label></div>
			<div class="col-md-9"><textarea name="incorrect[]" class="col-md-10"></textarea></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="col-md-3"><label>Respuesta Incorrecta 3: </label></div>
			<div class="col-md-9"><textarea name="incorrect[]" class="col-md-10"></textarea></div>
		</div>
		<div class="col-md-6">
			<div class="col-md-3"><label>Respuesta Incorrecta 4: </label></div>
			<div class="col-md-9"><textarea name="incorrect[]" class="col-md-10"></textarea></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10">
		</div>
		<div class="col-md-2">
			<input type="submit" value="Enviar"/>
		</div>
	</div>
	</form>
</body>
</html>