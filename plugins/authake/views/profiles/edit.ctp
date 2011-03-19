<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon user"><?php echo $html->link(__('Manage profiles', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="users form">
<?php echo $form->create('Profile');?>
	<fieldset>
 		<legend><?php __('Modify profile'); echo " ".$this->data['Profile']['display_name']; ?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('team_id', array('type' => 'select', 'options' => $teamList, 'empty' => 'None'));
		echo $form->input('display_name');
		echo $form->input('first_name');
		echo $form->input('last_name');
	?>
	</fieldset>
<?php echo $form->end(__('Modify', true));?>
</div>

<div class="actions">
    <ul>
        <li class="icon info"><?php echo $html->link(__('View profile', true), array('action'=>'view', $form->value('Profile.id')));?></li>
        <li class="icon cross"><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Profile.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('User.login'))); ?></li>
    </ul>
</div>

</div>