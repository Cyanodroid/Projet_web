<?php $this->layout = 'default2'; ?>
<div class="row">

    <div class="span12">
        <h1>Se connecter</h1>

        <?= $this->Form->create('User'); ?>
            <?= $this->Form->input('username', array('label' => "Nom d'utilisateur", 'class'=>'form-control')); ?>
            <?= "<br/>"; ?>
            <?= $this->Form->input('password', array('label' => "Mot de passe", 'class'=>'form-control')); ?>
            <?= "<br/>"; ?>
            <p><em><?= $this->Html->link('Mot de passe oublié ?', array('action' => 'forgot')); ?></em></p>
            <?= $this->Form->button('Se connecter', array('class'=>"btn btn-lg btn-primary")); ?>
        <?= $this->Form->end(); ?>
        <p><em><?= $this->Html->link("S'inscrire", array('action' => 'signup')); ?></em></p>
    </div>

</div>