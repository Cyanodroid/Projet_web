<?php
	class PostsController extends AppController {
		var $name = "Posts";
		var $uses = array('Post', 'Comment');

		// création d'une pagination
		var $paginate = array(
			'Post'=> array( // sur les posts
				'fields'=>array('id', 'title', 'contenu'), // où l'on récupère que ces trois champs
				'limit'=>3, // on fixe une limite
				'order'=> array( // on les organise du plus récent au plus vieux
					'Post.date_post'=> 'desc'
				)
			)
		);

		// test ajax
		public $components = array('RequestHandler');
		public $helpers = array('Js');
		// fin test

		// page index (page d'accueil quoi)
		function index() {
			// récupération des posts
			$query = $this->paginate('Post');
		/*	$query = $this->Post->find('all', array(
				'fields' => array('id', 'title', 'contenu')
			));*/
			// on les "set" dans 'articles' ... regarder la view index.ctp pour comprendre
			$this->set('articles', $query);
		}

		// lorsque l'on demande 'en savoir plus' sur l'article avec l'id $id
		function voir($id) {
			// choix du layout
			$this->layout = 'articles';
			// on recherche dans la DB l'article en question
			$post = $this->Post->findById($id);

			// il n'y en a pas, c'est con
			if (empty($post)) {
				throw new NotFoundException();
			}

			// ATTENTION : brain fucking, ici on va créer un commentaire
			// on a bien écrit notre commentaire
			if (!empty($this->request->data)) {
				// au passage il faut être connecté comme ça on évite le spam
				if ($this->Auth->user('id')) {

					// on va donc récup des les champs demandé dans la DB
					$this->request->data['Comment']['user_id'] = $this->Auth->user('id');
					$this->request->data['Comment']['post_id'] = $post['Post']['id'];

					$this->Comment->create($this->request->data, true);
					// on enregistre dans la DB
					if ($this->Comment->save(null, true, array('user_id', 'post_id', 'contenu'))) {
						// on vide les champs pour ne pas spam les commentaires (ex : F5 => confirmer l'envoi du formulaire etc etc)
						$this->request->data = array();
						// on laisse un petit message à l'utilisateur
						$this->Session->setFlash("Votre commentaire a été posté !", 'success');
						// on "refresh" la page courante
						$this->redirect(array('action'=>'voir', $id));
					} else {
						$this->Session->setFlash("Une erreur est survenue !", 'error');
					}
					
				} else {
					$this->Session->setFlash("Vous devez vous connecter pour pouvoir commenter !", 'error');
				}
			}

			// récupération des commentaires sur l'articles
			$comments = $this->Post->Comment->find('all',array(
				'conditions' => array('Comment.post_id'=>$post['Post']['id']),
				'contain'    => array('User'),
				'fields'     => array('Comment.id', 'Comment.contenu', 'User.username', 'User.avatar', 'User.id')
				));

			// récupération de l'article
			$query = $this->Post->find('first', array(
				'conditions' => array('Post.id' => $id)
				));

			// on 'set' le tout et on balance à la view
			$this->set('a', $query);
			$this->set('c', $comments);
		}

		// supression d'un commentaire
		public function delete($id) {
	        if(!$this->request->is('post')){
	            throw new NotFoundException();
	        }

	        // récupération du commentaire en question
	        $comment = $this->Comment->findById($id, array('Comment.id', 'Comment.user_id'));

	        // qui peut supprimer un com ? l'utilisateur qui l'a posté ou un admin	        
	        if ($this->Auth->user('id') == $comment['Comment']['user_id'] /*|| $this->Auth->user('role') == 'admin'*/) {

	        	// suppression
	            $this->Comment->delete($id);
	            // validation
	            $this->Session->setFlash("Commentaire supprimé", "success");

	        } else {
	            $this->Session->setFlash("Vous n'avez pas le droit de supprimer ce commentaire", "error");
	        }
	        // on redirige l'utilisateur d'où il vient
	        return $this->redirect($this->referer());
	    }

	    // fonction rechercher
		function resultSearch() {
			// choix du layout pour l'affichage
			$this->layout = 'default2';
			// on va créer une requête sql
	        $search = $this->request->data['Post']['search'];
	       	$query = $this->Post->find('all', array('fields' => array('id', 'title', 'contenu'), 'conditions'=>array('Post.title LIKE'=>'%'.$search.'%')));
	       	// amélioration : recherche lorsque l'on commence à formuler la recherche
	       	// on va balancer le tout à la view
	        $this->set('articles', $query);
	        $this->render('index');
	    }
	}
?>