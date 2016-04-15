<?php
	class Archive extends AppModel {
		var $name = 'Archives';

		// pour éviter tout type d'injection on va sanitize les champs ...
		function beforeSave($options = array()) {
            App::uses('Sanitize', 'Utility');
            if (!empty( $this->data['Archives']['query']))
            	$this->data['Archives']['query'] = Sanitize::html($this->data['Archives']['query']);

            if (!empty( $this->data['Archives']['answer']))
            	$this->data['Archives']['answer'] = Sanitize::html($this->data['Archives']['answer']);
            return true;
        }
	}
