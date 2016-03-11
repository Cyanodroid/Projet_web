$(document).ready(function(){
	$('body').append('<a href="#" class="to-the-top"><i class="fa fa-arrow-up"></i></a>');

	$('.to-the-top').css({
		'position'				:	'fixed',
		'right'					:	'0',
		'bottom'				:	'0',
		'display'				:	'none',
		'padding'				:	'13px',
		'background'			:	'#222',
		'opacity'				:	'0.9',
		'color'                 :   '#fff',
		'z-index'				:	'2000'
	});

	$(window).scroll(function(){
		posScroll = $(document).scrollTop();
		if(posScroll >=600) 
			$('.to-the-top').fadeIn(600);
		else
			$('.to-the-top').fadeOut(600);
	});
});

setInterval(ajaxCall, 1000);

function ajaxCall() {

	if (typeof $('#chat-message').val() === "undefined") {
		return false;
	}

	var current_url = $(location).attr('href');
	var params = current_url.substring(current_url.lastIndexOf("/")+1);
	var id = params.slice(0, 1);

	var url = '/Projet_web/sitecollaboratif/Chats/ajaxProcessing' + '/' + id;

	$.get(url, function(data, status) {
			$('#chat-message').empty().append(data);
	});

	var tchat_scroll = document.getElementById('chat-message');
	tchat_scroll.scrollTop = tchat_scroll.scrollHeight;

	var focus_message = document.getElementById('chat-messsage-input');
	focus_message.focus();
		
	return false;
}

