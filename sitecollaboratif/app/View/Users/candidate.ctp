<div class="span12">
	<h1 style="margin-top: 10%;">Devenir bénévole</h1>
	</br>
	<p>
		Vous vous sentez l'âme d'un rédacteur ? 
		</br>
		Vous voulez aider nos utilisateurs à travers le tchat ?
		</br>
		Ou tout simplement prendre part à la vie de notre site collaboratif ?
		</br>
		Alors prenez le temps de nous envoyer un message montrant votre motivation !
		</br>
		Vous pourrez rejoindre notre grande famille en tant que rédacteur ou en tant que modérateur &hearts; !
	</p>
	</br> 
	<?php 
		echo $this->Form->create('User');
		echo $this->Form->input('message', array('label'=>"Votre candidature", 'type'=>"textaera", 'rows'=>10, 'required', 'class'=>'form-control'));
		echo "<br/>";
		echo $this->Form->button('Postuler maintenant', array('class'=>"btn btn-lg btn-primary"));
		echo $this->Form->end();
	 ?>
</div>