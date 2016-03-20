<?php echo $this->Session->Flash(); ?>
<div class="row" style="margin-top:70px;">
	<h1>Gestion des utilisateurs</h1>
	<div class="span12">
		<br/><br/>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>IDENTIFIANT</th>
					<th>PSEUDO</th>
					<th>MAIL</th>
					<th>GROUPE</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $key => $user): ?>
					<tr>
						<td><?= $user['User']['id']; ?></td>
						<td><?= $user['User']['username']; ?></td>
						<td><?= $user['User']['mail']; ?></td>
						<td><?= $user['User']['groups_id']; ?></td>
						<td>
							<?= $this->Html->link('<i class="fa fa-pencil-square-o"></i>&nbsp;Gérer', array('action'=>'admin_edit', $user['User']['id']), array('escape'=>false)); ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>