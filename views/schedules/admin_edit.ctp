<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon schedules"><?php echo $html->link(__('Manage Schedules', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="users form">
<?php echo $form->create('Schedule');?>
	<fieldset>
 		<legend><?php __('Modify Schedule'); echo " ".$this->data['Schedule']['id']; ?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('activity_id', array('type' => 'select', 'options' => $activityList, 'label' => 'Activity'));
		echo $form->input('start_date');
		echo $form->input('end_date');
		echo $form->input('place_id', array('type' => 'select', 'options' => $placeList, 'label' => 'Places'));
		echo $form->input('slots');
		echo $form->input('status');
		echo $form->input('User.User', array('options' => $userList));	
	?>
	</fieldset>
<?php echo $form->end(__('Modify', true));?>
</div>

<div class="actions">
    <ul>
    	<li class="icon add"><?php echo $html->link(__('Add Schedule', true), array('action'=>'add'));?></li>
        <li class="icon info"><?php echo $html->link(__('View Schedule', true), array('action'=>'view', $form->value('Schedule.id')));?></li>
        <li class="icon cross"><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Schedule.id')), null, sprintf(__('Are you sure you want to delete "%s-%s"?', true), $form->value('Schedule.start_date'),$form->value('Schedule.start_date'))); ?></li>
        <li class="icon activity"><?php echo $html->link(__('Manage Activities', true), array('controller' => 'activities', 'action'=>'index'));?></li>
        <li class="icon add"><?php echo $html->link(__('Add Activity', true), array('controller' => 'activities', 'action'=>'add'));?></li>
        <li class="icon user"><?php echo $html->link(__('Manage Users', true), array('controller' => 'users', 'action'=>'index'));?></li>
        <li class="icon add"><?php echo $html->link(__('Add User', true), array('controller' => 'users', 'action'=>'add'));?></li>
    </ul>
</div>

</div>