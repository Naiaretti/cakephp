
<h1>Add Post</h1>
<?php
echo $this->element('return');

echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '13'));

$counter = 0;
foreach ($tags as $key=>$tag) {
	echo $this->Form->label($tag);
	echo $this->Form->checkbox('Tag.'. $counter .'.tag_id', array('value' => $key, 'hiddenField' => false));
	echo '<br/>';
	$counter++;
}

echo $this->Form->end('Save Post');
?>