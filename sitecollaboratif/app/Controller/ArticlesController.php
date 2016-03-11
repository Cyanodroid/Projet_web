<?php
	class ArticlesController extends AppController {

		var $articles = array(
			'Post'=> array(
				'fields'=>array('id', 'title', 'image', 'contenu', 'date_post', 'categories_id'),
			)
		);

		public function index() {
			//$query = $this->articles('Post');
			//$this->set('articles', $query);
		}
	}
?>