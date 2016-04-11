<?php
	class Post extends AppModel {
		var $name = 'Posts';
		var $hasMany = 'Comment';
		var $belongsTo = 'Categories'; // plusieurs posts vers une cat

		public $actsAs = array(
			'Translate' => array(
				'title'=>'titleTranslate',
				'contenu'=>'contenuTranslate'
			)
		);

		public $validate = array(
			'Post.title'=>array(
				'rule'=>'notBlank'
			),
			'Post.contenu'=>array(
				'rule'=>'notBlank'
			),
		);
	}
?>
