<div class="inbox-header inbox-view-header">
	<h1 class="pull-left">{{ $message->subject }} 
	<!-- <a href="javascript:;">Bandeja de Entrada </a> -->
	</h1>
	<div class="pull-right">
		<a href="{{ $route }}/print/{{ Crypt::encrypt($message->id) }}" target="_blank"><i class="fa fa-print"></i></a>
	</div>
</div>
<div class="inbox-view-info">
	<div class="row">
		<div class="col-md-7">
			<img src="{{'/assets/admin/layout4/img/avatar1_small.jpg'}}">
			<span class="bold">
			{{ $message->from->first_name }} {{ $message->from->last_name }} </span>
			<span>
			&#60;{{ $message->from->email }}&#62; </span>
			para <span class="bold">
			@foreach($message->to as $user)
				@if(Auth::user()->id == $user->id) 
					{{ 'yo; '}}
				@else 
					{{ $user->first_name }} {{ $user->last_name }}{{ '; ' }}
				@endif
			@endforeach
			</span>
			<spam class="moment-fromnow">
				{{ $message->user_message()->created_at }}
			</spam> 
				 <!--- '08:20PM 29 JAN 2013' -->
		</div>
		<div class="col-md-5 inbox-info-btn">
			<div class="btn-group">
				<button data-messageid="{{ Crypt::encrypt($message->id) }}" class="btn blue reply-btn">
					<i class="fa fa-reply"></i> Responder 
				</button>
				<button class="btn blue dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu pull-right">
					<li>
						<a href="javascript:;" data-messageid="{{ Crypt::encrypt($message->id) }}" class="reply-btn">
						<i class="fa fa-reply reply-btn"></i> Responder </a>
					</li>
					<li>
						<a href="javascript:;" data-messageid="{{ Crypt::encrypt($message->id) }}" class="forward-btn">
						<i class="fa fa-arrow-right reply-btn"></i> Reenviar </a>
					</li>
					<li>
						<a href="{{ $route }}/print/{{ Crypt::encrypt($message->id) }}" target="_blank">
						<i class="fa fa-print"></i> Imprimir </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;" data-messageid="{{ Crypt::encrypt($message->id) }}" class="spam-btn">
						<i class="fa fa-ban"></i> Spam </a>
					</li>
					<li>
						<a href="javascript:;" data-messageid="{{ Crypt::encrypt($message->id) }}" class="delete-btn">
						<i class="fa fa-trash-o"></i> Eliminar </a>
					</li>
				</ul>

					</div>
				</div>
			</div>
		</div>
		<div class="inbox-view">
			{{ $message->message }}
		</div>
		<hr>
		<div class="inbox-attached">
			<div class="margin-bottom-15">
				<span>
				{{ count($message->attachments) }} Archivos Adjuntos — </span>
				<a href="javascript:;" class="download-all-btn" data-messageid="{{ Crypt::encrypt($message->id) }}">
				Descargar todos los archivos adjuntos </a>
				<!-- <a href="javascript:;" class="view-all-btn">
				Ver todas las imágenes </a> -->
			</div>
			<!--- Ciclo por cada Dato Adjunto -->
			@if(count($message->attachments) > 0 AND ($counter = 0) == 0)
				<div class="row">
					@foreach($message->attachments as $attachment)
						@if((++$counter)%4 == 0)
							<div class="row">
						@endif
						<div class="col-md-3">
							<div class="row">
								<div class="col-md-1"></div>
								<img class="col-md-10 timeline-badge-userpic" src="{{ $attachment->image() }}">
								<div class="col-md-1"></div>
							</div>
							<div class="row">
								<div class="row">
									<div class="col-md-1"></div>
									<p class="col-md-10">{{$attachment->name}}</p>
									<div class="col-md-1"></div>
								</div>
								<div class="row">
									<div class="col-md-1"></div>
									<span class="col-md-5">{{ $attachment->getSize() }} </span>
									<a class="col-md-1 download-bt" href="javascript:;" data-attachmentid="{{ Crypt::encrypt($attachment->id) }}"><i class="fa fa-download"></i></a>					
									@if( $attachment->mime == 'image/png' || $attachment->mime == 'image/jpeg' || $attachment->mime == 'image/gif')
									<a class="col-md-1 fancybox" data-fancybox-type="iframe" title="{{ $attachment->name }} ({{ $attachment->getSize() }})" href="{{ $route }}/viewimage/{{ Crypt::encrypt($attachment->id) }}" rel="view-images"><i class="fa fa-eye"></i></a>
									@endif
									<!-- <a class="col-md-3" href="javascript:;">Descargar</a>									
									<a class="col-md-3" href="javascript:;">Ver</a> -->
									<div class="col-md-1"></div>
								</div>
							</div>
						</div>
						@if(($counter)%4 == 0)
							</div>
						@endif
					@endforeach
				</div>
			@endif
			<!-- 
			<div class="margin-bottom-25">
				<img src="/assets/admin/pages/media/gallery/image4.jpg">
				<div>
					<strong>image4.jpg</strong>
					<span>
					173K </span>
					<a href="javascript:;">
					Ver </a>
					<a href="javascript:;">
					Descargar </a>
				</div>
			</div>
			<div class="margin-bottom-25">
				<img src="/assets/admin/pages/media/gallery/image3.jpg">
				<div>
					<strong>IMAG0705.jpg</strong>
					<span>
					14K </span>
					<a href="javascript:;">
					Ver </a>
					<a href="javascript:;">
					Descargar </a>
				</div>
			</div>
			<div class="margin-bottom-25">
				<img src="/assets/admin/pages/media/gallery/image5.jpg">
				<div>
					<strong>test.jpg</strong>
					<span>
					132K </span>
					<a href="javascript:;">
					Ver </a>
					<a href="javascript:;">
					Descargar </a>
				</div>
			</div> 
			-->
		</div>

<script type="text/javascript">
	moment.locale('es');
 	$('.moment-fromnow').each(function(e){
 		var time = $(this).html();
 		$(this).html(moment(time).fromNow());
 	});
 	$('.moment-date').each(function(e){
 		var time = $(this).html();
 		$(this).html(moment(time).format('DD MMM'));
 	});
 	$('.moment-time').each(function(e){
 		var time = $(this).html();
 		$(this).html(moment(time).format('h:mm a'));
 	});
 	$('.moment-datetime').each(function(e){
 		var time = $(this).html();
 		$(this).html(moment(time).format('DD MMM h:mm a'));
 	});
 	$('.moment-date-fromnow').each(function(e){
 		var time = $(this).html();
 		$(this).html(moment(time).format('DD MMM') + '(' + moment(time).fromNow() + ')');
 	});
 	$('.moment-time-fromnow').each(function(e){
 		var time = $(this).html();
 		$(this).html(moment(time).format('h:mm a') + '(' + moment(time).fromNow() + ')');
 	});
 	$('.moment-datetime-fromnow').each(function(e){
 		var time = $(this).html();
 		$(this).html(moment(time).format('DD MMM h:mm a') + '(' + moment(time).fromNow() + ')');
 	});
 	$('.fancybox').fancybox();
    $('.fancybox-close').click(function(event) {
        $.fancybox.close();
    });
</script>