<!-- <?php debug($articles); ?> -->


<div class="span12" style="text-align:center;">
	<h1 style="margin-top : 10%;"><?= $categories['Categories']['title']; ?></h1>

	<?php foreach ($articles as $a): ?>

	<div class="col-lg-4">
        <?php echo $this->Html->image('/img/categories/'.$a['Article']['categories_id'].'.jpg', array('height'=>140, 'width'=>140, 'class'=>'img-circle')); ?>
	    <?php echo "<h2>".$a['Article']['title']."</h2>"; ?>
	    <?php echo "<p>".$this->Text->truncate($a['Article']['contenu'], 200, array('ellipsis'=>'...', 'exact'=>false))."</p>"; ?>
	    <?php echo "<p>".$this->Html->link('En savoir plus', array('controller'=>'posts', 'action'=>'voir', $a['Article']['id']), array('class'=>'btn btn-default', 'role'=>'button'))."</p>" ?>
	</div>

    <?php endforeach; ?> 

</div>

<div class="span12" style="text-align:center;">
	<?php 
	echo $this->Paginator->numbers(array(
		'before'=>'<ul class="">',
		'separator'=>' / ',
		'currentClass'=>'active',
		'tag'=>'',
		'after'=>'</ul>'
		));
	?>
</div>