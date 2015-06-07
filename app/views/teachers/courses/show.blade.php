@extends ('teachers.layouts.sections')

@section('content_css')
	
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-summernote/summernote.css">

	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<!-- END PAGE LEVEL STYLES -->

@stop

@section ("content_profile")

	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PORTLET -->

			<div class="portlet light">

				<!-- END PAGE CONTENT INNER -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="portlet-title">
							<h4 class="profile-usertitle-name">Información del Curso</h4>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
								<div class="form-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Nombre del Curso</label>
												<div class="col-md-9">
													<input name="first_name" type="text" class="form-control" placeholder="Ingrese el nombre del Curso" value="{{ $course->title }}">
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
														<img src="{{ $course->main_picture != '' ? $course->main_picture : Course::DEFAULT_MAIN_PICTURE }}" alt=""/>
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
														<img src="{{ $course->cover_picture != '' ? $course->cover_picture : Course::DEFAULT_COVER_PICTURE }}" alt=""/>
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
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="row">
										<div class="col-md-12">&nbsp;</div>
									</div>

									<h3 class="form-section">Descripción</h3>
									<!--/row-->
									<div class="row">
										<div class="col-md-12">
											<div class="form-group {{ $msg_warning['name'] == 'teachers_courses_show_description_err' ? 'has-error' : '' }}">
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
				<!-- END PAGE CONTENT INNER -->
				
			</div>
					
			<!-- END PORTLET -->
		</div>
	</div>		
	
@stop

@section('content_javascripts')	

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
		
		ComponentsEditors.init();
		ComponentsPickers.init();
	</script>
@stop