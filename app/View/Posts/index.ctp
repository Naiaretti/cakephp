<!-- File: app\View\Posts\index.ctp -->
<?php
	//debug($this->params);
?>

<h1>Blog posts</h1>

<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>

<table>
	<tr>
		<!-- <th>Id</th> -->
		<th>Title</th>
		<th>Actions</th>
		<th>Created</th>
	</tr>

	<?php foreach ($posts as $post): ?>
	<tr>
		<!-- <td><?php //echo $post['Post']['id']; ?></td> -->
		<td>
			<?php echo $post['Post']['title']; ?>
		</td>
		<td>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $post['Post']['id']), array('confirm' => 'Are you sure?')); ?>
			<?php echo $this->Html->link('View', array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
		</td>
		<td><?php echo $post['Post']['created']; ?></td>
	</tr>
	<?php
		endforeach;
		unset($post);
	?>
</table>