<?php
	class Article extends AppModel {
		public $useTable = 'posts';
		var $name = 'Articles';
		var $belongsTo = 'Categories'; // plusieurs articles vers une cat

		// public $actsAs = array(
		// 	'Translate' => array(
		// 		'title'=>'titleTranslate',
		// 		'contenu'=>'contenuTranslate'
		// 	)
		// );
	}
