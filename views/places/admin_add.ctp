<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon place"><?php echo $html->link(__('Manage Places', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="places form">
<?php echo $form->create('Place');?>
	<fieldset>
 		<legend><?php __('Create a Place');?></legend>
	<?php        
        echo $form->input('name');
		echo $form->input('description');
		echo $form->input('slots');
		echo $form->input('computers');
		echo $form->input('computer_room');
        
	?>
	</fieldset>
<?php echo $form->end(__('Create', true));?>
</div>

<div class="actions">
    <ul>
    	<li class="icon activity"><?php echo $html->link(__('Manage Activities', true), array('controller' => 'activities', 'action'=>'index'));?></li>
        <li class="icon schedule"><?php echo $html->link(__('Manage Schedules', true), array('controller' => 'schedules', 'action'=>'index'));?></li>
    </ul>
</div>
</div>