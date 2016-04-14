<?php 
    $this->layout = 'default2'; 
    echo("<div class=\"row\" style=\"margin-top: 10%;\">");
        echo("<div class=\"span12\">");

    //titre
            echo("<h1>");
            echo __("S'inscrire");
            echo("</h1>");

    //formulaire d'inscription (pseudo, mot de passe, email)
            echo $this->Form->create('User');
                echo $this->Form->input('username', array('label' => __("Nom d'utilisateur"), 'class'=>'form-control')); 
                echo("<br/>");
                echo $this->Form->input('password', array('label' => __("Mot de passe"), 'class'=>'form-control')); 
                echo("<br/>");
                echo $this->Form->input('password2', array('type' => 'password', 'label' => __("Confirmer Mot de passe"), 'class'=>'form-control')); 
                echo("<br/>");
                echo $this->Form->input('mail', array('label' => __('Email'), 'class'=>'form-control')); 
                echo("<br/>");
                echo $this->Form->button(__("S'inscrire"), array('class'=>"btn btn-lg btn-primary")); 
            echo $this->Form->end(); 
        echo("</div>");
    echo("</div>");
?>