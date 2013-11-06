<?php
class Post extends AppModel{
	public $virtualFields = array(
		'postLabel' => "CONCAT(Post.id, ' ', Post.title)"
	);	
	public $recursive = -1;
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
			'message' => 'Please type in a post' //'body cannot be empty'
		)
	);

	// public $belongsTo = array(
	// 	'Author' => array(
	// 		'className' => 'Author',
	// 		'foreignKey' => 'author_id'
	// 	)
	// );

	public function saveTags($data) {
		$this->create();
		// $this->save($data);
		if ($this->save($data)) {
			foreach ($data['Tag'] as $tag) {
				$tagData = array(
					'post_id' => $this->id,
					'tag_id' => $tag['tag_id']
				);
				$this->TaggedPost->create();
				$this->TaggedPost->save($tagData);
			}
			return true;
		}
		return false;
	}

// 	public function transactions($id = null) {
// 	$dataSource = $this->getDataSource();
// 	$success = true;
// 	$dataSource->begin();

// 	$result = $this->delete($id);
// 	if (!$result) {
// 		$success = false;
// 	}

// 	$comments = $this->Comment->find('all', array(
// 		'conditions' => array('Comment.post_id' => $id)
// 	));
	
// 	$Summary = ClassRegistry::init('PostSummary');
// 	foreach ($comments as $comment) {
// 		// check if this comment exists in the postSUmmary table and delete it
		
// 		$postSummaryId = $Summary->find('first', array(
// 			'conditions' => array(
// 				'PostSummary.foreign_key' => $comment['Comment']['id'],
// 				'PostSummary.model' => $this->Comment->alias
// 			),
// 			'fields' => array(
// 				'PostSummary.id'
// 			)
// 		));
// 		if ($postSummaryId) {
// 			$deleteSummary = $Summary->delete($postSummaryId['PostSummary']['id']);
// 			if (!$deleteSummary) {
// 				$success = false;
// 			}
// 		}
// 		// check if delete was not sucessful, then rollback
// 		$deleted = $this->Comment->delete($comment['Comment']['id']);
// 		if (!$deleted) {
// 			$success = false;
// 		}
// 	}

// 	$summaries = $Summary->find('first', array(
// 		'conditions' => array(
// 			'PostSummary.foreign_key' => $id,
// 			'PostSummary.model' => $this->alias
// 		),
// 		'fields' => array(
// 			'PostSummary.id'
// 		)
// 	)); debug($summaries); die;
// 	// debug($id); die;
// 	$delete = $Summary->delete($summaries['PostSummary']['id']);
// 	if (!$delete) {
// 		$success = false;
// 		debug('success = false'); die;
// 	}
// 	if (!$success) {
// 		$dataSource->rollback();
// 	}
// 	$dataSource->commit();
// }
}
?>