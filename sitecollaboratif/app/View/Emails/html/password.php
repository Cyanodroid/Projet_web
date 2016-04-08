Bonjour, <br/>
<br/>
Vous avez demandez un changement de mot de passe.<br/>
<br/>
Si vous avez effectivement demandé ce changement, merci de suivre ce lien :<br/>
<br/>
<?= $this->Html->url(array('controller'=>'users', 'action'=>'password', $id, $token), true); ?><br/>
<br/>
Merci.<br/>