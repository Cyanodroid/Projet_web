<?php echo $this->Session->Flash();
	echo("<div class=\"row\" style=\"margin-top:70px;\">");
		echo("</br>");

	//titre
		echo("<h1>");
		echo __("Gestion d'un utilisateur");
		echo("</h1>");

	//caractéristique de l'utilisateur (pseudo, groupe (utilisateur normal, premium, modérateur), date de fin d'abonnement si premium)
		echo("<div class=\"span12\">");
				echo $this->Form->create('User');
				echo $this->Form->input('User.id');
				echo("<br/>");
				echo $this->Form->input('User.username', array('label'=> __("Nom d'utilisateur"), 'disabled'=>true, 'class'=>'form-control', 'placeholder'=>$user['User']['username']));
				echo("<br/>");
				echo $this->Form->input('User.groups_id', array('label' => __("Groupe de l'utilisateur"), 'class'=>'form-control', 'options'=>array('', 'administrateur', 'utilisateur', 'utilisateur premium', 'bénévole')));
				echo("<br/>");
				echo $this->Form->input('User.end_subscription', array('label' => __("Fin d'abonnement : "), 'dateFormat'=>'DMY'));
				echo("<br/>");
				echo $this->Form->button(__('Enregistrer'), array('class'=>"btn btn-lg btn-primary"));
				echo $this->Form->end();
		echo("</div>");
	echo("</div>");
?>
