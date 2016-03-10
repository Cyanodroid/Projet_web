<?php
	$this->layout = 'default2';
	echo $this->Session->flash();
?>
<div class="span12" style="text-align:center;">
	<h1 style="margin-top : 10%;">FAQ</h1>
	<div id="pricing" class="container-fluid">
		<div class="text-center">
		    <h2>Nos développeurs :</h2>
		</br>
		</div>
		<div class="row slideanim">
		    <div class="col-sm-4B col-xs-12">
		      <div class="panel panel-default text-center">
		        <div class="panel-heading">
		          <h3>Arnault</h3>
		        </div>
		        <div class="panel-body">
		        	<?php echo $this->Html->image('avatars/arno.jpg', array('class'=>'avatar')); ?>
		        </div>
		        <div class="panel-footer">
		        	<p>Notre grand et beau designer, souverain du CSS.</p>
		        </div>
		      </div>      
		    </div>     
		    <div class="col-sm-4B col-xs-12">
		      <div class="panel panel-default text-center">
		        <div class="panel-heading">
		          <h3>Claire</h3>
		        </div>
		        <div class="panel-body">
		        	<?php echo $this->Html->image('avatars/clay.jpg', array('class'=>'avatar')); ?>
		        </div>
		        <div class="panel-footer">
		        	<p>Celle qui fait les bêtises sur Github mais pas que.</p>
		        </div>
		      </div>      
		    </div>  
		    <div class="col-sm-4B col-xs-12">
		      <div class="panel panel-default text-center">
		        <div class="panel-heading">
		          <h3>Nicolas</h3>
		        </div>
		        <div class="panel-body">
		        	<?php echo $this->Html->image('avatars/nico.jpg', array('class'=>'avatar')); ?>
		        </div>
		        <div class="panel-footer">
		        	<p>Le troll qui voulait à tout prix utiliser CakePhp !</p>
		        </div>
		      </div>      
		    </div>  
		    <div class="col-sm-4B col-xs-12">
		      <div class="panel panel-default text-center">
		        <div class="panel-heading">
		          <h3>Thomas</h3>
		        </div>
		        <div class="panel-body">
		        	<?php echo $this->Html->image('avatars/simi.jpg', array('class'=>'avatar')); ?>
		        </div>
		        <div class="panel-footer">
		        	<p>Galérien en dev web mais cuisinier hors-pair.</p>
		        </div>
		      </div>      
		    </div>  
		</div>
	</div>
	<div class="text-center">
	    <h2>Questions fréquentes :</h2>
		</br>
	</div>
</div>
<div text-align="left">
	<ul>
		<li><h4>Quel est l'objectif de ce site ?</h4></li>
		<p>Ce site est un site collaboratif permettant à tout utilisateur d'apprendre plusieurs langages informatiques.</p>
		<li><h4>J'ai une question.</h4></li>
		<p>Lorsque vous avez une question, deux choix s'offrent à vous. Vous pouvez soit aller sur le tchat, soit aller dans la section archive. Dans le premier cas, vous pouvez choisir la salle qui correspond à la catégorie de votre question et la poser aux autres utilisateurs et au modérateur responsable. Sinon, vous pouvez chercher dans les archives si votre question a déjà été posée et ainsi, trouver la réponse.</p>
		<li><h4>Personne n'est connecté sur le chat.</h4></li>
		<p>Si personne n'est connecté sur le site alors votre message va être envoyé au modérateur responsable de la salle de tchat où vous vous trouvez. Il répondra à votre question dès qu'il le pourra.</p>
		<li><h4>Je veux être tenu au courant des nouveautés.</h4></li>
		<p>Pour être au courant de toutes nos nouveautés (articles sortis), vous pouvez souscrire à notre newsletter.</p>
		<li><h4>Quels sont les avantages d'un abonnement ?</h4></li>
		<p>Lorsque vous choisissez de vous abonner et de devenir un utilisateur premium, vous devenez prioritaire lors de vos discussions sur le tchat. Vos questions seront traitées en priorité par les modérateurs. Vous aurez aussi la possibilité de télécharger les différents cours/articles sous forme de PDF.</p>
	</ul>
</div>

