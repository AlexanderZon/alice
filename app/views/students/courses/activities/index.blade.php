
	<!-- BEGIN PICKERS LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/clockface/css/clockface.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"/>
	<!-- END PICKERS LEVEL STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/pages/css/profile-old.css" rel="stylesheet" type="text/css"/>
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
							<h4 class="profile-usertitle-name">Listado de Actividades del Curso "{{ $course->title }}"	
								<!-- <a href="javascript:;" class="btn blue-madison pull-right tooltips lessons-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
									<i class="fa fa-arrow-left"></i>
								</a> -->
							</h4>
						</div>
						<div class="portlet-body form" data-course="{{ Hashids::encode($course->id) }}">
							<!-- BEGIN FORM-->
							<div class="tab-pane" id="tab_1_4">
								<div class="row">&nbsp;</div>
								<div class="row">&nbsp;</div>
								<div class="row">
									<div class="col-md-12">
										<div class="add-portfolio">
											<span>
											Hay {{ $evaluations->count() }} Actividad(es) en este Curso </span>
										</div>
									</div>
								</div>
								<!--end add-portfolio-->
								@if($evaluations->count() > 0)
									@foreach($evaluations as $evaluation)
										<div class="row portfolio-block activity-block" data-activity="{{ Hashids::encode($evaluation->id) }}">
											<div class="col-md-5">
												<div class="portfolio-text">
													<img src="{{ $evaluation->image() }}" alt="" style="max-width:100px" />
													<div class="portfolio-text-info">
														<h4>{{ $evaluation->title != '' ? $evaluation->title : 'Sin nombre' }}</h4>
														<p>
															{{ $evaluation->description != '' ? $evaluation->description : 'Sin descripción' }}
														</p>
														<em>({{ date('d/m/Y', strtotime($evaluation->date_start) ) }} - {{ date('d/m/Y', strtotime($evaluation->date_end) ) }})</em>
													</div>
												</div>
											</div>
											<div class="col-md-5 portfolio-stat">
												<div class="portfolio-info col-md-3">
													Porcentaje <span>
													{{ ($test = $evaluation->myTest()) ? $test->percentage() : '0%' }} </span>
												</div>
												<div class="portfolio-info col-md-3">
													Puntaje <span>
													{{ ($test = $evaluation->myTest()) ? $test->points : '0' }} </span>
												</div>
												<div class="portfolio-info col-md-3">
													Tiempo <span>
													{{ ($test = $evaluation->myTest()) ? $test->duration() : '0' }} </span>
												</div>
											</div>
											<div class="col-md-2">
												<div class="portfolio-btn">
													@if($evaluation->isAvailableToTest())
														<a href="javascript:;" class="btn bigicn-only evaluation-test-btn" data-evaluation="{{ Crypt::encrypt($evaluation->id) }}">
															<span>Entrar </span>
														</a>
													@endif
												</div>
											</div>
										</div>
									@endforeach
								@endif
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

	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	
	<script type="text/javascript">

		var ActivitiesManager = function(){

			var showTesters = function(elem){

				var tester_list = $(elem).siblings('.testers');
				console.log(tester_list);
				if(tester_list.hasClass('hidden')){
					console.log('remove');
					tester_list.removeClass('hidden');
					elem.children('i').removeClass('fa-angle-double-down');
					elem.children('i').addClass('fa-angle-double-up');
				}
				else{
					console.log('add');
					tester_list.addClass('hidden');
					elem.children('i').removeClass('fa-angle-double-up');
					elem.children('i').addClass('fa-angle-double-down');
				}

			}

			return {

				init: function(){

					$('.testers-btn').click(function(event) {
						console.log('click');
						showTesters($(this));
					});

				}

			}

		}();

		ActivitiesManager.init();
		
	 	jQuery('.timeago').each(function(e){
	 		jQuery(this).html(moment(jQuery(this).html()).fromNow());
	 	});

		window.history.pushState("", "", '/curso/{{ $course->name }}?section=activities');
		document.title = 'Alyce | {{ $course->title }} | Actividades';

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->getMainPicture() }}" class="img-responsive" alt="">');

	</script>