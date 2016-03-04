<?php 
	class ChatsController extends AppController {
		var $name = 'Chats';

		public function index() {
			$this->layout = 'default2';

			$room = $this->Chat->Rooms->find('all', array(
		  			'fields'=>array('id', 'name')
		  	));

		  	$this->set('rooms', $room);
		}
	}