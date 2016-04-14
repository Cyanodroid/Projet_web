<?php
	$this->layout = 'default2';
	echo $this->Session->Flash();
	echo("<div class=\"row\">");

	//titre
		echo("<h1 style=\"margin-top: 10%\">");
		echo __("Mon compte");
		echo("</h1>");

	//informations sur l'utilisateur (avatar, pseudo, email, mot de passe)
		echo("<div class=\"col-lg-6\">");
			echo("<p>&nbsp;</p>");
			echo("<div class=\"row\">");
				echo("<div class=\"col-lg-2\">");

	//si l'utilisateur a un avatar, il est affiché
				if ($this->Session->read('Auth.User.avatar')){
	            	echo $this->Html->image($this->Session->read('Auth.User.avatari'), array('class'=>'preview-avatar'));
	            }
				echo("</div>");
				echo("<div class=\"col-lg-6\" style=\"margin-left:20%;\">");
					echo $this->Form->create('User', array('type'=>'file'));

	//on peut changer d'avatar
						echo $this->Form->input('avatarf', array('type'=>'file', 'label'=> __('Avatar (.jpg)'), 'required'=>false));
						echo "<br/>";
						echo $this->Form->input('username', array('label'=> __("Nom d'utilisateur"), 'disabled'=>true, 'class'=>'form-control',
							'value'=>$this->Session->read('Auth.User.username')));
						echo "<br/>";

	//on peut changer d'email
						echo $this->Form->input('mail', array('label' => __('Email'), 'class'=>'form-control', 'required'=>false)) ;
						echo "<br/>";
						echo $this->Form->button(__('Modifier mes informations'), array('class'=>"btn btn-lg btn-primary"));
					echo $this->Form->end();
				echo("</div>");
				echo("<div class=\"col-lg-6\" style=\"margin-left:37%; margin-top:5%;\">");
				echo $this->Form->create('User');

	//on peut changer son mot de passe
		            echo $this->Form->input('password', array('label' => __("Modifiez votre mot de passe"), 'class'=>'form-control'));
		            echo ("<br/>");
		            echo $this->Form->input('password2', array('type' => 'password', 'label' => __("Confirmer Mot de passe"), 'class'=>'form-control'));
		            echo ("<br/>");
		            echo $this->Form->button(__("Modifier mon mot de passe"), array('class'=>"btn btn-lg btn-primary"));
		        echo $this->Form->end();
				echo("</div>");
			echo("</div>");
		echo("</div>");

		echo("<div class=\"col-lg-6\" style=\"margin-top: -13%\">");
		echo $this->element('gestion_compte');
		echo("</div>");
	echo("</div>");
?>
