<!-- on va créer un element comme ça on a juste à le call dans le layout -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">

	  <ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner" role="listbox">
		<div class="item active">
			<?php echo $this->Html->image('pexels-photo.jpg', array('class'=>'first-slide', 'alt'=>'First slide')); ?>
		  <div class="container" >
			<div class="carousel-caption" style=" position: absolute;  top: 50%;  z-index: 5;  display: inline-block;  margin-top: -100px;">
			  <h1>Lorem ipsum.</h1>
			  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			  <p><a class="btn btn-lg btn-primary" href="#" role="button">En savoir plus</a></p>
			</div>
		  </div>
		</div>
		<div class="item">
			<?php echo $this->Html->image('people-coffee-notes-tea.jpg', array('class'=>'second-slide', 'alt'=>'Second slide')); ?>
		  <div class="container">
			<div class="carousel-caption" style=" position: absolute;  top: 50%;  z-index: 5;  display: inline-block;  margin-top: -100px;">
			  <h1>Lorem ipsum.</h1>
			  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			  <p><a class="btn btn-lg btn-primary" href="#" role="button">En savoir plus</a></p>
			</div>
		  </div>
		</div>
		<div class="item">
			<?php echo $this->Html->image('pexels-photo-12064.jpg', array('class'=>'third-slide', 'alt'=>'Third slide')); ?>
		  <div class="container">
			<div class="carousel-caption" style=" position: absolute;  top: 50%;  z-index: 5;  display: inline-block;  margin-top: -100px;">
			  <h1>Lorem ipsum.</h1>
			  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			  <p><a class="btn btn-lg btn-primary" href="#" role="button">En savoir plus</a></p>
			</div>
		  </div>
		</div>
	  </div>
	  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>