<?php

	//titre
	echo("<h1 style=\"margin-top: 20%;\">");
		echo __("Panneau de contrôle");
	echo("</h1>");

	//l'onglet apparait seulement si l'utilisateur est connecté
	echo("<ul class=\"nav nav-pills nav-stacked\" style=\"margin-top: 45px;\">");
		if ($this->request->action == 'account'){
			echo("<li class=\"active\">");
		}
		else{
			echo("<li>");
		}

	//affichage des différents choix pour modifier son compte utilisateur
		$this->Html->link('Mon compte', array('controller'=>'users', 'action'=>'account'));
		echo("</li>");
		if ($user['User']['groups_id'] == 1) {
			echo("<li>");
				echo $this->Html->link(__("Panneau de contrôle"), array('controller'=>'admin/posts'));
			echo("</li>");
			echo("<li>");
				echo $this->Html->link(__("Gestion des utilisateurs"), array('controller'=>'admin/users'));
			echo("</li>");
			echo("<li>");
				echo $this->Html->link(__("Envoyer la newsletter"), array('controller'=>'admin/newsletters'));
			echo("</li>");
			echo("<li class=\"disabled\">");
				echo $this->Html->link(__("S'abonner"), array('action'=>'account'));
			echo("</li>");
		} else if ($user['User']['groups_id'] == 4) {
			echo("<li>");
				echo $this->Html->link(__("Panneau de contrôle"), array('controller'=>'admin/posts'));
			echo("</li>");
			echo("<li>");
				echo $this->Html->link(__("S'abonner"), array('controller'=>'Users', 'action'=>'subscribe'));
			echo("</li>");
		} else {
			echo("<li>");
				echo $this->Html->link(__("S'abonner"), array('controller'=>'Users', 'action'=>'subscribe'));
			echo("</li>");
		}
	echo("</ul>");
?>
