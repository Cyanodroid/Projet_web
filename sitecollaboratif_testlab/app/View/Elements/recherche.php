<?php
		echo("</div>");
	echo("</div>");
echo("</div>"); 
echo("<section>");
	echo("<div class=\"container\">");
		echo("<div class=\"row\">");
			echo("<div class=\"col-lg-12\">");
				echo("<h2 class=\"section-heading\">");
					echo __("Rechercher un article");
				echo("</h2>");
				echo $this->Form->create('Post',array('id' => 'textBox', 'type' => 'post','url' => array('controller' => 'posts', 'action' => 'resultSearch')));
					echo("<div class=\"input-group\">");
						echo $this->Form->input('search', array('label'=>"",'id'=>'search', 'class'=>'form-control', 'autocomplete'=>"off"));
							echo("<span class=\"input-group-btn\">");
								echo $this->Form->button(__('Rechercher'), array('class'=>'btn btn-default'));
							echo("</span>");
					echo("</div>");
				echo $this->Form->end();
			echo("</div>");
			echo("<div class=\"result\" id=\"result\"></div>");
		echo("</div>");
	echo("</div>");
echo("</section>");
echo("<div class=\"container marketing\" style=\"margin-top:5%;\">");
	echo("<div class=\"row\">");
		echo("<div id=\"content\">");
?>