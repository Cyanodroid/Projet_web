<!-- <?php debug($random_articles); ?> -->
<div class="container marketing">
	
	<div class="row featurette">

	<?php for ($i = 0 ; $i < 3 ; $i++) {
		if ($i % 2 == 0) {
			echo "<div class='col-md-7'>";
			echo "<h3 class='section-heading'>".$random_articles[$i]['Post']['title']."</h3>";
			echo "<p class='lead' style='text-align:justify;'>".$this->Text->truncate($random_articles[$i]['Post']['contenu'], 200, array('ellipsis'=>'...', 'exact'=>false))."</p>";
			echo "</div>";
			echo "<div class='col-md-5'>";
			echo $this->Html->image('http://lorempicsum.com/futurama/500/500/2', array('class'=>'featurette-image img-responsive center-block', 'width'=>'300px', 'heigth'=>'300px'));
			echo "</div>";
		} else {
			echo "<div class='row featurette'>";
			echo "<div class='col-md-7 col-md-push-5'>";
			echo "<h3 class='section-heading'>".$random_articles[$i]['Post']['title']."</h3>";
			echo "<p class='lead' style='text-align:justify;'>".$this->Text->truncate($random_articles[$i]['Post']['contenu'], 200, array('ellipsis'=>'...', 'exact'=>false))."</p>";
			echo "</div>";
			echo "<div class='col-md-5 col-md-pull-7'>";
			echo $this->Html->image('http://lorempicsum.com/futurama/500/500/2', array('class'=>'featurette-image img-responsive center-block', 'width'=>'300px', 'heigth'=>'300px'));
			echo "</div>";
		}
	}
	?>
	</div>
</div>