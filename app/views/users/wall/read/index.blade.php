@extends ('layouts.wall')

@section ("content_profile")

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
							 {{ count($user->followers) }}
						</div>
						<div class="uppercase profile-stat-text">
							 Seguidores
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="uppercase profile-stat-title">
							 {{ count($user->followed) }}
						</div>
						<div class="uppercase profile-stat-text">
							 Siguiendo
						</div>
					</div>
				</div>
				<!-- END STAT -->
				<div>
					@if($profile->about_me != '')
						<h4 class="profile-desc-title">Sobre {{ $user->display_name }}</h4>
						<span class="profile-desc-text">{{ $profile->about_me }}</span>
					@endif
					@if($profile->activities != '')
						<h4 class="profile-desc-title">Actividades</h4>
						<span class="profile-desc-text">{{ $profile->activities }}</span>
					@endif
					@if($profile->interests != '')
						<h4 class="profile-desc-title">Intereses</h4>
						<span class="profile-desc-text">{{ $profile->interests }}</span>
					@endif
					@if($profile->website != '')
						<div class="margin-top-20 profile-desc-link">
							<i class="fa fa-globe"></i>
							<a href="{{ $profile->getWebsiteURL() }}" target="_blank">{{ $profile->getWebsiteName() }}</a>
						</div>
					@endif
					@if($profile->twitter != '')
						<div class="margin-top-20 profile-desc-link">
							<i class="fa fa-twitter"></i>
							<a href="{{ $profile->getTwitterURL() }}" target="_blank">{{ $profile->getTwitterName() }}</a>
						</div>
					@endif
					@if($profile->facebook != '')
						<div class="margin-top-20 profile-desc-link">
							<i class="fa fa-facebook"></i>
							<a href="{{ $profile->getFacebookURL()}}" target="_blank">{{ $profile->getFacebookName() }}</a>
						</div>
					@endif
					@if($user->email != '')
						<div class="margin-top-20 profile-desc-link">
							<i class="fa fa-envelope"></i>
							<a href="mailto({{ $user->email }})" target="_blank">{{ $user->email }}</a>
						</div>
					@endif
					@if($profile->phone != '')
						<div class="margin-top-20 profile-desc-link">
							<i class="fa fa-phone"></i>
							<a href="{{ $profile->phone }}" target="_blank">{{ $profile->phone }}</a>
						</div>
					@endif
				</div>
			</div>
					
			<!-- END PORTLET -->
		</div>
	</div>		
	
@stop