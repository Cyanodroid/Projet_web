<?php
// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

// mode développement
Configure::write('Paypal', array(
	'mail'=>'xxxxx@paypal.com', // verifier l'email pour éviter les faux paiements !!!
	'USER'=>'xxxxxapi1.paypal.com',
	'PSW'=>'xxxxxx',
	'SIGNATURE'=>'xxxxxxx',
	'sandbox'=> 'sandbox.' // savoir si on est en test mode ou pas 
	)
);

Configure::write('Site', array(
	'prices'=>array(
		1=>10,
		3=>25,
		6=>50)));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));

CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

Configure::write('Site_Contact', array(
	'mail' => 'site.collaboratif.test@gmail.com'
));

App::uses('CakeLog', 'Log');
CakeLog::config('tchat', array('engine'=>'FileLog'));
