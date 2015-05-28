@extends ('layouts.master')

@section('toolbar')
	
	<div class="page-toolbar">
		<!-- BEGIN THEME PANEL -->
		<div class="btn-group btn-theme-panel">
			@if(Auth::user()->hasCap('security_user_get_create'))
				<a href="/{{ Auth::user()->username }}" class="btn tooltips" data-toggle="Ir a mi perfil" data-container="body" data-placement="left" data-html="true"  data-original-title="Ir a mi perfil"><i class="icon-arrow-right"></i></a>
			@endif
		</div>
		<!-- END THEME PANEL -->
	</div>

@stop

@section ("content")

	<div class="row profile">

		<div class="col-md-12">
			<!-- BEGIN PROFILE SIDEBAR -->
			<div class="profile-sidebar col-md-2" >
				<!-- PORTLET MAIN -->
				<div class="portlet light profile-sidebar-portlet">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						<img src="{{ $profile->getAvatar() }}" class="img-responsive" alt="">
					</div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							 {{ $user->display_name }}
						</div>
						<div class="profile-usertitle-job">
							 {{ $user->role->title }}
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						
						<a href="javascript:;" type="button" class="btn btn-large green-haze btn-sm follow-btn {{ ($hasMyFollow OR $user->id == Auth::user()->id ) ? 'hidden' : '' }}"><i class="fa fa-thumbs-o-up"></i> Seguir</a>
						<a href="javascript:;" type="button" class="btn btn-large btn-danger btn-sm unfollow-btn {{ (!$hasMyFollow OR $user->id == Auth::user()->id ) ? 'hidden' : '' }}"><i class="fa fa-thumbs-o-down"></i> Dejar de Seguir</a>
						<!-- <a href="{{ $route }}/follow" type="button" class="btn green-haze btn-sm follow-btn"><i class="fa fa-thumbs-o-up"></i> Seguir</a>
						<a href="{{ $route }}/unfollow" type="button" class="btn btn-danger btn-sm unfollow-btn"><i class="fa fa-thumbs-o-down"></i> Dejar de Seguir</a>  -->

					</div>
					<div class="profile-userbuttons">
						
						<!-- <a href="{{ $route }}/follow" type="button" class="btn btn-circle green-haze btn-sm follow-btn {{ ($hasMyFollow OR $user->id == Auth::user()->id ) ? 'hidden' : '' }}">Seguir</a>
						<a href="{{ $route }}/unfollow" type="button" class="btn btn-circle btn-danger btn-sm unfollow-btn {{ (!$hasMyFollow OR $user->id == Auth::user()->id ) ? 'hidden' : '' }}">Dejar de Seguir</a> -->
						
						<a href="{{ $route }}/block" type="button" class="btn btn-danger btn-sm block-btn"><i class="fa fa-ban"></i> Bloquear</a> 
						<a href="{{ $route }}/message" type="button" class="btn green-haze btn-sm message-btn"><i class="fa fa-envelope-o"></i> Mensaje</a> 

					</div>
					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->
					<div class="profile-usermenu">
						<ul class="nav">
							@if(UserProfile::hasSection('index', $role))
								<li class="{{ $section == 'index' ? 'active' : '' }}">
									<a href="javascript:;" class="index-btn">
									<i class="icon-home"></i>
									General </a>
								</li>
							@endif
							@if(UserProfile::hasSection('learning', $role))
								<li class="{{ $section == 'learning' ? 'active' : '' }}">
									<a href="javascript:;" class="learning-btn">
									<i class="icon-graduation"></i>
									Aprendiendo </a>
								</li>
							@endif
							@if(UserProfile::hasSection('teaching', $role))
								<li class="{{ $section == 'teaching' ? 'active' : '' }}">
									<a href="javascript:;" class="teaching-btn">
									<i class="icon-notebook"></i>
									Enseñando </a>
								</li>
							@endif
							@if(UserProfile::hasSection('contributing', $role))
								<li class="{{ $section == 'contributing' ? 'active' : '' }}">
									<a href="javascript:;" class="contributing-btn">
									<i class="icon-eyeglasses"></i>
									Contribuciones </a>
								</li>
							@endif
							@if(UserProfile::hasSection('discussions', $role))
								<li class="{{ $section == 'discussions' ? 'active' : '' }}">
									<a href="javascript:;" class="discussions-btn">
									<i class="icon-bubbles"></i>
									Discusiones </a>
								</li>
							@endif
							@if(UserProfile::hasSection('achievements', $role))
								<li class="{{ $section == 'achievements' ? 'active' : '' }}">
									<a href="javascript:;" class="achievements-btn">
									<i class="icon-badge"></i>
									Medallero </a>
								</li>
							@endif
							@if(UserProfile::hasSection('statistics', $role))
								<li class="{{ $section == 'statistics' ? 'active' : '' }}">
									<a href="javascript:;" class="statistics-btn">
									<i class="icon-graph"></i>
									Estadísticas </a>
								</li>
							@endif
							@if(UserProfile::hasSection('followers', $role))
								<li class="{{ $section == 'followers' ? 'active' : '' }}">
									<a href="javascript:;" class="followers-btn">
									<i class="icon-user-following"></i>
									Seguidores </a>
								</li>
							@endif
							@if(UserProfile::hasSection('following', $role))
								<li class="{{ $section == 'following' ? 'active' : '' }}">
									<a href="javascript:;" class="following-btn">
									<i class="icon-user-follow"></i>
									Siguiendo </a>
								</li>
							@endif
							<!-- <li>
								<a href="extra_profile_account.html">
								<i class="icon-settings"></i>
								Account Settings </a>
							</li>
							<li>
								<a href="page_todo.html" target="_blank">
								<i class="icon-check"></i>
								Tasks </a>
							</li>
							<li>
								<a href="extra_profile_help.html">
								<i class="icon-info"></i>
								Help </a>
							</li> -->
						</ul>
					</div>
					<!-- END MENU -->
				</div>
				<!-- END PORTLET MAIN -->
				<!-- PORTLET MAIN -->
				<!-- END PORTLET MAIN -->
			</div>
			<!-- END BEGIN PROFILE SIDEBAR -->
			<!-- BEGIN PROFILE CONTENT -->
			<div class="profile-content">
			
				@yield('content_profile')

			</div>
			<!-- END PROFILE CONTENT -->
		</div>

	</div>

	<!-- END PAGE CONTENT INNER -->

	

@stop

@section('javascripts')
	
	<!-- END PAGE LEVEL SCRIPTS -->
	<script type="text/javascript">
		var Wall = function () {

		    var content = $('.profile-content');
		    var loading = $('.profile-loading');
		    var loader = '<div class="portlet light"><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row"><div class="col-md-5">&nbsp;</div><img class="col-md-2" src="/assets/loaders/rubiks-cube.gif"/><div class="col-md-5">&nbsp;</div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div></div>';
		    var listListing = '';

		    var loadWall = function (el, name) {
		        var url = '{{$route}}/' + name;

		        console.log(el);

		        loading.show();
		        content.html(loader);
		        toggleButton(el);

		        $.ajax({
		            type: "POST",
		            cache: false,
		            url: url,
		            dataType: "html",
		            success: function(res) 
		            {
		            	console.log(name);
		                $('.profile-usermenu li').removeClass('active');
		                el.parents('li').addClass('active');	

		                loading.hide();
		                content.html(res);
		                if (Layout.fixContentHeight) {
		                    Layout.fixContentHeight();
		                }
		                Metronic.init();
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
		                toggleButton(el);
		            },
		            async: true
		        });

		        // handle group checkbox:
		        /*jQuery('body').on('change', '.mail-group-checkbox', function () {
		            var set = jQuery('.mail-checkbox');
		            var checked = jQuery(this).is(":checked");
		            jQuery(set).each(function () {
		                $(this).attr("checked", checked);
		            });
		            jQuery.uniform.update(set);
		        });*/
		    }

		    var follow = function (el) {

		    	console.log('following');

		    	var html_btn = $('.follow-btn').html();

		    	$('.follow-btn').html('Siguiendo...');

		        var url = '{{$route}}/follow';
		        // load the form via ajax
		        $.ajax({
		            type: "POST",
		            cache: false,
		            url: url,
		            dataType: "json",
		            success: function(res) 
		            {
		            	if(res.status = 'active'){
		            		$('.follow-btn').addClass('hidden');
		            		$('.unfollow-btn').removeClass('hidden');
							$('.follow-btn').html(html_btn);
		            	}
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
	            		$('.unfollow-btn').addClass('hidden');
	            		$('.follow-btn').removeClass('hidden');
						$('.follow-btn').html(html_btn);
		                console.log(thrownError);
		            },
		            async: true
		        });
		    }

		    var unfollow = function (el) {

		    	console.log('unfollowing');

		    	var html_btn = $('.unfollow-btn').html();

		    	$('.unfollow-btn').html('Siguiendo...');
		    	
		        var url = '{{$route}}/unfollow';
		        // load the form via ajax
		        $.ajax({
		            type: "POST",
		            cache: false,
		            url: url,
		            dataType: "json",
		            success: function(res) 
		            {
		            	if(res.status = 'inactive'){
		            		$('.unfollow-btn').addClass('hidden');
		            		$('.follow-btn').removeClass('hidden');
							$('.unfollow-btn').html(html_btn);
		            	}
		            },
		            error: function(xhr, ajaxOptions, thrownError)
		            {
	            		$('.unfollow-btn').removeClass('hidden');
	            		$('.follow-btn').addClass('hidden');
						$('.unfollow-btn').html(html_btn);
		                console.log(thrownError);
		            },
		            async: true
		        });
		    }

		    var handleCCInput = function () {
		        var the = $('.profile-compose .mail-to .profile-cc');
		        var input = $('.profile-compose .input-cc');
		        the.hide();
		        input.show();
		        $('.close', input).click(function () {
		            input.hide();
		            the.show();
		        });
		    }

		    var handleBCCInput = function () {

		        var the = $('.profile-compose .mail-to .profile-bcc');
		        var input = $('.profile-compose .input-bcc');
		        the.hide();
		        input.show();
		        $('.close', input).click(function () {
		            input.hide();
		            the.show();
		        });
		    }

		    var toggleButton = function(el) {
		        if (typeof el == 'undefined') {
		            return;
		        }
		        if (el.attr("disabled")) {
		            el.attr("disabled", false);
		        } else {
		            el.attr("disabled", true);
		        }
		    }

		    return {
		        //main function to initiate the module
		        init: function () {

		        	console.log('init');

		        	$('.profile').on('submit', '#search-form', function(event) {
		        		event.preventDefault();
		        		/* Act on the event */
		        		if($('#search-form input[name=q]').val() != '') searchForm($(this));
		        		return false;
		        	});

		            /*// handle compose btn click
		            $('.profile').on('click', '.follow-btn a', function () {
		                loadCompose($(this));
		            });*/

		            // handle reply and forward button click
		            $('.profile').on('click', '.follow-btn', function (e) {
		            	e.preventDefault();
		                follow($(this));
		            });

		            // handle forward and forward button click
		            $('.profile').on('click', '.unfollow-btn', function (e) {
		            	e.preventDefault();
		                unfollow($(this));
		            });

		            // handle spam and forward button click
		            $('.profile').on('click', '.index-btn', function (e) {
		            	e.preventDefault();
		                loadWall($(this), 'index');
		            });

		            // handle sned and forward button click
		            $('.profile').on('click', '.teaching-btn', function (e) {
		            	e.preventDefault();
		                loadWall($(this), 'teaching');
		            });

		            // handle discard and forward button click
		            $('.profile').on('click', '.learning-btn', function (e) {
		            	e.preventDefault();
		            	console.log('click');
		                loadWall($(this),'learning');
		            });

		            // handle draft and forward button click
		            $('.profile').on('click', '.contributing-btn', function (e) {
		            	e.preventDefault();
		                loadWall($(this), 'contributing');
		            });

		            // handle discussions and forward button click
		            $('.profile').on('click', '.discussions-btn', function () {
		                loadWall($(this), 'discussions');
		            });

		            // handleachievements button click
		            $('.profile').on('click', '.achievements-btn', function () {
		                loadWall($(this), 'achievements');
		            });

		            // handle statistics button click
		            $('.profile').on('click', '.statistics-btn', function () {
		                loadWall($(this), 'statistics');
		            });

		            // handle followers button click
		            $('.profile').on('click', '.followers-btn', function () {
		                loadWall($(this), 'followers');
		            });

		            // handle following button click
		            $('.profile').on('click', '.following-btn', function () {
		                loadWall($(this), 'following');
		            });

		            //handle loading content based on URL parameter
		            if (Metronic.getURLParameter("a") === "view") {
		                viewMessage();
		            } else if (Metronic.getURLParameter("a") === "compose") {
		                loadCompose();
		            } else {
		               $('.profile-nav > li.profile > a').click();
		            }

		        }

		    };

		}();
	</script>

	<script>
        jQuery(document).ready(function() {  
           	Metronic.init(); // init metronic core components
			Layout.init(); // init current layout
			Demo.init(); // init demo features
			Wall.init();
			moment.locale('es');
		 	jQuery('.timeago').each(function(e){
		 		jQuery(this).html(moment(jQuery(this).html()).fromNow());
		 	});
   			jQuery('.fancybox').fancybox();
   			
        });

	</script>

@stop
