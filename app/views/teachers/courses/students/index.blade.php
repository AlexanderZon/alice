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
						<h4 class="profile-usertitle-name">Estudiantes en este Curso ({{ $students->count() }})
							<!-- <a href="javascript:;" class="btn blue-madison pull-right tooltips lessons-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
								<i class="fa fa-arrow-left"></i>
							</a> -->
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form students">
				
						<!-- BEGIN FILTER -->
						<div class="row mix-grid">
							@if($students->count() == 0)
								<div class="col-md-12">Todavia no existen estudiantes inscritos en este curso. Vaya a la sección de Inscripciones para permitir que los estudiantes vean el contenido del curso.</div>
							@else
								@foreach($students as $student)
									<div class="col-lg-2 col-md-3 col-sm-4 col-xm-4 mix">
										<div class="mix-inner">
											<img class="img-responsive" src="{{ $student->profile->getAvatar() }}" alt="" style="max-width:200px !important">
											<div class="mix-details" style="max-width:200px !important;">
												<a href="/{{ $student->username }}" class="" title="Ver perfil de {{ $student->display_name }}"><h4>{{ $student->display_name }}</h4></a>
												<span href="/">Última visita: <span class="moment-fromnow">{{ $student->last_login }}</span></span>
												<a href="javascript:;" class="mix-link students-statistics-btn" title="Estadísticas de {{ $student->display_name }} para este curso" data-user="{{ Hashids::encode($student->id) }}">
													<i class="fa fa-sliders"></i>
												</a>
												<a class="mix-preview fancybox-button" href="/{{ $student->username }}" title="Ver perfil de {{ $student->display_name }}" data-rel="fancybox-button">
													<i class="fa fa-eye"></i>
												</a>
											</div>
										</div>
									</div>
								@endforeach
							@endif
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

