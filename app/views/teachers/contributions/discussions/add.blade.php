
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-summernote/summernote.css">

	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<!-- END PAGE LEVEL STYLES -->

	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PORTLET -->

			<div class="portlet light" data-course="{{ Hashids::encode($course->id)}}">

				<!-- END PAGE CONTENT INNER -->
				<div class="row discussions">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="portlet-title">
							<h4 class="profile-usertitle-name">Añadir Nueva Discusión
								<a href="javascript:;" class="btn blue-madison pull-right tooltips discussions-back-btn" data-placement="left" data-original-title="Volver a las Discusiones">
									<i class="fa fa-arrow-left"></i>
								</a>
							</h4>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form id="discussion-add-form" action="" method="post" class="form-horizontal ajax-form" data-url="{{ $route }}/add"  enctype="multipart/form-data">
								<div class="form-body">
									<div class="row">&nbsp;</div>
									<div class="row">&nbsp;</div>
									<div class="row">
										<div class="col-md-8">
											<label class="control-label col-md-4">Título de la Discusión</label>
											<div class="col-md-8">
												<input name="title" type="text" class="form-control" placeholder="Ingrese el título de la discusión" value="" required>
												<!-- <span class="help-block">This is inline help</span> -->
											</div>
										</div>
										<div class="col-md-4">
											<div class="col-md-12">
												<input name="status" value="active" type="checkbox" class="make-switch" data-on-text="&nbsp;Activo&nbsp;&nbsp;" data-off-text="&nbsp;Inactivo&nbsp;" {{ (true) ? 'checked="checked"' : '' }}>
												<!-- <span class="help-block">This is inline help</span> -->
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="row">
										<div class="col-md-12">&nbsp;</div>
									</div>

									<h3 class="form-section">Contenido</h3>
									<!--/row-->
									<div class="row">
										<div class="col-md-12">
											<div class="form-group {{ $msg_warning['name'] == 'teachers_courses_show_description_err' ? 'has-error' : '' }}">
												<div class="col-md-12">
													<textarea class="col-md-12 summernote" name="content"></textarea>
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
													<button type="submit" class="btn green">Crear</button>
													<a href="javascript:;" class="btn default discussions-back-btn">Volver</a>
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
		    }

		    return {
		        init: function () {
		            handleSummernote();
		        }
		    };

		}();
		
		ComponentsEditors.init();
		ComponentsPickers.init();

		window.history.pushState("", "", '/teachers/contributions/show/{{ Hashids::encode($course->id) }}?section=discussions&action=add');
		document.title = 'Alice | {{ $course->title }} | Añadir Discusión';

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->main_picture }}" class="img-responsive" alt="">');

	</script>