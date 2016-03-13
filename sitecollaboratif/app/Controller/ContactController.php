²<?php
	class ContactController extends AppController {

		public $components = array('Session', 'Security');

		public function index() {
			// choix du layout
			$this->layout = 'default2';
			// l'utilisateur a bien utilisé le type "post" ?
			if ($this->request->is('post')) {

				//petite protection contre le spam (amélioration possible : utiliser le captcha -> il faut avoir un serveur par contre)
				// les bots ne lisant que du code HTML vont remplir tous les inputs possible (dans le cas où le bot est vraiment basique)
				if (!empty($this->request->data['Contact']['prot'])) {
					// donc si on remplit ce champs ça veut dire qu'on veut nous spam
					// on laisse quand même un message de success dans le cas où un utilisateur humain regarde l'écran
					$this->Session->setFlash('Votre message a été envoyé avec succès.', 'success');
					// on redirige normalement comme si tout s'était bien passé
			   		$this->redirect(array('action' => 'index'));
				} else {
					// sinon on va créer le mail
		        	$this->Contact->set($this->request->data);

		        	// on valide les champs demander (la validation php est obligeatoire car la validation html peut être désactivée par un tit con)
			        if ($this->Contact->validates()) {
			        	// création du mail
			        	App::uses('CakeEmail', 'Network/Email');
						$email = new CakeEmail('gmail');
						$email->to(Configure::read('Site_Contact.mail')) // à qui ? 
							  ->from($this->request->data['Contact']['email']) // par qui ?
							  ->subject('Un utilisateur du site "Site collaboratif" vous a contacté') // sujet du mail
							  ->emailFormat('html') // le format à utiliser
							  ->template('contact') // le template à utiliser
							  ->viewVars($this->request->data['Contact']) // les arg qu'on passe à notre template
							  ->send(); // envoi du mail

						// on laisse un petit message de validation
						$this->Session->setFlash('Votre message a été envoyé avec succès.', 'success');
						// on pense à rediriger l'utilisateur
			   			$this->redirect(array('action' => 'index'));
		   			} else {
		   				// sinon il y a un problème au niveau des champs
						$this->Session->setFlash('Veuillez corriger les erreurs ci-dessous.', 'error');
					}
				}
	        }
		}
	}
