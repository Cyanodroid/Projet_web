<?php $this->layout = 'default2'; ?>
<div class="row" style="margin-top: 10%;">

    <div class="span12">
        <h1>S'inscrire</h1>

        <?= $this->Form->create('User'); ?>
            <?= $this->Form->input('username', array('label' => "Nom d'utilisateur", 'class'=>'form-control')); ?>
            <?= "<br/>"; ?>
            <?= $this->Form->input('password', array('label' => "Mot de passe", 'class'=>'form-control')); ?>
            <?= "<br/>"; ?>
            <?= $this->Form->input('password2', array('type' => 'password', 'label' => "Confirmer Mot de passe", 'class'=>'form-control')); ?>
            <?= "<br/>"; ?>
            <?= $this->Form->input('mail', array('label' => 'Email', 'class'=>'form-control')); ?>
            <?= "<br/>"; ?>
            <?= $this->Form->button("S'inscrire", array('class'=>"btn btn-lg btn-primary")); ?>
        <?= $this->Form->end(); ?>
    </div>

</div>