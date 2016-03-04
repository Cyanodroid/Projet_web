<?php $this->layout = "default2"; ?>

<h1 style="margin-top: 100px;">S'abonner au site</h1>

<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2>ABONNEMENTS</h2>
    <h4>Choisir un forfait</h4>
	</br>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Basique</h1>
        </div>
        <div class="panel-body">
          <p><strong>20</strong> Lorem</p>
          <p><strong>15</strong> Ipsum</p>
          <p><strong>5</strong> Dolor</p>
          <p><strong>2</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>10€</h3>
          <h4>par mois</h4>
        </div>
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Premium</h1>
        </div>
        <div class="panel-body">
          <p><strong>50</strong> Lorem</p>
          <p><strong>25</strong> Ipsum</p>
          <p><strong>10</strong> Dolor</p>
          <p><strong>5</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>20€</h3>
          <h4>par mois</h4>
        </div>
      </div>      
    </div>    
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Modération</h1>
        </div>
        <div class="panel-body">
          <p><strong>100</strong> Lorem</p>
          <p><strong>50</strong> Ipsum</p>
          <p><strong>25</strong> Dolor</p>
          <p><strong>10</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>Bénévolat</h3>
          <h4>Rédaction d'articles</h4>
        </div>
      </div>     
    </div>   
</div>

<div class="centered">	
	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="RFA8LF8NJTZUG">
	<table>
	<tr><td><input type="hidden" name="on0" value=""></td></tr><tr><td><select name="os0">
		<option value="1 mois">1 mois : €10,00 EUR / mois</option>
		<option value="3 mois">3 mois : €25,00 EUR / mois</option>
		<option value="6 mois">6 mois : €50,00 EUR / mois</option>
	</select> </td></tr>
	</table>
	<input type="hidden" name="currency_code" value="EUR">
	<input type="image" src="https://www.sandbox.paypal.com/fr_FR/FR/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne"style="margin-top: 5px;">
	</form>
</div>

