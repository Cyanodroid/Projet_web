<?php $this->layout = 'default2'; 
    echo("</br>");
    echo("<div class=\"row\" style=\"margin-left: 40%; margin-top: 15%;\">");
        echo("<div class=\"span12\">");

    //titre
            echo("<h1>");
            echo __("Se connecter");
            echo("</h1>");

    //formulaire de connexion (pseudo, mot de passe)
            echo $this->Form->create('User');
            echo $this->Form->input('username', array('label' => __("Nom d'utilisateur"), 'class'=>'form-control')); 
            echo "<br/>"; 
            echo $this->Form->input('password', array('label' => __("Mot de passe"), 'class'=>'form-control')); 
            echo "<br/>"; 
            echo $this->Form->button(__('Se connecter'), array('class'=>"btn btn-lg btn-primary"));
            echo "<br/>"; 
            echo "<br/>"; 

    //si l'utilisateur a oublié son mot de passe ou si il n'a pas encore de compte
            echo("<p><em>");
                echo $this->Html->link(__('Mot de passe oublié ?'), array('action' => 'forgot')); 
            echo("</em></p>");
            echo("<p><em>");
                echo $this->Html->link(__("S'inscrire"), array('action' => 'signup')); 
            echo("</em></p>");
            echo $this->Form->end();   
        echo("</div>");
    echo("</div>");
?>