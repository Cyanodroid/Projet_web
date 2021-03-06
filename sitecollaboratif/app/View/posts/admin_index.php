<?php
	echo $this->Session->Flash();
	echo("<div class=\"row\" style=\"margin-top:70px;\">");
		echo("</br>");

	//titre
		echo("<h1>");
		echo __("Panneau de contrôle");
		echo("</h1>");
		echo("</br>");
		echo("<div class=\"span12\">");

	//bouton pour publier un article
		$p = __("Publier un article");
			echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;'.$p, array('action'=>'admin_edit'), array('class'=> 'btn btn-primary', 'escape'=>false));
			echo("<br/><br/>");

	//liste des articles déjà publiés
			echo("<table class=\"table table-striped\">");
				echo("<thead>");
					echo("<tr>");
						echo("<th>");
						echo __("IDENTIFIANT");
						echo("</th>");
						echo("<th>");
						echo __("TITRE");
						echo("</th>");
						echo("<th>");
						echo __("CATEGORIE");
						echo("</th>");
						echo("<th>");
						echo __("DATE DE PUBLICATION");
						echo("</th>");
						echo("<th>");
						echo __("ACTIONS");
						echo("</th>");
					echo("</tr>");
				echo("</thead>");
				echo("<tbody>");
				foreach ($articles as $key => $article){
					echo("<tr>");
						echo("<td>");
							echo $article['Post']['id'];
						echo("</td>");
						echo("<td>");
							echo $article['Post']['title'];
						echo("</td>");
						echo("<td>");
							echo $article['Categories']['title'];
						echo("</td>");
						echo("<td>");
							echo $article['Post']['date_post'];
							echo("</td>");

	//possibilité de modifier ou de supprimer l'article que l'on veut
						echo("<td>");
							echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>&nbsp;Editer&nbsp;', array('action'=>'admin_edit', $article['Post']['id']), array('escape'=>false));
							echo $this->Html->link('<i class="fa fa-trash-o"></i>&nbsp;Supprimer', array('action'=>'admin_delete', $article['Post']['id']), array('confirm'=>"Merci de confirmer la suppression" , 'escape'=>false));
						echo("</td>");
					echo("</tr>");
				}
				echo("</tbody>");
			echo("</table>");
		echo("</div>");
	echo("</div>");
?>
