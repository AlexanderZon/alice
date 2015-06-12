	
	<link href="/assets/admin/pages/css/timeline-old.css" rel="stylesheet" type="text/css"/>

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-summernote/summernote.css">

	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<!-- END PAGE LEVEL STYLES -->

	<style type="text/css">
		.btn-center{
			display:block;
			text-align: center;
		}
	</style>

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

								@if($modules->count() > 0)
									@foreach($modules as $module)

										<li class="timeline-yellow" data-module="{{ Hashids::encode($module->id) }}">
											<div class="timeline-time">
												<span class="time">{{ date('d/m/y',strtotime($module->date_start))}}</span>
												<span class="date">{{ date('d/m/y',strtotime($module->date_end))}}</span>
											</div>
											<div class="timeline-icon">
												<i class="fa fa-cube"></i>
											</div>
											<div class="timeline-body">
												<div class="timeline-footer">
													<a href="javascript:;" class="nav-link module-edit">
														<h2>{{ $module->title }}</h2>
													</a>
													@if($module->lessons->count() == 0)
														<a href="javascript:;" class="btn red pull-right tooltips module-delete" data-original-title="Eliminar Módulo">
															<i class="fa fa-trash-o"></i>
														</a>
													@endif
													<div  class="pull-right">&nbsp;</div>
													<div  class="pull-right">&nbsp;</div>
													<a href="javascript:;" class="btn green-haze pull-right tooltips module-edit" data-original-title="Editar Módulo">
														<i class="fa fa-pencil"></i>
													</a>
													<div  class="pull-right">&nbsp;</div>
													<div  class="pull-right">&nbsp;</div>
													<a href="javascript:;" class="btn blue-madison pull-right tooltips lesson-order" data-original-title="Ordenar las lecciones">
														<i class="fa fa-list"></i>
													</a>
													<div  class="pull-right">&nbsp;</div>
													<div  class="pull-right">&nbsp;</div>
													<a href="javascript:;" class="btn blue-madison pull-right tooltips lesson-add" data-original-title="Agregar una nueva Lección" data-timeline="yellow">
														<i class="fa fa-plus"></i>
													</a>
												</div>
											</div>
										</li>

										@if($module->lessons->count() > 0)
											@foreach($module->lessons as $lesson)
												<li class="timeline-blue" data-module="{{ Hashids::encode($module->id) }}" data-lesson="{{ Hashids::encode($lesson->id) }}">
													<div class="timeline-body">
														<h2>{{ $lesson->title }}
															<a href="javascript:;" class="pull-right" data-original-title="Editar esta Lección">
																<input type="checkbox" class="make-switch" data-on-text="&nbsp;Activa&nbsp;&nbsp;" data-off-text="&nbsp;Inactiva&nbsp;" {{ ( $lesson->status == 'active' ) ? 'checked="checked"' : '' }}>
															</a>											
														</h2>
														<div class="timeline-content">
															<img class="timeline-img pull-left" src="{{ $lesson->getAvatar() }}" alt="">
															{{ $lesson->getSummary() }}
														</div>
														<div class="timeline-footer">
															<a href="javascript:;" class="btn green-haze pull-left tooltips course-lesson-comments" data-original-title="Hay {{ $lesson->discussions->count() }} comentario(s) en esta Lección">
																<i class="fa fa-comments"></i> {{ $lesson->discussions->count() }}
															</a>
															<div  class="pull-left">&nbsp;</div>
															<div  class="pull-left">&nbsp;</div>
															<a href="javascript:;" class="btn green-haze pull-left tooltips course-lesson-students" data-original-title="{{ $lesson->students->count() }} estudiante(s) han participado en esta Lección">
																<i class="fa fa-users"></i> {{ $lesson->students->count() }}
															</a>
															<div  class="pull-left">&nbsp;</div>
															<div  class="pull-left">&nbsp;</div>
															<a href="javascript:;" class="btn green-haze pull-left tooltips course-lesson-attachments" data-original-title="Hay {{ $lesson->attachments->count() }} archivo(s) en esta Lección">
																<i class="fa fa-file"></i> {{ $lesson->attachments->count() }}
															</a>
															<div  class="pull-left">&nbsp;</div>
															<div  class="pull-left">&nbsp;</div>
															<a href="javascript:;" class="btn green-haze pull-left tooltips course-lesson-activities" data-original-title="Hay {{ $lesson->evaluations->count() }} actividad(es) en esta Lección">
																<i class="fa fa-flask"></i> {{ $lesson->evaluations->count() }}
															</a>

															<a href="javascript:;" class="btn red-flamingo pull-right tooltips lesson-delete" data-original-title="Eliminar esta Lección">
																<i class="fa fa-trash-o"></i>
															</a>
															<div  class="pull-right">&nbsp;</div>
															<div  class="pull-right">&nbsp;</div>
															<a href="javascript:;" class="btn yellow pull-right tooltips lesson-edit" data-original-title="Editar esta Lección">
																<i class="fa fa-pencil"></i>
															</a>
														</div>
													</div>
												</li>
											@endforeach
										@endif

										<li class="timeline-transparent" data-module="{{ Hashids::encode($module->id) }}">
											<div class="timeline-body">
												<div class="timeline-footer">
													<a href="javascript:;" class="btn blue tooltips lesson-add" data-original-title="Añadir una nueva lección a este módulo" data-timeline="transparent">
														<i class="fa fa-plus"></i>
													</a>
												</div>
											</div>
										</li>
									@endforeach

									<li class="timeline-transparent">
										<div class="timeline-icon">
											<i class="fa fa-cube"></i>
										</div>
										<div class="timeline-body">
											<div class="timeline-footer">
												<a href="javascript:;" class="btn blue tooltips module-add" data-original-title="Añadir un nuevo Módulo">
													<i class="fa fa-plus"></i>
												</a>
											</div>
										</div>
									</li>

								@else

									<li class="timeline-transparent">
										<div class="timeline-icon">
											<i class="fa fa-cube"></i>
										</div>
										<div class="timeline-body">
											<div class="timeline-footer">
												<a href="javascript:;" class="btn blue tooltips module-add" data-original-title="Añadir un nuevo Módulo">
													<i class="fa fa-plus"></i> Añade el primer módulo del curso
												</a>
											</div>
										</div>
									</li>
								@endif

							</ul>
							<div class="col-md-12"></div>
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