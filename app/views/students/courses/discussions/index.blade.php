<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/admin/pages/css/follows.css" rel="stylesheet" type="text/css"/>
<link href="/assets/admin/pages/css/news.css" rel="stylesheet" type="text/css"/>


<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PORTLET -->

		<div class="portlet light" data-course="{{ Hashids::encode($course->id) }}">
			<div class="row list-separated profile-stat">
				<img class="col-md-12" src="{{ $course->cover_picture }}"/>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="portlet-title">
						<h4 class="profile-usertitle-name">Discusiones sobre {{ $course->title }} ({{ $discussions->count() }})
							<!--
							<a href="javascript:;" class="btn blue-madison pull-right tooltips discussion-add" data-placement="left" data-original-title="Añadir una Nueva Discusión">
								<i class="fa fa-plus"></i>
							</a>
							-->
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form discussions" data-course="{{ Hashids::encode($course->id) }}">
						<div class="col-md-12 news-page">
							<!-- <h3 style="margin-top:0">Más Populares</h3> -->
							<div class="row">
								<?php $separator = ((int)($discussions->count()/3)) + ($discussions->count()%3 > 0 ? 1 : 0); ?>
								<?php $col = 5; ?>
								@if($discussions->count() == 0)
									<div class="col-md-12">
										Todavia no Existen Discusiones para este Curso.
									</div>
								@endif
								@if($discussions->count() >= 1 && $discussions->count() <= 2)
									<div class="col-md-5">
										@if($discussions[0]->status == 'active')
											<div class="news-blocks discussion-block" data-discussion="{{Hashids::encode($discussions[0]->id)}}">
												<h3>
													<a href="javascript:;" class="discussion-comments">
														{{ $discussions[0]->title}}
													</a>
												</h3>
												<div class="news-block-tags">
													<strong>{{ $discussions[0]->author->display_name}}</strong>
													<strong><i class="fa fa-comments-o"></i> {{ $discussions[0]->children->count() }}</strong>
													<em class="moment-fromnow">{{ $discussions[0]->created_at }}</em>
												</div>
												<p>
													<img class="news-block-img pull-right" src="{{ $discussions[0]->getAvatar() }}" alt="">
													{{ $discussions[0]->getSummary(250) }}
												</p>
												<a href="javascript:;" class="news-block-btn discussion-comments" >
													Entrar <i class="m-icon-swapright m-icon-black"></i>
												</a>
											</div>
										@else
											<div class="top-news" data-discussion="{{ Hashids::encode($discussions[0]->id)}}">
												<a href="javascript:;" class="btn grey-silver discussion-comments">
												<span>{{ $discussions[0]->title }}</span>
												<em class="moment-fromnow">{{ $discussions[0]->created_at }}</em>
												<em>
													<i class="fa fa-user"></i>
													{{ $discussions[0]->author->display_name}}
												</em>
												<i class="fa fa-comments-o top-news-icon"></i>
												</a>
											</div>
										@endif
									</div>
								@endif
								@if($discussions->count() == 2)
									<div class="col-md-4">
										@if($discussions[1]->status == 'active')
											<div class="news-blocks discussion-block" data-discussion="{{Hashids::encode($discussions[1]->id)}}">
												<h3>
													<a href="javascript:;" class="discussion-comments">
														{{ $discussions[1]->title}}
													</a>
												</h3>
												<div class="news-block-tags">
													<strong>{{ $discussions[1]->author->display_name}}</strong>
													<strong><i class="fa fa-comments-o"></i> {{ $discussions[1]->children->count() }}</strong>
													<em class="moment-fromnow">{{ $discussions[1]->created_at }}</em>
												</div>
												<p>
													<img class="news-block-img pull-right" src="{{ $discussions[1]->getAvatar() }}" alt="">
													{{ $discussions[1]->getSummary(200) }}
												</p>
												<a href="javascript:;" class="news-block-btn discussion-comments">
													Entrar <i class="m-icon-swapright m-icon-black"></i>
												</a>
											</div>
										@else
											<div class="top-news" data-discussion="{{ Hashids::encode($discussions[1]->id)}}">
												<a href="javascript:;" class="btn grey-silver discussion-comments">
												<span>{{ $discussions[1]->title }}</span>
												<em class="moment-fromnow">{{ $discussions[1]->created_at }}</em>
												<em>
													<i class="fa fa-user"></i>
													{{ $discussions[1]->author->display_name}}
												</em>
												<i class="fa fa-comments-o top-news-icon"></i>
												</a>
											</div>
										@endif
									</div>
								@endif
								@if($discussions->count() >= 3)
									@for($i = 0, $rows = $separator; $i < $discussions->count(); $i++)
										@if($rows - $separator == 0)
											<?php $rows = 0; ?>
											<div class="col-md-{{ $col }}">
										@endif
										@if($discussions[$i]->status == 'active')
											<div class="news-blocks discussion-block" data-discussion="{{ Hashids::encode($discussions[$i]->id)}}">
												<h3>
													<a href="javascript:;" class="discussion-comments">
														{{ $discussions[$i]->title}}
													</a>
												</h3>
												<div class="news-block-tags">
													<strong>{{ $discussions[$i]->author->display_name}}</strong>
													<strong><i class="fa fa-comments-o"></i> {{ $discussions[$i]->children->count() }}</strong>
													<em class="moment-fromnow">{{ $discussions[$i]->created_at }}</em>
												</div>
												<p>
													<img class="news-block-img pull-right" src="{{ $discussions[$i]->getAvatar() }}" alt="">
													{{ $discussions[$i]->getSummary(300 - ((6-$col)*50)) }}
												</p>
												<a href="javascript:;" class="news-block-btn discussion-comments">
													Entrar <i class="m-icon-swapright m-icon-black"></i>
												</a>
											</div>
										@else
											<div class="top-news" data-discussion="{{ Hashids::encode($discussions[$i]->id)}}">
												<a href="javascript:;" class="btn grey-silver discussion-comments">
												<span>{{ $discussions[$i]->title }}</span>
												<em class="moment-fromnow">{{ $discussions[$i]->created_at }}</em>
												<em>
													<i class="fa fa-user"></i>
													{{ $discussions[$i]->author->display_name}}
												</em>
												<i class="fa fa-comments-o top-news-icon"></i>
												</a>
											</div>
										@endif
										<?php $rows++; ?>
										@if($rows - $separator == 0)
											</div>
											<?php $col--; ?>
										@endif
									@endfor
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	window.history.pushState("", "", '/curso/{{ $course->name }}?section=discussions');
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

