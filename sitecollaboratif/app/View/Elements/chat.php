<?php
echo("<div class=\"row\" style=\"margin-top: 120px; border: 1px solid black;\">");
	echo("<div class=\"col-md-4\" style=\"height: 500px; border-right: 1px solid black;\">");
		echo("<div class=\"user-infos\" style=\"margin-top: 20px;\">");
			if ($this->Session->read('Auth.User.avatar')){
	        	$this->Html->image($this->Session->read('Auth.User.avatari'), array('class'=>'preview-avatar'));
	    	}
			echo("<b>");
			$this->Session->read('Auth.User.username');
			echo("</b>");
		echo("</div>");
		echo("<ul class=\"nav nav-tabs\" style=\"margin-top: 20px;\">");
			echo("<li class=\"active\">");
				echo("<a data-toggle=\"tab\" href=\"#home\">");
					echo __("Utilisateurs connectés");
				echo("</a>");
			echo("</li>");
			echo("<li>");
				echo("<a data-toggle=\"tab\" href=\"#menu1\">");
					echo __("Salles");
				echo("</a>");
			echo("</li>");
		echo("</ul>");
		echo("<div class=\"tab-content\">");
			echo("<div id=\"home\" class=\"tab-pane fade in active\">");
				echo("<table class=\"table table-striped\">");
				    echo("<tbody>");
				    	foreach ($users_list as $u){
				    	echo("<tr>");
				        	echo("<td>");
				        		if($u['Users']['avatar'] == 1){
					        		$this->Html->image('/img/avatars/'.ceil($u['Users']['id'] / 1000).'/'.$u['Users']['id'].'.jpg', array('class'=>'chat-avatar'));
					    		}
				        	echo("</td>");
				        	echo("<td>".$u['Users']['username']."</td>");
				      	echo("</tr>");
				      	}
				    echo("</tbody>");
			    echo("</table>");
			echo("</div>");
			echo("<div id=\"menu1\" class=\"tab-pane fade\">");
				echo("<table class=\"table table-striped\">");
				    echo("<tbody>");
				    	foreach($rooms as $r){
					    	echo("<tr>");
								echo "<td>".$this->Html->link($r['Rooms']['name'], array('action'=>'index', 'id'=>$r['Rooms']['id'], 'current_id'=>$cr['Rooms']['id']))."</td>";
					      	echo("</tr>");
				      	}
				    echo("</tbody>");
			    echo("</table>");
			echo("</div>");
		echo("</div>");
	echo("</div>");
	echo("<div class=\"col-md-8\" style=\"height: 500px;\">");
		echo("<div style=\"text-align: center;\">");
			echo '<h2>'.$cr['Rooms']['name'].'</h2>';
			echo("<hr>");
		echo("</div>");
		echo("<div class=\"chat-message\" id=\"chat-message\" style=\"background-color: #FFF; height: 70%; overflow-y: scroll;\">");
			echo("<div class=\"chat-message-content\" id=\"chat-message-content\">");
				echo $this->Html->image('/img/ajax-loader.gif', array('class'=>'center-block'));
			echo("</div>");
		echo("</div>");
		echo("<form id=\"chat-form-control\">");
			echo("<div class=\"input-group\">");
				$e0 = __("Message");
				echo("<input id=\"chat-messsage-input\" class=\"form-control\" placeholder=$e0 autocomplete=\"off\"/>");
				echo("<span class=\"input-group-btn\">");
					$e1 = __("Envoyer");
					$m1 = $cr['Rooms']['id'];
					echo("<input type=\"submit\" onclick=\"EnvoyerMSG($m1);\" class=\"btn btn-default tchat-button\" value=$e1 />");
				echo("</span>");
			echo("</div>");
		echo("</form>");
	echo("</div>");
echo("</div>");
echo("<div class=\"cb\" style=\"margin-top: 10px;\"></div>");
echo("<div class=\"col-md-1 col-md-offset-5\">");
	echo("<form id=\"mail-button-control\">");
		echo("<div class=\"input-group\">");
			echo("<span class=\"input-group-btn\">");
				$e2 = __("Mail");
				$m2 = $cr['Rooms']['id'];
				echo("<input type=\"submit\" onclick=\"EnvoyerMAIL($m2);\" class=\"btn btn-default\" value=$e2 />");
			echo("</span>");
		echo("</div>");
	echo("</form>");
echo("</div>");
echo("<div class=\"col-md-1 col-md-offset-1\">");
	echo("<form id=\"question-button-control\">");
		echo("<div class=\"input-group\">");
			echo("<span class=\"input-group-btn\">");
				$e3 = __("Question");
				echo("<input type=\"submit\" onclick=\"poser_question();\" class=\"btn btn-default\" value=$e3 />");
			echo("</span>");
		echo("</div>");
	echo("</form>");
echo("</div>");
echo("<div class=\"col-md-1 col-md-offset-1\">");
	echo("<form id=\"reponse-button-control\">");
		echo("<div class=\"input-group\">");
			echo("<span class=\"input-group-btn\">");
				$e4 = __("Réponse");
				echo("<input type=\"submit\" onclick=\"enregistrer_reponse();\" class=\"btn btn-default\" value=$e4 />");
			echo("</span>");
		echo("</div>");
	echo("</form>");
echo("</div>");
?>
