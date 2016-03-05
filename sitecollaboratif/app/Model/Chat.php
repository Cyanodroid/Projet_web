<?php
	class Chat extends AppModel {
		var $name = 'Chats';
		//var $hasMany = 'Users';
		var $belongsTo = array('Rooms', 'Users');

		public $validate = array(
			'contenu'=>array(
				'rule'=>'notBlank'
			)
		);
	}
