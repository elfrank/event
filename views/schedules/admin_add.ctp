<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon place"><?php echo $html->link(__('Manage Schedules', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="places form">
<?php echo $form->create('Schedule');?>
	<fieldset>
 		<legend><?php __('Create a Schedule');?></legend>
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
<?php echo $form->end(__('Create', true));?>
</div>

<div class="actions">
    <ul>
    	<li class="icon activity"><?php echo $html->link(__('Manage Activities', true), array('controller' => 'activities', 'action'=>'index'));?></li>
        <li class="icon add"><?php echo $html->link(__('New Activity', true), array('controller' => 'activities', 'action'=>'add'));?></li>
        <li class="icon activity"><?php echo $html->link(__('Manage Users', true), array('controller' => 'users', 'action'=>'index'));?></li>
        <li class="icon add"><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action'=>'add'));?></li>
    </ul>
</div>
</div>