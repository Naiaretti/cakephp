<?php
class TaggedPost extends AppModel {
	public $belongsTo = array(
		'Post', 'Tag'
	);
}
?>