<?php $this->layout = 'default2';
	echo("<div class=\"row\">");
		echo("<div class=\"span12\">");

	//titre
			echo("<h1 style=\"margin-top: 10%;\">");
			echo __("Mot de passe oublié");
			echo("</h1>");

	//zone de texte où l'utilisateur doit rentrer son email pour pouvoir recevoir un lien vers un nouveau mot de passe
			echo $this->Form->create('User');
			echo $this->Form->input('mail', array('class'=>'form-control'));
			echo ("<br/>");
			echo $this->Form->button(__('Renvoyer un mot de passe'), array('class'=>"btn btn-lg btn-primary"));
			echo $this->Form->end();
		echo("</div>");
	echo("</div>");
?>
