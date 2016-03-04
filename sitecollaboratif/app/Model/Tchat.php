<?php
	class Tchat extends AppModel {
		var $name = 'Chat';
		var $useTable = false;
		
		public $actsAs = array(
			'WebSocket.Publishable' => array(
				'fields' => array(
					'name', 
					'status_date', 
					'status_code', 
					'status_progress'
					)
				)
			);
	}
?>