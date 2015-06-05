
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
					<a class="deletefrombox-btn" href="javascript:;">
					<i class="fa fa-trash-o"></i> Eliminar de Mi Bandeja </a>
				</li>
			</ul>
		</div>
	</th>
	<th class="pagination-control" colspan="3">
		{{ $outbox->links('users.mails.read.paginate')->with(array('messages' => $outbox, 'box' => 'outbox')) }}
	</th>
</tr>
</thead>
<tbody>
@if($outbox->count() > 0)
	@foreach($outbox as $message)
		<tr data-messageid="{{ Crypt::encrypt($message->id) }}">
			<td class="inbox-small-cells">
				<input type="checkbox" class="ids mail-checkbox" name="ids[]" value="{{Crypt::encrypt($message->id)}}">
			</td>
			<td class="inbox-small-cells">
				<!-- <i class="fa fa-star"></i> -->
			</td>
			<td class="review-message hidden-xs">
				Para: {{ $message->recipientsText() }}
			</td>
			<td class="review-message ">
				 {{ $message->subject != '' ? $message->subject : '<em>(Sin Asunto)</em>' }}
			</td>
			<td class="review-message inbox-small-cells">
				@if(count($message->attachments) > 0)
					<i class="fa fa-paperclip"></i>
				@endif
			</td>
			<td class="review-message text-right">
				<spam class="{{ $message->created_diff() > 0 ? 'moment-date' : 'moment-time' }}">
					{{ $message->created_at }}
				</spam> 
			</td>
		</tr>
	@endforeach
@else
	<tr>
		<td colspan="6">No existen mensajes en tu Bandeja de Salida</td>
	</tr>
@endif
</tbody>
</table>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>