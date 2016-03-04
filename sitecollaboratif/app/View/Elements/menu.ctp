<!-- on va créer un element comme ça on a juste à le call dans le layout -->
<div class="navbar-wrapper">
	  <div class="container">

		<nav class="navbar navbar-inverse navbar-static-top">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <li><?= $this->Html->link("Site collaboratif", "/", array('class'=>'navbar-brand')); ?></li>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="#about">Articles</a></li>
				<li><?php echo $this->Html->link('Tchat', array('controller'=>'Chats', 'action'=>'index', 'admin'=>false)); ?></li> 
				<li><?php echo $this->Html->link('Contact', '/contact'); ?></li>
				<?php if ($this->Session->read('Auth.User.id')): ?>
					<li><?= $this->Html->link("Mon compte", array('controller'=>'users', 'action'=>'account', 'admin'=>false)); ?></li>
					<li><?= $this->Html->link("Se déconnecter", array('controller'=>'users', 'action'=>'logout', 'admin'=>false)); ?></li>
				<?php else: ?>
					<li><?= $this->Html->link("Se connecter", array('controller'=>'users', 'action'=>'login')); ?></li>
				<?php endif ?>
			  </ul>
			</div>
		  </div>
		</nav>
	  </div>
	</div>