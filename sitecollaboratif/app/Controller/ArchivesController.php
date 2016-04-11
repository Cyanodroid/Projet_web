<?php
	class ArchivesController extends AppController {
		var $name = 'Archives';
		var $uses = array('Archive', 'Chat');

		public function index() {
			$this->layout = 'default2';
			$data = $this->Archive->find('all', array(
				'order'=>array('created'=>'desc')
			));
			$this->set('archive', $data);
		}

		function resultSearch($search = null) {

			if ($this->request->is('ajax')) {
				$this->layout = 'ajax';

				$data = $this->request->params['pass'][0];
				$query = $this->Archive->find('all', array('conditions'=>array('Archive.query LIKE'=>'%'.$data.'%')));

				$i = 0;
				foreach ($query as $q) {
					echo '<a href="/Projet_web/sitecollaboratif/archives#'.$query[$i]['Archive']['id'].'">' . $query[$i]['Archive']['query'] . '</a><br/>';
					$i++;
				}
				die();
			} else {
				$this->redirect($this->referer());
			}
	    }

		public function question($id_query, $current_user) {
			$this->autoRender = false;

			if ($this->request->is('ajax')) {
				if ($id_query == null || $current_user == null) {
					echo __("Erreur de paramètres");
					die();
				}

				$query = $this->Chat->find('first', array(
					'fields'=>array('Chat.contenu'),
					'conditions'=>array('Chat.id'=>$id_query)
				));

				$data['Archives']['query'] = $query['Chat']['contenu'];
				$data['Archives']['users_id'] = $current_user;
				$this->Archive->save($data['Archives']);

				echo __("Question enregistrée");
				die();
			}
		}

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
