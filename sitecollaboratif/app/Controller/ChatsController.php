<?php 
	class ChatsController extends AppController {
		var $name = 'Chats';

		public function index($id = null, $current_id = null) {
			$this->layout = 'default2';

			//debug($this->request->params);
			if (!$this->Auth->user('id')) {
				throw new NotFoundException();
			}

			if ($id == null) {
				$r = $this->Chat->Rooms->find('first', array(
					'conditions' => array('Rooms.name'=>'Général')
					)
				);

				$cpt = $r['Rooms']['nb_users'] + 1;
				$this->Chat->Rooms->id = $r['Rooms']['id'];
				$this->Chat->Rooms->saveField('nb_users', $cpt);

				$room = $this->Chat->Rooms->find('all');

				$msg = $this->Chat->find('all', array(
					'conditions'=>array('Chat.rooms_id'=>$r['Rooms']['id']),
					//'limit'=>10
					)
				);

				// récupération des utilisateurs connectés
				//$u = 

				$this->set('rooms', $room);
				$this->set('cr', $r);
				$this->set('msg', $msg);
			} else if ($id && $current_id) {
				$old = $this->Chat->Rooms->find('first', array(
					'conditions'=>array('Rooms.id'=>$current_id)
					)
				);

				$current_cpt = $old['Rooms']['nb_users'] - 1;
				if ($current_cpt < 0) $current_cpt = 0;
				$this->Chat->Rooms->id = $current_id;
				$this->Chat->Rooms->saveField('nb_users', $current_cpt);

				$r = $this->Chat->Rooms->find('first', array(
					'conditions'=>array('Rooms.id'=>$id)
					)
				);

				$cpt = $r['Rooms']['nb_users'] + 1;
				$this->Chat->Rooms->id = $id;
				$this->Chat->Rooms->saveField('nb_users', $cpt);

				$room = $this->Chat->Rooms->find('all');

				$msg = $this->Chat->find('all', array(
					'conditions'=>array('Chat.rooms_id'=>$id),
					//'limit'=>10
					)
				);

				$this->set('rooms', $room);
				$this->set('cr', $r);
				$this->set('msg', $msg);
			}
		}

		public function envoyer_msg($id) {
			if (!empty($this->request->data)) {
				if ($this->Chat->validates()) {
					$this->request->data['Chats']['rooms_id'] = $id;
					$this->request->data['Chats']['users_id'] = $this->Auth->user('id');
					$this->Chat->create($this->request->data['Chats'], true, array());
					$this->Chat->save($this->request->data['Chats']);
				}
			}
			$this->redirect($this->referer());
		}
	}
