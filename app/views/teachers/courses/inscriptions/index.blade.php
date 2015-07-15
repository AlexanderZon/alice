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
						<h4 class="profile-usertitle-name">Estudiantes postulantes en este Curso ({{ $inscriptions->count() }})
							<!-- <a href="javascript:;" class="btn blue-madison pull-right tooltips lessons-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
								<i class="fa fa-arrow-left"></i>
							</a> -->
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form students" data-course="{{ Hashids::encode($course->id) }}">
				
						<!-- BEGIN FILTER -->
						<div class="row mix-grid">
							@if($inscriptions->count() == 0)
								<div class="col-md-12">Todavia no existen estudiantes postulantes en este curso.</div>
							@else
								@foreach($inscriptions as $inscription)
									<?php $student = $inscription->student; ?>
									<div class="col-md-3 col-sm-4 col-xm-4 mix">
										<div class="mix-inner inscription" data-inscription="{{ Hashids::encode($inscription->id) }}">
											<img class="img-responsive" src="{{ $student->profile->getAvatar() }}" alt="" style="max-width:200px !important">
											<div class="mix-details" style="max-width:200px !important;">
												<a href="/{{ $student->username }}" class="" title="Ver perfil de {{ $student->display_name }}"><h4>{{ $student->display_name }}</h4></a>
												<span href="/">Postulado: <span class="moment-fromnow">{{ $inscription->updated_at }}</span></span>
												<a href="javascript:;" class="mix-link inscriptions-accept-btn" title="Aceptar Ingreso de {{ $student->display_name }} a este curso" data-user="{{ Hashids::encode($student->id) }}">
													<i class="fa fa-check"></i>
												</a>
												<a class="mix-preview inscriptions-reject-btn" href="javascript:;" title="Denegar Ingreso de {{ $student->display_name }} a este curso" data-rel="fancybox-button">
													<i class="fa fa-times"></i>
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
	
	window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=inscriptions');
		document.title = 'Alice | {{ $course->title }} | Inscripciones';

</script>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>

<!--<script src="/assets/admin/pages/scripts/portfolio.js"></script>
<script>
jQuery(document).ready(function() {    
   Portfolio.init();
});
</script> -->

