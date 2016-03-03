<?php 
	class TchatController extends AppController {
		var $name = 'Tchat';
		var $helpers = array('chat.ajaxChat');
		
		public function index() {
			$this->layout = 'default2';
		}
	}