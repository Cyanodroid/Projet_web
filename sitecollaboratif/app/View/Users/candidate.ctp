<div class="span12">
	<h1 style="margin-top: 10%;">Devenir bénévole</h1>
	<p>bla bla à la con sur les bienfaits</p>
	<?php 
		echo $this->Form->create('User');
		echo $this->Form->input('message', array('label'=>"Votre candidature", 'type'=>"textaera", 'rows'=>10, 'required', 'class'=>'form-control'));
		echo "<br/>";
		echo $this->Form->button('Postuler maintenant', array('class'=>"btn btn-lg btn-primary"));
		echo $this->Form->end();
	 ?>
</div>