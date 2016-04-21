<?php
	App::uses('File', 'Utility');

	class ChatsController extends AppController {
		var $name = 'Chats';

		public function index($id = null, $current_id = null) {
			$this->layout = 'default2';

			// si l'utilisateur parvient à acceder à cette page sans être connecté
			if (!$this->Auth->user('id')) {
				throw new NotFoundException();
			}

			// récupère l'utilisateur
			$current_user = $this->Chat->Users->find('first', array(
				'fields'=>array('id', 'username', 'groups_id', 'avatar', 'rooms_id'),
				'conditions'=>array('id'=>$this->Auth->user('id')),
				)
			);

			// dans cette partie on va placer notre utilisateur dans la salle générale
			// et mettre à jour le nombre d'utilisateur connectés et les récupérer
			// pour pouvoir les afficher
			if (empty($this->request->params['named'])) {
				$r = $this->Chat->Rooms->find('first', array(
					'conditions' => array('Rooms.name'=>'Générale')
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

			} else if (!empty($this->request->params['named']['id']) && !empty($this->request->params['named']['current_id'])) {
				// ici c'est la même chose mais on demande une room
				$id = $this->request->params['named']['id'];
				$current_id = $this->request->params['named']['current_id'];
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
			// envoie de message en ajax sur le tchat
			// suppression du rendu (on ne va pas sur une page différente)
			$this->autoRender = false;

			// si il n'y a pas de msg alors on ne fait rien
			if ($msg == null)
				exit();

			// vérifie que l'on est bien en ajax
			if ($this->request->is('ajax')) {
				// on va définir notre tableau data
				$data['Chats']['rooms_id'] = $id;
				$data['Chats']['users_id'] = $this->Auth->user('id');
				$data['Chats']['contenu'] = $msg;

				// on va créer une entrée dans la DB
				$this->Chat->create($data['Chats'], true, array());
				// et l'enregistrer
				$this->Chat->save($data['Chats']);

				// on met les log à jour au passage
				if ($this->Auth->user('groups_id') == 3) {
					// app/tmp/$id.log
					CakeLog::write($id, __('Utilisateur [PREMIUM] : ') . $this->Auth->user('username') . __(' dit : '). $msg);
				} else {
					// app/tmp/$id.log
					CakeLog::write($id, __('Utilisateur : ') . $this->Auth->user('username') . __(' dit : '). $msg);
				}
			}
		}

		public function ajaxProcessing($id = null) {
			// affichage du tchat avec ajax
			if ($this->request->is('ajax')) {

				if ($id == null) $id = 1;

				$msg = $this->Chat->find('all', array(
					'conditions'=>array('Chat.rooms_id'=> $id)
					)
				);

				$this->set('msg', $msg);
				$this->set('current_user', $this->Auth->user('id'));
			}
		}

		public function envoyer_mail($id) {
			// si l'utilisateur veut poser une question à un modérateur
			$this->autoRender = false;

			if ($this->request->is('ajax')) {

				// pour récupérer le fichier log correspondant, on doit savoir la room
				$room = $this->Chat->Rooms->findById($id);

				// on va chercher le fichier
				$directory = 'C:/Users/link-/Documents/web/Projet_web/sitecollaboratif/app/tmp/logs/'.$id.'.log';

				// et on envoie le mail avec un texte différent si on est premium ou pas
				if ($this->Auth->user('groups_id') == 3) {
					App::uses('CakeEmail', 'Network/Email');
					$email = new CakeEmail('gmail');
					$email->to(Configure::read('Site_Contact.mail')) // à qui ?
						  ->from(Configure::read('Site_Contact.mail')) // par qui ?
						  ->subject('[URGENT] Un utilisateur du site "Site collaboratif" a posé une question sur le tchat') // sujet du mail
						  ->emailFormat('html') // le format à utiliser
						  ->attachments($directory)
						  ->send(); // envoi du mail
					die();
				} else {
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

	}
