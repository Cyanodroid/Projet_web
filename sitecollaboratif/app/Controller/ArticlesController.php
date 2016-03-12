<?php
	class ArticlesController extends AppController {

		var $name = "Articles";

		public $components = array('Paginator');

		var $paginate = array(
			'Article'=> array( // sur les posts
				'fields'=>array('id', 'title', 'contenu', 'categories_id'), // où l'on récupère que ces trois champs
				'limit'=>6, // on fixe une limite par page
				'order'=> array( // on les organise du plus récent au plus vieux
					'date_post'=> 'desc'
				)
			)
		);

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

		    $this->Paginator->settings = array(
		        'conditions' => array('Article.categories_id'=>$id),
   			);

   			$articles = $this->Paginator->paginate('Article');

			$cat = $this->Article->Categories->find('first', array(
		  			'conditions'=>array('id'=>$id)
		  	));

			$this->set(compact('articles'));
			$this->set('categories', $cat);
		}
	}
