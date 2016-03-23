<?php 
echo $this->Session->Flash(); 
//erreur
echo("<div class=\"row\" style=\"margin-top:70px;\">");
	echo("<h1>");
	echo __("Gestion des utilisateurs");
	echo("</h1>");
	echo("<div class=\"span12\">");
		echo("<br/><br/>");
		echo("<table class=\"table table-striped\">");
			echo("<thead>");
				echo("<tr>");
					echo("<th>");
					echo __("IDENTIFIANT");
					echo("</th>");
					echo("<th>");
					echo __("PSEUDO");
					echo("</th>");
					echo("<th>");
					echo __("MAIL");
					echo("</th>");
					echo("<th>");
					echo __("GROUPE");
					echo("</th>");
					echo("<th>");
					echo __("ACTION");
					echo("</th>");
				echo("</tr>");
			echo("</thead>");
			echo("<tbody>");
				foreach ($users as $key => $user){
					echo("<tr>");
						echo("<td>");
							echo $user['User']['id'];
						echo("</td>");
						echo("<td>");
							echo $user['User']['username'];
						echo("</td>");
						echo("<td>");
							echo $user['User']['mail'];
						echo("</td>");
						echo("<td>");
							echo $user['User']['groups_id'];
						echo("</td>");
						echo("<td>");
							$g1 = __("Gérer");
							$g2 = '<i class="fa fa-pencil-square-o"></i>&nbsp;'.$g1;
							echo $this->Html->link($g2, array('action'=>'admin_edit', $user['User']['id']), array('escape'=>false));
						echo("</td>");
					echo("</tr>");
				}
			echo("</tbody>");
		echo("</table>");
	echo("</div>");
echo("</div>");
?>