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
				  	echo("<li style=\"list-style-type:none;\">");
					  	echo("<a href=\"/#\" class=\"navbar-brand\">");
					  		echo __("Site collaboratif");
					  	echo("</a>");
				  	echo("</li>");
				echo("</div>");
				echo("<div id=\"navbar\" class=\"navbar-collapse collapse\">");
				  	echo("<ul class=\"nav navbar-nav navbar-right\">");
				  		echo("<li>");
				  			echo("<a href=\"/\">");
				  				echo("<img src=\"/img/home.png\" alt=\"Accueil\" width=\"20px\" height=\"20px\">");
				  				echo("</img>");
				  			echo("</a>");
						echo("</li>");
						echo("<li>");
							echo("<a href=\"/articles\">");
								echo __("Articles");
							echo("</a>");
						echo("</li>");
						if ($this->Session->read('Auth.User.id')){
						echo("<li>");
							echo("<a href=\"/chats/index\" admin=\"false\">");
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
						echo("<a href=\"/users/account\" admin=\"false\">");
								echo __("Mon compte");
						echo("</a>");
						echo("</li>");
						echo("<li>");
							echo("<a href=\"/users/logout\" admin=\"false\">");
								echo __("Se déconnecter");
							echo("</a>");
						echo("</li>");
						}
						else{
						echo("<li>");
							echo("<a href=\"/users/login\">");
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
									    $this->Html->image("internationalisation/flag_icons/png/Fr.png",
									    	array("alt" => "fr")),
									    "index/",
									    array('escape' => false)
									);
								echo("</li>");
								echo("<li onclick=alert(\"Hello\")>");
			  					  	echo $this->Html->link(
									    $this->Html->image("internationalisation/flag_icons/png/Gb.png",
									    	array("alt" => "gb")),
									    "index/",
									    array('escape' => false)
									);
								echo("</li>");
								echo("<li onclick=alert(\"Hola\")>");
			  					  	echo $this->Html->link(
									    $this->Html->image("internationalisation/flag_icons/png/Es.png",
									    	array("alt" => "es")),
									    "index/",
									    array('escape' => false)
									);
								echo("</li>");
								echo("<li onclick=alert(\"Hallo\")>");
			  					  	echo $this->Html->link(
									    $this->Html->image("internationalisation/flag_icons/png/De.png",
									    	array("alt" => "de")),
									    "index/",
									    array('escape' => false)
									);
								echo("</li>");
								echo("<li onclick=alert(\"привет\")>");
			  					  	echo $this->Html->link(
									    $this->Html->image("internationalisation/flag_icons/png/Ru.png",
									    	array("alt" => "ru")),
									    "index/",
									    array('escape' => false)
									);
								echo("</li>");
								echo("<li onclick=alert(\"こんにちは\")>");
			  					  	echo $this->Html->link(
									    $this->Html->image("internationalisation/flag_icons/png/Jp.png",
									    	array("alt" => "jp")),
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
