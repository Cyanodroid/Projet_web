<?php
	$this->layout = 'default2';
	echo $this->Session->flash();
	echo("<div class=\"span12\" style=\"text-align:center;\">");
		echo("<h1 style=\"margin-top : 10%;\">");
			echo __("Archives");
		echo("</h1>");
	echo("</div>");
?>