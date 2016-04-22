<?php
	$this->layout = "default2";

	//titre
	echo("<h1 style=\"margin-top: 100px;\">");
		echo __("S'abonner au site");
		echo("</h1>");
	echo("<div class=\"container marketing\">");
	  echo("</br></br>");
	  echo $this->element('prices_subscribe');
	echo("</div>");

	//application Paypal
	echo("<div class=\"centered\">");
		echo("<form action=\"le_site\" method=\"post\" target=\"_top\">");
			echo("<input type=\"hidden\" name=\"cmd\" value=\"la_valeur\">");
			echo("<input type=\"hidden\" name=\"hosted_button_id\" value=\"la_valeur\">");
			echo("<input type=\"image\" src=\"une_image\" border=\"0\" name=\"submit\" alt=\"PayPal, le réflexe sécurité pour payer en ligne\">");
			echo("<img alt=\"\" border=\"0\" src=\"une_image\" width=\"1\" height=\"1\">");
		echo("</form>");
	echo("</div>");
 ?>
