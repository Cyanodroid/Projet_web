<?php
	echo $this->Session->Flash();
	echo("<div class=\"row\" style=\"margin-top:70px;\">");

	//titre
		echo("<h1>");
		echo __("Poster un article");
		echo("</h1>");

	//création d'un article (titre, catégorie, langue, image(s), contenu, date)
		echo("<div class=\"span12\">");
			echo $this->Form->create('Post', array('type'=>'file'));
			echo $this->Form->input('Post.id');
			echo("<br/>");
			foreach (Configure::read('Config.languages') as $lang) {
				echo $this->Form->input('Post.title.'.$lang, array('label' => __("Titre de l'article (%s)", $lang), 'class'=>'form-control'));
				echo("<br/>");
			}
			echo $this->Form->input('Post.categories_id', array('label' => __("Catégorie de l'article"), 'class'=>'form-control', 'options'=>$cats));
			echo("<br/>");
			echo $this->Form->input('imageart.', array('type'=>'file', 'multiple', 'label'=>__('Image (.jpg, .jpeg, .png) max: 3')));
			echo("<br/>");
			foreach (Configure::read('Config.languages') as $lang) {
				echo $this->Form->input('Post.contenu.'.$lang, array('label' => __("Contenu de l'article (%s)", $lang), 'type'=>'textarea', 'class'=>'form-control'));
				echo("<br/>");
			}
			echo $this->Form->input('Post.date_post', array('label' => __("Date "), 'dateFormat'=>'DMY'));
			echo("<br/>");
			echo $this->Form->button(__('Publier maintenant'), array('class'=>'btn btn-lg btn-primary'));
			echo $this->Form->end();
		echo("</div>");
	echo("</div>");
?>
