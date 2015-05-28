
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
									<h4 class="profile-desc-title">Aprendiendo ({{ $courses->count() }})</h4>
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
												Leer Mas <i class="m-icon-swapright m-icon-white"></i>
												</a>
												<div class="course-students">
													<h5>Estudiantes destacados</h5>
													@foreach(User::all() as $student)
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
									<!-- 
									<div class="row">
										<div class="col-md-4 blog-img blog-tag-data">
											<img src="/assets/admin/pages/media/gallery/image3.jpg" alt="" class="img-responsive">
											<ul class="list-inline">
												<li>
													<i class="fa fa-calendar"></i>
													<a href="javascript:;">
													April 16, 2013 </a>
												</li>
												<li>
													<i class="fa fa-comments"></i>
													<a href="javascript:;">
													38 Comments </a>
												</li>
											</ul>
											<ul class="list-inline blog-tags">
												<li>
													<i class="fa fa-tags"></i>
													<a href="javascript:;">
													Technology </a>
													<a href="javascript:;">
													Education </a>
													<a href="javascript:;">
													Internet </a>
												</li>
											</ul>
										</div>
										<div class="col-md-8 blog-article">
											<h3>
											<a href="page_blog_item.html">
											Hello here will be some recent news.. </a>
											</h3>
											<p>
												 At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.
											</p>
											<a class="btn blue" href="page_blog_item.html">
											Read more <i class="m-icon-swapright m-icon-white"></i>
											</a>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-4 blog-img blog-tag-data">
											<img src="/assets/admin/pages/media/gallery/image4.jpg" alt="" class="img-responsive">
											<ul class="list-inline">
												<li>
													<i class="fa fa-calendar"></i>
													<a href="javascript:;">
													April 16, 2013 </a>
												</li>
												<li>
													<i class="fa fa-comments"></i>
													<a href="javascript:;">
													38 Comments </a>
												</li>
											</ul>
											<ul class="list-inline blog-tags">
												<li>
													<i class="fa fa-tags"></i>
													<a href="javascript:;">
													Technology </a>
													<a href="javascript:;">
													Education </a>
													<a href="javascript:;">
													Internet </a>
												</li>
											</ul>
										</div>
										<div class="col-md-8 blog-article">
											<h3>
											<a href="page_blog_item.html">
											Hello here will be some recent news.. </a>
											</h3>
											<p>
												 At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.
											</p>
											<a class="btn blue" href="page_blog_item.html">
											Read more <i class="m-icon-swapright m-icon-white"></i>
											</a>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-4 blog-img blog-tag-data">
											<img src="/assets/admin/pages/media/gallery/image3.jpg" alt="" class="img-responsive">
											<ul class="list-inline">
												<li>
													<i class="fa fa-calendar"></i>
													<a href="javascript:;">
													April 16, 2013 </a>
												</li>
												<li>
													<i class="fa fa-comments"></i>
													<a href="javascript:;">
													38 Comments </a>
												</li>
											</ul>
											<ul class="list-inline blog-tags">
												<li>
													<i class="fa fa-tags"></i>
													<a href="javascript:;">
													Technology </a>
													<a href="javascript:;">
													Education </a>
													<a href="javascript:;">
													Internet </a>
												</li>
											</ul>
										</div>
										<div class="col-md-8 blog-article">
											<h3>
											<a href="page_blog_item.html">
											Hello here will be some recent news.. </a>
											</h3>
											<p>
												 At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.
											</p>
											<a class="btn blue" href="page_blog_item.html">
											Read more <i class="m-icon-swapright m-icon-white"></i>
											</a>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-4 blog-img blog-tag-data">
											<img src="/assets/admin/pages/media/gallery/image5.jpg" alt="" class="img-responsive">
											<ul class="list-inline">
												<li>
													<i class="fa fa-calendar"></i>
													<a href="javascript:;">
													April 16, 2013 </a>
												</li>
												<li>
													<i class="fa fa-comments"></i>
													<a href="javascript:;">
													38 Comments </a>
												</li>
											</ul>
											<ul class="list-inline blog-tags">
												<li>
													<i class="fa fa-tags"></i>
													<a href="javascript:;">
													Technology </a>
													<a href="javascript:;">
													Education </a>
													<a href="javascript:;">
													Internet </a>
												</li>
											</ul>
										</div>
										<div class="col-md-8 blog-article">
											<h3>
											<a href="page_blog_item.html">
											Hello here will be some recent news.. </a>
											</h3>
											<p>
												 At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.
											</p>
											<a class="btn blue" href="page_blog_item.html">
											Read more <i class="m-icon-swapright m-icon-white"></i>
											</a>
										</div>
									</div> -->
								</div>
								<!--end col-md-12-->
							</div>
							<ul class="pagination pull-right">
								<li>
									<a href="javascript:;">
									<i class="fa fa-angle-left"></i>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									1 </a>
								</li>
								<li>
									<a href="javascript:;">
									2 </a>
								</li>
								<li>
									<a href="javascript:;">
									3 </a>
								</li>
								<li>
									<a href="javascript:;">
									4 </a>
								</li>
								<li>
									<a href="javascript:;">
									5 </a>
								</li>
								<li>
									<a href="javascript:;">
									6 </a>
								</li>
								<li>
									<a href="javascript:;">
									<i class="fa fa-angle-right"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
		</div>
				
		<!-- END PORTLET -->
	</div>
</div>		
	
<script type="text/javascript">
	Metronic.init();
</script>