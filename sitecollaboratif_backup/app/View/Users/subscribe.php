<?php 
$this->layout = "default2";
echo("<h1 style=\"margin-top: 100px;\">");
	echo __("S'abonner au site");
	echo("</h1>");
echo("<div class=\"container marketing\">");
  echo("</br></br>");
  echo $this->element('prices_subscribe');
echo("</div>");

echo("<div class=\"centered\">");	
	echo("<form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">");
		echo("<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">");
		echo("<input type=\"hidden\" name=\"hosted_button_id\" value=\"FEKEWV8WZ47H8\">");
		echo("<input type=\"image\" src=\"https://www.sandbox.paypal.com/fr_FR/FR/i/btn/btn_subscribeCC_LG.gif\" border=\"0\" name=\"submit\" alt=\"PayPal, le réflexe sécurité pour payer en ligne\">");
		echo("<img alt=\"\" border=\"0\" src=\"https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif\" width=\"1\" height=\"1\">");
	echo("</form>");
echo("</div>");
 ?>
