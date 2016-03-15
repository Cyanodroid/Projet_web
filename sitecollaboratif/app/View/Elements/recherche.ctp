<!-- on va créer un element comme ça on a juste à le call dans le layout -->
</div>
</div>
</div> 
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="section-heading">
					Rechercher un article
				</h2>
				<?php echo $this->Form->create('Post',array('id' => 'textBox', 'type' => 'post','url' => array('controller' => 'posts', 'action' => 'resultSearch'))); ?>
					<div class="input-group">
						<?php echo $this->Form->input('search', array('label'=>"",'id'=>'search', 'class'=>'form-control')); ?>
							<span class="input-group-btn">
								<?php echo $this->Form->button('Rechercher', array('class'=>'btn btn-default')); ?>
							</span>
					</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</section>
<div class="container marketing" style="margin-top:48px;">
<div class="row">
<div id="content">