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