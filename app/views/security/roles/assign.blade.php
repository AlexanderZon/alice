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
						<i class="fa fa-lock"></i>Asignación de Capacidades al Rol {{ $role->title }}
					</div>
					<div class="tools">
						<a href="{{ $route }}" class="label bg-green-haze"><i class="fa fa-arrow-circle-left"></i> Volver</a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="" method="post" class="form-horizontal">
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3">Capacidades</label>
								<div class="col-md-9">
									<select multiple="multiple" class="multi-select" id="my_multi_select1" name="capabilities[]">
										@foreach( $capabilities as $capability ):
											<option value="{{$capability->id}}" {{ Role::hasCapability($role, $capability) ? 'selected' : '' }}>{{ $capability->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Asignar</button>
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
			ComponentsDropdowns.init();

        });
	</script>
@stop