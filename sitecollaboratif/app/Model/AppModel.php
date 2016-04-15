<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	public function sizeimg($check, $width, $height, $limit) {
		// debug(func_get_args());
		$field = key($check);
		$val = $check[$field];

		if (empty($val['tmp_name'])) {
			return true;
		}

		$file = pathinfo(strtolower($val['name']));
		//debug($file); debug($val);
		if (!in_array($file['extension'], array('jpg', 'jpeg', 'png'))) {
			return false;
		}

		$size = getimagesize($val['tmp_name']);
		//debug($size);
		return $size[0] > $width && $size[1] > $height;

	}

	// reformatage de request->data
	public function read_all_language() {
		$datas = $this->read();
		$this->name = 'Post';
		foreach ($datas as $field => $trads) {
			if (strpos($field, 'Translate') === (strlen($field) - strlen('Translate'))) {
				$title = str_replace('Translate', '', $field);
				$datas[$this->name][$title] = array();
				foreach ($trads as $trad) {
					$locale = $trad['locale'];
					$datas[$this->name][$title][$locale] = $trad['content'];
				}
			}
		}
		return $datas;
	}
}
