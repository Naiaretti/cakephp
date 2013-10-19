<!-- File: app\View\Posts\index.ctp -->
<?php
	//debug($this->params);
	echo $this->element('return');
	echo $this->Html->link('Create Tags', array('controller' => 'tags', 'action' => 'add'));
?>

<br/><br/>

<h1>Blog posts</h1><!-- Author = Jennifer -->

<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<p><?php echo "You have a total of <b>" . $totalPosts . "</b> posts!"; ?></p>
<!-- <p><?php //echo $commented; ?></p> -->

<table>
	<tr>
		<th><?php echo $this->Paginator->sort('title', 'Title'); ?></th>
		<th>Actions</th>
		<th><?php echo $this->Paginator->sort('created', 'Created'); ?></th>
	</tr>
		<?php foreach ($posts as $post):
	//debug($post); ?>
	<tr>
		<!-- <td><?php //echo $post['Post']['id']; ?></td> -->
		<td>
			<?php echo $post['Post']['postLabel']; ?>
		</td>
		<td>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $post['Post']['id']), array('confirm' => 'Are you sure?')); ?>
			<?php echo $this->Html->link('View', array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
		</td>
		<td><?php echo $post['Post']['created']; ?></td>
	</tr>
	<?php endforeach; ?>
</table>

	<?php
		echo $this->Paginator->first('< first ');
		echo $this->Paginator->prev('<< ' . __('previous '), null, null, array('class' => 'disabled'));
		echo $this->Paginator->numbers();
		//echo $this->Paginator->first(2);
		echo $this->Paginator->next(__(' next') . ' >> ', null, null, array('class' => 'disabled'));
		echo '&nbsp;';
		echo $this->Paginator->last(' last >');
		//echo $this->Paginator->counter();

		unset($post);
	?>