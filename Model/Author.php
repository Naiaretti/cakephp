<?php 
class Author extends AppModel {
	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'dependent' => true

		)
	);

	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'dependent' => false
		)
	)
}
?>