<div class="span12" style="text-align:center;">
	<h1 style="margin-top : 10%;">Articles par catégories</h1>

	<div class="row slideanim" style="margin-top : 2%;">  
	<?php foreach ($categories as $c): ?>

    	<div class="col-sm-4 col-xs-12">
    		<div class="panel panel-default text-center">
        		<div class="panel-heading">
        			<h1><?= $c['Categories']['title']; ?></h1>
        		</div>
        		<div class="panel-body">
					<?php echo $this->Html->image('/img/categories/'.$c['Categories']['id'].'.jpg', array('height'=>140, 'width'=>140, 'class'=>'img-circle')); ?>
        			<p><strong>Découvrez nos articles sur la <?= $c['Categories']['title']; ?> !</strong></p>
        		</div>
        		<div class="panel-footer">
        			<?php echo $this->Html->link("Parcourir les articles", array('action'=>'parcourir', $c['Categories']['id']), array('class'=>'btn btn-primary')); ?>
        		</div>
    		</div>      
    	</div>

    <?php endforeach; ?>      
	</div>
</div>

<div class="span12" style="text-align:center;">
	<h1 style="margin-top : 10%;">Tous les articles publiés</h1>

	<?php foreach ($all as $l): ?>

	<div class="col-lg-4">
        <?php echo $this->Html->image('/img/categories/'.$l['Article']['categories_id'].'.jpg', array('height'=>140, 'width'=>140, 'class'=>'img-circle')); ?>
	    <?php echo "<h2>".$l['Article']['title']."</h2>"; ?>
	    <?php echo "<p>".$this->Text->truncate($l['Article']['contenu'], 200, array('ellipsis'=>'...', 'exact'=>false))."</p>"; ?>
	    <?php echo "<p>".$this->Html->link('En savoir plus', array('controller'=>'posts', 'action'=>'voir', $l['Article']['id']), array('class'=>'btn btn-default', 'role'=>'button'))."</p>" ?>
	</div>

    <?php endforeach; ?> 

</div>
