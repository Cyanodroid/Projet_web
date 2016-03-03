<h1>Panneau de contrôle</h1>
<ul class="nav nav-pills nav-stacked">
	<li <?php if ($this->request->action == 'account'): ?> class="active" <?php endif; ?> >
		<?= $this->Html->link('Mon compte', array('controller'=>'users', 'action'=>'account')); ?>
	</li>
	<?php if ($this->Session->read('Auth.User.groups_id') == 1 || $this->Session->read('Auth.User.groups_id') == null): ?>
		<li>
			<?php echo $this->Html->link("Panneau de contrôle", array('controller'=>'admin/posts')); ?>
		</li>
		<li class="disabled">
			<?php echo $this->Html->link("S'abonner", array('action'=>'account')); ?>
		</li>
	<?php else: ?>
		<li>
			<?php echo $this->Html->link("S'abonner", array('action'=>'subscribe')); ?>
		</li>
	<?php endif; ?>

</ul>

<?php echo $this->Session->read('Auth.User.groups_id'); ?>
