<?php
	class ArticlesController extends AppController {

		var $name = "Articles";

		public function index() {
	  		$this->layout = "default2";

	  		$cat = $this->Article->Categories->find('all', array(
		  			'fields'=>array('id', 'title')
		  	));

			$this->set('categories', $cat);
		}

		public function parcourir($id) {
			$this->layout = "default2";

			$articles = $this->Article->find('all', array(
				'conditions'=>array('categories_id'=>$id),
				'order'=> array(
					'date_post'=> 'desc'
					)
				)
			);

			$cat = $this->Article->Categories->find('first', array(
		  			'conditions'=>array('id'=>$id)
		  	));

			$this->set('articles', $articles);
			$this->set('categories', $cat);
		}
	}
