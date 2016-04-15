
<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	// utilisation des composants
	public $components = array(
		'Session',
		'Cookie',
		'Auth'=>array(
			'authenticate'=>array(
				'Form'=>array(
					'scope'=>array('User.active'=>1) // on laisse les utilisateurs inscrits concrètement se connecter
				)
			)
		),
		'RequestHandler'
	);

	public function beforeFilter() {
		parent::beforeFilter();

		// On met à jour la langue dans le config si elle est définie dans la session
		if ($this->Session->check('Config.language')) {
			Configure::write('Config.language', $this->Session->read('Config.language'));
		}

		// liste des pages accessibles sans être connecté
		$this->Auth->allow('index', 'voir', 'resultSearch', 'newsletter', 'parcourir', 'articles', 'flux_rss', 'set_language', 'json_output');

		// si on est en ajax alors on ne définit pas de layout afin de ne pas recharger les éléments qui ne servent pas
		if ($this->request->is('ajax') || $this->RequestHandler->isAjax()) {
			$this->layout = null;
    		Configure::write('debug', 0);
		}

		if (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') {
			$this->layout = 'default2';
		}
    }

	// fonction qui permet de définir la langue du site
	public function set_language($lang) {
		// si la langue qu'on passe en arguement est définie
		if (in_array($lang, Configure::read('Config.languages'))) {
			// on met le tout à jour
			Configure::write('Config.language', $lang);
			$this->Session->write('Config.language', $lang);
		}
		// on revient sur la page
		return $this->redirect($this->referer());
	}
}
