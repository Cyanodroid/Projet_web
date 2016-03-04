var express = require('express');
var app = express();
var http = require('http');
var server = http.createServer(app);
var io = require('socket.io').listen(server);

server.listen(8080);

// Route
app.get('/', function (req, res) {
  res.sendFile(__dirname + '/index.ctp');
});

// liste des utilisateurs connectés au tchat
var usernames = {};

// list des salles dispos sur le tchat
var rooms = ['Générale','Programmation C','Programmation Java'];

io.sockets.on('connection', function (socket) {
	// lorsque l'utilisateur se connecte
	socket.on('adduser', function(username) {
		// on récupère son pseudo
		socket.username = username;
		// on récupère la salle dans laquelle se trouve l'utilisateur
		socket.room = 'Générale';
		// on l'ajoute à la liste
		usernames[username] = username;
		// de base, on connecte l'utilisateur à la salle générale
		socket.join('Générale');
		// on laisse un petit message de connection
		socket.emit('updatechat', 'Information', 'Vous êtes connecté à la salle Générale');
		// on laisse un petit message pour les utilisateurs de la salle
		socket.broadcast.to('Générale').emit('updatechat', 'Information', username + ' s\'est connecté à cette salle');
		socket.emit('updaterooms', rooms, 'Générale');
	});
	
	socket.on('sendchat', function(data) {
		// envoi de message dans la salle
		io.sockets.in(socket.room).emit('updatechat', socket.username, data);
	});
	
	socket.on('switchRoom', function(newroom){
		socket.leave(socket.room);
		socket.join(newroom);
		socket.emit('updatechat', 'Information', 'vous avez rejoint la salle '+ newroom);
		// on laisse un message dans l'ancienne salle
		socket.broadcast.to(socket.room).emit('updatechat', 'Information', socket.username+' a quitté la salle');
		// on met à jour la salle dans laquelle est l'utilisateur
		socket.room = newroom;
		socket.broadcast.to(newroom).emit('updatechat', 'Information', socket.username+' a rejoint la salle');
		socket.emit('updaterooms', rooms, newroom);
	});
	
	// lorsqu'un utilisateur se déconnecte
	socket.on('disconnect', function() {
		// on supprime l'utilisateur de la liste des utilisateurs connectés
		delete usernames[socket.username];
		io.sockets.emit('updateusers', usernames);
		// on laisse un petit message de notification
		socket.broadcast.emit('updatechat', 'Information', socket.username + ' s\'est déconnecté');
		socket.leave(socket.room);
	});
});
