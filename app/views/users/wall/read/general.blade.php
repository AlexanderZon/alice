
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PORTLET -->

			<div class="portlet light">
				<!-- STAT -->
				<div class="row list-separated profile-stat">
					<img class="col-md-12" src="{{ $profile->getCover() }}"/>
				</div>
				<div class="row list-separated profile-stat">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="uppercase profile-stat-title">
							 {{ ($user->followers->count()) }}
						</div>
						<div class="uppercase profile-stat-text">
							 Seguidores
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="uppercase profile-stat-title">
							 {{ ($user->followed->count()) }}
						</div>
						<div class="uppercase profile-stat-text">
							 Siguiendo
						</div>
					</div>
				</div>
				<!-- END STAT -->
				<div>
					@if(trim(html_entity_decode(strip_tags($profile->about_me))) != '')
						<h4 class="profile-desc-title">Sobre {{ $user->display_name }}</h4>
						<span class="profile-desc-text">{{ $profile->about_me }}</span>
					@endif
					@if(trim(html_entity_decode(strip_tags($profile->activities))) != '')
						<h4 class="profile-desc-title">Actividades</h4>
						<span class="profile-desc-text">{{ $profile->activities }}</span>
					@endif
					@if(trim(html_entity_decode(strip_tags($profile->interests))) != '')
						<h4 class="profile-desc-title">Intereses</h4>
						<span class="profile-desc-text">{{ $profile->interests }}</span>
					@endif
					@if(trim(html_entity_decode(strip_tags($profile->website))) != '')
						<div class="margin-top-20 profile-desc-link">
							<i class="fa fa-globe"></i>
							<a href="{{ $profile->getWebsiteURL() }}" target="_blank">{{ $profile->getWebsiteName() }}</a>
						</div>
					@endif
					@if(trim(html_entity_decode(strip_tags($profile->twitter))) != '')
						<div class="margin-top-20 profile-desc-link">
							<i class="fa fa-twitter"></i>
							<a href="{{ $profile->getTwitterURL() }}" target="_blank">{{ $profile->getTwitterName() }}</a>
						</div>
					@endif
					@if(trim(html_entity_decode(strip_tags($profile->facebook))) != '')
						<div class="margin-top-20 profile-desc-link">
							<i class="fa fa-facebook"></i>
							<a href="{{ $profile->getFacebookURL()}}" target="_blank">{{ $profile->getFacebookName() }}</a>
						</div>
					@endif
					@if(trim(html_entity_decode(strip_tags($user->email))) != '')
						<div class="margin-top-20 profile-desc-link">
							<i class="fa fa-envelope"></i>
							{{ $user->email }}
						</div>
					@endif
					@if(trim(html_entity_decode(strip_tags($profile->phone))) != '')
						<div class="margin-top-20 profile-desc-link">
							<i class="fa fa-phone"></i>
							{{ $profile->phone }}
						</div>
					@endif
				</div>
			</div>
					
			<!-- END PORTLET -->
		</div>
	</div>		

<script type="text/javascript">
	
	window.history.pushState("", "", '/{{ $user->username }}?section=general');
		document.title = 'Alice | {{ $user->username }} | Perfil';

</script>