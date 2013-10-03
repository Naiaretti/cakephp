<h1>Add New Tags</hi>

<?php
echo $this->element('return');

echo $this->Form->create('Tag');
echo $this->Form->input('tag_name');
echo $this->Form->end('Add Tag');
?>