
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

<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PORTLET -->

		<div class="portlet light">
			<!-- STAT -->
			<div class="row list-separated profile-stat">
				<img class="col-md-12" src="{{ $profile->getCover() }}"/>
			</div>
			<div class="portlet-body">
					<div class="row">
						<div class="col-md-12 blog-page">
							<div class="row">
								<div class="col-md-12 col-sm-12 article-block">
									<h4 class="profile-desc-title">Enseñando ({{ $courses->count() }})</h4>
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
															{{ $course->teacher->display_name }}
														</li>
														<li>
															<i class="fa fa-users"></i>
															{{ $course->students()->count() }} Estudiantes
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

													@if(Auth::user()->isCoordinator())
														<a class="btn blue tooltips" data-original-title="Ver contenido del curso" data-placement="bottom" data-container="body" href="/coordinators/courses/show/{{ Hashids::encode($course->id) }}">
														Leer más <i class="m-icon-swapright m-icon-white"></i>
														</a>
													@elseif($course->author_id == Auth::user()->id)
														<a class="btn blue tooltips" data-original-title="Gestionar contenido del curso" data-placement="bottom" data-container="body"  href="/teachers/courses/show/{{ Hashids::encode($course->id) }}">
														Gestionar <i class="m-icon-swapright m-icon-white"></i>
														</a>
													@elseif($course->isContributor(Auth::user()))
														<a class="btn blue tooltips" data-original-title="Contribuir en el curso" data-placement="bottom" data-container="body"  href="/teachers/contributions/show/{{ Hashids::encode($course->id) }}">
														Contribuir <i class="m-icon-swapright m-icon-white"></i>
														</a>
													@else
														<a class="btn blue tooltips" data-original-title="Ver el contenido del curso" data-placement="bottom" data-container="body"  href="/curso/{{ $course->name }}">
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
										<div class="col-md-12">Aún no esta enseñando en ningún Curso</div>
									@endif
								</div>
								<!--end col-md-12-->
							</div>
							@if($courses->count() > 0)
								{{ $courses->links('users.wall.read.paginate')->with(array('courses' => $courses, 'section' => 'teaching')) }}
							@endif
						</div>
					</div>
				</div>
		</div>
				
		<!-- END PORTLET -->
	</div>
</div>	

<script type="text/javascript">
	
	window.history.pushState("", "", '/{{ $user->username }}?section=teaching');
		document.title = 'Alyce | {{ $user->username }} | Enseñando';

</script>	
	
<script type="text/javascript">
	Metronic.init();
</script>