<?php
  echo("<div id=\"pricing\" class=\"container-fluid\">");
    
  //titre
    echo("<div class=\"text-center\">");
      echo("<h2>");
      echo __("ABONNEMENTS");
      echo("</h2>");
      echo("<h4>");
      echo __("Choisir un forfait");
      echo("</h4>");
  	echo("</br>");
    echo("</br>");
    echo("</div>");

  //1er forfait : abonnement premium
    echo("<div class=\"row slideanim\">");     
      echo("<div class=\"col-sm-4 col-xs-12\">");
        echo("<div class=\"panel panel-default text-center\">");
          echo("<div class=\"panel-heading\">");
            echo("<h1>");
            echo __("Premium");
            echo("</h1>");
          echo("</div>");
          echo("<div class=\"panel-body\" style=\"font-size: 140%;\">");
            echo("<p>");
            echo("</br>");
            echo("</br>");
            echo("<strong>");
            echo __("Devenez un de nos membres premium !");
            echo("</strong>");
            echo("</p>");
            echo("<p>");
            echo __("Passez prioritaire sur le tchat et téléchargez les PDF des cours.");
            echo("</br>");
            echo("</br>");
            echo("</p>");
          echo("</div>");
          echo("<div class=\"panel-footer\" style=\"font-size: 140%;\">");
            echo("<h3>");
            echo __("Seulement 5€");
            echo("</h3>");
            echo("<h4>");
            echo __("par mois");
            echo("</br>");
            echo("</h4>");
            echo $this->Html->link(__("Souscrire"), array('controller'=>'users', 'action'=>'subscribe'), array('class'=>'btn btn-primary'));
          echo("</div>");
        echo("</div>");      
      echo("</div>");   

  //2eme forfait : devenir modérateur bénévole 
      echo("<div class=\"col-sm-4 col-xs-12\">");
        echo("<div class=\"panel panel-default text-center\">");
          echo("<div class=\"panel-heading\">");
            echo("<h1>");
            echo __("Modération");
            echo("</h1>");
          echo("</div>");
          echo("<div class=\"panel-body\" style=\"font-size: 140%;\">");
            echo("<p>");
            echo("</br>");
            echo("</br>");
            echo("<strong>");
            echo __("Vous souhaitez participer à la vie du site ?");
            echo("</strong>");
            echo("</p>");
            echo("<p>");
            echo __("Candidatez et choisissez de devenir rédacteur ou modérateur de notre tchat !");
            echo("</br>");
            echo("</br>");
            echo("</p>");
          echo("</div>");
          echo("<div class=\"panel-footer\" style=\"font-size: 140%;\">");
            echo("<h3>");
            echo __("Bénévolat");
            echo("</h3>");
            echo("<h4>");
            echo __("Rédaction d'articles");
            echo("</br>");
            echo("</h4>");
            echo $this->Html->link(__("Postuler"), array('controller'=>'users', 'action'=>'candidate'), array('class'=>'btn btn-primary'));
          echo("</div>");
        echo("</div>");     
      echo("</div>");   
  	echo("</div>");
  echo("</div>");
?>