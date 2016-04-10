<?php
echo("<div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">");
	 echo("<ol class=\"carousel-indicators\">");
		echo("<li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>");
		echo("<li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>");
		echo("<li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>");
	 echo("</ol>");
	echo("<div class=\"carousel-inner\" role=\"listbox\">");
	  	for ($i = 0; $i < 3; $i++){
	  		if($articles[$i]['Post']['id'] == NULL) break;
			if ($i == 0) echo "<div class=\"item active\">";
			else echo "<div class=\"item\">";
			echo "<div class=\"fill\">";
			if ($i == 0){
				echo $this->Html->image('/img/articles/'.$articles[$i]['Post']['id'].'.jpg', array('class'=>'first-slide', 'alt'=>'First slide'));
			} 
			elseif ($i == 1){
				echo $this->Html->image('/img/articles/'.$articles[$i]['Post']['id'].'.jpg', array('class'=>'second-slide', 'alt'=>'Second slide'));
			} 
			elseif ($i == 2){
				echo $this->Html->image('/img/articles/'.$articles[$i]['Post']['id'].'.jpg', array('class'=>'third-slide', 'alt'=>'Third slide'));
			} 
			echo "</div>";
			echo "<div class=\"container\">";
			echo "<div class=\"carousel-caption\" style=\" position: absolute;  top: 50%;  z-index: 5;  display: inline-block;  margin-top: -100px; margin-left: .6%;\">";
			echo "<h1>".$articles[$i]['Post']['title']."</h1>";
			echo "<p>".$this->Text->truncate($articles[$i]['Post']['contenu'], 200, array('ellipsis'=>'...', 'exact'=>false))."</p>";
			echo "<p>".$this->Html->link('En savoir plus', array('action'=>'voir', $articles[$i]['Post']['id']), array('class'=>'btn btn-default', 'role'=>'button', 'class="btn btn-lg btn-primary"'))."</p>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
	echo("</div>");
	echo("<a class=\"left carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\">");
		echo("<span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>");
		echo("<span class=\"sr-only\">Previous</span>");
	echo("</a>");
	echo("<a class=\"right carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"next\">");
		echo("<span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span>");
		echo("<span class=\"sr-only\">Next</span>");
	echo("</a>");
echo("</div>");
?>