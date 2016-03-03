var socket = io.connect('http://localhost:8080');

// lorsque l'on se connecte au serveur, on demande le pseudo de l'utilisateur 
socket.on('connect', function(){
	// on fait appel à la fonction 'adduser' du serveur et on lui passe le pseudo 
	socket.emit('adduser', prompt("Quel est votre pseudo?"));
});

// fonction qui met à jour le tchat en général
socket.on('updatechat', function (username, data) {
	$('#conversation').append('<b>'+username + ':</b> ' + data + '<br>');
});

// lorsqu'un utilisateur passe d'une salle à une autre, on actualise les salles
socket.on('updaterooms', function(rooms, current_room) {
	$('#rooms').empty();
	$.each(rooms, function(key, value) {
		if(value == current_room){
			$('#rooms').append('<div>' + value + '</div>');
		}
		else {
			$('#rooms').append('<div><a href="#" onclick="switchRoom(\''+value+'\')">' + value + '</a></div>');
		}
	});
});

function switchRoom(room) {
	socket.emit('switchRoom', room);
}

$(function(){
	// si l'utilisateur envoie un message avec le bouton
	$('#datasend').click(function() {
		var message = $('#data').val();
		$('#data').val('');
		$('#data').focus();
		// tell server to execute 'sendchat' and send along one parameter
		socket.emit('sendchat', message);
	});

	// ou s'il envoie le message en appuyant sur entrée
	$('#data').keypress(function(e) {
		if(e.which == 13) {
			$(this).blur();
			$('#datasend').focus().click();
			$('#data').focus();
		}
	});
});