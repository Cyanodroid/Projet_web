<?php
	class ArticlesController extends AppController {

		var $name = "Articles";

		public function index() {
	  		$this->layout = "default2";

	  		$cat = $this->Article->Categories->find('all', array(
		  			'fields'=>array('id', 'title')
		  	));

		  	$last = $this->Article->find('all', array(
		  		'order'=>array('date_post'=>'desc'),
		  		'limit'=>3
		  		)
		  	);

			$this->set('categories', $cat);
			$this->set('last', $last);
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
