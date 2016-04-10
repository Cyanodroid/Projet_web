Bonjour, <br/>
<br/><br/>
Merci <?= $username; ?> pour votre inscription.<br/>
<br/>
Afin de finaliser votre compte, merci de vous rendre sur ce lien : <br/>
<?= $this->Html->url(array('controller'=>'users', 'action'=>'activate', $id, $token), true); ?><br/>
<br/>
Merci.