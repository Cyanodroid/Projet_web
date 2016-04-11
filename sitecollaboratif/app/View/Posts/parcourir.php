<?php
echo("<div class=\"span12\" style=\"text-align:center;\">");
	echo("<h1 style=\"margin-top : 10%;\">");
		$categories['Categories']['title'];
	echo("</h1>");
	foreach ($articles as $a){
		echo("<div class=\"col-xs-6 col-md-4\">");
	        echo $this->Html->image('/img/categories/'.$a['Post']['categories_id'].'.jpg', array('height'=>140, 'width'=>140, 'class'=>'img-circle'));
		    echo "<h2>".$a['Post']['title']."</h2>";
		    echo "<p>".$this->Text->truncate($a['Post']['contenu'], 200, array('ellipsis'=>'...', 'exact'=>false))."</p>";
		    echo "<p>".$this->Html->link(__('En savoir plus'), array('controller'=>'posts', 'action'=>'voir', $a['Post']['id']), array('class'=>'btn btn-default', 'role'=>'button'))."</p>";
		echo("</div>");
    }
echo("</div>");
?>
