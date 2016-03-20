<?php echo $this->Session->Flash(); ?>
<!-- <?php debug($articles); ?> -->
<div class="row" style="margin-top:70px;">
	<h1>Panneau de contrôle</h1>
	<div class="span12">
		<?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;Publier un article', array('action'=>'admin_edit'), array('class'=> 'btn btn-primary', 'escape'=>false)) ?>
		<br/><br/>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>IDENTIFIANT</th>
					<th>TITRE</th>
					<th>CATEGORIE</th>
					<th>DATE DE PUBLICATION</th>
					<th>ACTIONS</th>
				</tr>
				
			</thead>
			<tbody>
				<?php foreach ($articles as $key => $article): ?>
					<tr>
						<td><?= $article['Post']['id']; ?></td>
						<td><?= $article['Post']['title']; ?></td>
						<td><?= $article['Categories']['title']; ?></td>
						<td><?= $article['Post']['date_post']; ?></td>
						<td>
							<?= $this->Html->link('<i class="fa fa-pencil-square-o"></i>&nbsp;Editer', array('action'=>'admin_edit', $article['Post']['id']), array('escape'=>false)); ?>
							&nbsp; - &nbsp;
							<?= $this->Html->link('<i class="fa fa-trash-o"></i>&nbsp;Supprimer', array('action'=>'admin_delete', $article['Post']['id']), array('confirm'=>"Merci de confirmer la suppression" , 'escape'=>false)); ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>