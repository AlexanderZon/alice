<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/admin/pages/css/follows.css" rel="stylesheet" type="text/css"/>

<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PORTLET -->

		<div class="portlet light" data-course="{{ Hashids::encode($course->id) }}">
			<!-- STAT -->
			<!-- <div class="row list-separated profile-stat">
				<img class="col-md-12" src="{{ Auth::user()->profile->getCover() }}"/>
			</div> -->
			<!-- END STAT -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="portlet-title">
						<h4 class="profile-usertitle-name">Estadísticas de {{ $student->display_name }}
							<a href="javascript:;" class="btn blue-madison pull-right tooltips students-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
								<i class="fa fa-arrow-left"></i>
							</a>
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form students" >
				
						<!-- BEGIN FILTER -->
						<div class="row mix-grid">
							<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 mix">
								<div class="mix-inner">
									<img class="img-responsive" src="{{ $student->profile->getAvatar() }}" alt="" style="max-width:200px !important">
									<div class="mix-details" style="max-width:200px !important;">
										<a href="/{{ $student->username }}" class="" title="Ver perfil de {{ $student->display_name }}"><h4>{{ $student->display_name }}</h4></a>
										<span href="/">Última visita: <span class="moment-fromnow">{{ $student->last_login }}</span></span>
										<a href="javascript:;" class="mix-link students-back-btn" title="Ir al listado de Estudiantes" data-user="{{ Hashids::encode($student->id) }}">
											<i class="fa fa-arrow-left"></i>
										</a>
										<a class="mix-preview fancybox-button" href="/{{ $student->username }}" title="Ver perfil de {{ $student->display_name }}" data-rel="fancybox-button">
											<i class="fa fa-eye"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-book"></i> Lecciones participadas: {{ 0 }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-comments"></i> Comentarios en lecciones: {{ count($course->discussionsInLessonsOf($student)) }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-file"></i> Archivos subidos: {{ count($course->attachmentsInLessonsOf($student)) }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-flask"></i> Actividades Realizadas: {{ count($course->activitiesOf($student)) }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-lightbulb-o"></i> Promedio: {{ $course->averageOf($student) }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-thumbs-up"></i> Me gustas: {{ count($course->discussionsInLessonsThumbsupsOf($student)) }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-ban"></i> Comentarios No deseados: {{ count($course->discussionsInLessonsBannedOf($student)) }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<?php $student_achievements = $student->achievementFromCourse($course); ?>
									<h3><i class="fa fa-star"></i> Premiaciones: {{ count($student_achievements) }}</h3>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									@if(count($student_achievements) > 0)
										<div class="col-md-12"><h3>Premiaciones:</h3></div>
										<div class="col-md-12">&nbsp;</div>
										<div class="col-md-12 achievements-container">
											@foreach($student->achievementFromCourse($course) as $achievement)
												<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3" style="padding:0px; padding-right: 5px">
													<div class="mask-circle tooltips" data-original-title="{{$achievement->title}}">
														<img src="{{ $achievement->picture }}" alt="" class="img-responsive" style="border-radius:50%; max-width:75px" title="{{ $achievement->title }}">			
													</div>
												</div>
											@endforeach
										</div>
									@else
										<span>Todavia no tiene insignias de premiación</span>
									@endif
								</div>
							</div>
						</div>
						<!-- END FILTER -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=students');
		document.title = 'Alice | {{ $course->title }} | Estudiantes';

</script>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>

<!--<script src="/assets/admin/pages/scripts/portfolio.js"></script>
<script>
jQuery(document).ready(function() {    
   Portfolio.init();
});
</script> -->

