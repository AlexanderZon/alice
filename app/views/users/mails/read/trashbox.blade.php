
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
					<a class="markasnonedeleted-btn" href="javascript:;">
					<i class="fa fa-pencil"></i> Devolver a la Bandeja </a>
				</li>
			</ul>
		</div>
	</th>
	<th class="pagination-control" colspan="3">
		{{ $trashbox->links('users.mails.read.paginate')->with('messages', $trashbox) }}
	</th>
</tr>
</thead>
<tbody>
@foreach($trashbox as $message)
	<tr {{ $message->user_message()->status == 'unread' ? 'class="unread"' : '' }} data-messageid="{{ Crypt::encrypt($message->id) }}">
		<td class="inbox-small-cells">
			<input type="checkbox" class="mail-checkbox ids" name="ids[]" value="{{Crypt::encrypt($message->id)}}">
		</td>
		<td class="inbox-small-cells">
			<a class="favorite-btn" data-messageid="{{ Crypt::encrypt($message->id) }}" data-favorite="{{ $message->user_message()->favorite }}">
				<i class="fa fa-star {{ $message->user_message()->favorite ? 'inbox-started' : 'inbox-not-started' }}"></i>				
			</a>
		</td>
		<td class="view-message hidden-xs">
			@if($message->from->id == Auth::user()->id)
				{{ 'Yo' }}
			@else
				{{ $message->from->first_name }} {{ $message->from->last_name }}
			@endif
		</td>
		<td class="view-message ">
			 {{ $message->subject }}
		</td>
		<td class="view-message inbox-small-cells">
			@if(count($message->attachments) > 0)
				<i class="fa fa-paperclip"></i>
			@endif
		</td>
		<td class="view-message text-right">
			<spam class="{{ $message->user_message()->created_diff() > 0 ? 'moment-date' : 'moment-time' }}">
				{{ $message->user_message()->created_at }}
			</spam> 
		</td>
	</tr>
@endforeach

</tbody>
</table>

<script type="text/javascript" src="/assets/global/plugins/moment/moment.conf.js"></script>