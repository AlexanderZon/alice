<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/admin/pages/css/follows.css" rel="stylesheet" type="text/css"/>




<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PORTLET -->

		<div class="portlet light">
			<!-- STAT -->
			<div class="row list-separated profile-stat">
				<img class="col-md-12" src="{{ $profile->getCover() }}"/>
			</div>
			<!-- END STAT -->
			<div>
			<h4 class="profile-desc-title">Seguidores ({{ count($followers) }})</h4>
			<!-- BEGIN FILTER -->
				<div class="row mix-grid">
					@foreach($followers as $follower)
						<div class="col-md-3 col-sm-4 mix">
							<div class="mix-inner">
								<img class="img-responsive" src="{{ $follower->profile->getAvatar() }}" alt="" width="200">
								<div class="mix-details">
									<a href="/{{ $follower->username }}" title="Ver perfil de {{ $follower->display_name }}"><h4>{{ $follower->display_name }}</h4></a>
									@if($follower->id != Auth::user()->id)
										<a href="javascript:;" class="mix-link follow-follows" data-user="{{ $follower->username }}" title="Seguir a {{ $follower->display_name }}">
											<i class="fa fa-thumbs-o-up"></i>
										</a>
										<a class="mix-preview fancybox-button" href="/{{ $follower->username }}" title="Ver perfil de {{ $follower->display_name }}" data-rel="fancybox-button">
											<i class="fa fa-eye"></i>
										</a>
									@endif
								</div>
							</div>
						</div>
					@endforeach<!-- 
					<div class="col-md-3 col-sm-4 mix">
						<div class="mix-inner">
							<img class="img-responsive" src="/assets/admin/pages/media/works/img3.jpg" alt="">
							<div class="mix-details">
								<h4>Cascusamus et iusto accusamus</h4>
								<a class="mix-link">
								<i class="fa fa-link"></i>
								</a>
								<a class="mix-preview fancybox-button" href="/assets/admin/pages/media/works/img3.jpg" title="Project Name" data-rel="fancybox-button">
								<i class="fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 mix">
						<div class="mix-inner">
							<img class="img-responsive" src="/assets/admin/pages/media/works/img4.jpg" alt="">
							<div class="mix-details">
								<h4>Cascusamus et iusto accusamus</h4>
								<a class="mix-link">
								<i class="fa fa-link"></i>
								</a>
								<a class="mix-preview fancybox-button" href="/assets/admin/pages/media/works/img4.jpg" title="Project Name" data-rel="fancybox-button">
								<i class="fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 mix">
						<div class="mix-inner">
							<img class="img-responsive" src="/assets/admin/pages/media/works/img5.jpg" alt="">
							<div class="mix-details">
								<h4>Cascusamus et iusto accusamus</h4>
								<a class="mix-link">
								<i class="fa fa-link"></i>
								</a>
								<a class="mix-preview fancybox-button" href="/assets/admin/pages/media/works/img5.jpg" title="Project Name" data-rel="fancybox-button">
								<i class="fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 mix">
						<div class="mix-inner">
							<img class="img-responsive" src="/assets/admin/pages/media/works/img6.jpg" alt="">
							<div class="mix-details">
								<h4>Cascusamus et iusto accusamus</h4>
								<a class="mix-link">
								<i class="fa fa-link"></i>
								</a>
								<a class="mix-preview fancybox-button" href="/assets/admin/pages/media/works/img6.jpg" title="Project Name" data-rel="fancybox-button">
								<i class="fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 mix">
						<div class="mix-inner">
							<img class="img-responsive" src="/assets/admin/pages/media/works/img1.jpg" alt="">
							<div class="mix-details">
								<h4>Cascusamus et iusto accusamus</h4>
								<a class="mix-link">
								<i class="fa fa-link"></i>
								</a>
								<a class="mix-preview fancybox-button" href="/assets/admin/pages/media/works/img1.jpg" title="Project Name" data-rel="fancybox-button">
								<i class="fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 mix">
						<div class="mix-inner">
							<img class="img-responsive" src="/assets/admin/pages/media/works/img2.jpg" alt="">
							<div class="mix-details">
								<h4>Cascusamus et iusto accusamus</h4>
								<a class="mix-link">
								<i class="fa fa-link"></i>
								</a>
								<a class="mix-preview fancybox-button" href="/assets/admin/pages/media/works/img2.jpg" title="Project Name" data-rel="fancybox-button">
								<i class="fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 mix">
						<div class="mix-inner">
							<img class="img-responsive" src="/assets/admin/pages/media/works/img4.jpg" alt="">
							<div class="mix-details">
								<h4>Cascusamus et iusto accusamus</h4>
								<a class="mix-link">
								<i class="fa fa-link"></i>
								</a>
								<a class="mix-preview fancybox-button" href="/assets/admin/pages/media/works/img4.jpg" title="Project Name" data-rel="fancybox-button">
								<i class="fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 mix">
						<div class="mix-inner">
							<img class="img-responsive" src="/assets/admin/pages/media/works/img3.jpg" alt="">
							<div class="mix-details">
								<h4>Cascusamus et iusto accusamus</h4>
								<a class="mix-link">
								<i class="fa fa-link"></i>
								</a>
								<a class="mix-preview fancybox-button" href="/assets/admin/pages/media/works/img3.jpg" title="Project Name" data-rel="fancybox-button">
								<i class="fa fa-search"></i>
								</a>
							</div>
						</div>
					</div> -->
				</div>
			<!-- END FILTER -->
		</div>
	</div>
</div>



<!--<script src="/assets/admin/pages/scripts/portfolio.js"></script>
<script>
jQuery(document).ready(function() {    
   Portfolio.init();
});
</script> -->

