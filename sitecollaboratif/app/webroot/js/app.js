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

// setInterval(ajaxCall, 1000);

function ajaxCall() {

	if (typeof $('#chat-message').val() === "undefined") {
		return false;
	}

	var current_url = $(location).attr('href');
	var params = current_url.substring(current_url.lastIndexOf("/")+1);
	var id = params.slice(0, 1);
	
	if (isNaN(id))
		id = 1;

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

function recuperer_json(file) {
	var request = new XMLHttpRequest();
    request.open('GET', file, false);
    request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    request.send(null);

    try {
    	return JSON.parse(request.responseText);
    } catch(ex) {
    	return '';
    }
}

function sanitize_badwords(message) {
	
    badwords = recuperer_json('app/webroot/js/badwords_file.json');

    for (i = 0 ; i < badwords.length ; i++) {
    	regExp = new RegExp('\\b' + badwords[i] + '\\b', 'gi');

    	if (regExp.test(message)) {
    		return message.replace(regExp, '*****');
    	}
    }
    return message;
}


function EnvoyerMSG() {

	var current_url = $(location).attr('href');
	var params = current_url.substring(current_url.lastIndexOf("/")+1);
	var id = params.slice(0, 1);

	if (isNaN(id))
		id = 1;

	var msg = sanitize_badwords($('#chat-messsage-input').val());

	$('#chat-form-control').submit(function(evt) {
		evt.preventDefault();
		$.ajax({
		    url: '/Projet_web/sitecollaboratif/Chats/envoyer_msg/' + id + '/' + msg,
		    data: {
		    	id: id,
		        msg: msg
		    }
		});

	  	$('#chat-messsage-input').val('');
	  	$('#chat-messsage-input').focus();

		return false;
	});
}

function EnvoyerMAIL() {
	var current_url = $(location).attr('href');
	var params = current_url.substring(current_url.lastIndexOf("/")+1);
	var id = params.slice(0, 1);

	if (isNaN(id))
		id = 1;

	$('#mail-button-control').submit(function(evt) {
		evt.preventDefault();

		$.ajax({
		    url: '/Projet_web/sitecollaboratif/Chats/envoyer_mail/' + id,
		    data: {
		    	id: id
		    },
		    success : function() {
		    	alert("Votre question a été envoyée");
		    },
		    error : function(status) {
		    	alert("Une erreur est survenue lors de l'envoi");
		    }
		});
		return false;
	});
}

function poser_question() {
	$('#question-button-control').submit(function(evt) {
		evt.preventDefault();
		var str = window.prompt("Merci de nous préciser votre question : ", "");
		if (str != NULL) {
			var msg = sanitize_badwords(str);
			$.ajax({
			    url: '/Projet_web/sitecollaboratif/Chats/action/' +  msg,
			    data: {
			        msg: msg
			    }
			});
		}
	});
}

function enregistrer_reponse() {
	$('#reponse-button-control').submit(function(evt) {
		evt.preventDefault();
		var str = window.prompt("Merci de nous préciser la réponse qui vous semble la plus appropriée : ", "");
		if (str != NULL) {
			var msg = sanitize_badwords(str);
			$.ajax({
			    url: '/Projet_web/sitecollaboratif/Chats/action/' +  msg,
			    data: {
			        msg: msg
			    }
			});
		}
	});
}
