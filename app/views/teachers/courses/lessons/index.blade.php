	
	<link href="/assets/admin/pages/css/timeline-old.css" rel="stylesheet" type="text/css"/>

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
							<h4 class="profile-usertitle-name">Lecciones del Curso</h4>
						</div>
						<div class="portlet-body">
							
							<ul class="timeline" data-course="{{ Hashids::encode($course->id) }}">

								<li class="timeline-yellow" data-module="{{ 'MODULE' }}">
									<div class="timeline-time">
										<span class="date">
										4/10/13 </span>
										<span class="time">
										10/3/14 </span>
									</div>
									<div class="timeline-icon">
										<i class="fa fa-trophy"></i>
									</div>
									<div class="timeline-body">
										<div class="timeline-footer">
											<a href="javascript" class="nav-link course-module-edit" data-module="{{ '' }}" data-course="{{ '' }}">
												<h2>{{'New Project Launch'}}</h2>
											</a>
											<a href="javascript" class="btn green-haze pull-right tooltips course-lesson-add" data-original-title="Agregar una nueva Lección" data-module="{{ '' }}" data-course="{{ '' }}">
												<i class="fa fa-plus"></i>
											</a>
										</div>

									</div>
								</li>
								<li class="timeline-blue" data-module-parent="{{ 'MODULEPARENT' }}" data-lesson="{{ 'LESSON' }}">
									<div class="timeline-body">
										<h2>{{'New Project Launch'}}</h2>
										<div class="timeline-content">
											<img class="timeline-img pull-left" src="{{'/assets/admin/pages/media/blog/3.jpg'}}" alt="">
											{{'Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Pea sprouts wattle seed rutabaga okra yarrow cress avocado grape radish bush tomato ricebean. Pea sprouts wattle seed rutabaga okra yarrow cress avocado grape radish bush tomato ricebean.'}}
										</div>
										<div class="timeline-footer">
											<a href="javascript:;" class="btn green-haze tooltips course-lesson-comments" data-original-title="Hay {{ '0' }} comentario(s) en esta Lección">
												<i class="fa fa-comments"></i> {{ '0' }}
											</a>
											<span>&nbsp;</span>
											<a href="javascript:;" class="btn green-haze tooltips course-lesson-students" data-original-title="{{ '0' }} estudiante(s) han participado en esta Lección">
												<i class="fa fa-users"></i> {{ '0' }}
											</a>
											<span>&nbsp;</span>
											<a href="javascript:;" class="btn green-haze tooltips course-lesson-files" data-original-title="Hay {{ '0' }} archivo(s) en esta Lección">
												<i class="fa fa-file"></i> {{ '0' }}
											</a>
											<span>&nbsp;</span>
											<a href="javascript:;" class="btn green-haze tooltips course-lesson-files" data-original-title="Hay {{ '0' }} actividad(es) en esta Lección">
												<i class="fa fa-hammer"></i> {{ '0' }}
											</a>


											<span>&nbsp;</span>
											<a href="javascript" class="btn red pull-right tooltips course-lesson-delete" data-original-title="Editar esta Lección">
												<i class="fa fa-trash-o"></i>
											</a>
											<a href="javascript" class="btn yellow pull-right tooltips course-lesson-edit" data-original-title="Editar esta Lección">
												<i class="fa fa-pencil"></i>
											</a>
											<span>&nbsp;</span>
										</div>
									</div>
								</li>
							</ul>

							@if($lessons->count() > 0)
								@foreach($lessons as $lesson)
								@endforeach
							@else
								<div class="col-md-12">Este curso aún no posee lecciones. Te invitamos a crear la primera leccion para este curso</div>
							@endif
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

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->main_picture }}" class="img-responsive" alt="">');

	</script>