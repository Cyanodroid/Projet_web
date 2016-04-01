<?php
	class ArchivesController extends AppController {
		var $name = 'Archives';

		public function index() {
			$this->layout = 'default2';
		}

		public function question($msg) {
			$this->autoRender = false;

			if (empty($this->request->params['pass'][0]))
				die();

			if ($this->request->is('ajax')) {
				$data['Archives']['query'] = $this->request->params['pass'][0];
				$this->Archive->save($data['Archives']);
				die();
			}
		}

		public function reponse($qst, $msg) {
			$this->autoRender = false;

			if ($this->request->is('ajax')) {

				$query = $this->Archive->find('first', array(
					'conditions' => array('query'=>$qst)
					)
				);

				if ($query == null) {
					echo "Aucune question ne correspond à votre demande";
					die();
				}

				$this->Archive->id = $query['Archive']['id'];
				$this->Archive->saveField('answer', $msg);

				echo "Réponse enregistrée !";
			}
		}
	}
