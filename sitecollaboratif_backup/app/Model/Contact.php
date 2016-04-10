<?php
	class Contact extends AppModel {
		public $name = 'Contact';
		public $validate = array();
		public $useTable = false ; // ne pas utiliser de base de donnée
	    
	    // ce qui va nous servir de validation pour le formulaire de contact
		public function __construct($id = false, $table = null, $ds = null) {
			parent::__construct($id, $table, $ds);
			
			$this->validate = array(
				'name' => array(
					'required' => array('rule' => 'notBlank', 'required' => true, 'message' => __('Champ requis')),
				),
				'email' => array(
					'email' => array('rule' => 'email', 'message' => __('E-mail non valide')),
					'required' => array('rule' => 'notBlank', 'required' => true, 'message' => __('Champ requis')),
				),
				'message' => array(
					'required' => array('rule' => 'notBlank', 'required' => true, 'message' => __('Champ requis'))
				)
		    );
		}
	}
?>
