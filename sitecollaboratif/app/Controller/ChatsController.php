<?php
	App::uses('File', 'Utility');

	class ChatsController extends AppController {
		var $name = 'Chats';

		public function index($id = null, $current_id = null) {
			$this->layout = 'default2';

			if (!$this->Auth->user('id')) {
				throw new NotFoundException();
			}

			// récupère l'utilisateur
			$current_user = $this->Chat->Users->find('first', array(
				'fields'=>array('id', 'username', 'groups_id', 'avatar', 'rooms_id'),
				'conditions'=>array('id'=>$this->Auth->user('id')),
				)
			);

			if ($id == null) {
				$r = $this->Chat->Rooms->find('first', array(
					'conditions' => array('Rooms.name'=>'Général')
					)
				);

				$cpt = $r['Rooms']['nb_users'] + 1;
				$this->Chat->Rooms->id = $r['Rooms']['id'];
				$this->Chat->Rooms->saveField('nb_users', $cpt);

				$room = $this->Chat->Rooms->find('all');

				// on place l'utilisateur dans la salle
				$current_user['Users']['rooms_id'] = $r['Rooms']['id'];

				$this->Chat->Users->id = $this->Auth->user('id');
				$this->Chat->Users->saveField('rooms_id', $current_user['Users']['rooms_id']);

				// récupération des utilisateurs connectés
				$users = $this->Chat->Users->find('all', array(
					'fields'=>array('id', 'username', 'groups_id', 'avatar', 'rooms_id'),
					'conditions'=>array('Users.rooms_id'=>$r['Rooms']['id'])
					)
				);

				$this->set('rooms', $room);
				$this->set('cr', $r);
				$this->set('users_list', $users);

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

				// on place l'utilisateur dans la salle
				$current_user['Users']['rooms_id'] = $r['Rooms']['id'];

				$this->Chat->Users->id = $this->Auth->user('id');
				$this->Chat->Users->saveField('rooms_id', $current_user['Users']['rooms_id']);

				// récupération des utilisateurs connectés
				$users = $this->Chat->Users->find('all', array(
					'fields'=>array('id', 'username', 'groups_id', 'avatar', 'rooms_id'),
					'conditions'=>array('Users.rooms_id'=>$r['Rooms']['id'])
					)
				);

				$this->set('rooms', $room);
				$this->set('cr', $r);
				$this->set('users_list', $users);
			}
		}

		public function envoyer_msg($id = null, $msg) {
			$this->autoRender = false;

			if ($msg == null)
				exit();

			if ($this->request->is('ajax')) {
				$data['Chats']['rooms_id'] = $id;
				$data['Chats']['users_id'] = $this->Auth->user('id');
				$data['Chats']['contenu'] = $msg;

				$this->Chat->create($data['Chats'], true, array());
				$this->Chat->save($data['Chats']);

				// app/tmp/$id.log
				CakeLog::write($id, __('Utilisateur : ') . $this->Auth->user('username') . __(' dit : '). $msg);
			}
		}

		public function ajaxProcessing($id = null) {

			if ($this->request->is('ajax')) {

				$msg = $this->Chat->find('all', array(
					'conditions'=>array('Chat.rooms_id'=> $id)
					)
				);

				$this->set('msg', $msg);
			}
		}

		public function envoyer_mail($id) {
			$this->autoRender = false;

			if ($this->request->is('ajax')) {

				$room = $this->Chat->Rooms->findById($id);

				// $directory = 'C:/Users/Nicolas/Documents/web/Projet_web/sitecollaboratif/app/tmp/logs/' . $id . '.log'; // NICO.G PC FIXE
				$directory = 'C:/Users/link-/Documents/web/Projet_web/sitecollaboratif/app/tmp/logs/'.$id.'.log'; 		   // NICO.G PC PORTABLE

				// $directory = 'à vous de compléter /Projet_web/sitecollaboratif/app/tmp/logs/'.$id.'.log'; 		  		   // ARNAULT.P PC

				//$directory = 'C:\Users\Claire\Documents\GitHub\Projet_web\sitecollaboratif\app\tmp\logs'.$id.'.log'; 		   // CLAIRE.T PC

				// $directory = 'à vous de compléter /Projet_web/sitecollaboratif/app/tmp/logs/'.$id.'.log'; 		  		   // THOMAS.S PC

				App::uses('CakeEmail', 'Network/Email');
				$email = new CakeEmail('gmail');
				$email->to(Configure::read('Site_Contact.mail')) // à qui ?
					  ->from(Configure::read('Site_Contact.mail')) // par qui ?
					  ->subject('Un utilisateur du site "Site collaboratif" a posé une question sur le tchat') // sujet du mail
					  ->emailFormat('html') // le format à utiliser
					  ->attachments($directory)
					  ->send(); // envoi du mail
				die();
			}
		}

	}
