<?php

echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/Projet_web/sitecollaboratif/css/bootstrap.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/Projet_web/sitecollaboratif/css/full-slider.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/Projet_web/sitecollaboratif/css/styles.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300\"/>
<link href=\"http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css\" rel=\"stylesheet\">";

require('../../View/Elements/menu.php');
echo "<script src=\"http://localhost:1337/socket.io/socket.io.js\"></script>
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js\"></script>";
echo "<script src=\"client.js\"></script>";

echo "<div style=\"float:left;width:100px;border-right:1px solid black;height:300px;padding:10px;overflow:scroll-y;\">
	<b>ROOMS</b>
	<div id=\"rooms\"></div>
</div>
<div style=\"float:left;width:300px;height:250px;overflow:scroll-y;padding:10px;\">
	<div id=\"conversation\"></div>
	<input id=\"data\" style=\"width:200px;\" />
	<input type=\"button\" id=\"datasend\" value=\"send\" />
</div>";

?>
