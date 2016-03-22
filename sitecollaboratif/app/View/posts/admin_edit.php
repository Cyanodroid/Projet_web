<?php 
echo $this->Session->Flash();
echo("<div class=\"row\" style=\"margin-top:70px;\">");
	echo("<h1>");
	echo __("Poster un article");
	echo("</h1>");
	echo("<div class=\"span12\">");
		$this->Form->create('Post', array('type'=>'file'));
		echo $this->Form->input('Post.id');
		echo("<br/>");
		echo $this->Form->input('Post.title', array('label' => "Titre de l'article", 'class'=>'form-control'));
		echo("<br/>");
		echo $this->Form->input('Post.categories_id', array('label' => "Catégorie de l'article", 'class'=>'form-control', 'options'=>$cats));
		echo("<br/>");
		echo $this->Form->input('imageart', array('type'=>'file', 'label'=>'Image (.jpg, .jpeg, .png)'));
		echo("<br/>");
		echo $this->Form->input('Post.contenu', array('label' => "Contenu de l'article", 'class'=>'form-control'));
		echo("<br/>");
		echo $this->Form->input('Post.date_post', array('label' => "Date ", 'dateFormat'=>'DMY'));
		echo("<br/>");
		echo $this->Form->button('Publier maintenant', array('class'=>"btn btn-lg btn-primary"));
		$this->Form->end();
	echo("</div>");
echo("</div>");
?>