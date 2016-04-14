<?php
    echo("<div class=\"span12\" style=\"text-align:center;\">");

    //titre
    	echo("<h1 style=\"margin-top : 10%;\">");
            echo __("Articles par catégories");
        echo("</h1>");
        echo("</br>");
    	echo("<div class=\"row slideanim\" style=\"margin-top : 2%;\">");

    //liste des catégories disponibles et lien vers les articles spécifiques à cette catégorie
    	foreach ($categories as $c){
        	echo("<div class=\"col-sm-4 col-xs-12\">");
        		echo("<div class=\"panel panel-default text-center\">");
            		echo("<div class=\"panel-heading\">");
            			echo("<h1>");
                        echo $c['Categories']['title'];
                        echo("</h1>");
            		echo("</div>");
            		echo("<div class=\"panel-body\">");
    					echo $this->Html->image('/img/categories/'.$c['Categories']['id'].'.jpg', array('height'=>140, 'width'=>140, 'class'=>'img-circle'));
            			echo("<p><strong>");
                        echo __("Découvrez nos articles sur la ");
                        echo $c['Categories']['title'];
                        echo("!");
                        echo("</strong></p>");
            		echo("</div>");
            		echo("<div class=\"panel-footer\">");
            			echo $this->Html->link(__("Parcourir les articles"), array('controller'=>'posts', 'action'=>'parcourir', $c['Categories']['id']), array('class'=>'btn btn-primary'));
            		echo("</div>");
        		echo("</div>");
        	echo("</div>");
        }
    	echo("</div>");
    echo("</div>");
    echo("<div class=\"span12\" style=\"text-align:center;\">");

    //liste de tous les articles (du plus récent au plus ancien)
    	echo("<h1 style=\"margin-top : 10%;\">");
        echo __("Tous les articles publiés");
        echo("</h1>");
    	foreach ($all as $l){
    	echo("<div class=\"col-xs-6 col-md-4\">");
            echo $this->Html->image('/img/categories/'.$l['Post']['categories_id'].'.jpg', array('height'=>140, 'width'=>140, 'class'=>'img-circle'));
    	    echo "<h2>".$l['Post']['title']."</h2>";
    	    echo "<p>".$this->Text->truncate($l['Post']['contenu'], 200, array('ellipsis'=>'...', 'exact'=>false))."</p>";
    	    echo "<p>".$this->Html->link(__('En savoir plus'), array('controller'=>'posts', 'action'=>'voir', $l['Post']['id']), array('class'=>'btn btn-default', 'role'=>'button'))."</p>";
    	echo("</div>");
        }
    echo("</div>");
?>
