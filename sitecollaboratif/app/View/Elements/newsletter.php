<?php
			echo("</div>");
		echo("</div>");
	echo("</div>");
	echo("<section>");
		echo("<div class=\"container\">");
			echo("<div class=\"row\">");

	//titre
				echo("<div class=\"col-lg-12\">");
					echo("<h2 class=\"section-heading\">");
						echo __("S'inscrire à la newsletter");
					echo("</h2>");

	//zone de texte où l'utilisateur doit entrer son mail pour s'abonner à la newsletter
					echo $this->Form->create(__('Newsletter'), array('url'=>array('controller'=>'newsletters', 'action'=>'newsletter')));
						echo("<div class=\"input-group\">");
							echo $this->Form->input('email', array('label'=>"",'id'=>'mail', 'class'=>'form-control'));
								echo("<span class=\"input-group-btn\">");
									echo $this->Form->button(__("S'inscrire"), array('class'=>'btn btn-default'));
								echo("</span>");
						echo("</div>");
						echo("</br>");

	//captcha pour empecher le spam
						echo("<div class=\"col-lg-12 google\">");
							echo("<div class=\"g-recaptcha\" data-sitekey=\"6Lf4FBsTAAAAAKiHLaippD0gapGYWbWO3viCQsTj\"></div>");
						echo("</div>");
					echo $this->Form->end();
				echo("</div>");
			echo("</div>");
		echo("</div>");
	echo("</section>");
	echo("<div class=\"container marketing\" >");
		echo("<div class=\"row\">");
			echo("<div id=\"content\">");
?>