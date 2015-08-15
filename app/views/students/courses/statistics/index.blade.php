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
						<h4 class="profile-usertitle-name">Mis Estadísticas
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
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
									<h3><i class="fa fa-thumbs-up"></i> Me gustas: {{ $course->discussionsInLessonsThumbsupsOf($student) }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-ban"></i> Comentarios No deseados: {{ $course->discussionsInLessonsBannedOf($student) }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<?php $student_achievements = $student->achievementFromCourse($course); ?>
									<h3><i class="fa fa-star"></i> Premiaciones: {{ count($student_achievements) }}</h3>
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
	
	window.history.pushState("", "", '/curso/{{ $course->name  }}?section=statistics');
		document.title = 'Alice | {{ $course->title }} | Estadísticas';

</script>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>

<!--<script src="/assets/admin/pages/scripts/portfolio.js"></script>
<script>
jQuery(document).ready(function() {    
   Portfolio.init();
});
</script> -->

