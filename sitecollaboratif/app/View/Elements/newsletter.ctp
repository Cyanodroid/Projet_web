<!-- on va créer un element comme ça on a juste à le call dans le layout -->
<!-- affiche les messages flash -->
</div>
</div>
</div>
<section > <!-- style="margin-left:-50%; margin-right:-50%;" -->
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
					<div class="col-lg-12 google">
						<div class="g-recaptcha" data-sitekey="6Lf4FBsTAAAAAKiHLaippD0gapGYWbWO3viCQsTj"></div>
					</div>
				<?php echo $this->Form->end(); ?>
			</div>
			
		</div>
	</div>
</section>
<div class="container marketing" style="margin-top:48px;">
<div class="row">
<div id="content">