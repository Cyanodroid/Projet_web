<?php
	class ArticlesController extends AppController {

		var $name = "Articles";

		public function index() {
	  		$this->layout = "default2";

	  		$cat = $this->Article->Categories->find('all', array(
		  			'fields'=>array('id', 'title')
		  	));
		  	debug($cat);

			$this->set('categories', $cat);
		}
	}
