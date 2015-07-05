
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
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/jquery-nestable/jquery.nestable.css"/>
	<!-- END PAGE LEVEL STYLES -->

	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PORTLET -->

			<div class="portlet light">

				<!-- END PAGE CONTENT INNER -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="portlet-title">
							<h4 class="profile-usertitle-name">Ordenamiento de Lecciones	
								<a href="javascript:;" class="btn blue-madison pull-right tooltips lessons-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
									<i class="fa fa-arrow-left"></i>
								</a>
							</h4>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<div class="row">&nbsp;</div>
							@if($module->lessons->count() > 0)
								<div class="row">
									<span class="col-md-1"></span>
									<span class="col-md-10 dd-handle grey-silver" style="cursor: help">Arrastra las lecciones a la posición que desee colocarlas</span>
									<span class="col-md-1"></span>
								</div>
							@else
								<div class="row">
									<span class="col-md-1"></span>
									<span class="col-md-10 dd-handle grey-silver" style="cursor: help">No Existe ninguna lección en este módulo</span>
									<span class="col-md-1"></span>
								</div>
							@endif
							<div class="row">&nbsp;</div>
							<div class="col-md-12">
								<div class="portlet-body ">
									<div class="dd" id="nestable-list">
										@if($module->lessons->count() > 0)
											<ol class="dd-list">
												@foreach($module->lessons as $lesson)
													<li class="dd-item dd-nochildren children" data-id="{{ Hashids::encode($lesson->id) }}">
														<div class="dd-handle blue">
															 {{ $lesson->title }}
														</div>
													</li>
												@endforeach
											</ol>
										@endif
									</div>
								</div>
							</div>
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
	<script type="text/javascript" src="/assets/global/plugins/jquery-nestable/jquery.nestable.js"></script>
	
	<script type="text/javascript">

		var UINestable = function () {

		    var updateOutput = function (e) {
		        var list = e.length ? e : $(e.target);
		        var data = list.nestable('serialize');

		        $.ajax({
		        	url: '{{ $route }}/orderlessons',
		        	type: 'POST',
		        	data: {
		        		'order': jQuery('#nestable-list').nestable('serialize'),
		        		'module': '{{ Hashids::encode($module->id) }}',
		        	},
		        	success: function(data){
		        		console.log(data);
		        	},
		        	error: function(xhr){
		        		console.log(xhr);
		        	}
		        });
		        /*
		            output = list.data('output');
		        if (window.JSON) {
		            output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
		        } else {
		            output.val('JSON browser support required for this demo.');
		        }*/
		    };


		    return {
		        //main function to initiate the module
		        init: function () {

		            // activate Nestable for list 1
		            $('#nestable-list').nestable({
		                group: 1,
		            })
		                .on('change', updateOutput);

		            // activate Nestable for list 2
		            $('#nestable_list_2').nestable({
		                group: 1
		            })
		                .on('change', updateOutput);

		            // output initial serialised data
		            updateOutput($('#nestable_list_1').data('output', $('#nestable_list_1_output')));
		            updateOutput($('#nestable_list_2').data('output', $('#nestable_list_2_output')));

		            $('#nestable_list_menu').on('click', function (e) {
		                var target = $(e.target),
		                    action = target.data('action');
		                if (action === 'expand-all') {
		                    $('.dd').nestable('expandAll');
		                }
		                if (action === 'collapse-all') {
		                    $('.dd').nestable('collapseAll');
		                }
		            });

		            $('#nestable_list_3').nestable();

		        }

		    };

		}();

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
		                startDate: moment(),
		                endDate: moment(),
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
		UINestable.init();

		window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=lessons&action=orderlessons&module_id={{ Hashids::encode($module->id) }}');
		document.title = 'Alice | {{ $course->title }} | {{ $module->title }} | Ordenar Lecciones';

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->main_picture }}" class="img-responsive" alt="">');

	</script>