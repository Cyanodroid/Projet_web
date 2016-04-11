<?php
	App::build(array('Lib' => array(APP . 'Lib' . DS . 'reCAPTCHA' . DS)));
	App::uses('recaptcha', 'Lib');

	class NewslettersController extends AppController {
	 	var $name = 'Newsletters';

	    public function newsletter() {
	    	// choix du layout
	    	$this->layout = 'default2';

	    	// un demande a été effectuée
	    	if (!empty($this->request->data)) {
	    		// validation des champs
	    		if ($this->Newsletter->validates()) {

                    $captcha = new recaptcha('6Lf4FBsTAAAAAKX8au0BRq9nC4iW9-NK0BLHBPH4');

                    if($captcha->checkcode($this->request->data['g-recaptcha-response']) == false) {
                        echo $this->Session->setFlash(__("Erreur de captcha !"), 'error');
                        return false;
                    }

	    			// si jamais on est connecté au site alors on va modifier le champs 'newsletter_id' de la table 'users'
	    			if ($this->Auth->user('id')) {

	    				if ($this->Newsletter->save($this->request->data)) {

	    					$last_record = $this->Newsletter->find('first', array(
	    						'fields'=>array('id'),
	    						'order'=>array('id'=>'DESC')
	    						)
	    					);

	    					$this->Newsletter->User->id = $this->Auth->user('id');
	    					$this->Newsletter->User->saveField('newsletter_id', $last_record['Newsletter']['id']);

	    					$this->Session->setFlash(__("Votre inscription a été prise en compte !"), 'success');
	    					$this->redirect(array('controller'=>'posts','action'=>'index'));
	    				} else {
							$this->Session->setFlash(__("Une erreur est survenue !"), 'error');
						}
	    			} else {
	    				// sinon on fait la même chose mais sans se soucier de la table 'users'
		    			if ($this->Newsletter->save($this->request->data)) {
		    				$this->Session->setFlash(__("Votre inscription a été validée"), "success");
		    				$this->redirect(array('controller'=>'posts','action'=>'index'));
		    			} else {
		    				$this->Session->setFlash(__("Erreur d'enregistrement"), "error");
		    			}
	    			}
	    		}
			}
		}

		public function admin_index() {
			$this->layout = "default2";

			$emails_list = array();

			$users = $this->Newsletter->find('all');

			foreach ($users as $user) {
				$emails_list[] = $user['Newsletter']['email'];
			}

			App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail('gmail');
			$email->to($emails_list) // à qui ?
				  ->from(Configure::read('Site_Contact.mail')) // par qui ?
				  ->subject('Newsletter de la semaine') // sujet du mail
				  ->emailFormat('html') // le format à utiliser
				  ->template('newsletter') // le template à utiliser
				  ->send(); // envoi du mail

			echo $this->Session->setFlash(__("La newsletter a bien été envoyée"), 'success');
			$this->redirect($this->referer());
		}
	}
