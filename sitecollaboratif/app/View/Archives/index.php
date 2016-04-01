<?php
	$this->layout = 'default2';
	echo $this->Session->flash();
	echo("<div class=\"span12\" style=\"text-align:center;\">");
		echo("<h1 style=\"margin-top : 10%;\">");
			echo __("Archives");
		echo("</h1>");
	echo("</div>");

	echo("<div class=\"container\" style=\"margin-top: 5%\">");
		echo("<div class=\"row\">");
			echo("<div class=\"span12\">");
				echo $this->Form->create('Archive',array('id' => 'textBox', 'type' => 'post', 'url' => array('controller' => 'archives', 'action' => 'resultSearch')));
					echo("<div class=\"input-group\">");
						echo $this->Form->input('search', array('label'=>"",'id'=>'search_archives', 'class'=>'form-control', 'autocomplete'=>"off", 'placeholder'=> 'Rechercher dans les archives'));
							echo("<span class=\"input-group-btn\">");
								echo $this->Form->button(__('Rechercher'), array('class'=>'btn btn-default'));
							echo("</span>");
					echo("</div>");
				echo $this->Form->end();
			echo("</div>");
			echo("<div class=\"result\" id=\"result\" style=\"margin-bottom: 5%; margin-top: 2%;\"></div>");

			foreach ($archive as $a) {
				echo "<div id=".$a['Archive']['id']." style=\"margin-top: 5%;\">";
				echo "<h2>".$a['Archive']['query']."</h2>";
				echo "<p>".$a['Archive']['answer']."</p>";
				echo "</div>";
			}

		echo("</div>");
	echo("</div>");
?>
