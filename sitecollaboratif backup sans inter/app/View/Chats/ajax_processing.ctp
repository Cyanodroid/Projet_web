<?php foreach ($msg as $m ): ?>
	<div class="chat-message-content">
		<?php echo '<b>'.$m['Users']['username'].': </b>'; ?>
		<?php echo '<p>'.$m['Chat']['contenu'].'</p>'; ?>
		<br/>
	</div>
<?php endforeach; ?>
