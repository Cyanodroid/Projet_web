<?php
	class Newsletter extends AppModel {
		var $name = 'Newsletter';
		var $hasOne = 'User';

		public $validate = array(

			'email'=>array(
				'email'=>array(
					'rule'=>'email',
					'message'=>"Cette adresse mail n'est pas valide"
				), // le mail doit être unique, pas de doublon
				'uniq' => array(
                	'rule' => 'isUnique',
                	'message'=>'Cette adresse mail est déjà utilisée'
            	)
			)
	    );

	    function beforeSave($options = array()) {
            App::uses('Sanitize', 'Utility');
            $this->data['Newsletter']['email'] = Sanitize::html($this->data['Newsletter']['email']);
            return true;
        }
	}
?>
