<div class="teams form">
<?php echo $form->create('Team');?>
	<fieldset>
 		<legend><?php __('Add Team');?></legend>
	<?php
		echo $form->input('user_id', array('type' => 'select', 'label' => 'Leader', 'options' => $userList));
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Teams', true), array('action' => 'index'));?></li>
	</ul>
</div>
