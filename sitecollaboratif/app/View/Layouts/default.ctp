<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?><!--
<nobr>
 ______     __     __  __     __    __     ______     ______     ______     ______     __     __         __         ______     <br />
/\  __ \   /\ \   /\_\_\_\   /\ "-./  \   /\  __ \   /\  == \   /\  ___\   /\  ___\   /\ \   /\ \       /\ \       /\  ___\    <br />
\ \  __ \  \ \ \  \/_/\_\/_  \ \ \-./\ \  \ \  __ \  \ \  __<   \ \___  \  \ \  __\   \ \ \  \ \ \____  \ \ \____  \ \  __\    <br />
 \ \_\ \_\  \ \_\   /\_\/\_\  \ \_\ \ \_\  \ \_\ \_\  \ \_\ \_\  \/\_____\  \ \_____\  \ \_\  \ \_____\  \ \_____\  \ \_____\  <br />
  \/_/\/_/   \/_/   \/_/\/_/   \/_/  \/_/   \/_/\/_/   \/_/ /_/   \/_____/   \/_____/   \/_/   \/_____/   \/_____/   \/_____/  <br />
<br />
 __  __     __   __     __     __   __   ______     ______     ______     __     ______	    ______     <br />
/\ \/\ \   /\ "-.\ \   /\ \   /\ \ / /  /\  ___\   /\  == \   /\  ___\   /\ \   /\__  _\   /\  ___\    <br />
\ \ \_\ \  \ \ \-.  \  \ \ \  \ \ \'/   \ \  __\   \ \  __<   \ \___  \  \ \ \  \/_/\ \/   \ \  __\    <br />
 \ \_____\  \ \_\\"\_\  \ \_\  \ \__|    \ \_____\  \ \_\ \_\  \/\_____\  \ \_\    \ \_\    \ \_____\  <br />
  \/_____/   \/_/ \/_/   \/_/   \/_/      \/_____/   \/_/ /_/   \/_____/   \/_/     \/_/     \/_____/  <br />
</nobr>-->
<!DOCTYPE html>
<html>
<head>
	<?php
	echo $this->Html->charset();
	echo $this->Html->meta(array(
		'name'=>'viewport',
		'content'=>'width=device-width, initial-scale=1.0, minimum-scale=1.0'
		));
	echo $this->Html->meta(array(
		'http-equiv'=>'content-language',
		'content'=>'fr'
		));
	echo $this->Html->meta(array(
		'http-equiv'=>'X-UA-Compatible',
		'content'=>'IE=edge'
		));
	?>
	<title><?php echo $this->fetch('title'); ?></title>
	<?php
		echo $this->Html->css('/css/bootstrap.css');
		echo $this->Html->css('/css/full-slider.css');
		echo $this->Html->css('/css/styles.css');

		echo $this->Html->css('http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300');
	?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<?php echo $this->element('menu'); ?>

	<?php echo $this->element('carousel'); ?>

	<div class="container marketing" style="margin-top:3%;">
	  <div class="row">
	  	<div id="content">
	  		<?php echo $this->Flash->render();  ?>
			<?php echo $this->fetch('content'); ?>
			<?php echo $this->Session->flash(); ?>
	  	</div>
	  </div>
	</div>

	<footer>
		<p>&copy; 2016 Aix-Marseille-Universite. &middot;</p>
		<?php echo $this->element('sql_dump'); ?>
	</footer>

	<?php
		echo $this->Html->script('/js/jquery-1.12.0.min.js');
		echo $this->Html->script('/js/app.js');
		echo $this->Html->script('/js/bootstrap.min.js');
	?>
</body>
</html>
