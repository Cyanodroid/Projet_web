<!-- on va créer un element comme ça on a juste à le call dans le layout -->
<!-- affiche les messages flash -->
<?php echo $this->Session->flash(); ?>  
<section style="margin-left:-50%; margin-right:-50%;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="section-heading">
						S'inscrire à la newsletter
					</h2>
					<?php echo $this->Form->create('Newsletter', array('url'=>array('controller'=>'newsletters', 'action'=>'newsletter'))); ?>
						<div class="input-group">
							<?php echo $this->Form->input('email', array('label'=>"",'id'=>'mail', 'class'=>'form-control')); ?>
								<span class="input-group-btn">
									<?php echo $this->Form->button("S'inscrire", array('class'=>'btn btn-default')); ?>
								</span>
						</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</section>