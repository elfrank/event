<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon activity"><?php echo $html->link(__('Manage Activities', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="activities form">
<?php echo $form->create('Activity');?>
	<fieldset>
 		<legend><?php __('Create a New Activity');?></legend>
	<?php        
        echo $form->input('id');
		echo $form->input('event_id', array('type' => 'select', 'options' => $eventList, 'label' => 'Event'));
		echo $form->input('contenttype_id', array('type' => 'select', 'options' => $contentTypeList, 'label' => 'Type'));
		echo $form->input('short_name');
		echo $form->input('long_name');
		echo $form->input('description');
		echo $form->input('published');
        
	?>
	</fieldset>
<?php echo $form->end(__('Create', true));?>
</div>

<div class="actions">
    <ul>
    	<li class="icon user"><?php echo $html->link(__('Manage Users', true), array('controller' => 'users', 'action'=>'index'));?></li>
        <li class="icon schedule"><?php echo $html->link(__('Manage Schedules', true), array('controller' => 'schedules', 'action'=>'index'));?></li>
        <li class="icon contenttype"><?php echo $html->link(__('Manage Types', true), array('controller' => 'contenttypes', 'action'=>'index'));?></li>
    </ul>
</div>


</div>