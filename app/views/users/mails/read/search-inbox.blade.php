
<table class="table table-striped table-advance table-hover">
<thead>
<tr>
	<th colspan="3">
		<input type="checkbox" class="mail-checkbox mail-group-checkbox">
		<div class="btn-group">
			<a class="btn btn-sm blue dropdown-toggle" href="javascript:;" data-toggle="dropdown">
			Más <i class="fa fa-angle-down"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a class="markasread-btn" href="javascript:;">
					<i class="fa fa-pencil"></i> Marcar como leído </a>
				</li>
				<li>
					<a class="markasnoneread-btn" href="javascript:;">
					<i class="fa fa-envelope-o"></i> Marcar como No leído </a>
				</li>
				<li>
					<a class="markasspam-btn" href="javascript:;">
					<i class="fa fa-ban"></i> Spam </a>
				</li>
				<li class="divider">
				</li>
				<li>
					<a class="markasdeleted-btn" href="javascript:;">
					<i class="fa fa-trash-o"></i> Eliminar </a>
				</li>
			</ul>
		</div>
	</th>
	<th>Resultados de Búsqueda: "{{ $q }}"</th>
	<th class="pagination-control" colspan="2">
		{{ $matches->links('users.mails.read.paginate')->with(array('messages' => $matches, 'box' => 'q-'.$type)) }}
	</th>
</tr>
</thead>
<tbody>
@if(count($matches) > 0)
	@foreach($matches as $message)
		<?php $user_message = $message->user_message(); ?>
		<tr {{ $user_message->status == 'unread' ? 'class="unread"' : '' }} data-messageid="{{ Crypt::encrypt($message->id) }}">
			<td class="inbox-small-cells">
				<input type="checkbox" class="mail-checkbox ids" name="ids[]" value="{{Crypt::encrypt($message->id)}}">
			</td>
			<td class="inbox-small-cells">
				<a class="favorite-btn" data-messageid="{{ Crypt::encrypt($message->id) }}" data-favorite="{{ $user_message->favorite }}">
					<i class="fa fa-star {{ $user_message->favorite ? 'inbox-started' : 'inbox-not-started' }}"></i>				
				</a>
			</td>
			<td class="view-message hidden-xs">
				@if($message->from->id == Auth::user()->id)
					{{ 'Yo' }}
				@else
					{{ $message->from->first_name }} {{ $message->from->last_name }}
				@endif
			</td>
			<td class="view-message">
				 {{ $message->subject }}
			</td>
			<td class="view-message">
				@if(count($message->attachments) > 0)
					<i class="fa fa-paperclip"></i>
				@endif
			</td>
			<td class="view-message text-right">
				<spam class="{{ $user_message->created_diff() > 0 ? 'moment-date' : 'moment-time' }}">
					{{ $user_message->created_at }}
				</spam> 
			</td>
		</tr>
	@endforeach
@else
	<tr>
		<td class="inbox-small-cells center" colspan="6">
			Ningún Resultado Encontrado
		</td>
	</tr>
@endif

</tbody>
</table>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>