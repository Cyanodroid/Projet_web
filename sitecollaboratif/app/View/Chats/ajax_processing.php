<?php

//affichage du contenu du chat mis a jour par ajax
	foreach ($msg as $m ){
		echo("<div class=\"chat-message-content\">");
			echo '<b>'.$m['Users']['username'].':</b>';
			echo '<p>'.$m['Chat']['contenu'].'</p>';
			echo '<i class="fa fa-question" onclick="set_query('.$m['Chat']['id'].','.$current_user.');">
			</i>&nbsp;-&nbsp;<i class="fa fa-check" onclick="set_answer('.$m['Chat']['id'].','.$current_user.');" 
			id="select-'.$m['Chat']['id'].'"></i>';
			echo("<br/>");
			echo("<br/>");
		echo("</div>");
	}
?>
