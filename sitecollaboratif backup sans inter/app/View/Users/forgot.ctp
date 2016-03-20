<?php $this->layout = 'default2'; ?>
<div class="row">
	<div class="span12">
		<h1>Mot de passe oublié</h1>
		<?php 
			echo $this->Form->create('User');
			echo $this->Form->input('mail', array('class'=>'form-control'));
			echo "<br/>";
			echo $this->Form->button('Renvoyer un mot de passe', array('class'=>"btn btn-lg btn-primary"));
			echo $this->Form->end();
		 ?>
	</div>
</div>