<?php $this->layout = 'default2';
echo("<div class=\"row\">");
	echo("<div class=\"span12\">");
		echo("<h1 style=\"margin-top: 10%;\">");
		echo __("Mot de passe oublié");
		echo("</h1>");
		echo $this->Form->create('User');
		echo $this->Form->input('mail', array('class'=>'form-control'));
		echo ("<br/>");
		echo $this->Form->button(__('Renvoyer un mot de passe'), array('class'=>"btn btn-lg btn-primary"));
		echo $this->Form->end();
	echo("</div>");
echo("</div>");
?>
