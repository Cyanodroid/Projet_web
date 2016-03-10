<?php
	$this->layout = 'default2';
	echo $this->Session->flash();
?>
<div class="span12" style="text-align:center;">
	<h1 style="margin-top : 10%;">Articles</h1>
	<div class="form">
		<form>
		  	<p>
		    	Catégorie d'article :
		    	<!--
		    	<?php foreach ($categories as $b): ?>
					<input type="radio"></input> 
		    		<label>$b['categories']['title']</label>
				<?php endforeach ?>
				-->
		   	</p>
		</form>
	</div>
</div>
