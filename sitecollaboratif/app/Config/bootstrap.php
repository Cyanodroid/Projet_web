<?php
// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

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

ini_set('intl.default_locale', 'fra');