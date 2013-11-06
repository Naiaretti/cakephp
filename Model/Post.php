<?php
class Post extends AppModel{
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

	public function afterSave($created) {
		if ($created) {
			$result = $this->find('first', array('conditions' => array('id' => $this->id)));
			$toSave = array(
				'foreign_key' => $this->id,
				'model' => $this->alias
			);
			// debug($toSave); die;
			ClassRegistry::init('PostSummary')->save($toSave);
		}
	}

	// public function beforeDelete($cascade = true) {
	// 	$
	// 	debug($this->id); die;
	// 	return true;
	// }

	public function afterDelete() {
		//find the record that has same foreign_key as $this->id in post_summaries
		$PostSummary = ClassRegistry::init('PostSummary');
		//now we can re-use PostSummary many times without writing classregistry all over again ;)
		$deletedId = $PostSummary->find('first', array(
			'conditions' => array(
				'foreign_key' => $this->id, 
				'model' => $this->alias
			),
			'fields' => array('PostSummary.id')
		));
		if ($deletedId) {
			$PostSummary->delete($deletedId['PostSummary']['id']);
		}
	}
}
?>