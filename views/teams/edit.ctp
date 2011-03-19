<div class="teams form">
<?php echo $form->create('Team');?>
	<fieldset>
 		<legend><?php __('Edit Team');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id', array('type' => 'select', 'label' => 'Leader', 'options' => $userList));
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Team.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Team.id'))); ?></li>
		<li><?php echo $html->link(__('List Teams', true), array('action' => 'index'));?></li>
	</ul>
</div>
