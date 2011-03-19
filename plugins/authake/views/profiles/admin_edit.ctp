<div class="profiles form">
<?php echo $form->create('Profile');?>
	<fieldset>
 		<legend><?php __('Edit Profile');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('first_name');
		echo $form->input('last_name');
		echo $form->input('display_name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Profile.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Profile.id'))); ?></li>
		<li><?php echo $html->link(__('List Profiles', true), array('action' => 'index'));?></li>
	</ul>
</div>
