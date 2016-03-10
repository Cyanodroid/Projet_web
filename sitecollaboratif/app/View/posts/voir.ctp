<?php $this->layout = 'articles'; ?>
<?php echo $this->Session->flash(); ?>
<div class="col-lg-8">
	<?php echo "<h1>".$a['Post']['title']."</h1>" ?>
    <p><?php echo $a['Categories']['title']; ?></p>

    <p><span class="glyphicon glyphicon-time"></span> <?= $this->Time->timeAgoInWords($a['Post']['date_post']); ?></p>
    <hr>
    <?php if ($a['Post']['image'] == 1): ?>
        <?php echo $this->Html->image('/img/articles/'.$a['Post']['id'].'.jpg', array('height'=>400, 'width'=>750)); ?>
    <?php else: ?>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
    <?php endif ?>
	
    <hr>
	
	<?php echo "<p>".$a['Post']['contenu']."</p>"; ?>

	<hr>

	<div class="well">
        <h4>Publiez un commentaire :</h4>
        	<?php echo $this->Form->create('Comment', array('url'=>array('controller'=>'posts', 'action'=>'voir', $a['Post']['id']))); ?>
	            <div class="form-group">
					<?php echo $this->Form->input('contenu', array('label'=>false)); ?>
				</div>
				<?php echo $this->Form->button('Envoyer', array('class'=>'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
    </div>

    <hr>
    <!--nocache-->
	<?php foreach ($c as $com): ?>
    <div class="media">
        <div class="col-lg-2">
	        <?php if ($com['User']['avatar']): ?>
	            <?= $this->Html->image($com['User']['avatari'], array('class' => 'avatar img-circle')); ?>
	       	<?php else: ?>
            	<img class="media-object img-circle" src="http://placehold.it/64x64" alt="">
        	<?php endif ?>
        </div>
        <div class="media-body">
	        <h4 class="media-heading">
	        <strong><?= $com['User']['username']; ?></strong>
	        </h4>
	       	<?php echo "<p>".$com['Comment']['contenu']."</p>"; ?>
	       	<?php if ($this->Session->read('Auth.User.id') == $com['User']['id']): ?>
	        <p>
                <?= $this->Form->postLink('<i class="fa fa-trash-o"></i> Supprimer ce commentaire', array('action' => 'delete', 'controller' => 'posts', $com['Comment']['id']), array('class' => 'btn btn-danger', 'escape' => false), 'Voulez vous vraiment supprimer ?'); ?>
            </p>
            <?php endif ?>
        </div>
    </div>
    <hr>
	<?php endforeach ?>
	<!--nocache-->
</div>
<div class="col-lg-4">
	<p>&nbsp;</p>
        <div class="col-sm-4">
        	<button class="button share_twitter" data-url="http://www.site-collaboratif.fr/" style="background-color:#55ACEE">
                <svg><use xlink:href="../../app/webroot/img/sprite.svg#twitter"></use></svg>
            </button>
        </div>
       	<div class="col-sm-4">
        	<button class="button share_facebook" data-url="http://www.site-collaboratif.fr/" style="background-color:#4C67A1">
                <svg><use xlink:href="../../app/webroot/img/sprite.svg#facebook"></use></svg>
            </button>
        </div>  
        <div class="col-sm-4">
        	 <button class="button share_gplus" data-url="http://www.site-collaboratif.fr/" style="background-color:#D23F31">
                <svg><use xlink:href="../../app/webroot/img/sprite.svg#gplus"></use></svg>
            </button>
        </div>
</div>