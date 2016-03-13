<?php echo $this->Session->Flash(); ?>
<div class="row" style="margin-top:70px;">
	<h1>Gestion d'un utilisateur</h1>
	<div class="span12">
			<?= $this->Form->create('User'); ?>
				<?= $this->Form->input('User.id'); ?>
				<br/>
				<?= $this->Form->input('User.username', array('label'=>"Nom d'utilisateur", 'disabled'=>true, 'class'=>'form-control', 'placeholder'=>$user['User']['username'])); ?>
				<br/>
				<?= $this->Form->input('User.groups_id', array('label' => "Groupe de l'utilisateur", 'class'=>'form-control', 'options'=>array('', 'administrateur', 'utilisateur', 'utilisateur premium'))); ?>
				<br/>
				<?= $this->Form->input('User.end_subscription', array('label' => "Fin d'abonnement : ", 'dateFormat'=>'DMY')); ?>
				<br/>
				<?= $this->Form->button('Enregistrer', array('class'=>"btn btn-lg btn-primary")); ?>
			<?= $this->Form->end();
		?>
	</div>
</div>
