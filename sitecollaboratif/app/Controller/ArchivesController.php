<?php
	class ArchivesController extends AppController {
		var $name = 'Archives';

		public function index() {

		}


		public function question($msg) {
			$this->autoRender = false;

			if (empty($this->request->params['pass'][0]))
				return false;

			if ($this->request->is('ajax')) {
				$data['Archive']['query'] = $this->request->params['pass'][0];
				$this->Archive->save($data['Archive']);
			}
		}

		public function reponse($qst, $msg) {
			$this->autoRender = false;

			if ($this->request->is('ajax')) {
				// debug($this->request->params);
				// die();

				$query = $this->Archive->find('first', array(
					'conditions' => array('query'=>$qst)
					)
				);

				$this->Archive->id = $query['Archive']['id'];
				$this->Archive->saveField('answer', $msg);
			}
		}
	}
