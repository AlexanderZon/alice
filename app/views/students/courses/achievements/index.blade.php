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
						<h4 class="profile-usertitle-name">Mis Premios en este Curso
							<!--
							<a href="javascript:;" class="btn blue-madison pull-right tooltips students-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
								<i class="fa fa-arrow-left"></i>
							</a>-->
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form students" >
				
						<!-- BEGIN FILTER -->
						<div class="row mix-grid">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									@if(count($achievements) > 0)
										<div class="col-md-12 achievements-container">
											@foreach($achievements as $achievement)
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
	
	window.history.pushState("", "", '/curso/{{ $course->name }}?section=achievements');
		document.title = 'Alyce | {{ $course->title }} | Premiaciones';

</script>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>

<!--<script src="/assets/admin/pages/scripts/portfolio.js"></script>
<script>
jQuery(document).ready(function() {    
   Portfolio.init();
});
</script> -->

