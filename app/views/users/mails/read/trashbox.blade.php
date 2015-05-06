
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
<!-- <tr class="unread" data-messageid="1">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		 Petronas IT
	</td>
	<td class="view-message ">
		 New server for datacenter needed
	</td>
	<td class="view-message inbox-small-cells">
		<i class="fa fa-paperclip"></i>
	</td>
	<td class="view-message text-right">
		 16:30 PM
	</td>
</tr>
<tr class="unread" data-messageid="2">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		 Daniel Wong
	</td>
	<td class="view-message">
		 Please help us on customization of new secure server
	</td>
	<td class="view-message inbox-small-cells">
	</td>
	<td class="view-message text-right">
		 March 15
	</td>
</tr>
<tr data-messageid="3">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		 John Doe
	</td>
	<td class="view-message">
		 Lorem ipsum dolor sit amet
	</td>
	<td class="view-message inbox-small-cells">
	</td>
	<td class="view-message text-right">
		 March 15
	</td>
</tr>
<tr data-messageid="4">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		 Facebook
	</td>
	<td class="view-message">
		 Dolor sit amet, consectetuer adipiscing
	</td>
	<td class="view-message inbox-small-cells">
	</td>
	<td class="view-message text-right">
		 March 14
	</td>
</tr>
<tr data-messageid="5">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star inbox-started"></i>
	</td>
	<td class="view-message hidden-xs">
		 John Doe
	</td>
	<td class="view-message">
		 Lorem ipsum dolor sit amet
	</td>
	<td class="view-message inbox-small-cells">
	</td>
	<td class="view-message text-right">
		 March 15
	</td>
</tr>
<tr data-messageid="6">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star inbox-started"></i>
	</td>
	<td class="view-message hidden-xs">
		 Facebook
	</td>
	<td class="view-message">
		 Dolor sit amet, consectetuer adipiscing
	</td>
	<td class="view-message inbox-small-cells">
		<i class="fa fa-paperclip"></i>
	</td>
	<td class="view-message text-right">
		 March 14
	</td>
</tr>
<tr data-messageid="7">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star inbox-started"></i>
	</td>
	<td class="view-message hidden-xs">
		 John Doe
	</td>
	<td class="view-message">
		 Lorem ipsum dolor sit amet
	</td>
	<td class="view-message inbox-small-cells">
		<i class="fa fa-paperclip"></i>
	</td>
	<td class="view-message text-right">
		 March 15
	</td>
</tr>
<tr data-messageid="8">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		 Facebook
	</td>
	<td class="view-message view-message">
		 Dolor sit amet, consectetuer adipiscing
	</td>
	<td class="view-message inbox-small-cells">
	</td>
	<td class="view-message text-right">
		 March 14
	</td>
</tr>
<tr data-messageid="9">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		 John Doe
	</td>
	<td class="view-message view-message">
		 Lorem ipsum dolor sit amet
	</td>
	<td class="view-message inbox-small-cells">
	</td>
	<td class="view-message text-right">
		 March 15
	</td>
</tr>
<tr data-messageid="10">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		 Facebook
	</td>
	<td class="view-message view-message">
		 Dolor sit amet, consectetuer adipiscing
	</td>
	<td class="view-message inbox-small-cells">
	</td>
	<td class="view-message text-right">
		 March 14
	</td>
</tr>
<tr data-messageid="11">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star inbox-started"></i>
	</td>
	<td class="view-message hidden-xs">
		 John Doe
	</td>
	<td class="view-message">
		 Lorem ipsum dolor sit amet
	</td>
	<td class="view-message inbox-small-cells">
	</td>
	<td class="view-message text-right">
		 March 15
	</td>
</tr>
<tr data-messageid="12">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star inbox-started"></i>
	</td>
	<td class="hidden-xs">
		 Facebook
	</td>
	<td class="view-message">
		 Dolor sit amet, consectetuer adipiscing
	</td>
	<td class="view-message inbox-small-cells">
		<i class="fa fa-paperclip"></i>
	</td>
	<td class="view-message text-right">
		 March 14
	</td>
</tr>
<tr data-messageid="13">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		 John Doe
	</td>
	<td class="view-message">
		 Lorem ipsum dolor sit amet
	</td>
	<td class="view-message inbox-small-cells">
		<i class="fa fa-paperclip"></i>
	</td>
	<td class="view-message text-right">
		 March 15
	</td>
</tr>
<tr data-messageid="14">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="hidden-xs">
		 Facebook
	</td>
	<td class="view-message view-message">
		 Dolor sit amet, consectetuer adipiscing
	</td>
	<td class="view-message inbox-small-cells">
	</td>
	<td class="view-message text-right">
		 March 14
	</td>
</tr>
<tr data-messageid="15">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		 John Doe
	</td>
	<td class="view-message">
		 Lorem ipsum dolor sit amet
	</td>
	<td class="view-message inbox-small-cells">
	</td>
	<td class="view-message text-right">
		 March 15
	</td>
</tr>
<tr data-messageid="16">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		 Facebook
	</td>
	<td class="view-message">
		 Dolor sit amet, consectetuer adipiscing
	</td>
	<td class="view-message inbox-small-cells">
	</td>
	<td class="view-message text-right">
		 March 14
	</td>
</tr>
<tr data-messageid="17">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star inbox-started"></i>
	</td>
	<td class="view-message hidden-xs">
		 John Doe
	</td>
	<td class="view-message">
		 Lorem ipsum dolor sit amet
	</td>
	<td class="view-message inbox-small-cells">
	</td>
	<td class="view-message text-right">
		 March 15
	</td>
</tr>
<tr data-messageid="18">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		 Facebook
	</td>
	<td class="view-message view-message">
		 Dolor sit amet, consectetuer adipiscing
	</td>
	<td class="view-message inbox-small-cells">
		<i class="fa fa-paperclip"></i>
	</td>
	<td class="view-message text-right">
		 March 14
	</td>
</tr>
<tr data-messageid="19">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
	</td>
	<td class="inbox-small-cells">
		<i class="fa fa-star"></i>
	</td>
	<td class="view-message hidden-xs">
		 John Doe
	</td>
	<td class="view-message">
		 Lorem ipsum dolor sit amet
	</td>
	<td class="view-message inbox-small-cells">
		<i class="fa fa-paperclip"></i>
	</td>
	<td class="view-message text-right">
		 March 15
	</td>
</tr> -->
</tbody>
</table>

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
</script>