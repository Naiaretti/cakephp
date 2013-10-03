<?php
	class Tag extends AppModel{
		public $hasAndBelongsToMany = array(
			'Post' => array(
				'className' => 'Post',
				'foreignKey' => 'tag_id',
				'associationForeignKey' => 'post_id'
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