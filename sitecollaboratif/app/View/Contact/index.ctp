<?php
	$this->layout = 'default2';
	echo $this->Session->flash();
	?>
	<section class="contact" >
		<h1 style="margin-top : 15%;">Nous contacter</h1>
		<?php 
		echo $this->Form->create('Contact');
		echo $this->Form->input('name', array('label'=>"Votre nom", 'required', 'class'=>'left'));
		echo $this->Form->input('email', array('label'=>"Votre email", 'type'=>'email', 'required', 'class'=>'right'));
		echo $this->Form->input('prot', array('label'=>false, 'type'=>'text', 'class'=>'required', 'type'=>'hidden'));
		echo $this->Form->input('message', array('label'=>"Votre message", 'type'=>"textaera", 'rows'=>6, 'required'));
		echo $this->Form->button('Envoyer', array('class'=>'btn-contact'));
		echo $this->Form->end();
		 ?>
	</section>
