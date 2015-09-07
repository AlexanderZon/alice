<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/admin/pages/css/follows.css" rel="stylesheet" type="text/css"/>

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
						<h4 class="profile-usertitle-name">Estadísticas de {{ $user->display_name }}
							<!-- <a href="javascript:;" class="btn blue-madison pull-right tooltips students-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
								<i class="fa fa-arrow-left"></i>
							</a> -->
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form students" >
				
						<!-- BEGIN FILTER -->
						<div class="row mix-grid">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-book"></i> Lecciones participadas: {{ $statistics['lessons_viewed'] }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-comments"></i> Comentarios en lecciones: {{ count($statistics['lessons_comments']) }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-comments"></i> Comentarios en discusiones: {{ count($statistics['discussion_comments']) }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-file"></i> Archivos subidos: {{ count($statistics['files_uploaded']) }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-flask"></i> Actividades Realizadas: {{ count($statistics['activities_tested']) }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-lightbulb-o"></i> Promedio: {{ $statistics['average'] }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-thumbs-up"></i> Me gustas: {{ $statistics['likes'] }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-ban"></i> Comentarios No deseados: {{ $statistics['banned'] }}</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<h3><i class="fa fa-star"></i> Premiaciones: {{ $statistics['achievements'] }}</h3>
								</div>
							</div>
						</div>
						<!-- END FILTER -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	window.history.pushState("", "", '/{{ $user->username }}?section=statistics');
		document.title = 'Alice | {{ $user->display_name }} | Estadísticas';

</script>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>

<!--<script src="/assets/admin/pages/scripts/portfolio.js"></script>
<script>
jQuery(document).ready(function() {    
   Portfolio.init();
});
</script> -->

