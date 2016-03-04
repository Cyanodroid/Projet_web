<?php
	class Chat extends AppModel {
		var $name = 'Chats';
		var $belongsTo = 'Rooms'; // plusieurs posts vers une cat
	}
?>
