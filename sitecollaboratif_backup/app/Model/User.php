<?php
	class User extends AppModel {

		public $virtualFields = array(
			'premium' => 'User.end_subscription > NOW()'
		);

		// on va dire ce qui doit être mis dans les champs
		public $validate = array(
			'username'=> array(
				'alpha'=>array(
					'rule' => '/^[a-z0-9A-Z]*$/',
					'message'=>"Votre nom d'utilisateur n'est pas valide"
					),
				'uniq'=>array( // le pseudo unique
					'rule'=>'isUnique',
					'message'=>"Ce pseudo est déjà utilisé"
					)
				),
			'password'=>array(
				'rule'=>'notBlank' // ne doit pas être vide
				),
			'password2'=>array(
				'rule'=>'identicalFields', // password2 doit être identique à password
				'message'=>'Les champs ne correspondent pas'
				),
			'mail'=>array(
				'mail'=>array(
					'rule'=>'email', // ce qui est rentrer doit être un mail
					'message'=>"Cette adresse mail n'est pas valide"
					),
				'uniq' => array( // unique toutjours pour la même raison
                	'rule' => 'isUnique',
               		'message' => "Cette adresse mail est déjà utilisée"
            		)
				),
			'avatarf' => array(
				'required' => false,
				'rule' => 'isJpg', // format jpg
				'message'=> "Le format est invalide"
				)
		);

		// vérification des mdps
		public function identicalFields($check, $limit) {
			$field = key($check);
			return $check[$field] == $this->data['User']['password'];
		}

		// on va vérifier l'extension du fichier
		public function isJpg($check, $limit) {
			$field = key($check);
			$filename = $check[$field]['name'];
			// il n'y a pas de fichier ? pas de problème alors
			if (empty($filename)) {
				return true;
			} else {
				$info = pathinfo($filename);
				return strtolower($info['extension']) == 'jpg';
			}
		}

		// existe déjà, voir la doc (téléchargement de l'avatar), appel automatique
		public function afterFind($results, $primary = false){
	        foreach($results as $k=>$result){
	            if(isset($result[$this->alias]['avatar']) && isset($result[$this->alias]['id'])){
	                $results[$k][$this->alias]['avatari'] = 'avatars/' . ceil($result[$this->alias]['id']/1000) . '/' . $result[$this->alias]['id'] . '.jpg';
	            }
	        }
	        return $results;
 	   }

}
