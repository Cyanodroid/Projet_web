<?php
$this->layout = 'articles';

$dir = IMAGES . 'articles' . DS;
$files = scandir($dir);
$cpt = 0;
foreach ($files as $f) {
    $str = explode("-", basename($f, ".jpg"));
    if (strcmp($str[0], $a['Post']['id']) == 0) {
        $cpt++;
    }
}

if ($cpt > 1) echo $this->Html->css('/css/articles_images.css');

echo $this->Session->flash();
echo("<div class=\"col-lg-8\">");
    echo("</br>");
	echo "<h1>".$a['Post']['title']."</h1>";
    echo("<p>");
    echo $a['Categories']['title'];
    echo("</p>");
    echo("<p><span class=\"glyphicon glyphicon-time\"></span>");
    echo "&nbsp;";
    echo $this->Time->timeAgoInWords($a['Post']['date_post']);
    echo("</p>");
    echo("<hr>");
    if ($a['Post']['image'] == 1) {
        echo $this->Html->image('/img/articles/'.$a['Post']['id'].'.jpg', array('height'=>400, 'width'=>750));
    }
    else{
        echo $this->Html->image('/img/articles/ecrannoir.jpg', array('height'=>400, 'width'=>750));
    }
    echo("<hr>");
    echo nl2br($a['Post']['contenu']);

    // partie gallerie
    if ($cpt > 1) {
        echo("<hr>");
        echo("<h3>");
        echo __("Gallerie");
        echo("</h3>");
        echo("<br/>");
        echo("<div id=\"images-box\">");
            for ($i = 0 ; $i < $cpt ; $i++) {
                $j = $i+1;
                echo("<div class='holder'>");
                    echo("<div id=\"image-"); echo $i+1; echo ("\" class=\"image-lightbox\">");
                        echo("<span class=\"close\"><a href=\"#\">X</a></span>");
                        if ($i == 0) {
                            echo $this->Html->image("articles/".$a['Post']['id'].".jpg");
                        } else {
                            echo $this->Html->image("articles/".$a['Post']['id']."-".$i.".jpg");
                        }
                        echo("<a class=\"expand\" href=\"#image-$j\"></a>");
                    echo("</div>");
                echo("</div>");
            }
        echo("</div>");
        echo("<div class=\"cb\" style=\"margin-bottom: 100px;\"></div>");
    }

    // partie pdf
    if ($user != 2){
    	echo("<hr>");
        echo("<i class=\"fa fa-file-pdf-o\"></i>&nbsp;");
        echo $this->Html->link('Exporter au format PDF', array('controller'=>'posts', 'action'=>'create_pdf', $a['Post']['id'], 'escape'=>false));
        echo("<br/><br/>");
        echo("<i class=\"fa fa-download\"></i>&nbsp;");
        echo $this->Html->link('Télécharger le PDF', array('controller'=>'posts', 'action'=>'show_pdf', $a['Post']['id']));
        echo("<hr>");
    }
    else{
        echo("<hr>");
    }
    // partie commentaire
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
	            echo $this->Html->image($com['User']['avatari'], array('class' => 'media-object img-circle', "height" => 50, "weight" => 50));
	       	}
            else{
                echo $this->Html->image("avatars/avatardefault.jpg",
                    array("class" => "media-object img-circle", "height" => 50, "weight" => 50));
        	}
        echo("</div>");
        echo("<div class=\"media-body\">");
	        echo("<h4 class=\"media-heading\">");
	        echo("<strong>");
                echo $com['User']['username'];
            echo("</strong>");
	        echo("</h4>");
	       	echo "<p>".$com['Comment']['contenu']."</p>";
	       	if ($this->Session->read('Auth.User.id') == $com['User']['id'] || $this->Session->read('Auth.User.groups_id') == 1){
	        echo("<p>");
                $c = __("Supprimer ce commentaire");
                $v = __("Voulez vous vraiment supprimer ?");
                echo $this->Form->postLink('<i class="fa fa-trash-o"></i>&nbsp;'.$c, array('action' => 'delete', 'controller' => 'posts', $com['Comment']['id']), array('class' => 'btn btn-danger', 'escape' => false), $v);
           echo("</p>");
            }
        echo("</div>");
    echo("</div>");
    echo("<hr>");
	}
echo("</div>");
echo("<div class=\"col-lg-4\">");
    echo("</br>");
    echo("</br>");
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
