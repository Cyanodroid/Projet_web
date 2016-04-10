<?php
echo("<div class=\"span12\">");
	echo("<h1 style=\"margin-top: 10%;\">");
	echo __("Devenir bénévole");
	echo("</h1>");
	echo("</br>");
	echo("<p>");
		echo __("Vous vous sentez l'âme d'un rédacteur ?");
		echo("</br>");
		echo __("Vous voulez aider nos utilisateurs à travers le tchat ?");
		echo("</br>");
		echo __("Ou tout simplement prendre part à la vie de notre site collaboratif ?");
		echo("</br>");
		echo __("Alors prenez le temps de nous envoyer un message montrant votre motivation !");
		echo("</br>");
		echo __("Vous pourrez rejoindre notre grande famille en tant que rédacteur ou en tant que modérateur &hearts; !");
	echo("</p>");
	echo("</br> ");
	echo $this->Form->create('User', array('type'=>'file'));
	echo $this->Form->input('message', array('label'=>__("Votre candidature"), 'type'=>"textaera", 'rows'=>10, 'required', 'class'=>'form-control'));
	echo ("<br/>");
	echo $this->Form->input('CV', array('type'=>'file', 'label'=>__('Votre CV (.pdf)')));
	echo ("<br/>");
	echo $this->Form->button(__('Postuler maintenant'), array('class'=>"btn btn-lg btn-primary"));
	echo $this->Form->end();
echo ("</div>");
?>
