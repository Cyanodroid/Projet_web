<?php 
echo("<div class=\"navbar-wrapper\">");
	echo ("<div class=\"container\">");
		echo("<nav class=\"navbar navbar-inverse navbar-static-top\">");
		  	echo("<div class=\"container\">");
				echo("<div class=\"navbar-header\">");
				  	echo("<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">");
						echo("<span class=\"sr-only\">Toggle navigationc</span>");
						echo("<span class=\"icon-bar\"></span>");
						echo("<span class=\"icon-bar\"></span>");
						echo("<span class=\"icon-bar\"></span>");
				  	echo("</button>");
				  	echo("<li>");
					  	echo("<a href=\"/\" class=\"navbar-brand\">");
					  		echo __("Site collaboratif");
					  	echo("</a>");
				  	echo("</li>");
				echo("</div>");
				echo("<div id=\"navbar\" class=\"navbar-collapse collapse\">");
				  	echo("<ul class=\"nav navbar-nav navbar-right\">");
						echo("<li>");
							echo("<a href=\"/articles\">");
								echo __("Articles");
							echo("</a>");
						echo("</li>");
						if ($this->Session->read('Auth.User.id')){
						echo("<li>");
							echo("<a href=\"/chats/index\" controller=\"Chats\" action=\"index\" admin=\"false\">");
								echo __("Tchat");
							echo("</a>");
						echo("</li>");
						}
						echo("<li>");
							echo("<a href=\"/archives\">");
								echo __("Archives");
							echo("</a>");
						echo("</li>");
						echo("<li>");
							echo("<a href=\"/faq\">");
								echo __("FAQ");
							echo("</a>");
						echo("</li>");
						echo("<li>");
							echo("<a href=\"/contact\">");
								echo __("Contact");
							echo("</a>");
						echo("</li>");
						if($this->Session->read('Auth.User.id')){
						echo("<li>");
						echo("<a href=\"/users/account\" controller=\"users\" action=\"account\" admin=\"false\">");
								echo __("Mon compte");	
						echo("</a>");				
						echo("</li>");
						echo("<li>");
							echo("<a href=\"/users/logout\" controller=\"users\" action=\"logout\" admin=\"false\">");
								echo __("Se déconnecter");	
							echo("</a>");
						echo("</li>");
						}
						else{
						echo("<li>");
							echo("<a href=\"/users/login\" controller=\"users\" action=\"login\">");
								echo __("Se connecter");	
							echo("</a>");
						echo("</li>");
						}
						echo("<li>");
							echo("<button class=\"btnLang\" type=\"button\" id=\"dropdownMenu2\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">");
								echo __("Langue");
								echo("<span class=\"caret\"></span>");
							echo("</button>");
						  	echo("<ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu2\">");
		  					  	echo("<li onclick=alert(\"Bonjour\")>");
		  					  		echo $this->Html->link(
									    $this->Html->image("internationalisation/flag_icons/png/fr.png", 
									    	array("alt" => "Français")),
									    "index/",
									    array('escape' => false)
									);
								echo("</li>");
								echo("<li onclick=alert(\"Hello\")>");
			  					  	echo $this->Html->link(
									    $this->Html->image("internationalisation/flag_icons/png/gb.png", 
									    	array("alt" => "Anglais")),
									    "index/",
									    array('escape' => false)
									);
								echo("</li>");
								echo("<li onclick=alert(\"Hola\")>");
			  					  	echo $this->Html->link(
									    $this->Html->image("internationalisation/flag_icons/png/es.png", 
									    	array("alt" => "Espagnol")),
									    "index/",
									    array('escape' => false)
									);
								echo("</li>");
								echo("<li onclick=alert(\"Hallo\")>");
			  					  	echo $this->Html->link(
									    $this->Html->image("internationalisation/flag_icons/png/de.png", 
									    	array("alt" => "Allemand")),
									    "index/",
									    array('escape' => false)
									);
								echo("</li>");
								echo("<li onclick=alert(\"привет\")>");
			  					  	echo $this->Html->link(
									    $this->Html->image("internationalisation/flag_icons/png/ru.png", 
									    	array("alt" => "Russe")),
									    "index/",
									    array('escape' => false)
									);
								echo("</li>");
								echo("<li onclick=alert(\"こんにちは\")>");
			  					  	echo $this->Html->link(
									    $this->Html->image("internationalisation/flag_icons/png/jp.png", 
									    	array("alt" => "Japonais")),
									    "index/",
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