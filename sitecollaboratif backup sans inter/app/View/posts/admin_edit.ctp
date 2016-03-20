<?php echo $this->Session->Flash(); ?>
<div class="row" style="margin-top:70px;">
	<h1>Poster un article</h1>
	<div class="span12">
		
			<?= $this->Form->create('Post', array('type'=>'file')); ?>
				<?= $this->Form->input('Post.id'); ?>
				<br/>
				<?= $this->Form->input('Post.title', array('label' => "Titre de l'article", 'class'=>'form-control')); ?>
				<br/>
				<?= $this->Form->input('Post.categories_id', array('label' => "Catégorie de l'article", 'class'=>'form-control', 'options'=>$cats)); ?>
				<br/>
				<?= $this->Form->input('imageart', array('type'=>'file', 'label'=>'Image (.jpg, .jpeg, .png)')); ?>
				<br/>
				<?= $this->Form->input('Post.contenu', array('label' => "Contenu de l'article", 'class'=>'form-control')); ?>
				<br/>
				<?= $this->Form->input('Post.date_post', array('label' => "Date ", 'dateFormat'=>'DMY')); ?>
				<br/>
				<?= $this->Form->button('Publier maintenant', array('class'=>"btn btn-lg btn-primary")); ?>
			<?= $this->Form->end();
		?>
	</div>
</div>