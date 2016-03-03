<?php $this->layout = 'default2'; ?>
<div class="row">

    <div class="span12">
        <h1>Changer de mot de passe</h1>

        <?= $this->Form->create('User'); ?>
            <?= $this->Form->input('password', array('label' => "Mot de passe", 'class'=>'form-control')); ?>
            <?= "<br/>"; ?>
            <?= $this->Form->input('password2', array('type' => 'password', 'label' => "Confirmer Mot de passe", 'class'=>'form-control')); ?>
            <?= "<br/>"; ?>
            <?= $this->Form->button("Valider", array('class'=>"btn btn-lg btn-primary")); ?>
        <?= $this->Form->end(); ?>
    </div>

</div>