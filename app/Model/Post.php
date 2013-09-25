<?php
class Post extends AppModel{
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'post_id',
			'order' => 'Comment.created DESC',
			'dependent' => true
		)
	);

	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'please enter title'
		),
		'body' => array(
			'rule' => 'notEmpty',
			'message' => 'body cannot be empty'
		)
	);
}
?>