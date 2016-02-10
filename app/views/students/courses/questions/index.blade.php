
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PORTLET -->
		<div class="portlet light" data-course="{{ Hashids::encode($course->id) }}">

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="portlet-title">
						<h4 class="profile-usertitle-name">Cuestionario del Curso
							<!-- <a href="javascript:;" class="btn blue-madison pull-right tooltips students-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
								<i class="fa fa-arrow-left"></i>
							</a> -->
						</h4>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">&nbsp;</div>
					<div class="portlet-body form students" >

					<div class="panel-group accordion" id="accordion3">
						@foreach($questions as $question)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
									<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#{{ Hashids::encode($question->id)}}">
									{{ $question->question }} </a>
									</h4>
								</div>
								<div id="{{ Hashids::encode($question->id)}}" class="panel-collapse collapse">
									<div class="panel-body">
										{{ $question->answer }}
										<p>{{ $question->reference }}</p>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	window.history.pushState("", "", '/curso/{{ $course->name }}?section=questions');
	document.title = 'Alyce | {{ $course->title }} | Cuestionario';

	$('#course-title').html('{{ $course->title }}');
	$('#course-teacher').html('{{ $course->teacher->display_name }}');
	$('#course-main-image').html('<img src="{{ $course->getMainPicture() }}" class="img-responsive" alt="">');

</script>