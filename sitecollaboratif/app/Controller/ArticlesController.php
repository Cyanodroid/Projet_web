<?php
	class ArticlesController extends AppController {

		var $categories = array('Post'=> array('fields'=>array('categories_id')));

		public function index() {
			$query = $this->categories('Post');
			$this->set('categories', $query);
		}
	}
?>