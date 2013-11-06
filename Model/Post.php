<?php
class Post extends AppModel{
	public $deleteFailed = "";

	public $actsAs = array(
		'Summary' => array(
			'something' => 'passed to behavior',
			'you_can_make_some_default_settings' => true
		)
	); 

	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'post_id',
			'order' => 'Comment.created DESC',
			'dependent' => true
		),
		'TaggedPost' => array(
			'className' => 'TaggedPost',
			'foreignKey' => 'post_id',
			'associatedForeignKey' => 'tag_id',
			'dependent' => true
		)
	);

	// public $hasAndBelongsToMany = array(
	// 	'Tag' => array(
	// 		'className' => 'Tag',
	// 		'foreignKey' => 'post_id',
	// 		'associationForeignKey' => 'tag_id'
	// 	)
	// );

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