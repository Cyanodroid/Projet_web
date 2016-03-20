<?php $this->layout = "default2"; ?>

<h1 style="margin-top: 100px;">S'abonner au site</h1>

<div class="container marketing">
  </br></br>
  <?php echo $this->element('prices_subscribe'); ?>
</div>

<div class="centered">	
	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="FEKEWV8WZ47H8">
		<input type="image" src="https://www.sandbox.paypal.com/fr_FR/FR/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
		<img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
	</form>
</div>

