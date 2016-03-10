<?php
	class NewslettersSenderController  extends AppController{
		function sendNewsleter() {
			$name='newsList';
			debug($name);
			$name=$this->Newsletters->find('all');
			debug('newList');
			App::uses('CakeEmail', 'Network/Email');
			$email=new CakeEmail('gmail');
			$email 	->from('site.collabotif@gmail.com') // par qui ?
					->to('newList')
					->subject('Newsletter du ') // sujet du mail
					->emailFormat('html') // le format à utiliser
					->template('newsletter') // le template à utiliser
					->viewVars($this->request->data['Post']['Title']) // les arg qu'on passe à notre template
					->send(); // envoi du mail

		}
	}