<?php
	class Post extends AppModel {
		var $name = 'Posts';
		var $hasMany = 'Comment';
		var $belongsTo = 'Categories'; // plusieurs posts vers une cat

		// pour les différentes langues on va dire ce que l'on veut traduire
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
