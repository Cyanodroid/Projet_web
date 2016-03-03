<?php 
	App::import('Plugin/WebSocket/Lib/Network/Http', 'WebSocket', array('file'=>'WebSocket.php'));
	class TchatController extends AppController {
		var $name = 'Chat';
		
		public function index() {
			$this->layout = 'default2';
			$websocket = new WebSocket(array('port' => 8080, 'scheme'=>'wss'));
			if($websocket->connect()) {
				/*$someData = array('notify' => false, 'foo' => $bar);
			    $websocket->emit('adduser');*/
			}

		}
	}