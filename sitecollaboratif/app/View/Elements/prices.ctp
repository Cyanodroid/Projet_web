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
</div>
	