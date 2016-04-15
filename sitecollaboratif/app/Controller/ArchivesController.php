<?php
	class ArchivesController extends AppController {
		var $name = 'Archives';
		// utilisation de certains model
		var $uses = array('Archive', 'Chat');

		// page index
		public function index() {
			// définition du layout
			$this->layout = 'default2';
			// récupération l'intégralité de la table archives
			$data = $this->Archive->find('all', array(
				'order'=>array('created'=>'desc')
			));
			// envoie à la vue
			$this->set('archive', $data);
		}

		function resultSearch($search = null) {
			// recherche effectuée avec ajax
			if ($this->request->is('ajax')) {
				$this->layout = 'ajax';

				// on récupère le champs
				$data = $this->request->params['pass'][0];
				// on le recherche
				$query = $this->Archive->find('all', array('conditions'=>array('Archive.query LIKE'=>'%'.$data.'%')));

				// pour chaque résultat on va créer un lien (ancre avec l'id)
				$i = 0;
				foreach ($query as $q) {
					echo '<a href="/Projet_web/sitecollaboratif/archives#'.$query[$i]['Archive']['id'].'">' . $query[$i]['Archive']['query'] . '</a><br/>';
					$i++;
				}
				die();
			} else {
				// sinon (press enter)
				$this->redirect($this->referer());
			}
	    }

		// pour les question du tchat : AJAX
		public function question($id_query, $current_user) {
			// on désactive le rendu (on n'affiche donc pas de page)
			$this->autoRender = false;

			if ($this->request->is('ajax')) {
				// si l'utilisateur s'est amusé avec les liens on ne fait rien
				if ($id_query == null || $current_user == null) {
					echo __("Erreur de paramètres");
					die();
				}

				// on va chercher le message qui va nous servir dans le tchat
				$query = $this->Chat->find('first', array(
					'fields'=>array('Chat.contenu'),
					'conditions'=>array('Chat.id'=>$id_query)
				));

				// on le place dans le tableau avec l'id de l'utilisateur
				$data['Archives']['query'] = $query['Chat']['contenu'];
				$data['Archives']['users_id'] = $current_user;
				// on enregistre dans la DB
				$this->Archive->save($data['Archives']);

				echo __("Question enregistrée");
				die();
			}
		}
		// idem que function question
		public function reponse($id_answer, $current_user) {
			$this->autoRender = false;

			if ($this->request->is('ajax')) {
				if ($id_answer == null || $current_user == null) {
					echo "error";
					die();
				}

				$row = $this->Archive->find('first', array(
					'conditions' => array('users_id'=>$current_user)
					)
				);

				$query = $this->Chat->find('first', array(
					'fields'=>array('Chat.contenu'),
					'conditions'=>array('Chat.id'=>$id_answer)
				));

				$this->Archive->id = $row['Archive']['id'];
				$this->Archive->saveField('answer', $query['Chat']['contenu']);

				echo __("Réponse enregistrée !");
				die();
			}
		}
	}
