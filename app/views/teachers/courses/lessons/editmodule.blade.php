
	<!-- BEGIN PICKERS LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/clockface/css/clockface.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"/>
	<!-- END PICKERS LEVEL STYLES -->

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
							<h4 class="profile-usertitle-name">Editar Módulo	
								<a href="javascript:;" class="btn blue-madison pull-right tooltips lessons-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
									<i class="fa fa-arrow-left"></i>
								</a>
							</h4>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form id="editmodule-form" action="" method="post" class="form-horizontal ajax-form" data-url="{{ $route }}/editmodule" enctype="multipart/form-data">
								<input type="hidden" name="module_id" value="{{ Crypt::encrypt($module->id) }}">
								<div class="form-body"> 
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-5">Nombre del Módulo</label>
												<div class="col-md-7">
													<input name="title" type="text" class="form-control" placeholder="Ingrese el nombre del Curso" value="{{ $module->title }}" required>
													<!-- <span class="help-block">This is inline help</span> -->
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="col-md-12">
												<input name="status" value="active" type="checkbox" class="make-switch" data-on-text="&nbsp;Activo&nbsp;&nbsp;" data-off-text="&nbsp;Inactivo&nbsp;" {{ ($module->status == 'active') ? 'checked="checked"' : '' }}>
												<!-- <span class="help-block">This is inline help</span> -->
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-5">Intérvalo de Tiempo</label>
												<div class="col-md-7">
													<div class="input-group" id="defaultrange">
														<input type="text" class="form-control" name="daterange" value="{{ date('d/m/Y', strtotime($module->date_start)) . ' - ' . date('d/m/Y', strtotime($module->date_end))}}">
														<span class="input-group-btn">
														<button class="btn default date-range-toggle" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</div>
											</div>
										</div>
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

		var ComponentsPickers = function () {

		    var handleDatePickers = function () {

		       	if (!jQuery().daterangepicker) {
		            return;
		        }
		        moment.locale('es');

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
		                startDate: moment("{{ date('Ymd', strtotime($module->date_start)) }}", "YYYYMMDD" ),
		                endDate: moment("{{ date('Ymd', strtotime($module->date_end)) }}", "YYYYMMDD" ),
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

		window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=lessons&action=editmodule&module_id={{ Hashids::encode($module->id) }}');
		document.title = 'Alice | {{ $course->title }} | {{ $module->title }} | Editar Módulo';

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->main_picture }}" class="img-responsive" alt="">');

	</script>