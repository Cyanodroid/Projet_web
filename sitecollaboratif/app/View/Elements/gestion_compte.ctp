<h1 style="margin-top: 20%;">Panneau de contrôle</h1>
<ul class="nav nav-pills nav-stacked" style="margin-top: 45px;">
	<li <?php if ($this->request->action == 'account'): ?> class="active"  <?php endif; ?> >
		<?= $this->Html->link('Mon compte', array('controller'=>'users', 'action'=>'account')); ?>
	</li>
	<?php if ($user['User']['groups_id'] == 1): ?>
		<li>
			<?php echo $this->Html->link("Panneau de contrôle", array('controller'=>'admin/posts')); ?>
		</li>
		<li>
			<?php echo $this->Html->link("Gestion des utilisateurs", array('controller'=>'admin/users')) ?>
		</li>
		<li class="disabled">
			<?php echo $this->Html->link("S'abonner", array('action'=>'account')); ?>
		</li>
	<?php else: ?>
		<li>
			<?php echo $this->Html->link("S'abonner", array('controller'=>'Users', 'action'=>'subscribe')); ?>
		</li>
		<li>
			<?php echo $this->Form->create('Newsletter', array('url'=>array('controller'=>'newslettersSender', 'action'=>'sendNewsleter'))); ?>
				<div class="input-group">
							
					<span class="input-group-btn">
						<?php echo $this->Form->button("Spam Newsletter", array('class'=>'btn btn-default')); ?>
					</span>
				</div>
			<?php echo $this->Form->end(); ?>
			<li/>
	<?php endif; ?>

</ul>
