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
          <h1>Premium</h1>
        </div>
        <div class="panel-body" style="font-size: 140%;">
          <p></br></br><strong>Devenez un de nos membres premium !</strong></p>
          <p>Passez prioritaire sur le tchat et téléchargez les PDF des cours.</br></br></p>
        </div>
        <div class="panel-footer" style="font-size: 140%;">
          <h3>Seulement 5€</h3>
          <h4>par mois</br></h4>
          <?php echo $this->Html->link("Souscrire", array('controller'=>'users', 'action'=>'subscribe'), array('class'=>'btn btn-primary')); ?>
        </div>
      </div>      
    </div>    
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Modération</h1>
        </div>
        <div class="panel-body" style="font-size: 140%;">
          <p></br></br><strong>Vous souhaitez participer à la vie du site ?</strong></p>
          <p>Candidatez et choisissez de devenir rédacteur ou modérateur de notre tchat !</br></br></p>
        </div>
        <div class="panel-footer" style="font-size: 140%;">
          <h3>Bénévolat</h3>
          <h4>Rédaction d'articles</br></h4>
          <?php echo $this->Html->link("Postuler", array('controller'=>'users', 'action'=>'candidate'), array('class'=>'btn btn-primary')); ?>
        </div>
      </div>     
    </div>   
	</div>
</div>
	