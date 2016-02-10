<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/admin/pages/css/follows.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/wheel-menu/wheel-menu.css" rel="stylesheet" type="text/css"/>

<style type="text/css">
	ul.list-inline li i.fa{
		color: #78cff8;
	}
</style>

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
						<h4 class="profile-usertitle-name">Estudiantes premiados
							<a href="javascript:;" class="btn yellow pull-right tooltips achievements-edit-btn" data-placement="left" data-original-title="Editar Insignias">
								<i class="fa fa-pencil"></i>
							</a>
							<span class="pull-right">&nbsp;</span>
							<a href="javascript:;" class="btn green-haze pull-right tooltips achievements-bunch-btn" data-placement="left" data-original-title="Manojo de Insignias">
								<i class="fa fa-trophy"></i>
							</a>
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form students" data-course="{{ Hashids::encode($course->id) }}">
				
						<!-- BEGIN FILTER -->
						<div class="row mix-grid blog-page">
							@if($students->count() == 0)
								<div class="col-md-12">Todavia no existen estudiantes en este curso.</div>
							@else
								<div class="col-md-12">
								@foreach($students as $student)
									<div class="col-md-6 blog-tag-data student-container" style="border-left: 5px solid #5b9bd1;margin-bottom: 10px;box-shadow: 1px 1px 3px #5b9bd1;padding-top: 10px;">
										<div class="col-md-3 student-info">
											<?php $student_achievements = $student->achievementFromCourse($course); ?>
											<div class="mask-circle">
												<img src="{{ $student->profile->getAvatar() }}" alt="" class="img-responsive" style="border-radius:50%">			
											</div>
											<ul class="list-inline">
												<li class="list-achievements">
													<i class="fa fa-trophy"></i>
													<span class="achievements-counter">{{ count($student_achievements) }}</span> Insignias
												</li>
												<li class="list-comments">
													<i class="fa fa-comments"></i>
													<span class="comments-counter">{{ $student->achievements()->count() }}</span> Comentarios
												</li>
											</ul>
										</div>
										<div class="col-md-6 student-achievement">
											<h4>{{$student->display_name}}</h4>
											<div class="col-md-12 achievements-container">
												@if(count($student_achievements) > 0)
													@foreach($student->achievementFromCourse($course) as $achievement)
														<div class="col-md-2" style="padding:0px; padding-right: 5px">
															<div class="mask-circle tooltips" data-original-title="{{$achievement->title}}">
																<img src="{{ $achievement->picture }}" alt="" class="img-responsive" style="border-radius:50%">			
															</div>
														</div>
													@endforeach
												@else
													<span id="dont-have-achievements-{{Hashids::encode($student->id)}}">Todavia no tiene insignias de premiación</span>
												@endif
											</div>
										</div>
										<div class="col-md-3">
										  <a href="#{{$student->username}}" class="wheel-button" style="background-color:#1ABC9C;background-size:100%;text-decoration:none">+</a>
										  <ul id="{{$student->username}}" data-student="{{Hashids::encode($student->id)}}" data-angle="all">
										  	@foreach($achievements as $achievement)
										    	<li class="item tooltips" data-original-title="{{$achievement->title}}" data-picture="{{$achievement->picture}}"><a href="javascript:;" class="achievements-add-btn" data-achievement="{{Hashids::encode($achievement->id)}}">&nbsp;</a></li>
										  	@endforeach
										  </ul>
										</div>
									</div>
								@endforeach
								</div>
							@endif
						</div>
						<!-- END FILTER -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="/assets/global/plugins/wheel-menu/wheel-menu.js"></script>
<script type="text/javascript">

	var WheelMenu = function(){

		return {

			init: function(){
			    $(".wheel-button").wheelmenu({
			        trigger: "hover",
			        animation: "fly",
			        animationSpeed: "fast"
			    });
			}

		}

	}();

	WheelMenu.init();
	
	window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=achievements');
		document.title = 'Alyce | {{ $course->title }} | Premiaciones';

</script>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>

<!--<script src="/assets/admin/pages/scripts/portfolio.js"></script>
<script>
jQuery(document).ready(function() {    
   Portfolio.init();
});
</script> -->

