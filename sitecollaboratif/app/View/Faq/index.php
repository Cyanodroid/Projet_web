<?php
	$this->layout = 'default2';
	echo $this->Session->flash();
	echo("<div class=\"span12\" style=\"text-align:center;\">");

	//titre
		echo("<h1 style=\"margin-top : 10%;\">");
		echo __("FAQ");
		echo("</h1>");

	//section de présentation des développeurs du site
		echo("<div id=\"pricing\" class=\"container-fluid\">");
			echo("<div class=\"text-center\">");
			    echo("<h2>");
			    	echo __("Nos développeurs :");
			    echo("</h2>");
			echo("</br>");
			echo("</div>");
			echo("<div class=\"row slideanim\">");
			   	echo("<div class=\"col-sm-4B col-xs-12\">");
			      	echo("<div class=\"panel panel-default text-center\">");
			        	echo("<div class=\"panel-heading\">");
			          		echo("<h3>Arnault</h3>");
			        	echo("</div>");
			        	echo("<div class=\"panel-body\">");
			        		echo $this->Html->image('avatars/arno.jpg', array('class'=>'avatar'));
			        	echo("</div>");
			        	echo("<div class=\"panel-footer\">");
			        		echo("<p>");
			        		echo __("Notre grand et beau designer, souverain du CSS.");
			        		echo("</p>");
			        	echo("</div>");
			      	echo("</div>");
			    echo("</div>");
			    echo("<div class=\"col-sm-4B col-xs-12\">");
			      	echo("<div class=\"panel panel-default text-center\">");
			        	echo("<div class=\"panel-heading\">");
			          		echo("<h3>Claire</h3>");
			        	echo("</div>");
			        	echo("<div class=\"panel-body\">");
			        		echo $this->Html->image('avatars/clay.jpg', array('class'=>'avatar'));
			        	echo("</div>");
			        	echo("<div class=\"panel-footer\">");
			        		echo("<p>");
			        		echo __("Celle qui fait les bêtises sur Github mais pas que.");
			        		echo("</p>");
			        	echo("</div>");
			      	echo("</div>");
			    echo("</div>");
			    echo("<div class=\"col-sm-4B col-xs-12\">");
			      	echo("<div class=\"panel panel-default text-center\">");
			        	echo("<div class=\"panel-heading\">");
			          		echo("<h3>Nicolas</h3>");
			        	echo("</div>");
			        	echo("<div class=\"panel-body\">");
			        		echo $this->Html->image('avatars/nico.jpg', array('class'=>'avatar'));
			        	echo("</div>");
			        	echo("<div class=\"panel-footer\">");
			        		echo("<p>");
			        		echo __("Le troll qui voulait à tout prix utiliser CakePhp.");
			        		echo("</p>");
			        	echo("</div>");
			      	echo("</div>");
			    echo("</div>");
			    echo("<div class=\"col-sm-4B col-xs-12\">");
			      	echo("<div class=\"panel panel-default text-center\">");
			        	echo("<div class=\"panel-heading\">");
			          		echo("<h3>Thomas</h3>");
			          		//echo("<h3>Nicolas</h3>");
			        	echo("</div>");
			        	echo("<div class=\"panel-body\">");
			        		echo $this->Html->image('avatars/simi.jpg', array('class'=>'avatar'));
			        		//echo $this->Html->image('avatars/niko.jpg', array('class'=>'avatar'));
			        	echo("</div>");
			        	echo("<div class=\"panel-footer\">");
			        		echo("<p>");
			        		echo __("Galérien en dev web mais cuisinier hors-pair.");
			        		//echo __("Aime les bananes et faire des applications la nuit.");
			        		echo("</p>");
			        	echo("</div>");
			      	echo("</div>");
			    echo("</div>");
			echo("</div>");
		echo("</div>");

	//section questions/réponses
		echo("<div class=\"text-center\">");
		    echo("<h2>");
		    echo __("Questions fréquentes :");
		    echo("</h2>");
			echo("</br>");
		echo("</div>");
	echo("</div>");
	echo("<div text-align=\"left\">");
		echo("<ul>");
			echo("<li><h4>");
			echo __("Quel est l'objectif de ce site ?");
			echo("</h4></li>");
			echo("<p>");
			echo __("Ce site est un site collaboratif permettant à tout utilisateur d'apprendre ou de perfectionner plusieurs langages
				informatiques grâce aux différents articles postés. L'utilisateur peut également trouver des réponses à ses questions.");
			echo("</p>");
			echo("<li><h4>");
			echo __("J'ai une question.");
			echo("</h4></li>");
			echo("<p>");
			echo __("Lorsque vous avez une question, deux choix s'offrent à vous : vous pouvez soit aller sur le tchat
				(vous devez pour cela vous inscrire sur le site), soit aller dans la section archives. Dans le premier cas,
				vous pouvez choisir la salle qui correspond à la catégorie de votre question et la poser aux autres utilisateurs et
				au modérateur responsable. Sinon, vous pouvez chercher dans les archives si
				votre question a déjà été posée et ainsi, trouver la réponse. Lorsque vous avez obtenu la réponse à votre question,
				vous pouvez choisir de l'enregistrer et ainsi l'ajouter dans les archives pour les
				utilisateurs suivants.");
			echo("</p>");
			echo("<p>");
				echo __("Afin de faire profiter le plus de monde possible, vous pouvez enregistrer votre question (en cliquant sur le bouton correspondant (<i class=\"fa fa-question\"></i>))
				et votre réponse (en cliquant sur le bouton correspondant (<i class=\"fa fa-check\"></i>)) afin qu'elle apparaisse dans les archives.");
			echo("</p>");
			echo("<li><h4>");
			echo __("Personne n'est connecté sur le tchat.");
			echo("</h4></li>");
			echo("<p>");
			echo __("Si personne n'est connecté sur le tchat alors votre message va être envoyé par mail au modérateur responsable de la salle de
				tchat où vous vous trouvez en cliquant sur le bouton correspondant. Il répondra à votre question dès qu'il le pourra.");
			echo("</p>");
			echo("<li><h4>");
			echo __("Je veux être tenu au courant des nouveautés.");
			echo("</h4></li>");
			echo("<p>");
			echo __("Pour être au courant de toutes nos nouveautés (derniers articles sortis), vous pouvez souscrire à notre newsletter avec votre mail.");
			echo("</p>");
			echo("<li><h4>");
			echo __("Quels sont les avantages d'un abonnement ?");
			echo("</h4></li>");
			echo("<p>");
			echo __("Lorsque vous choisissez de vous abonner et de devenir un utilisateur premium, vous devenez prioritaire lors de vos
				discussions sur le tchat. Vos questions seront traitées en priorité par les modérateurs. De plus, vous aurez aussi la possibilité de
				télécharger les différents cours/articles sous forme de PDF.");
			echo("</p>");
			echo("<li><h4>");
			echo __("Je veux participer à la vie du site.");
			echo("</h4></li>");
			echo("<p>");
			echo __("Vous pouvez devenir rédacteur d'articles ou modérateur, n'hésitez pas à postuler en ajoutant votre CV en pièce jointe.");
			echo("</p>");
		echo("</ul>");
	echo("</div>");
?>
