<?php
	class Tag extends AppModel{
		// public $hasAndBelongsToMany = array(
		// 	'Post' => array(
		// 		'className' => 'Post',
		// 		'foreignKey' => 'tag_id',
		// 		'associationForeignKey' => 'post_id'
		// 	)
		// );
		
		public $hasMany = array(
			'TaggedPost' => array(
				'className' => 'TaggedPost',
				'foreignKey' => 'tag_id',
				'associatedForeignKey' => 'post_id'
			)
		);

		public $validate = array(
			'tag_name' => array(
				'rule' => 'isUnique',
				'message' => 'This tag already exists.'
			)
		);
	}
?>