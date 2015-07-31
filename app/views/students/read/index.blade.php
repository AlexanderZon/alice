@extends ('students.layouts.courses')

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
									@if($courses->count() > 0)
										@foreach($courses as $course)
											<div class="row">
												<div class="col-md-4 blog-img blog-tag-data">
													<div class="mask-circle">
														<img src="{{ $course->main_picture }}" alt="" class="img-responsive">			
													</div>
													<ul class="list-inline">
														<li>
															<i class="fa fa-user"></i>
															<a href="{{ $course->getRoute() }}/profesor">
															{{ $course->teacher->display_name }} </a>
														</li>
														<li>
															<i class="fa fa-users"></i>
															<a href="{{ $course->getRoute() }}/estudiantes">
															{{ $course->students()->count() }} Estudiantes </a>
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
												<div class="col-md-8 blog-article">
													<h3>
													<a href="{{ $course->getRoute() }}">{{ $course->title }}</a>
													</h3>
													<p class="justify">
														{{ $course->getSummary() }}
													</p>
													<a class="btn blue" href="{{ $course->getRoute() }}">
													Entrar <i class="m-icon-swapright m-icon-white"></i>
													</a>
													<div class="course-students">
														<h5>Estudiantes destacados</h5>
														@foreach($course->beststudents() as $student)
															<a href="/{{ $student->username }}" class="student-line-picture tooltips" data-original-title="{{ $student->display_name }}"><img alt="" class="img-circle full-width" src="{{ $student->profile->getAvatar() }}"></a>
														@endforeach
														<!-- <a href="#" class="student-line-picture"><img alt="" class="img-circle full-width" src="/uploads/users/AlexanderZon/images/A5790167-359B-B89B-60CD-A405C4207010.jpg"></a>
														<a href="#" class="student-line-picture"><img alt="" class="img-circle full-width" src="/uploads/users/AlexanderZon/images/A5790167-359B-B89B-60CD-A405C4207010.jpg"></a>
														<a href="#" class="student-line-picture"><img alt="" class="img-circle full-width" src="/uploads/users/AlexanderZon/images/A5790167-359B-B89B-60CD-A405C4207010.jpg"></a> -->
													</div>
												</div>
											</div>
											<hr>
										@endforeach
									@else
										<h1>¡Bienvenido/a, {{ Auth::user()->display_name }}!</h1>
										Todavia no te has inscrito en ningún curso, te invitamos a hacer una exploracion a <a href="/cursos">Todos los cursos</a> para que puedas optar para entrar a un curso. 
										Tambien puedes <a href="/perfil">Personalizar tu Perfil</a>.
									@endif
								</div>
								<!--end col-md-12-->
							</div>
							@if($courses->count()>0)
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