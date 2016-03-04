<!-- voir la doc pour les Helpers -->
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
	echo $this->Html->charset();
	echo $this->Html->meta(array(
		'name'=>'viewport',
		'content'=>'width=device-width, initial-scale=1.0, minimum-scale=1.0'
		));
	echo $this->Html->meta(array(
		'http-equiv'=>'content-language',
		'content'=>'fr'
		));
	echo $this->Html->meta(array(
		'http-equiv'=>'X-UA-Compatible',
		'content'=>'IE=edge'
		));
	?>
	<title><?php echo $this->fetch('title'); ?></title>
	<?php
		echo $this->Html->css('/css/carousel.css');
		echo $this->Html->css('/css/styles.css');
		echo $this->Html->css('http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300');
		echo $this->Html->css('/css/bootstrap.css');
	?>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<?php echo $this->element('menu'); ?>
	
	<?php echo $this->element('carousel'); ?>

	<div class="container marketing" style="margin-top:48px;">
	  <div class="row">
	  	<div id="content">
	  		<?php echo $this->Flash->render();  ?>
			<?php echo $this->fetch('content'); ?>
			<?php echo $this->Session->flash(); ?>
	  	</div>
	  </div>
	</div>
</br>

	<?php echo $this->element('recherche'); ?>

</br></br></br>

	<div class="container marketing">
	  <div class="row featurette">
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

	<?php echo $this->element('newsletter'); ?>
	<div class="container marketing">

</br></br>

<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2>ABONNEMENTS</h2>
    <h4>Choisir un forfait</h4>
	</br>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Basique</h1>
        </div>
        <div class="panel-body">
          <p><strong>20</strong> Lorem</p>
          <p><strong>15</strong> Ipsum</p>
          <p><strong>5</strong> Dolor</p>
          <p><strong>2</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>10€</h3>
          <h4>par mois</h4>
          <?php echo $this->Html->link("Souscrire", array('controller'=>'users', 'action'=>'subscribe'), array('class'=>'btn btn-primary')); ?>
        </div>
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Premium</h1>
        </div>
        <div class="panel-body">
          <p><strong>50</strong> Lorem</p>
          <p><strong>25</strong> Ipsum</p>
          <p><strong>10</strong> Dolor</p>
          <p><strong>5</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>20€</h3>
          <h4>par mois</h4>
          <?php echo $this->Html->link("Souscrire", array('controller'=>'users', 'action'=>'subscribe'), array('class'=>'btn btn-primary')); ?>
        </div>
      </div>      
    </div>    
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Modération</h1>
        </div>
        <div class="panel-body">
          <p><strong>100</strong> Lorem</p>
          <p><strong>50</strong> Ipsum</p>
          <p><strong>25</strong> Dolor</p>
          <p><strong>10</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>Bénévolat</h3>
          <h4>Rédaction d'articles</h4>
          <?php echo $this->Html->link("Souscrire", array('controller'=>'users', 'action'=>'subscribe'), array('class'=>'btn btn-primary')); ?>
        </div>
      </div>     
    </div>   
	</div>

	  <footer>
		<p>&copy; 2016 Aix-Marseille-Universite. &middot;</p>
	  </footer>

	</div>
	
</body>
</html>
