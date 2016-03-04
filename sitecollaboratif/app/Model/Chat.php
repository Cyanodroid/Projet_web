<?php
	class Chat extends AppModel {
		var $name = 'Chats';
		var $hasMany = 'Users';
		var $belongsTo = 'Rooms';
	}
?>
