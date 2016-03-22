<?php echo $this->Session->Flash(); 
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
					<th>IDENTIFIANT</th>
					<th>PSEUDO</th>
					<th>MAIL</th>
					<th>GROUPE</th>
					<th>ACTION</th>
				echo("</tr>");
			echo("</thead>");
			echo("<tbody>");
				foreach ($users as $key => $user){
					echo("<tr>");
						echo("<td>");
							$user['User']['id'];
						echo("</td>");
						echo("<td>");
							$user['User']['username'];
						echo("</td>");
						echo("<td>");
							$user['User']['mail'];
						echo("</td>");
						echo("<td>");
							$user['User']['groups_id'];
						echo("</td>");
						echo("<td>");
							$this->Html->link('<i class="fa fa-pencil-square-o"></i>&nbsp;Gérer', array('action'=>'admin_edit', $user['User']['id']), array('escape'=>false));
						echo("</td>");
					echo("</tr>");
				}
			echo("</tbody>");
		echo("</table>");
	echo("</div>");
echo("</div>");
?>