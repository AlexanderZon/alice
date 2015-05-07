moment.locale('es');
$('.moment-fromnow').each(function(e){
	var time = $(this).html();
	$(this).html(moment(time).fromNow());
	$(this).removeClass('moment-fromnow');
});
$('.moment-date').each(function(e){
	var time = $(this).html();
	$(this).html(moment(time).format('DD MMM'));
	$(this).removeClass('moment-date');
});
$('.moment-time').each(function(e){
	var time = $(this).html();
	$(this).html(moment(time).format('h:mm a'));
	$(this).removeClass('moment-time');
});
$('.moment-datetime').each(function(e){
	var time = $(this).html();
	$(this).html(moment(time).format('DD MMM h:mm a'));
	$(this).removeClass('moment-datetime');
});
$('.moment-date-fromnow').each(function(e){
	var time = $(this).html();
	$(this).html(moment(time).format('DD MMM') + '(' + moment(time).fromNow() + ')');
	$(this).removeClass('moment-date-fromnow');
});
$('.moment-time-fromnow').each(function(e){
	var time = $(this).html();
	$(this).html(moment(time).format('h:mm a') + '(' + moment(time).fromNow() + ')');
	$(this).removeClass('moment-time-fromnow');
});
$('.moment-datetime-fromnow').each(function(e){
	var time = $(this).html();
	$(this).html(moment(time).format('DD MMM h:mm a') + '(' + moment(time).fromNow() + ')');
	$(this).removeClass('.moment-datetime-fromnow');
});