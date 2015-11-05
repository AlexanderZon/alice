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
						<h4 class="profile-usertitle-name">Estudiantes que han visto esta lección ({{ $students->count() }})
							<a href="javascript:;" class="btn blue-madison pull-right tooltips lessons-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
								<i class="fa fa-arrow-left"></i>
							</a>
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form students" data-lesson="{{ Hashids::encode($lesson->id) }}" data-course="{{ Hashids::encode($course->id) }}">
				
						<!-- BEGIN FILTER -->
						<div class="row mix-grid">

							<!-- <div class="col-md-3 col-sm-4 mix">
								<div class="mix-inner">
								<?php $viewed = $lesson->viewedBy(Auth::user()) ?>
									<img class="img-responsive" src="{{ Auth::user()->profile->getAvatar() }}" alt="" width="200">
									<div class="mix-details">
										<a href="/{{ Auth::user()->username }}" class="" title="Ver perfil de {{ Auth::user()->display_name }}"><h4>{{ Auth::user()->display_name }}</h4></a>
										<span href="/">Primera visita: <span class="moment-fromnow">{{ '2015-07-05 12:58:00' }}</span></span><br>
										<span href="/">Última visita: <span class="moment-fromnow">{{ '2015-07-05 12:58:00' }}</span></span>
										<a href="javascript:;" class="mix-link follow-follows" title="Estadísticas de {{ Auth::user()->display_name }} para este curso" data-user="{{ Auth::user()->username }}">
											<i class="fa fa-sliders"></i>
										</a>
										<a class="mix-preview fancybox-button" href="/{{ Auth::user()->username }}" title="Ver perfil de {{ Auth::user()->display_name }}" data-rel="fancybox-button">
											<i class="fa fa-eye"></i>
										</a>
									</div>
								</div>
							</div> -->
							@if($students->count() == 0)
								<div class="col-md-12">Todavia los estudiantes no han visto esta lección</div>
							@else
								@foreach($students as $student)
									<div class="col-md-3 col-sm-4 mix">
										<div class="mix-inner">
										<?php $viewed = $lesson->viewedBy($student) ?>
											<img class="img-responsive" src="{{ $student->profile->getAvatar() }}" alt="" style="max-width:200px">
											<div class="mix-details" style="max-width:200px">
												<a href="/{{ $student->username }}" class="tooltips" data-original-title="Ver perfil de {{ $student->display_name }}" data-container="div.row" data-placement="top"><h4>{{ $student->display_name }}</h4></a>
												<span href="/">Primera visita: <span class="moment-fromnow">{{ $viewed->created_at }}</span></span><br>
												<span href="/">Última visita: <span class="moment-fromnow">{{ $viewed->updated_at }}</span></span>
												<a href="javascript:;" class="mix-link students-statistics-btn tooltips" data-original-title="Estadísticas de {{ $student->display_name }} para este curso" data-user="{{ Hashids::encode($student->id) }}" data-container="div.row" data-placement="bottom">
													<i class="fa fa-sliders"></i>
												</a>
												<a class="mix-preview fancybox-button tooltips" href="/{{ $student->username }}" data-original-title="Ver perfil de {{ $student->display_name }}" data-rel="fancybox-button" data-container="div.row" data-placement="bottom">
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
	
	window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=lessons&action=students&lesson_id={{ Hashids::encode($lesson->id) }}');
		document.title = 'Alice | {{ $course->title }} | {{ $lesson->title }} | Estudiantes Participantes';

</script>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>

<!--<script src="/assets/admin/pages/scripts/portfolio.js"></script>
<script>
jQuery(document).ready(function() {    
   Portfolio.init();
});
</script> -->

