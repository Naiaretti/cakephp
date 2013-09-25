<?php
	class Comment extends AppModel {
		public $belongsTo = 'Post';

		public $validate = array(
			'content' => array(
				'rule' => 'notEmpty',
				'required' => true,
				'message' => 'no comment has been entered'
			),
			'post_id' => array(
				'rule' => 'notEmpty',
				'required' => true,
				'message' => 'Please choose a post'
			)
		);
	}
?>