<div class="container marketing">
	
	<div class="row featurette">

	<?php for ($i = 0 ; $i < 3 ; $i++) {
		if ($i % 2 == 0) {
			echo "<div class='content-section-a'>";
				echo "<div class='col-md-7'>";
					echo "<div class='container'>";
						echo "<div class='row'>";
							echo "<div class='col-lg-5 col-sm-6'>";
								echo "<hr class='section-heading-spacer'>";
								echo " <div class='clearfix'></div>";
								echo "<h2 class='section-heading'>".$this->Html->link($random_articles[$i]['Post']['title'], array('controller'=>'Posts', 'action'=>'voir', $random_articles[$i]['Post']['id']))."</h2>";
								echo "<p class='lead' style='text-align:justify;'>".$this->Text->truncate($random_articles[$i]['Post']['contenu'], 200, array('ellipsis'=>'...', 'exact'=>false))."</p>";
							echo "</div>";
							echo "</br></br></br></br>";
							echo "<div class='col-lg-5 col-lg-offset-2 col-sm-6'>";
								echo $this->Html->image('/img/articles/'.$random_articles[$i]['Post']['id'].'.jpg', array('class'=>'featurette-image img-responsive center-block img-rounded', 'width'=>'300px', 'heigth'=>'300px'));
							echo "</div>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
			echo "<br/><br/><br/>";
		} else {
			echo "<div class='content-section-b'>";
				echo "<div class='container'>";
					echo "<div class='row'>";
						echo "<div class='col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6'>";
							echo "<hr class='section-heading-spacer'>";
							echo " <div class='clearfix'></div>";
							echo "<h2 class='section-heading'>".$this->Html->link($random_articles[$i]['Post']['title'], array('controller'=>'Posts', 'action'=>'voir', $random_articles[$i]['Post']['id']))."</h2>";
							echo "<p class='lead' style='text-align:justify;'>".$this->Text->truncate($random_articles[$i]['Post']['contenu'], 200, array('ellipsis'=>'...', 'exact'=>false))."</p>";
						echo "</div>";
						
						echo "<div class='col-lg-5 col-sm-pull-6  col-sm-6'>";
							echo "</br></br></br></br>";
							echo $this->Html->image('/img/articles/'.$random_articles[$i]['Post']['id'].'.jpg', array('class'=>'featurette-image img-responsive center-block img-rounded', 'width'=>'300px', 'heigth'=>'300px'));
						echo "</div>";

					echo "</div>";
				echo "</div>";
			echo "</div>";
			echo "<br/><br/><br/>";
		}
	}
	?>
	</div>
</div>
<br/>
<br/>