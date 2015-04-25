
<div class="inbox-header inbox-view-header">
	<h1 class="pull-left">{{ 'Este es el asunto del Correo' }} <a href="javascript:;">
	Bandeja de Entrada </a>
	</h1>
	<div class="pull-right">
		<i class="fa fa-print"></i>
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
			<spam class="moment-msg">
				{{ $message->user_message(Auth::user())->created_at }} <!--- '08:20PM 29 JAN 2013' -->
				
			</spam> 
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
					<!-- <li>
						<a href="javascript:;">
						<i class="fa fa-print"></i> Imprimir </a>
					</li> -->
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
				{{ '3' }} Archivos Adjuntos — </span>
				<a href="javascript:;">
				Descargar todos los archivos adjuntos </a>
				<a href="javascript:;">
				Ver todas las imágenes </a>
			</div>
			<!--- Ciclo por cada Dato Adjunto -->
			@if(count($message->attachments) > 0)
				@foreach($message->attachments as $attachment)
					<div class="margin-bottom-25">
						<img src="{{'/assets/admin/pages/media/gallery/image4.jpg'}}">
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
				@endforeach
			@endif
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
		</div>

<script type="text/javascript">
	moment.locale('es');
 	$('.moment-msg').each(function(e){
 		$(this).html(moment($(this).html()).fromNow());
 	});
</script>