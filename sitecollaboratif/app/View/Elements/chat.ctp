<div class="row" style="margin-top: 120px; border: 1px solid black;">

	<div class="col-md-4" style="height: 500px; border-right: 1px solid black;">

		<div class="user-infos" style="margin-top: 20px;">
			<?php if ($this->Session->read('Auth.User.avatar')): ?>
	        	<?= $this->Html->image($this->Session->read('Auth.User.avatari'), array('class'=>'preview-avatar')); ?>
	    	<?php endif ?>
			<b><?= $this->Session->read('Auth.User.username'); ?></b>
		</div>

		<ul class="nav nav-tabs" style="margin-top: 20px;">
			<li class="active"><a data-toggle="tab" href="#home">Utilisateurs connectés</a></li>
			<li><a data-toggle="tab" href="#menu1">Salles</a></li>
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<table class="table table-striped">
				    <tbody>
				    	<?php foreach ($users_list as $u): ?>
				    	<tr>
				        	<td>
				        		<?php if ($u['Users']['avatar'] == 1): ?>
					        		<?= $this->Html->image('/img/avatars/'. ceil($u['Users']['id'] / 1000) . '/' . $u['Users']['id'] . '.jpg', array('class'=>'chat-avatar')); ?>
					    		<?php endif ?>
				        	</td>
				        	<td><?= $u['Users']['username']; ?></td>
				      	</tr>
				      <?php endforeach; ?>
				    </tbody>
			    </table>
			</div>
			<div id="menu1" class="tab-pane fade">
				<table class="table table-striped">
				    <tbody>
				    	<?php foreach ($rooms as $r): ?> 
					    	<tr>
								<?php echo "<td>".$this->Html->link($r['Rooms']['name'], array('action'=>'index', 'id'=>$r['Rooms']['id'], 'current_id'=>$cr['Rooms']['id']))."</td>"; ?>
					      	</tr>
				      	 <?php endforeach ?>
				    </tbody>
			    </table>
			</div>
		</div>
	</div>

	<div class="col-md-8" style="height: 500px;">
		<div style="text-align: center;">
			<?php echo '<h2>'.$cr['Rooms']['name'].'</h2>'; ?>
			<hr>
		</div>
		<div class="chat-message" id="chat-message" style="background-color: #FFF; height: 70%; overflow-y: scroll;">
			<div class="chat-message-content" id="chat-message-content">
				<?php echo $this->Html->image('/img/ajax-loader.gif', array('class'=>'center-block')); ?>
			</div>
		</div>
		
		<form id="chat-form-control">
			<div class="input-group">
				<input id="chat-messsage-input" class="form-control" placeholder="Votre message" autocomplete="off"/>
				<span class="input-group-btn">
					<input type="submit" onclick="EnvoyerMSG();" class="btn btn-default tchat-button" value="Envoyer"/>
				</span>
			</div>
		</form>
	</div>
</div>
