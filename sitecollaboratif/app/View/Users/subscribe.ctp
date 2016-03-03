<?php $this->layout = "default2"; ?>
<?php $this->set('title_for_layout', "S'abonner au site"); ?>

<?= $this->Form->create('User'); ?>
<?php foreach (Configure::read('Site.prices') as $key => $value): ?>
	<label class="radio">
		<input type="radio" name="duration" value="<?php echo $key; ?>">
		<?= $key; ?>mois: <?= $value; ?> €
	</label>
<?php endforeach ?>
<?= $this->Form->end("S'abonner"); ?>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="RFA8LF8NJTZUG">
<table>
<tr><td><input type="hidden" name="on0" value=""></td></tr><tr><td><select name="os0">
	<option value="1 mois">1 mois : €10,00 EUR - mensuel</option>
	<option value="3 mois">3 mois : €25,00 EUR - mensuel</option>
	<option value="6 mois">6 mois : €50,00 EUR - mensuel</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="EUR">
<input type="image" src="https://www.sandbox.paypal.com/fr_FR/FR/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
<img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>