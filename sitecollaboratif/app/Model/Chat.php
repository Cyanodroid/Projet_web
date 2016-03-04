<?php
	class Chat extends AppModel {
		var $name = 'Chats';
		var $hasMany = 'Users';
		var $belongsTo = 'Rooms';

		public $validate = array(
			'message'=>array(
				'rule'=>'notBlank'
			)
		);
	}
