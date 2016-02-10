
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PORTLET -->

			<div class="portlet light">

				<!-- END PAGE CONTENT INNER -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="portlet-title">
							<h4 class="profile-usertitle-name">Eliminar Discusión	
								<a href="javascript:;" class="btn blue-madison pull-right tooltips discussions-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
									<i class="fa fa-arrow-left"></i>
								</a>
							</h4>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form id="deletediscussion-form" action="" method="post" class="form-horizontal ajax-form" data-url="{{ $route }}/delete" enctype="multipart/form-data">
								<div class="form-body">
									<h3 >¿Desea eliminar la discusión {{ $discussion->title }}?</h3>
									<input type="hidden" name="discussion_id" value="{{ Crypt::encrypt($discussion->id) }}"/>
									<!--/row-->
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-offset-3 col-md-9">
													<button type="submit" class="btn btn-danger">Si, Eliminar</button>
													<a href="javascript:;" class="btn default discussions-back-btn">No, Volver</a>
												</div>
											</div>
										</div>
										<div class="col-md-6">
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT INNER -->
				
			</div>
					
			<!-- END PORTLET -->
		</div>
	</div>		
	
	<script type="text/javascript">

		window.history.pushState("", "", '/teachers/courses/show/{{ Hashids::encode($course->id) }}?section=discussions&action=delete&discussion_id={{ Hashids::encode($discussion->id) }}');
		document.title = 'Alyce | {{ $course->title }} | {{ $discussion->title }} | Eliminar Discusión';

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->getMainPicture() }}" class="img-responsive" alt="">');

	</script>