<?php
	App::uses('AppController','Controller');

	class UsersController extends AppController {

		var $name = 'Users';

		// beforeFilter existe déjà, consultez la doc
		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow('index', 'signup', 'login', 'activate', 'forgot', 'password');
		}

		// demande d'inscription
		public function signup() {
			// choix du layout
			$this->layout = 'default2';
			// si on a effectivement demandé une inscription
			if (!empty($this->request->data)) {
				// on va créer une demande préalable avant de save
           		$this->User->create($this->request->data);
           		// on valide les champs
           		if ($this->User->validates()) {
           			// inscription temporaire, ne pourra pas se connecter tant que "active" != 1
           			// création du lien d'inscription pour le mail
           			$token = md5(time() . '-' . uniqid());
           			// récupération des champs de l'utilisateur
           			$this->User->create(array(
           				'username'=>$this->request->data['User']['username'],
           				'password'=>$this->Auth->password($this->request->data['User']['password']),
           				'mail'	  =>$this->request->data['User']['mail'],
           				'token'   =>$token,
           				));
           			// on enregistre dans la DB

           			$this->User->save();
           			// amélioration possible : supprimer les comptes avec 'active'=>0 au bout de x temps

           			// création du mail pour activation
           			App::uses('CakeEmail', 'Network/Email');
           			$Email = new CakeEmail('gmail');
           			$Email->to($this->request->data['User']['mail']) // à qui ?
           				  ->from(Configure::read('Site_Contact.mail')) // de qui ?
           				  ->subject('Merci de confirmer votre inscription') // sujet du mail
           				  ->viewVars($this->request->data['User'] + array('token'=>$token, 'id'=>$this->User->id)) // arguments que l'on va passer au template
           				  ->emailFormat('html') // format du mail
           				  ->template('signup') // template à utiliser
           				  ->send(); // envoi du mail

           			// on laisse un petit message à l'utilisateur
           			$this->Session->setFlash(__("Un mail de confirmation vous a été envoyé"), 'success');
				} else {
					// sinon il doit corriger des champs
					$this->Session->setFlash(__("Des erreurs sont à corriger"), "error");
				}
			}
		}

		// validation du mail d'inscription pour l'inscription concrète
		public function activate($user_id, $token) {
			// choix du layout
			$this->layout = 'default2';
			// recherche de l'utilisateur id avec le token $token
			$user = $this->User->find('first', array(
				'fields'=>array('id'),
				'conditions'=>array('id'=>$user_id, 'token'=>$token)
				));
			// si un tel utilisateur n'existe pas alors le lien doit être mauvais
			if (empty($user)) {
				$this->Session->setFlash(__("Ce lien de validation est invalide"), 'error');
				return $this->redirect(array('controller'=>'posts', 'action'=>'index'));
			}
			// on affiche un message de validation
			$this->Session->setFlash(__("Votre compte a été validé"), "success");
			$this->User->save(array(
				'id'=>$user['User']['id'], // on récupère l'id de l'utilisateur
				'active' => 1, // on valide concrètement son compte
				'token'=> '' // on vide le token de validation
			));
			// on redirige vers la page de connexion
			return $this->redirect(array('action'=>'login'));
		}

		// connexion de l'utilisateur au site
		public function login() {
			// choix du layout
			$this->layout = 'default2';
			// lorsqu'on a effectivement demandé une connexion
			if (!empty($this->request->data)) {
				// si on arrive à le connecter (voir la doc cakephp 2.x Authentification)
				if ($this->Auth->login()) {
					$this->Session->setFlash(__("Vous êtes maintenant connecté"), "success");
					$this->redirect(array('controller'=>'posts', 'action'=>'index'));
				} else {
					$this->Session->setFlash(__("Vos identifiants sont incorrects"), "error");
				}
			}
		}

		// demande de déco de l'utilisateur
		public function logout() {
			$this->layout = 'default2';
			// on déco voilà quoi ...
			$this->Auth->logout();
			// on pense à rediriger l'utilisateur
			return $this->redirect('/');
		}

		// demande de l'utilisateur à changer son mdp
		public function forgot() {
			// choix du layout
			$this->layout = 'default2';
			// lorsqu'on a oublié le mot de passe
			if (!empty($this->request->data)) {
				// on va récupérer l'utilisateur grâce à l'adresse mail donnée dans l'input
				$user = $this->User->findByMail($this->request->data['User']['mail'], array('id'));

				// si on ne trouve pas, l'adresse est mauvaise
				if (empty($user)) {
					$this->Session->setFlash(__("Cette adresse email n'est pas enregistrée"), "error");
				} else {
					// sinon on va créer un token qui sera unique
					$token = md5(uniqid().time());
					// on précise l'utilisateur (si on ne précise pas, ça va créer un nouvel utilisateur avec les champs à null)
					$this->User->id = $user['User']['id'];
					// on met à jour dans la DB
					$this->User->saveField('token', $token);
					// utilisateur du mail
					App::uses('CakeEmail', 'Network/Email');
					// création d'une instance
           			$Email = new CakeEmail('gmail');
           			// création de l'email
           			$Email->to($this->request->data['User']['mail']) // à qui
           				  ->from(Configure::read('Site_Contact.mail')) // de qui
           				  ->subject('Votre demande de mot de passe') // sujet du mail
           				  ->viewVars(array('token'=>$token, 'id'=>$user['User']['id'])) // les arguments que l'on va passer à notre template
           				  ->emailFormat('html') // le format du mail
           				  ->template('password') // le template à utiliser
           				  ->send(); // l'envoie du mail

           			// on laisse un petit message à l'utilisateur
           			$this->Session->setFlash(__("Un mail vous a été envoyé"), 'success');
				}
			}
		}

		// si l'utilisateur a oublié son mdp
		public function password($user_id, $token) {
			// choix du layout
			$this->layout = 'default2';
			// récupération dans la table users l'utilisateur id ayant le token $token
			$user = $this->User->find('first', array(
				'fields'=>array('id', 'groups_id'),
				'conditions'=>array('id'=>$user_id, 'token'=>$token)
				));

			// si on ne trouve pas, cela veut dire que l'utilisateur a pris un mauvais lien ou essaye de nous pirater des comptes
			if (empty($user)) {
				$this->Session->setFlash(__("Ce lien de validation est invalide"), 'error');
				return $this->redirect(array('action'=>'forgot'));
			}

			// sinon, on va mettre à jour notre utilisateur
			if (!empty($this->request->data)) {
				$this->User->create($this->request->data);

				// validation des champs
				if ($this->User->validates()) {
					// modification de la DB
					$this->User->create();
					$this->User->save(array(
						'id'=>$user['User']['id'],
						'token'=>'', // on vide le token pour ne pas permettre à quelqu'un de modifier le mdp
						'active'=>1,
						'password'=>$this->Auth->password($this->request->data['User']['password']),
						'groups_id'=>$user['User']['groups_id']
					));
					// on laisse un petit message
					$this->Session->setFlash(__("Votre mot de passe a bien été modifié"), 'success');
					// on redirige notre utilisateur
					return $this->redirect(array('action'=>'login'));
				}
			}
		}

		// gestion des informations du compte par l'utilisateur
		public function account() {
			// choix du layout
			$this->layout = 'default2';
			// si l'utilisateur appuie sur "modifier"

			if (!empty($this->request->data)) {
				// récupération de l'utilisateur courant
				$this->request->data['User']['id'] = $this->Auth->user('id');

				// validation des champs
				if ($this->User->validates()) {

					$this->User->id = $this->Auth->user('id');
					// vérification de la présence d'un avatar
					if (!empty($this->request->data['User']['avatarf']['tmp_name'])) {
						// création du chemin (ou récupération)
						// supposons qu'il y ait beaucoup d'utilisateur, on va mettre les images dans des
						// dossiers séparés 1 pour utilisateur 1 à 1000 etc etc
						$directory = IMAGES . 'avatars' . DS . ceil($this->User->id / 1000);
						if (!file_exists($directory)) {
							// si le dossier n'existe pas on le créer
							mkdir($directory, 0777);
						}

						// enfin on récupère l'image pour la mettre dans notre dossier
						move_uploaded_file($this->request->data['User']['avatarf']['tmp_name'], $directory . DS . $this->User->id . '.jpg');
						// on modifie la colonne "avatar" de la tables users pour mettre la valeur 1
						$this->User->saveField('avatar', 1);
					}

					if (!empty($this->request->data['User']['password'])) {
						$this->User->saveField(
							'password', $this->Auth->password($this->request->data['User']['password'])
						);
					}

					if (!empty($this->request->data['User']['mail'])) {
						$this->User->saveField(
	           				'mail', $this->request->data['User']['mail']
           				);
					}

					// on recharge les informations
					$user = $this->User->read();

					$this->Session->write('Auth.User.avatari', $directory . DS . $this->User->id . '.jpg');
					$this->Auth->login($user['User']);

					// on laisse un message de validation
					$this->Session->setFlash(__("Vos informations ont bien été modifiées"), 'success');

					$user = $this->User->findById($this->Auth->user('id'));
					$this->set('user', $user);
				}
			} else {
				// sinon on se contente d'afficher les informations de l'utilisateur
				$user = $this->User->findById($this->Auth->user('id'));
				$this->set('user', $user);
				$this->User->id = $this->Auth->user('id');
				$this->request->data = $this->User->read();
			}
		}

		// abonnement premium non fonctionnel
		public function subscribe() {
			if (!$this->Auth->user('id')) {
				throw new NotFoundException();
			}
		}

		public function candidate() {
			$this->layout = 'default2';
			if (!empty($this->request->data)) {

				$u = $this->User->find('first', array(
					'fields'=>array('username', 'mail'),
					'conditions'=>array(
						'id'=>$this->Auth->user('id')
					)
				));

				$this->request->data['User']['mail']     = $u['User']['mail'];
				$this->request->data['User']['username'] = $u['User']['username'];

				if (!empty($this->request->data['User']['CV']['name'])) {

					$directory = APP . '/Files/cvs' . DS . ceil($this->User->id / 1000);
					if (!file_exists($directory)) {
						// si le dossier n'existe pas on le créer
						mkdir($directory, 0777);
					}

					$pathname = $directory . DS . $this->request->data['User']['CV']['name'];

					if (!file_exists($pathname)) {
						move_uploaded_file($this->request->data['User']['CV']['tmp_name'], $pathname);
					}

					App::uses('CakeEmail', 'Network/Email');
					$email = new CakeEmail('gmail');
					$email->to(Configure::read('Site_Contact.mail')) // à qui ?
						  ->from($this->request->data['User']['mail']) // par qui ?
						  ->subject('Un utilisateur du site "Site collaboratif" a envoyé sa candidature') // sujet du mail
						  ->emailFormat('html') // le format à utiliser
						  ->template('candidature') // le template à utiliser
						  ->viewVars($this->request->data['User']) // les arg qu'on passe à notre template
						  ->attachments($pathname)
						  ->send(); // envoi du mail

					$this->Session->setFlash(__("Votre candidature a bien été envoyée"), 'success');
					$this->redirect($this->referer());

				} else {
					App::uses('CakeEmail', 'Network/Email');
					$email = new CakeEmail('gmail');
					$email->to(Configure::read('Site_Contact.mail')) // à qui ?
						  ->from($this->request->data['User']['mail']) // par qui ?
						  ->subject('Un utilisateur du site "Site collaboratif" a envoyé sa candidature') // sujet du mail
						  ->emailFormat('html') // le format à utiliser
						  ->template('candidature') // le template à utiliser
						  ->viewVars($this->request->data['User']) // les arg qu'on passe à notre template
						  ->send(); // envoi du mail

					$this->Session->setFlash(__("Votre candidature a bien été envoyée"), 'success');
					$this->redirect($this->referer());
				}
			}
		}

		public function paypal_success() {

			if (!$this->Auth->user('id'))
				throw new NotFoundException(__("Cette page n'existe pas"));


			$user = $this->User->find('first', array(
				'conditions'=>array('id'=>$this->Auth->user('id')),
				'fields'=>array('id', 'username', 'groups_id')
				)
			);

			$group = 3;

			$this->User->id = $this->Auth->user('id');
			$this->User->saveField('groups_id', $group);

			App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail('gmail');
			$email->to(Configure::read('Site_Contact.mail')) // à qui ? $this->Auth->user('mail')
				  ->from(Configure::read('Site_Contact.mail')) // par qui ?
				  ->subject('Merci de confirmer votre abonnement') // sujet du mail
				  ->emailFormat('html') // le format à utiliser
				  ->template('paypal_success') // le template à utiliser
				  ->send(); // envoi du mail

			$admin_email = new CakeEmail('gmail');
			$admin_email->to(Configure::read('Site_Contact.mail')) // à qui ? $this->Auth->user('mail')
				  ->from(Configure::read('Site_Contact.mail')) // par qui ?
				  ->subject("[URGENT] Un utilisateur vient de s'abonner") // sujet du mail
				  ->emailFormat('html') // le format à utiliser
				  ->template('admin_paypal_success') // le template à utiliser
				  ->viewVars(array('username'=>$user['User']['username'], 'id'=>$user['User']['id'])) // les arg qu'on passe à notre template
				  ->send(); // envoi du mail

			$this->Session->setFlash(__("Votre abonnement a été pris en compte"), 'success');
			$this->redirect(array('controller'=>'posts', 'action'=>'index'));
		}

		public function paypal_cancel() {
			App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail('gmail');
			$email->to(Configure::read('Site_Contact.mail')) // à qui ? $this->Auth->user('mail')
				  ->from(Configure::read('Site_Contact.mail')) // par qui ?
				  ->subject('Votre demande a été annulée') // sujet du mail
				  ->emailFormat('html') // le format à utiliser
				  ->template('paypal_cancel') // le template à utiliser
				  ->send(); // envoi du mail

			$this->Session->setFlash(__("Votre demande a été annulée"), 'success');
			$this->redirect(array('controller'=>'posts', 'action'=>'index'));
		}

		public function admin_index() {
			$this->layout = "default2";
			$users = $this->User->find('all', array(
				'fields'=>array('id', 'username', 'mail', 'groups_id')
				)
			);
	  		$this->set(compact('users'));
		}

		public function admin_edit($id) {
			$this->layout = "default2";

			$user = $this->User->findById($id);
			$this->set('user', $user);

			if (!empty($this->request->data)) {
				$this->User->id = $id;
				$this->User->saveField('groups_id', $this->request->data['User']['groups_id']);
				$this->User->saveField('end_subscription', $this->request->data['User']['end_subscription']);
				$this->Session->setFlash(__("Opération effectuée"), 'success');

				$this->redirect(array('action'=>'admin_index'));
			}
		}

	}
