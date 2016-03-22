<?php 
$this->layout = 'articles';
echo $this->Session->flash();
echo("<div class=\"col-lg-8\">");
	echo "<h1>".$a['Post']['title']."</h1>";
    echo("<p>");
    echo $a['Categories']['title'];
    echo("</p>");
    echo("<p><span class=\"glyphicon glyphicon-time\"></span>");
    echo $this->Time->timeAgoInWords($a['Post']['date_post']);
    echo("</p>");
    echo("<hr>");
    if ($a['Post']['image'] == 1){
        echo $this->Html->image('/img/articles/'.$a['Post']['id'].'.jpg', array('height'=>400, 'width'=>750));
    }
    else{
        echo $this->Html->image('/img/articles/ecrannoir.jpg', array('height'=>400, 'width'=>750));
    }
    echo("<hr>");
    echo nl2br($a['Post']['contenu']);
    if ($user != 2){
    	echo("<hr>");
        echo("<i class=\"fa fa-file-pdf-o\"></i>"); 
        echo $this->Html->link('Exporter au format PDF', array('controller'=>'posts', 'action'=>'create_pdf', $a['Post']['id'], 'escape'=>false));
        echo("<br/><br/>");
        echo("<i class=\"fa fa-download\"></i>");  
        echo $this->Html->link('Télécharger le PDF', array('controller'=>'posts', 'action'=>'show_pdf', $a['Post']['id']));
        echo("<hr>");
    }
    else{
        echo("<hr>");
    }
	echo("<div class=\"well\">");
        echo("<h4>");
            echo __("Publiez un commentaire :");
        echo("</h4>");
        	echo $this->Form->create('Comment', array('url'=>array('controller'=>'posts', 'action'=>'voir', $a['Post']['id'])));
	            echo("<div class=\"form-group\">");
					echo $this->Form->input('contenu', array('label'=>false));
				echo("</div>");
				echo $this->Form->button('Envoyer', array('class'=>'btn btn-primary'));
			echo $this->Form->end();
    echo("</div>");
    echo("<hr>");
	foreach ($c as $com){
    echo("<div class=\"media\">");
        echo("<div class=\"col-lg-2\">");
	        if ($com['User']['avatar']){
	            echo $this->Html->image($com['User']['avatari'], array('class' => 'avatar img-circle'));
	       	}
            else{
            	echo("<img class=\"media-object img-circle\" src=\"http://placehold.it/64x64\" alt=\"\">");
        	}
        echo("</div>");
        echo("<div class=\"media-body\">");
	        echo("<h4 class=\"media-heading\">");
	        echo("<strong>");
                echo $com['User']['username'];
            echo("</strong>");
	        echo("</h4>");
	       	echo "<p>".$com['Comment']['contenu']."</p>";
	       	if ($this->Session->read('Auth.User.id') == $com['User']['id']){
	        echo("<p>");
                $c = __("Supprimer ce commentaire");
                $v = __("Voulez vous vraiment supprimer ?");
                echo $this->Form->postLink('<i class="fa fa-trash-o"></i>'.$c, array('action' => 'delete', 'controller' => 'posts', $com['Comment']['id']), array('class' => 'btn btn-danger', 'escape' => false), $v);
           echo("</p>");
            }
        echo("</div>");
    echo("</div>");
    echo("<hr>");
	}
echo("</div>");
echo("<div class=\"col-lg-4\">");
	echo("<p></p>");
        echo("<div class=\"col-sm-4\">");
        	echo("<button class=\"button share_twitter\" data-url=\"http://www.site-collaboratif.fr/\" style=\"background-color:#55ACEE\">");
                echo("<svg><use xlink:href=\"../../app/webroot/img/sprite.svg#twitter\"></use></svg>");
            echo("</button>");
        echo("</div>");
       	echo("<div class=\"col-sm-4\">");
        	echo("<button class=\"button share_facebook\" data-url=\"http://www.site-collaboratif.fr/\" style=\"background-color:#4C67A1\">");
                echo("<svg><use xlink:href=\"../../app/webroot/img/sprite.svg#facebook\"></use></svg>");
            echo("</button>");
        echo("</div>");
        echo("<div class=\"col-sm-4\">");
        	 echo("<button class=\"button share_gplus\" data-url=\"http://www.site-collaboratif.fr/\" style=\"background-color:#D23F31\">");
                echo("<svg><use xlink:href=\"../../app/webroot/img/sprite.svg#gplus\"></use></svg>");
            echo("</button>");
        echo("</div>");
         echo("<div class=\"col-sm-4\">");
            echo $this->Html->link('<i class="fa fa-rss-square fa-4x"></i>', array('controller'=>'posts', 'action'=>'flux_rss.rss'), array('escape'=>false));
        echo("</div>");
echo("</div>");
?>