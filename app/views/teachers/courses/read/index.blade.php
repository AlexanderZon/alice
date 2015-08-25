@extends ('teachers.layouts.courses')

@section('css')

	<link href="/assets/admin/pages/css/blog.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/pages/css/news.css" rel="stylesheet" type="text/css"/>

	<style type="text/css">
		.course-students{
			text-align: right;
			display: block;
		}
		.student-line-picture{
			width: 40px;
			height: 40px;
			display: inline-block;
			margin-left: 5px;
		}
		.full-width{
			width: 100%;
		}
	</style>

@stop

@section ("content_courses")

	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PORTLET -->

			<div class="portlet light">
				<!-- STAT -->
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-12 blog-page">
							<div class="row">
								<div class="col-md-12 col-sm-12 article-block">
									<!-- <h4 class="profile-desc-title">Aprendiendo ({{ $courses->count() }})</h4> -->
									@if($courses->count() > 0 )
										@foreach($courses as $course)
											<div class="row">
												<div class="col-lg-2 col-md-4 blog-img blog-tag-data">
													<div class="mask-circle">
														<img src="{{ $course->main_picture }}" alt="" class="img-responsive">			
													</div>
													<ul class="list-inline">
														<li>
															<i class="fa fa-user"></i>
															<a href="{{ $course->teacher->username }}">
															{{ $course->teacher->display_name }} </a>
														</li>
														<li>
															<i class="fa fa-users"></i>
															{{ $course->students()->count() }} Estudiantes
														</li>
														<li>
															<i class="fa fa-book"></i>
															{{ $course->lessons()->count() }} Lecciones
														</li>
														<li>
															<i class="fa fa-comments"></i>
															{{ $course->discussions()->count() }} Discusiones
														</li>
														<li>
															<i class="fa fa-flask"></i>
															{{ $course->evaluations()->count() }} Actividades
														</li>
													</ul>
													<!-- <ul class="list-inline blog-tags">
														<li>
															<i class="fa fa-tags"></i>
															<a href="javascript:;">
															Technology </a>
															<a href="javascript:;">
															Education </a>
															<a href="javascript:;">
															Internet </a>
														</li>
													</ul> -->
												</div>
												<div class="col-lg-10 col-md-8 blog-article">
													<h3>
													<a href="{{ $course->getRoute() }}">{{ $course->title }}</a>
													</h3>
													<p class="justify">
														{{ $course->getSummary(2000) }}
													</p>
													@if($course->author_id == Auth::user()->id)
														<a class="btn blue" href="{{ $route }}/show/{{ Hashids::encode($course->id) }}">
														Gestionar <i class="m-icon-swapright m-icon-white"></i>
														</a>
													@elseif($course->isContributor(Auth::user()))
														<a class="btn blue" href="/teachers/contributions/show/{{ Hashids::encode($course->id) }}">
														Contribuir <i class="m-icon-swapright m-icon-white"></i>
														</a>
													@else
														<a class="btn blue" href="/curso/{{ $course->name }}">
														Leer más <i class="m-icon-swapright m-icon-white"></i>
														</a>
													@endif
													<div class="course-students">
														<h5>Estudiantes destacados</h5>
															@if(count($course->beststudents()) > 0)
																@foreach($course->beststudents() as $student)
																	<a href="/{{ $student->username }}" class="student-line-picture tooltips" data-original-title="{{ $student->display_name }}"><img alt="" class="img-circle full-width" src="{{ $student->profile->getAvatar() }}"></a>
																@endforeach
															@else
																<span>No hay estudientes en este curso aún</span>
															@endif
														<!-- <a href="#" class="student-line-picture"><img alt="" class="img-circle full-width" src="/uploads/users/AlexanderZon/images/A5790167-359B-B89B-60CD-A405C4207010.jpg"></a>
														<a href="#" class="student-line-picture"><img alt="" class="img-circle full-width" src="/uploads/users/AlexanderZon/images/A5790167-359B-B89B-60CD-A405C4207010.jpg"></a>
														<a href="#" class="student-line-picture"><img alt="" class="img-circle full-width" src="/uploads/users/AlexanderZon/images/A5790167-359B-B89B-60CD-A405C4207010.jpg"></a> -->
													</div>
												</div>
											</div>
											<hr>
										@endforeach
									@else
										No has sido asignado a ningún curso como Profesor.
									@endif
								</div>
								<!--end col-md-12-->
							</div>
							@if( $courses->count() > 0 )
								{{ $courses->links('users.wall.read.paginate')->with(array('courses' => $courses, 'section' => 'list')) }}
							@endif
						</div>
					</div>
				</div>
			</div>
					
			<!-- END PORTLET -->
		</div>
	</div>		
	
@stop