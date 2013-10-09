<?php
	class Comment extends AppModel {
		public $belongsTo = array('Post', 'Author');

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

		public function getTotalComments($id) {
			$totalComments = $this->find('count', array('conditions' => array('Comment.post_id' => $id)));
			return $totalComments;
		}

		public function afterSave($created) {
			if($created) {
				$result = $this->find('first', array(
					'conditions' => array('id' => $this->id))
				);
				$toSave = array(
					'foreign_key' => $this->id,
					'model' => $this->alias
				);
				ClassRegistry::init('PostSummary')->save($toSave);
				// debug($toSave); die;
			}
		}

		public function afterDelete() {
			$PostSummary = ClassRegistry::init('PostSummary');

			$deletedId = $PostSummary->find('first', array(
				'conditions' => array(
					'foreign_key' => $this->id,
					'model' => $this->alias
				)
			));
			if($deletedId) {
				$PostSummary->delete($deletedId['PostSummary']['id']);
			}
			// debug($deletedId); die;
		}
	}
?>