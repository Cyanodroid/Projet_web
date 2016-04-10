<?php
echo("<div class=\"span12\" style=\"text-align:center;\">");
	echo("<h1 style=\"margin-top : 10%;\">");
		$categories['Categories']['title']; 
	echo("</h1>");
	foreach ($articles as $a){
		echo("<div class=\"col-lg-4\">");
	        echo $this->Html->image('/img/categories/'.$a['Article']['categories_id'].'.jpg', array('height'=>140, 'width'=>140, 'class'=>'img-circle'));
		    echo "<h2>".$a['Article']['title']."</h2>";
		    echo "<p>".$this->Text->truncate($a['Article']['contenu'], 200, array('ellipsis'=>'...', 'exact'=>false))."</p>";
		    echo "<p>".$this->Html->link(__('En savoir plus'), array('controller'=>'posts', 'action'=>'voir', $a['Article']['id']), array('class'=>'btn btn-default', 'role'=>'button'))."</p>";
		echo("</div>");
    }
echo("</div>");

echo("<div class=\"span12\" style=\"text-align:center;\">");
	echo $this->Paginator->numbers(array(
		'before'=>'<ul class="">',
		'separator'=>' / ',
		'currentClass'=>'active',
		'tag'=>'',
		'after'=>'</ul>'
		));
echo("</div>");
?>