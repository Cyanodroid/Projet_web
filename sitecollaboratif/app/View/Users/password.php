<?php 
$this->layout = 'default2';
echo("<div class=\"row\">");
    echo("<div class=\"span12\">");
        echo("<h1>");
        echo __("Changer de mot de passe");
        echo("</h1>");
        echo $this->Form->create('User');
            echo $this->Form->input('password', array('label' => __("Mot de passe"), 'class'=>'form-control'));
            echo ("<br/>");
            echo $this->Form->input('password2', array('type' => 'password', 'label' => __("Confirmer Mot de passe"), 'class'=>'form-control'));
            echo ("<br/>");
            echo $this->Form->button(__("Valider"), array('class'=>"btn btn-lg btn-primary"));
        echo $this->Form->end();
    echo("</div>");
echo("</div>");
?>