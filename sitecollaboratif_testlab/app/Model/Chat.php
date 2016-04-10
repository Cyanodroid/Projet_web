<?php
	class Chat extends AppModel {
		var $name = 'Chats';
		var $belongsTo = array('Rooms', 'Users');

		public $validate = array(
			'contenu'=>array(
				'rule'=>'notBlank'
			)
		);
	}
