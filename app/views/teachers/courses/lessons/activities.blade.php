
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
							<h4 class="profile-usertitle-name">Listado de Actividades de la Lección "{{ $lesson->title }}"	
								<a href="javascript:;" class="btn blue-madison pull-right tooltips lessons-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
									<i class="fa fa-arrow-left"></i>
								</a>
							</h4>
						</div>
						<div class="portlet-body form" data-lesson="{{ Hashids::encode($lesson->id) }}" data-course="{{ Hashids::encode($course->id) }}">
							<!-- BEGIN FORM-->
							<div class="tab-pane" id="tab_1_4">
								<div class="row">&nbsp;</div>
								<div class="row">&nbsp;</div>
								<div class="row">
									<div class="col-md-12">
										<div class="add-portfolio">
											<span>
											Hay {{ $lesson->evaluations->count() }} Actividad(es) en esta lección </span>
											<a href="javascript:;" class="btn icn-only green lesson-activities-add" data-lesson="{{ Hashids::encode($lesson->id) }}" data-course="{{ Hashids::encode($course->id) }}">
											Añadir una nueva <i class="fa fa-plus"></i>
											</a>
										</div>
									</div>
								</div>
								<!--end add-portfolio-->
								@if($lesson->evaluations->count() > 0)
									@foreach($lesson->evaluations as $evaluation)
										<div class="row portfolio-block activity-block" data-activity="{{ Hashids::encode($evaluation->id) }}">
											<div class="col-md-5">
												<div class="portfolio-text">
													<img src="{{ $evaluation->image() }}" alt="" style="max-width:100px" />
													<div class="portfolio-text-info">
														<h4>{{ $evaluation->title != '' ? $evaluation->title : 'Sin nombre' }}</h4>
														<p>
															<em>({{ date('d/m/Y', strtotime($evaluation->date_start) ) }} - {{ date('d/m/Y', strtotime($evaluation->date_end) ) }})</em>
															{{ $evaluation->description != '' ? $evaluation->description : 'Sin descripción' }}
														</p>
													</div>
												</div>
											</div>
											<div class="col-md-5 portfolio-stat">
												<div class="portfolio-info col-md-3">
													Estudiantes <span>
													{{ $evaluation->tests->count() }} </span>
												</div>
												<div class="portfolio-info col-md-3">
													Promedio <span>
													{{ $evaluation->average() }}% </span>
												</div>
												<div class="portfolio-info col-md-3">
													Preguntas <span>
													@if($evaluation->type == 'hangman') {{ $evaluation->hangman->count() }}
													@elseif($evaluation->type == 'memory') {{ $evaluation->memory->count() }}
													@elseif($evaluation->type == 'rpsls') {{ $evaluation->rpsls->count() }}
													@elseif($evaluation->type == 'roulette') {{ $evaluation->roulette->count() }}
													@endif
													 </span>
												</div>
											</div>
											<div class="col-md-2">
												<div class="portfolio-btn">
													<a href="javascript:;" class="btn bigicn-only lesson-activities-edit">
													<span>
													Gestionar </span>
													</a>
												</div>
											</div>
											<div class="col-md-12"><hr></div>
											<div class="col-md-12 testers">
												@foreach($evaluation->testers as $tester)
													<div class="col-md-5">
														<div class="portfolio-text">
															<img src="{{ Auth::user()->profile->getAvatar() }}" alt="" style="max-width:100px" />
															<div class="portfolio-text-info">
																<h4>{{ Auth::user()->display_name }}</h4>
																<p>
																	<em class="timeago">({{ $evaluation->date_start }})</em>
																</p>
															</div>
														</div>
													</div>
													<div class="col-md-7 portfolio-stat">
														<div class="portfolio-info col-md-3">
															Porcentaje <span>
															{{ '75%' }} </span>
														</div>
														<div class="portfolio-info col-md-3">
															Preguntas Acertadas <span>
															{{ '18' }} </span>
														</div>
														<div class="portfolio-info col-md-3">
															Equivocaciones <span>
															{{ '6' }} </span>
														</div>
														<div class="portfolio-info col-md-3">
															Duración <span>{{ '14 min' }}</span>
														</div>
													</div>
												@endforeach
											</div>
										</div>
									@endforeach
								@endif
								<!-- <div class="row portfolio-block activity-block" data-activity="{{ '2' }}">
									<div class="col-md-5 col-sm-12 portfolio-text">
										<img src="/assets/admin/pages/media/profile/logo_azteca.jpg" alt=""/>
										<div class="portfolio-text-info">
											<h4>Actividad II</h4>
											<p>
												<em>(30/10/2015 - 05/11/2015)</em>
												Lorem ipsum dolor sit consectetuer adipiscing elit.
											</p>
										</div>
									</div>
									<div class="col-md-5 portfolio-stat">
										<div class="portfolio-info col-md-3">
											Estudiantes <span>
											24 </span>
										</div>
										<div class="portfolio-info col-md-3">
											Promedio <span>
											66% </span>
										</div>
										<div class="portfolio-info col-md-3">
											Preguntas <span>
											25 </span>
										</div>
									</div>
									<div class="col-md-2 col-sm-12 portfolio-btn">
										<a href="javascript:;" class="btn bigicn-only lesson-activities-edit">
										<span>
										Gestionar </span>
										</a>
									</div>
								</div>
								<div class="row portfolio-block activity-block" data-activity="{{ '3' }}">
									<div class="col-md-5 portfolio-text">
										<img src="/assets/admin/pages/media/profile/logo_conquer.jpg" alt=""/>
										<div class="portfolio-text-info">
											<h4>Actividad III</h4>
											<p>
												<em>(07/11/2015 - 14/11/2015)</em>
												Lorem ipsum dolor sit consectetuer adipiscing elit.
											</p>
										</div>
									</div>
									<div class="col-md-5 portfolio-stat">
										<div class="portfolio-info col-md-3">
											Estudiantes <span>
											24 </span>
										</div>
										<div class="portfolio-info col-md-3">
											Promedio <span>
											97% </span>
										</div>
										<div class="portfolio-info col-md-3">
											Preguntas <span>
											21 </span>
										</div>
									</div>
									<div class="col-md-2 portfolio-btn">
										<a href="javascript:;" class="btn bigicn-only lesson-activities-edit">
										<span>
										Gestionar </span>
										</a>
									</div>
								</div> -->
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



		window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=lessons&action=activities&lesson_id={{ Hashids::encode($lesson->id) }}');
		document.title = 'Alice | {{ $course->title }} | {{ $lesson->title }} | Actividades';

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->main_picture }}" class="img-responsive" alt="">');

	</script>