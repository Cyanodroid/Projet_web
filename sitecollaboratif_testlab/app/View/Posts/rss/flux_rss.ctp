<?php 
	$this->set('channel', array(
		'title'=>'Site Collaboratif',
		'link'=>$this->Html->url('/', true),
		'description'=>'Nos derniers articles publiés',
		'language'=>'fr-fr'
		)
	);

	$dir = $this->Html->url('/app/webroot/img/articles/', true);
	
	foreach ($posts as $post) {
		$url = $this->Html->url(array('controller'=>'posts', 'action'=>'voir', $post['Post']['id']), true);

		$body = '<img src="' . $dir . $post['Post']['id'] . '.jpg" width="450" height=200">';
		$body .= '<p>' . $this->Text->truncate($post['Post']['contenu'], 150, array('ellipsis'=>'...', 'exact'=>false)) . '</p>';
	
		echo $this->Rss->item(array(), array(
			'title'=> $post['Post']['title'],
			'link'=> $url,
			'guid'=>array('url'=> $url, 'isPermaLink'=>'true'),
			'description'=> array('cdata'=>true, 'value'=> $body, 'convertEntities'=>false),
			'pubDate'=> $post['Post']['date_post']
			)
		);
	}

 ?>