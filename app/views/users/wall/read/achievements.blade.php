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
						<h4 class="profile-usertitle-name">Insignias
							<!--
							<a href="javascript:;" class="btn blue-madison pull-right tooltips students-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
								<i class="fa fa-arrow-left"></i>
							</a>-->
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form students" >
				
						<!-- BEGIN FILTER -->
						<div class="row mix-grid">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<?php $achievements = $user->achievements; ?>
										@if($achievements->count() > 0)
											@foreach($achievements as $achievement)
												<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4" style="padding:0px; padding-right: 5px">
													<div class="mask-circle tooltips" data-original-title="{{$achievement->title}}">
														<img src="{{ $achievement->picture }}" alt="" class="img-responsive" style="border-radius:50%; max-width:200px" title="{{ $achievement->title }}">
													</div>
												</div>
											@endforeach
										@else
											<div class="col-md-12">
												<h4>No tiene Aún</h4>
											</div>
										@endif
									</div>
								</div>
							</div>
						</div>
						<!-- END FILTER -->
					</div>
					<div class="portlet-title">
						<h4 class="profile-usertitle-name">Premiaciones por Curso
							<!--
							<a href="javascript:;" class="btn blue-madison pull-right tooltips students-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
								<i class="fa fa-arrow-left"></i>
							</a>-->
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form students" >
				
						<!-- BEGIN FILTER -->
						<div class="row mix-grid">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									@if(count($courses) > 0)
										<div class="col-md-12 courses-container">
											@foreach($courses as $course)
												<div class="col-md-12">&nbsp;</div>
												<div class="col-md-12" style="padding:0px; padding-right: 5px">
													<div>
														<h4>{{ $course->title }}</h4>
														<?php $achievements = $user->achievementFromCourse( $course ); ?>
														@if($achievements->count() > 0)
															@foreach($achievements as $achievement)
																<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3" style="padding:0px; padding-right: 5px">
																	<div class="mask-circle tooltips" data-original-title="{{$achievement->title}}">
																		<img src="{{ $achievement->picture }}" alt="" class="img-responsive" style="border-radius:50%; max-width:75px" title="{{ $achievement->title }}">
																	</div>
																</div>
															@endforeach
														@else
															<div class="col-md-12">
																<h4>No tiene Aún</h4>
															</div>
														@endif
														<!-- <img src="{{ $course->picture }}" alt="" class="img-responsive" style="border-radius:50%; max-width:75px" title="{{ $course->title }}">			 -->
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
	
	window.history.pushState("", "", '/{{ $user->username }}?section=achievements');
		document.title = 'Alyce | {{ $user->username }} | Premiaciones';

</script>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>

<!--<script src="/assets/admin/pages/scripts/portfolio.js"></script>
<script>
jQuery(document).ready(function() {    
   Portfolio.init();
});
</script> -->

