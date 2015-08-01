var NotificationManager = function(){

	var closeNotification = function(notification){

		$.ajax({
			url: '/notifications/news/' + notification,
			type: 'PUT',
			dataType: 'json',
			async: true,
			success: function(data){
				console.log(data);
			},
			error: function(xhr){
				console.log('xhr');
			}
		});

	};

	var showNotification = function(notification){

		window.location = '/notifications/go/' + notification;

	};

	var requestNotifications = function(){

		$.ajax({
			url: '/notifications/news',
			type: 'POST',
			dataType: 'json',
			async: true,
			success: function(data){

				/*data[0] = {
					crypt: 'Ay128eh1n08rg17rfg1u9d1i0db01db7912d792b1vd921v7v',
					hashids: 'ABCDEF12',
					title: 'Nueva notificación',
					description: 'Este es el Texto de la notificación',
					picture: '/uploads/users/defaults/male_avatar_2.png',
					icon: 'fa-plus',
					badge: 'bg-blue',
					status: 'fired'
				}
				*/	
				if(data.length > 0){

					$('#header_notification_bar .notifications-counter').each(function(){
						var counter = parseInt($(this).html());
						counter += data.length;
						$(this).html(counter);
					});

					$('#header_notification_bar .badge.notifications-counter').each(function(){
						$(this).addClass('badge-success');
					});

					for(var i = data.length-1 ; i >= 0 ; i-- ){

						$('ul.notifications-dropdown-list').prepend('' +
							'<li class="" data-notification="' + data[i].hashids + '">' +
								'<a href="/notifications/go/' + data[i].crypt + '">' +
								'<span class="photo">' +
								'<img src="' + data[i].picture + '" class="img-circle" alt="">' +
								'</span>' +
								'<span class="subject">' +
								'<span class="from">' + (data[i].icon != '' ? '<span class="badge badge-notification ' + data[i].badge + '"><i class="fa ' + data[i].icon + '"></i></span>&nbsp;' : '' ) + data[i].title + '</span>' +
								'<span class="time"><span class="moment-fromnow">' + data[i].created_at + '</span></span>' +
								'</span>' +
								'<span class="message">' + data[i].description + '</span>' +
								'</a>' +
							'</li>' +
							'');

						noty({
							layout: 'bottomRight',
						    theme: 'metronic', // or 'relax'
						    type: 'alert',
						    text: '<a href="/notifications/go/' + data[i].crypt + '"><div class="row"><div class="col-md-3" style="padding-right: 10px;padding-left: 10px;"><img class="img-circle col-md-12" src="' + data[i].picture + '" style="padding-right: 10px;padding-left: 10px;"></div><div class="col-md-9" style="padding-right: 10px;padding-left: 0px;"><div class="row"><div class="col-md-10" style="padding-right: 10px;padding-left: 10px;"><h5 style="margin-top:0;color:#222"><span class="badge badge-notification ' + data[i].badge + '"><i class="fa ' + data[i].icon + '"></i></span>&nbsp;' + data[i].title + '</h5></div></div><div class="row"><div class="col-md-12" style="padding-right: 10px;padding-left: 10px;"><span>' + data[i].description + '</span></div></div></div></a>', // can be html or string
						    message: 'Este es el mensaje', // can be html or string
						    dismissQueue: true, // If you want to use queue feature set this true
						    template: '<div class="noty_message" style="text-align:left"><span class="noty_text"></span><div class="noty_close"></div></div>',
						    animation: {
						        open: {height: 'toggle'}, // or Animate.css class names like: 'animated bounceInLeft'
						        close: {height: 'toggle'}, // or Animate.css class names like: 'animated bounceOutLeft'
						        easing: 'swing',
						        speed: 500 // opening & closing animation speed
						    },
						    timeout: 10000, // delay for closing event. Set false for sticky notifications
						    force: false, // adds notification to the beginning of queue when set to true
						    modal: false,
						    maxVisible: 5, // you can set max visible notification for dismissQueue true option,
						    killer: false, // for close all notifications before show
						    closeWith: ['button'], // ['click', 'button', 'hover', 'backdrop'] // backdrop click will close all notifications
						    callback: {
						        onShow: function() {
						        },
						        afterShow: function() {
						        	//showNotification(data[i]);
						        	console.log("afterShow");
						        },
						        onClose: function() {
						        	console.log("close");
						        },
						        afterClose: function() {
						        	console.log("afterClose");
						        },
						        onCloseClick: function() {
						        	console.log("onClose");
						        },
						    },
						    buttons: false // an array of buttons
						});	

						$('.moment-fromnow').each(function(e){
							var time = $(this).html();
							$(this).html(moment(time).fromNow());
							$(this).removeClass('moment-fromnow');
						});					

					}
					
				}
				console.log(data);
			},
			error: function(xhr){
				console.log(xhr);
			}
		});

	}

	return {

		init: function(){
			setInterval(requestNotifications, 5000);
		}

	}

}();

NotificationManager.init();