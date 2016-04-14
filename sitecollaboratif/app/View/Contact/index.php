<?php
	$this->layout = 'default2';
	echo $this->Session->flash();

	//titre
	echo("<section class=\"contact\">");
		echo("<h1 style=\"margin-top : 10%;\">");
		echo __("Nous contacter");
		echo("</h1>");

	//formulaire de contact
		echo $this->Form->create('Contact');
		echo $this->Form->input('name', array('label'=>__("Votre nom"), 'required', 'class'=>'left'));
		echo $this->Form->input('email', array('label'=>__("Votre email"), 'type'=>'email', 'required', 'class'=>'right'));
		echo $this->Form->input('prot', array('label'=>false, 'type'=>'text', 'class'=>'required', 'type'=>'hidden'));
		echo $this->Form->input('message', array('label'=>__("Votre message"), 'type'=>"textaera", 'rows'=>6, 'required'));
		echo $this->Form->button(__('Envoyer'), array('class'=>'btn-contact'));
		echo("<div class=\"col-lg-12 google\">");
			echo("<div class=\"g-recaptcha\" data-sitekey=\"6Lf4FBsTAAAAAKiHLaippD0gapGYWbWO3viCQsTj\"></div>");
		echo("</div>");
		echo $this->Form->end();
	echo("</section>");
?>

