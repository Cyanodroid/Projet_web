<?php
	class PostsController extends AppController {
		var $name = "Posts";
		var $uses = array('Post', 'Comment', 'User');

		// test ajax pagination
		public $components = array('RequestHandler');
		public $helpers = array('Js');
		// fin test

		// création d'une pagination
		var $paginate = array(
			'Post'=> array( // sur les posts
				'fields'=>array('id', 'title', 'contenu', 'categories_id'), // où l'on récupère que ces trois champs
				'limit'=>3, // on fixe une limite
				'order'=> array( // on les organise du plus récent au plus vieux
					'Post.date_post'=> 'desc'
				)
			)
		);

		// page index (page d'accueil quoi)
		public function index() {
			if ($this->request->is('ajax')) {
				$query = $this->paginate('Post');
				// on les "set" dans 'articles' ... regarder la view index.ctp pour comprendre
				$this->set('articles', $query);
				$this->render('ajax_index');
			} else {
			// récupération des posts
				$query = $this->paginate('Post');
				// on les "set" dans 'articles' ... regarder la view index.ctp pour comprendre
				$this->set('articles', $query);
				$this->set('random_articles', $this->Post->find('all', array(
				   'conditions' => array('Post.image' => 1),
				   'order' => 'rand()',
				   'limit' => 3,
				)));
			}
		}

		// lorsque l'on demande 'en savoir plus' sur l'article avec l'id $id
		public function voir($id) {
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
						echo $this->Session->setFlash(__("Votre commentaire a été posté !"), 'success');
						// on "refresh" la page courante
						$this->redirect(array('action'=>'voir', $id));
					} else {
						echo $this->Session->setFlash(__("Une erreur est survenue !"), 'error');
					}

				} else {
					echo $this->Session->setFlash(__("Vous devez vous connecter pour pouvoir commenter !"), 'error');
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
			//debug($query);
			// on 'set' le tout et on balance à la view
			$this->set('a', $query);
			$this->set('c', $comments);

			$user = $this->Auth->user('groups_id');
			$this->set('user', $user);
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
	            echo $this->Session->setFlash(__("Commentaire supprimé"), "success");

	        } else {
	            echo $this->Session->setFlash(__("Vous n'avez pas le droit de supprimer ce commentaire"), "error");
	        }
	        // on redirige l'utilisateur d'où il vient
	        return $this->redirect($this->referer());
	    }

	    // fonction rechercher
		function resultSearch($search = null) {

			if ($this->request->is('ajax')) {
				$this->layout = 'ajax';

				$data = $this->request->params['pass'][0];
				$query = $this->Post->find('all', array('conditions'=>array('Post.title LIKE'=>'%'.$data.'%')));

				$i = 0;
				foreach ($query as $q) {
					echo '<a href="posts/voir/'.$query[$i]['Post']['id'].'">' . $query[$i]['Post']['title'] . '</a><br/>';
					$i++;
				}
			} else {
				$this->layout = 'recherche';
				$search = $this->request->data['Post']['search'];
	       		$query = $this->Post->find('all', array('conditions'=>array('Post.title LIKE'=>'%'.$search.'%')));
				$this->set('articles', $query);
			}
	    }

	  	public function admin_index() {
	  		$this->layout = "default2";
	  		$articles = $this->Post->find('all', array(
	  			'conditions'=>array('Post.users_id'=>$this->Auth->user('id'))
	  		));
	  		$this->set(compact('articles'));
	  	}

	  	public function admin_edit($id = null) {
	  		$this->layout = "default2";
	  		$cat = $this->Post->Categories->find('list', array(
		  			'recursive'=>-1,
		  			'fields'=>array('id', 'title')
		  	));

		  	$this->set('cats', $cat);

	  		if (!empty($this->request->data)) {
	  			if ($this->Post->validates()) {
		  			$this->request->data['Post']['users_id'] = $this->Auth->user('id');

		  			//debug($this->request->data);
		  			$this->Post->create($this->request->data);
		  			if ($this->Post->save($this->request->data, true, array())) {

			  			if (!empty($this->request->data['Post']['imageart']['tmp_name'])) {

							$directory = IMAGES . 'articles' . DS;
							debug($directory);
							if (!file_exists($directory)) {
								mkdir($directory, 0777);
							}

							move_uploaded_file($this->request->data['Post']['imageart']['tmp_name'], $directory . DS . $this->Post->id . '.jpg');

							$this->Post->saveField('image', 1);
						}

		  				$this->request->data = array();
		  				echo $this->Session->setFlash(__("Votre article vient d'être publié !"), "success");
		  				$this->redirect(array('action'=>'admin_index'));
		  			} else {
		  				echo $this->Session->setFlash(__("Erreur : votre article n'a pas pu être publié"), "error");
		  			}
	  			} else {
	  				echo $this->Session->setFlash(__("Erreur : vos champs de sont pas valides"), "error");
	  			}
	  		} else if ($id) {
	  			$this->request->data = $this->Post->findById($id);
	  		}
	  	}

	  	public function admin_delete($id) {
	  		if ($this->Post->delete($id)) {
	  			echo $this->Session->setFlash(__("Votre article vient d'être supprimé !"), "success");
	  			$this->redirect($this->referer());
	  		}
	  	}

	  	public function create_pdf($id) {
	  		$this->layout = "pdf";

	  		$article = $this->Post->findById($id);

	  		echo $this->Session->setFlash(__("Vous pouvez dès à présent télécharger votre pdf !"), "success");

	  		$this->set('id', $id);
	  		$this->set(compact('article'));
	  		$this->render('/Pdf/pdf_view');
	  		$this->redirect($this->referer());
	  	}

	  	public function show_pdf($id) {
	  		if (!file_exists(APP . 'files/pdf/'.$id.'.pdf')) {
	  			echo $this->Session->setFlash(__("Ce document n'est pas encore disponible sur le serveur. Afin de pouvoir le télécharger, vous devez d'abord l'exporter."), "error");
	  			$this->redirect($this->referer());
	  		}

		    $this->viewClass = 'Media';

		    $params = array(
		        'id' => $id.'.pdf',
		        'name' => $id ,
		        'download' => false,
		        'extension' => 'pdf',
		        'path' => APP . 'files/pdf' . DS
		    );

			$this->set($params);
		}

		public function flux_rss() {
			$posts = $this->Post->find('all', array(
				'limit'=>3,
				'order'=>'Post.date_post DESC'
				)
			);

			$this->set(compact('posts'));
		}
	}
?>
