<?php 
	 class NewslettersController extends AppController {
	 	var $name = 'Newsletters';

	    function newsletter() {
	    	// choix du layout
	    	$this->layout = 'default2';
	    	// un demande a été effectuée
	    	if (!empty($this->request->data)) {
	    		// validation des champs
	    		if ($this->Newsletter->validates()) {
	    			// si jamais on est connecté au site alors on va modifier le champs 'newsletter_id' de la table 'users'
	    			if ($this->Auth->user('id')) {
	    				// récupération de l'email donné
	    				$data = $this->request->data['Newsletter']['email'];
	    				// création d'une demande de changement sur newsletter
	    				$this->Newsletter->create(array('email'=>$this->request->data['Newsletter']['email']));

	    				// on enregistre dans la table newsletter AVANT d'enregistrer dans users sinon : erreur de contraite sql
						if ($this->Newsletter->save($this->request->data)) {
							// on précise l'utilisateur courant (sinon création d'un nouvel utilisateur avec champs à null)
							$this->Newsletter->Users->id = $this->Auth->user('id');
							// on enregistre un seul champs
							$this->Newsletter->Users->saveField('newsletter_id', $data);
							// on laisse un petit message à l'utilisateur
							$this->Session->setFlash("Votre inscription a été prise en compte !", 'success');
							// on pense à le rediriger
							$this->redirect(array('controller'=>'posts','action'=>'index'));
						} else {
							$this->Session->setFlash("Une erreur est survenue !", 'error');
						}
	    			} else {
	    				// sinon on fait la même chose mais sans se soucier de la table 'users'
	    				$this->Newsletter->create(array('email'=>$this->request->data['Newsletter']['email']));
		    			if ($this->Newsletter->save($this->request->data)) {
		    				$this->Session->setFlash("Votre inscription a été validée", "success");
		    				$this->redirect(array('controller'=>'posts','action'=>'index'));
		    			} else {
		    				$this->Session->setFlash("Erreur d'enregistrement", "error");
		    			}
	    			}
	    		}
			}
		}
		function sendNewsleter(){
			var $name='newsList';
			$this->Newsletter->find('all','fields'=>array('email'));
			 
			App::uses('CakeEmail', 'Network/Email');
			$email=new CakeEmail('gmail') 
			->from('site.collabotif@gmail.com') // par qui ?
							  ->subject('Newsletter du ') // sujet du mail
							  ->emailFormat('html') // le format à utiliser
							  ->template('newsletter') // le template à utiliser
							  ->viewVars() // les arg qu'on passe à notre template
							  ->send(); // envoi du mail




		}
	 }
