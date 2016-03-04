<div class="col-xs-12">
<?php 
foreach ($articles as $a): ?>
	<div class="col-lg-4">
	    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
	    <?php echo "<h2>".$a['Post']['title']."</h2>"; ?>
	    <?php echo "<p>".$this->Text->truncate($a['Post']['contenu'], 200, array('ellipsis'=>'...', 'exact'=>false))."</p>"; ?>
	    <?php echo "<p>".$this->Html->link('En savoir plus', array('action'=>'voir', $a['Post']['id']), array('class'=>'btn btn-default', 'role'=>'button'))."</p>" ?>
	</div>
<?php endforeach ?>
</div>
<div class="span12" style="text-align:center;">
	<?php 
	echo $this->Paginator->numbers(array(
		'before'=>'<ul class="pagination pagination-lg">',
		'separator'=>'',
		'currentClass'=>'active',
		'tag'=>'li',
		'after'=>'</ul>'
		)
	);
?>
</div>
