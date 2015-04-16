@extends ('layouts.master')

@section('css')
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-summernote/summernote.css">
	<!-- END PAGE LEVEL STYLES -->
@stop

@section('toolbar')
	
	<div class="page-toolbar">
		<!-- BEGIN THEME PANEL -->
		
		<div class="btn-group btn-theme-panel">
			<a href="{{ $route }}" class="btn tooltips" data-toggle="Añadir un nuevo registro" data-container="body" data-placement="left" data-html="true"  data-original-title="Volver al Listado de Cursos"><i class="icon-arrow-left"></i></a>
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
						<i class="icon-notebook"></i>Edición de Cursos
					</div>
					<div class="tools">
						<a href="{{ $route }}" class="label bg-green-haze"><i class="fa fa-arrow-circle-left"></i> Volver</a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-body">
							<h3 class="form-section">Datos del Curso</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group  {{ $msg_warning['name'] == 'coordinators_courses_author_id_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Profesor</label>
										<div class="col-md-9">
											<select class="form-control select2me" name="author_id" required>
												<option value>--- SELECCIONE UN PROFESOR ---</option>
												@if($teachers)
													@foreach($teachers as $teacher)
														<option value="{{ $teacher->id }}" {{ $teacher->id == $course->author_id ? 'selected' : '' }}>{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
													@endforeach
												@endif
											</select>
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group {{ $msg_warning['name'] == 'coordinators_courses_title_err' ? 'has-error' : '' }}">
										<label class="control-label col-md-3">Título</label>
										<div class="col-md-9">
											<input name="title" type="text" class="form-control" placeholder="Ingrese el Título del Curso" required value="{{ $course->title }}">
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<h3 class="form-section">Descripción</h3>
							<!--/row-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group {{ $msg_warning['name'] == 'coordinators_courses_description_err' ? 'has-error' : '' }}">
										<div class="col-md-12">
											<textarea class="col-md-12 summernote" name="description">
												{{ $course->description }}
											</textarea>
											<!-- <span class="help-block">This is inline help</span> -->
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="form-group last">
									<label class="control-label col-md-3">Imágenes</label>
									<div class="col-md-9">
										<div class="fileinput fileinput-new" data-provides="main_picture">
											<div>Imagen Principal</div>
											<div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
												<!-- <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/> -->
												<img src="{{ $course->main_picture != '' ? $course->main_picture : Course::DEFAULT_MAIN_IMAGE }}" alt=""/>
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
										<div class="fileinput fileinput-new" data-provides="cover_picture">
											<div>Imagen de Portada</div>
											<div class="fileinput-new thumbnail" style="width: 200px; height: 50px;">
												<!-- <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/> -->
												<img src="{{ $course->cover_picture != '' ? $course->cover_picture : Course::DEFAULT_COVER_IMAGE }}" alt=""/>
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
										<div class="fileinput fileinput-new" data-provides="thumbnail_picture">
											<div>Imagen Miniatura</div>
											<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
												<!-- <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/> -->
												<img src="{{ $course->thumbnail_picture != '' ? $course->thumbnail_picture : Course::DEFAULT_THUMBNAIL_IMAGE  }}" alt=""/>
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
	
	<script type="text/javascript">

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
        });
	</script>
@stop