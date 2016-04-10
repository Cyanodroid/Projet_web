<?php
	class Comment extends AppModel {
		var $name = 'Comment';
        // voir la doc pour les belongsto, hasone etc
        // ici on dit qu'un commentaire appartient à un article
		var $belongsTo = array('User', 'Post');

        // on evite les injections en sécurisant les données
        // raison : le navigateur comprend les scripts donc évite de se faire ... 
        function beforeSave($options = array()) {
            App::uses('Sanitize', 'Utility');
            $this->data['Comment']['contenu'] = Sanitize::html($this->data['Comment']['contenu']);
            return true;
        }
	}
?>