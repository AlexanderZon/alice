<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/admin/pages/css/follows.css" rel="stylesheet" type="text/css"/>
<link href="/assets/admin/pages/css/news.css" rel="stylesheet" type="text/css"/>


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
						<h4 class="profile-usertitle-name">Discusiones sobre {{ $course->title }} ({{ $discussions->count() }})
							<a href="javascript:;" class="btn blue-madison pull-right tooltips discussions-add-btn" data-placement="left" data-original-title="Añadir una Nueva DiscusiónRea">
								<i class="fa fa-arrow-left"></i>
							</a>
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form discussions" data-course="{{ Hashids::encode($course->id) }}">
						<div class="col-md-12 news-page">
							<h1 style="margin-top:0">Más Populares</h1>
							<div class="row">
								<div class="col-md-5">
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Google Glass Technology.. </a>
										</h3>
										<div class="news-block-tags">
											<strong>CA, USA</strong>
											<em>3 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image1.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Sint occaecati cupiditat </a>
										</h3>
										<div class="news-block-tags">
											<strong>London, UK</strong>
											<em>7 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image4.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Accusamus et iusto odio </a>
										</h3>
										<div class="news-block-tags">
											<strong>CA, USA</strong>
											<em>3 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image5.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Sanditiis praesentium vo </a>
										</h3>
										<div class="news-block-tags">
											<strong>Ankara, Turkey</strong>
											<em>5 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image5.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint praesentium voluptatum delenitioccaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
								</div>
								<!--end col-md-5-->
								<div class="col-md-4">
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Odio dignissimos ducimus </a>
										</h3>
										<div class="news-block-tags">
											<strong>Berlin, Germany</strong>
											<em>2 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image3.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Sanditiis praesentium vo </a>
										</h3>
										<div class="news-block-tags">
											<strong>Ankara, Turkey</strong>
											<em>5 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image5.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint praesentium voluptatum delenitioccaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Odio dignissimos ducimus </a>
										</h3>
										<div class="news-block-tags">
											<strong>Berlin, Germany</strong>
											<em>2 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image3.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Sanditiis praesentium vo </a>
										</h3>
										<div class="news-block-tags">
											<strong>Ankara, Turkey</strong>
											<em>5 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image5.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint praesentium voluptatum delenitioccaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
								</div>
								<!--end col-md-4-->
								<div class="col-md-3">
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Vero eos et accusam </a>
										</h3>
										<div class="news-block-tags">
											<strong>CA, USA</strong>
											<em>3 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image2.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Sias excepturi sint occae </a>
										</h3>
										<div class="news-block-tags">
											<strong>Vancouver, Canada</strong>
											<em>3 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image4.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Vero eos et accusam </a>
										</h3>
										<div class="news-block-tags">
											<strong>CA, USA</strong>
											<em>3 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image2.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
								</div>
								<!--end col-md-3-->
							</div>
							<div class="space20">
							</div>
							<h3>Más Recientes</h3>
							<div class="row">
								<div class="col-md-3">
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Google Glass Technology.. </a>
										</h3>
										<div class="news-block-tags">
											<strong>LA, USA</strong>
											<em>2 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image5.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Google Glass Technology.. </a>
										</h3>
										<div class="news-block-tags">
											<strong>Berlin, Germany</strong>
											<em>6 hours ago</em>
										</div>
										<p>
											 At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
								</div>
								<!--end col-md-3-->
								<div class="col-md-3">
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Google Glass Technology.. </a>
										</h3>
										<div class="news-block-tags">
											<strong>CA, USA</strong>
											<em>3 hours ago</em>
										</div>
										<p>
											<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image3.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
									<div class="news-blocks">
										<h3>
										<a href="page_news_item.html">
										Google Glass Technology.. </a>
										</h3>
										<div class="news-block-tags">
											<strong>CA, USA</strong>
											<em>3 hours ago</em>
										</div>
										<p>
											 At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
										</p>
										<a href="page_news_item.html" class="news-block-btn">
										Gestionar <i class="m-icon-swapright m-icon-black"></i>
										</a>
									</div>
								</div>
								<!--end col-md-3-->
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="news-blocks">
												<h3>
												<a href="page_news_item.html">
												Pusto odio dignissimos ducimus i quos dolores et qui blanditiis praesentium.. </a>
												</h3>
												<div class="news-block-tags">
													<strong>CA, USA</strong>
													<em>3 hours ago</em>
												</div>
												<p>
													<img class="news-block-img pull-right" src="/assets/admin/pages/media/gallery/image2.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident iti..
												</p>
												<a href="page_news_item.html" class="news-block-btn">
												Gestionar <i class="m-icon-swapright m-icon-black"></i>
												</a>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="news-blocks">
												<h3>
												<a href="page_news_item.html">
												Vero eos et accusamus et iusto od qui.. </a>
												</h3>
												<div class="news-block-tags">
													<strong>CA, USA</strong>
													<em>3 hours ago</em>
												</div>
												<p>
													 At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
												</p>
												<a href="page_news_item.html" class="news-block-btn">
												Gestionar <i class="m-icon-swapright m-icon-black"></i>
												</a>
											</div>
										</div>
										<div class="col-md-6">
											<div class="news-blocks">
												<h3>
												<a href="page_news_item.html">
												Google Glass Technology.. </a>
												</h3>
												<div class="news-block-tags">
													<strong>CA, USA</strong>
													<em>3 hours ago</em>
												</div>
												<p>
													 At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
												</p>
												<a href="page_news_item.html" class="news-block-btn">
												Gestionar <i class="m-icon-swapright m-icon-black"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<!--end col-md-6-->
							</div>
							<div class="space20">
							</div>
							<h3>News Feeds</h3>
							<div class="row">
								<div class="col-md-3">
									<div class="top-news">
										<a href="javascript:;" class="btn red">
										<span>
										Metronic News </span>
										<em>Posted on: April 16, 2013</em>
										<em>
										<i class="fa fa-tags"></i>
										Money, Business, Google </em>
										<i class="fa fa-briefcase top-news-icon"></i>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="top-news">
										<a href="javascript:;" class="btn green">
										<span>
										Top Week </span>
										<em>Posted on: April 15, 2013</em>
										<em>
										<i class="fa fa-tags"></i>
										Internet, Music, People </em>
										<i class="fa fa-music top-news-icon"></i>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="top-news">
										<a href="javascript:;" class="btn blue">
										<span>
										Gold Price Falls </span>
										<em>Posted on: April 14, 2013</em>
										<em>
										<i class="fa fa-tags"></i>
										USA, Business, Apple </em>
										<i class="fa fa-globe top-news-icon"></i>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="top-news">
										<a href="javascript:;" class="btn yellow">
										<span>
										Study Abroad </span>
										<em>Posted on: April 13, 2013</em>
										<em>
										<i class="fa fa-tags"></i>
										Education, Students, Canada </em>
										<i class="fa fa-book top-news-icon"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="top-news">
										<a href="javascript:;" class="btn green">
										<span>
										Top Week </span>
										<em>Posted on: April 15, 2013</em>
										<em>
										<i class="fa fa-tags"></i>
										Internet, Music, People </em>
										<i class="fa fa-music top-news-icon"></i>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="top-news">
										<a href="javascript:;" class="btn yellow">
										<span>
										Study Abroad </span>
										<em>Posted on: April 13, 2013</em>
										<em>
										<i class="fa fa-tags"></i>
										Education, Students, Canada </em>
										<i class="fa fa-book top-news-icon"></i>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="top-news">
										<a href="javascript:;" class="btn red">
										<span>
										Metronic News </span>
										<em>Posted on: April 16, 2013</em>
										<em>
										<i class="fa fa-tags"></i>
										Money, Business, Google </em>
										<i class="fa fa-briefcase top-news-icon"></i>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="top-news">
										<a href="javascript:;" class="btn blue">
										<span>
										Gold Price Falls </span>
										<em>Posted on: April 14, 2013</em>
										<em>
										<i class="fa fa-tags"></i>
										USA, Business, Apple </em>
										<i class="fa fa-globe top-news-icon"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=discussions');
		document.title = 'Alice | {{ $course->title }} | Discusiones';

</script>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>
<script type="text/javascript" src="/assets/global/plugins/jquery-infinite-scroll/jquery.infinitescroll.js"></script>

<!--<script src="/assets/admin/pages/scripts/portfolio.js"></script>
<script>
jQuery(document).ready(function() {    
   Portfolio.init();
});
</script> -->

