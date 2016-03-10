<!-- <?php debug($random_articles); ?> -->
<div class="container marketing">
	
	<div class="row featurette">

	<?php for ($i = 0; $i < 3; $i++) {
		if ($i % 2 == 0) {
			echo "<div class='col-md-7'>";
			echo "<h3 class='section-heading'>".$random_articles[$i]['Post']['title']."</h3>";
			echo "<p class='lead' style='text-align:justify;'>".$this->Text->truncate($random_articles[$i]['Post']['contenu'], 200, array('ellipsis'=>'...', 'exact'=>false))."</p>";
			echo "</div>";
			echo "<div class='col-md-5'>";
			echo "<img class='featurette-image img-responsive center-block' src='http://lorempicsum.com/futurama/500/500/2' alt='Generic placeholder image' width='300px' heigth='300px'>";
			echo "</div>";
		}
	}
	?>
		<div class="col-md-7">
			<h3 class="section-heading">Venez découvrir les joies du SEGFAULT</h3>
			<p class="lead" style="text-align:justify";>Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
		</div>
		<div class="col-md-5">
			<img class="featurette-image img-responsive center-block" src="http://lorempicsum.com/futurama/500/500/2" alt="Generic placeholder image" width="300px" heigth="300px">
		</div>
  	</div>

	<hr class="featurette-divider">

  	<div class="row featurette">
		<div class="col-md-7 col-md-push-5">
	  		<h3 class="section-heading">Configurez votre port Apache</h3>
	  		<p class="lead" style="text-align:justify";>Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
		</div>
		<div class="col-md-5 col-md-pull-7">
			<img class="featurette-image img-responsive center-block" src="http://igalerie.quennec.fr/image.php?id=35" alt="Generic placeholder image" width="300px" heigth="300px">
		</div>
  	</div>

  	<hr class="featurette-divider">

  	<div class="row featurette">
		<div class="col-md-7">
	  		<h3 class="section-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h3>
	  		<p class="lead" style="text-align:justify";>Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
		</div>
		<div class="col-md-5">
	  		<img class="featurette-image img-responsive center-block" src="http://lorempicsum.com/simpsons/500/500/2" alt="Generic placeholder image" width="300px" heigth="300px">
	  		</br></br>
		</div>
  	</div>

</div>