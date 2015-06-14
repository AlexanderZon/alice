
	<!-- BEGIN PICKERS LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/clockface/css/clockface.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"/>
	<!-- END PICKERS LEVEL STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.Metronic.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-summernote/summernote.css">

	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<!-- END PAGE LEVEL STYLES -->

	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PORTLET -->

			<div class="portlet light">

				<!-- END PAGE CONTENT INNER -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="portlet-title">
							<h4 class="profile-usertitle-name">Añadir Nueva Lección	
								<a href="javascript:;" class="btn blue-madison pull-right tooltips lessons-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
									<i class="fa fa-arrow-left"></i>
								</a>
							</h4>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form id="addlesson-form" action="" method="post" class="form-horizontal ajax-form" data-url="{{ $route }}/addlesson" enctype="multipart/form-data">
								<input type="hidden" name="module_id" value="{{ Hashids::encode($module->id) }}">
								<div class="form-body">
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-5">Nombre de la Lección</label>
												<div class="col-md-7">
													<input name="title" type="text" class="form-control" placeholder="Ingrese el nombre de la Lección" value="" required>
													<!-- <span class="help-block">This is inline help</span> -->
												</div>
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
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-5">Porcentaje de Aprobación</label>
												<div class="col-md-7">
													<input id="approval_percentage" type="text" name="approval_percentage" value=""/>
												</div>
											</div>
										</div>
									</div>
									@if($module->lessons->count() > 0)
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-3">Lección Previa</label>
													<div class="col-md-9">
														<div class="input-group ">
															<span class="input-group-addon">
															<i class="fa fa-user"></i>
															</span>
															<select name="previous_id" class="form-control select2me" data-placeholder="Seleccione una lección Previa..." required>
																<option value="0">--- SELECCIONE UNA LECCIÓN PREVIA ---</option>
																@foreach( $module->lessons as $lesson )
																	<option value="{{ Hashids::encode($lesson->id) }}">{{ $lesson->title }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>
									@endif
									<!-- <div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-5">Intervalo de Tiempo</label>
												<div class="col-md-7">
													<div class="input-group" id="defaultrange">
														<input type="text" class="form-control" name="daterange" value="">
														<span class="input-group-btn">
														<button class="btn default date-range-toggle" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div> -->
									<h3 class="form-section">Contenido</h3>
									<!--/row-->
									<div class="row">
										<div class="col-md-12">
											<div class="form-group {{ $msg_warning['name'] == 'teachers_courses_show_content_err' ? 'has-error' : '' }}">
												<div class="col-md-12">
													<textarea class="col-md-12 summernote" name="content">
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
													<button type="submit" class="btn green">Enviar</button>
													<a href="javascript:;" class="btn default lessons-back-btn">Volver</a>
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

	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="/assets/global/plugins/ion.rangeslider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PICKERS LEVEL PLUGINS -->
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/clockface/js/clockface.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/moment/moment.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<!-- END PICKERS LEVEL PLUGINS -->


	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	
	<script type="text/javascript">

		var ComponentsIonSliders = function () {

		    return {
		        //main function to initiate the module
		        init: function () {

		            $("#approval_percentage").ionRangeSlider({
		                min: 0,
		                max: 100,
		                type: 'single',
		                step: 1,
		                postfix: " %",
		                prettify: false,
		                hasGrid: true
		            });
		            
		        }

		    };

		}();

		var ComponentsPickers = function () {

		    var handleDatePickers = function () {

		       	if (!jQuery().daterangepicker) {
		            return;
		        }
		        moment.locale('es');
		        $('#defaultrange input').val(moment().format('DD/MM/YYYY') + ' - ' + moment().subtract('days', -29).format('DD/MM/YYYY'));

		        $('#defaultrange').daterangepicker({
		                opens: (Metronic.isRTL() ? 'left' : 'right'),
		                format: 'DD/MM/YYYY',
		                locale: {
			                applyLabel: 'Aplicar',
			                cancelLabel: 'Cancelar',
			                fromLabel: 'Desde',
			                toLabel: 'Hasta',
			                weekLabel: 'W',
			                customRangeLabel: 'Custom Range',
			                daysOfWeek: moment.weekdaysMin(),
			                monthNames: moment.monthsShort(),
			                firstDay: moment.localeData()._week.dow
			            },
		                separator: ' to ',
		                startDate: moment(),
		                endDate: moment().subtract('days', -29),
		                minDate: moment(),
		                maxDate: moment().subtract('days', -365),
		            },
		            function (start, end) {
		            	console.log('change;');
		                $('#defaultrange input').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
		            }
		        ); 

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
		ComponentsIonSliders.init();

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->main_picture }}" class="img-responsive" alt="">');

	</script>