<h1>Edit Post</h1>
<?php
	//debug($this->request->params);
	//debug($this->params);
	echo $this->element('return');

	echo $this->Form->create();
	echo $this->Form->input('title');
	echo $this->Form->input('body');
	//echo $this->Form->input('Tag');
	echo $this->Form->end('Save Post');
?>
