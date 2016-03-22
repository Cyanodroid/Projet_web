<?php 
foreach ($msg as $m ){
	echo("<div class=\"chat-message-content\">");
		echo '<b>'.$m['Users']['username'].': </b>';
		echo '<p>'.$m['Chat']['contenu'].'</p>';
		echo("<br/>");
	echo("</div>");
}
?>
