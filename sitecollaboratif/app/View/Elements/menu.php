<?php

	//affichage du menu
	echo("<div class=\"navbar-wrapper\">");
		echo ("<div class=\"container\">");
			echo("<nav class=\"navbar navbar-inverse navbar-static-top\">");
			  	echo("<div class=\"container\">");

	//titre du site
					echo("<div class=\"navbar-header\">");
					  	echo("<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">");
							echo("<span class=\"sr-only\">Toggle navigationc</span>");
							echo("<span class=\"icon-bar\"></span>");
							echo("<span class=\"icon-bar\"></span>");
							echo("<span class=\"icon-bar\"></span>");
					  	echo("</button>");
					  	echo("<li style=\"list-style-type:none;\">");
							//  	echo("<a href=\"/#\" class=\"navbar-brand\">");
						  	echo("<a href=\"/Projet_web/sitecollaboratif/\" class=\"navbar-brand\">");
						  		echo __("SGF");
						  	echo("</a>");
					  	echo("</li>");
					echo("</div>");

	//différents onglets du menu
					echo("<div id=\"navbar\" class=\"navbar-collapse collapse\">");
					  	echo("<ul class=\"nav navbar-nav navbar-right\">");
					  		echo("<li>");
								// 		echo("<a href=\"/\">");
					  			echo("<a href=\"/Projet_web/sitecollaboratif/\">");
									echo $this->Html->image('home.png', array('alt'=>'Accueil', 'width'=>'20px', 'height'=>'20px'));
									// 		echo("<img src=\"/img/home.png\" alt=\"Accueil\" width=\"20px\" height=\"20px\">");
									// 		echo("</img>");
					  			echo("</a>");
							echo("</li>");
							echo("<li>");
								// echo("<a href=\"/articles\">");
								echo("<a href=\"/Projet_web/sitecollaboratif/posts/articles\">");
									echo __("Articles");
								echo("</a>");
							echo("</li>");
							if ($this->Session->read('Auth.User.id')){
							echo("<li>");
								// echo("<a href=\"/chats/index\" admin=\"false\">");
								echo("<a href=\"/Projet_web/sitecollaboratif/chats/index\" admin=\"false\">");
									echo __("Tchat");
								echo("</a>");
							echo("</li>");
							}
							echo("<li>");
								// echo("<a href=\"/archives\">");
								echo("<a href=\"/Projet_web/sitecollaboratif/archives\">");
									echo __("Archives");
								echo("</a>");
							echo("</li>");
							echo("<li>");
								// echo("<a href=\"/faq\">");
								echo("<a href=\"/Projet_web/sitecollaboratif/faq\">");
									echo __("FAQ");
								echo("</a>");
							echo("</li>");
							echo("<li>");
								// echo("<a href=\"/contact\">");
								echo("<a href=\"/Projet_web/sitecollaboratif/contact\">");
									echo __("Contact");
								echo("</a>");
							echo("</li>");
							if($this->Session->read('Auth.User.id')){
							echo("<li>");
							// echo("<a href=\"/users/account\" admin=\"false\">");
							echo("<a href=\"/Projet_web/sitecollaboratif/users/account\" admin=\"false\">");
									echo __("Mon compte");
							echo("</a>");
							echo("</li>");
							echo("<li>");
								// echo("<a href=\"/users/logout\" admin=\"false\">");
								echo("<a href=\"/Projet_web/sitecollaboratif/users/logout\" admin=\"false\">");
									echo __("Se déconnecter");
								echo("</a>");
							echo("</li>");
							}
							else{
							echo("<li>");
								// echo("<a href=\"/users/login\">");
								echo("<a href=\"/Projet_web/sitecollaboratif/users/login\">");
									echo __("Se connecter");
								echo("</a>");
							echo("</li>");
							}

	//bouton permettant de changer la langue du site
							echo("<li>");
								echo("<button class=\"btnLang\" type=\"button\" id=\"dropdownMenu2\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">");
									echo __("Langue");
									echo("<span class=\"caret\"></span>");
								echo("</button>");
							  	echo("<ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu2\">");
			  					  	echo("<li>");
			  					  		echo $this->Html->link(
										    $this->Html->image("internationalisation/flag_icons/png/Fr.png",
										    	array("alt" => "fr")),
										    array('action'=>'set_language', 'fra', 'admin'=>false),
										    array('escape' => false)
										);
									echo("</li>");
									echo("<li>");
				  					  	echo $this->Html->link(
										    $this->Html->image("internationalisation/flag_icons/png/Gb.png",
										    	array("alt" => "gb")),
										    array('action'=>'set_language', 'eng', 'admin'=>false),
										    array('escape' => false)
										);
									echo("</li>");
							  	echo("</ul>");
							echo("</li>");
					  	echo("</ul>");
					echo("</div>");
				echo("</div>");
			echo("</nav>");
		echo("</div>");
	echo("</div>");
?>
