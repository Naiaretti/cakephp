<!-- File: app\View\Posts\view.ctp -->
<?php
	//debug($this->request->params)
	//debug($post['Comment']['0']['id']);
	echo $this->element('return');
?>
<h1><?php echo h($post['Post']['title']); ?></h1>
<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>
<p><?php echo h($post['Post']['body']); ?></p>

<hr><br/>

<br/>
<table>
	<tr><th></th></tr>
	<?php foreach ($post['Comment'] as $key1=>$comment) : ?>
		<tr>
			<td>
				<?php echo $comment['content']; ?>
				<?php echo $this->Form->postLink('Delete', array('controller' => 'comments', 'action' => 'delete', $comment['id'], $comment['post_id']), array('confirm' => 'Are you sure?')); ?>
			</td>
		</tr>
	<?php 
		endforeach;
	?>
</table>

<br/><hr><br/>

<?php
	echo $this->Form->create('Comment', array('controller' => 'comments', 'action' => 'add'));
	echo $this->Form->textarea('content');
	echo $this->Form->hidden('post_id', array('value' => $post['Post']['id']));
	echo $this->Form->submit('Post Comment');
	echo $this->Form->end();
?>