<?php 
	class ChatsController extends AppController {
		var $name = 'Chats';

		public function index() {
			if (!$this->Auth->user('id')) {
				throw new NotFoundException();
			}

			$this->layout = 'default2';

			$room = $this->Chat->Rooms->find('all', array(
		  			'fields'=>array('id', 'name')
		  	));

			// on va rechercher la salle de tchat "général" pour augmenter le nombre d'utilisateurs connectés
		  	$general = $this->Chat->Rooms->find('first', array(
		  		'conditions'=>array('Rooms.name' => 'Général'),
		  		'fields'=>array('id', 'nb_users')
		  	));

		  	$nb_connected = $general['Rooms']['nb_users'] + 1;

		  	$this->Chat->Rooms->id = $general['Rooms']['id'];
		  	$this->Chat->Rooms->saveField('nb_users', $nb_connected);

		  	$this->set('rooms', $room);
		}

		public function changer_salle($id) {
			
		}
	}
