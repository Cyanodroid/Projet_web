<?php $this->layout = 'default2'; ?>
<?php echo $this->Session->Flash(); ?>
<div class="row">
	<div class="col-lg-6" style="margin-left:60px;">
	</br></br></br></br>
		<h1 >Mon compte</h1>
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-lg-2">
			<?php if ($this->Session->read('Auth.User.avatar')): ?>
                <?= $this->Html->image($this->Session->read('Auth.User.avatari'), array('class'=>'preview-avatar')); ?>
            <?php endif ?>
            
			</div>
			<div class="col-lg-6" style="margin-left:30px;">
				<?php 
				echo $this->Form->create('User', array('type'=>'file'));
					echo $this->Form->input('avatarf', array('type'=>'file', 'label'=>'Avatar (.jpg)'));
					echo "<br/>";
					echo $this->Form->input('username', array('label'=>"Nom d'utilisateur", 'disabled'=>true, 'class'=>'form-control', 
						'value'=>$this->Session->read('Auth.User.username')));
					echo $this->Form->input('password2', array('type' => 'password', 'label' => "Confirmer Mot de passe", 'class'=>'form-control'));
           				 "<br/>";
					echo $this->Form->input('mail', array('label' => 'Email', 'class'=>'form-control')) ;

					echo "<br/>";
					echo $this->Form->button('Modifier', array('class'=>"btn btn-lg btn-primary"));
				echo $this->Form->end();
				 ?>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
	<?php echo $this->element('gestion_compte'); ?>
	</div>
</div>
