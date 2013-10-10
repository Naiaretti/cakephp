<?php
class SummaryBehavior extends ModelBehavior {
	public function setUp(Model $Model, $config = array()) {
		debug($Model->alias); //guess what? = Post good
	}
/**
 * afterSave takes the id and model name of recently saved record and saves them into the post_summaries table
 * 
 * @param  Model  $Model   the model using this behavior callback
 * @param  boolean $created this is true if a new record has just been added
 * @return void
 */
	public function afterSave(Model $Model, $created) {
		if($created) {
			$result = $Model->find('first', array(
				'conditions' => array(
					'id' => $Model->id
				)
			));
			$toSave = array(
				'foreign_key' => $Model->id,
				'model' => $Model->alias
			);
			ClassRegistry::init('PostSummary')->save($toSave);
		}
	}

	public function beforeDelete(Model $Model, $cascade = true) {
		$PostSummary = ClassRegistry::init('PostSummary');

		$hasSummaryRecord = $PostSummary->find('first', array(
			'conditions' => array(
				'foreign_key' => $Model->id,
				'model' => $Model->alias
			),
			'fields' => array('PostSummary.id')
		));

		if($hasSummaryRecord != null) {
			$Model->deleteFailed = "You cannot delete this post because it already has a summary record.";
			return false;
		}
		return true;
	}

/**
 * afterDelete gets the id and model name of recently deleted record plus the id of the row in post_summaries table where they are saved in,
 * and deleted that record from the post_summaries table
 * 
 * @param  Model  $Model the model using this behavior callback
 * @return void
 */
	public function afterDelete(Model $Model) {
		$PostSummary = ClassRegistry::init('PostSummary');
		
		$deletedId = $PostSummary->find('first', array(
			'conditions' => array(
				'foreign_key' => $Model->id,
				'model' => $Model->alias
			),
			'fields' => array('PostSummary.id')
		));

		if($deletedId) {
			$PostSummary->delete($deletedId['PostSummary']['id']);
		}
	}
}
?>