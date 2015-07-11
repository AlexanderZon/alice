<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/admin/pages/css/follows.css" rel="stylesheet" type="text/css"/>

<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PORTLET -->

		<div class="portlet light">
			<!-- STAT -->
			<!-- <div class="row list-separated profile-stat">
				<img class="col-md-12" src="{{ Auth::user()->profile->getCover() }}"/>
			</div> -->
			<!-- END STAT -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="portlet-title">
						<h4 class="profile-usertitle-name">Contribuidores del Curso ({{ $contributors->count() }})
							<!-- <a href="javascript:;" class="btn blue-madison pull-right tooltips lessons-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
								<i class="fa fa-arrow-left"></i>
							</a> -->
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form contributors" data-course="{{ Hashids::encode($course->id) }}">
				
						<!-- BEGIN FILTER -->
						<div class="row mix-grid">
							@if($contributors->count() == 0)
								<div class="col-md-12">Todavia no existen contribuidores asignados en este curso. Invite a un profesor para que sea contribuidor de este curso.</div>
							@else
								@foreach($contributors as $contributor)
									<div class="col-md-3 col-sm-4 mix">
										<div class="mix-inner">
											<img class="img-responsive" src="{{ $contributor->profile->getAvatar() }}" alt="" width="200">
											<div class="mix-details">
												<a href="/{{ $contributor->username }}" class="" title="Ver perfil de {{ $contributor->display_name }}"><h4>{{ $contributor->display_name }}</h4></a>
												<span href="/">Última visita: <span class="moment-fromnow">{{ $user->last_login }}</span></span>
												<a href="javascript:;" class="mix-link contributor-statistics-btn" title="Estadísticas de {{ $contributor->display_name }} para este curso" data-user="{{ Hashids::encode($contributor->id) }}">
													<i class="fa fa-comments-o"></i>
												</a>
												<a class="mix-preview fancybox-button" href="/{{ $contributor->username }}" title="Ver perfil de {{ $contributor->display_name }}" data-rel="fancybox-button">
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
	
	window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=contributors');
		document.title = 'Alice | {{ $course->title }} | Contribuidores';

</script>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>

<!--<script src="/assets/admin/pages/scripts/portfolio.js"></script>
<script>
jQuery(document).ready(function() {    
   Portfolio.init();
});
</script> -->

