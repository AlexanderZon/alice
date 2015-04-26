@extends('layouts.messages')

@section('css')

<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-select/bootstrap-select.min.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/jquery-multi-select/css/multi-select.css"/>
@stop

@section('content')

	<div class="portlet light">
		<div class="portlet-body">
			<div class="row inbox">
				<div class="col-md-2">
					<ul class="inbox-nav margin-bottom-10">
						<li class="compose-btn">
							<a href="javascript:;" data-title="Escribir Nuevo Correo" class="btn green">
							<i class="fa fa-edit"></i> Escribir </a>
						</li>
						<li class="inbox active">
							<a href="javascript:;" class="btn" data-title="Bandeja de Entrada">
							Entrada ({{ count(Auth::user()->unreadbox) }}) </a>
							<b></b>
						</li>
						<li class="sent">
							<a class="btn" href="javascript:;" data-title="Enviados">
							Enviados </a>
							<b></b>
						</li>
						<li class="draft">
							<a class="btn" href="javascript:;" data-title="Borradores">
							Borradores </a>
							<b></b>
						</li>
						<li class="trash">
							<a class="btn" href="javascript:;" data-title="Papelera">
							Papelera </a>
							<b></b>
						</li>
					</ul>
				</div>
				<div class="col-md-10">
					<div class="inbox-header">
						<h1 class="pull-left">Entrada</h1>
						<form class="form-inline pull-right" action="" method="post">
							<div class="input-group input-medium">
								<input type="text" class="form-control" placeholder="Búsqueda">
								<span class="input-group-btn">
								<button type="submit" class="btn green"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>
					<div class="inbox-loading">
						 Cargando...
					</div>
					<div class="inbox-content">
					</div>
				</div>
			</div>
		</div>
	</div>

@stop

@section('javascripts')


@stop