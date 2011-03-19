<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon user"><?php echo $html->link(__('Manage activities', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="events form">
<?php echo $form->create('Activity');?>
	<fieldset>
 		<legend><?php __('Modify activity'); echo " ".$this->data['Activity']['short_name']; ?></legend>
	<?php
		echo $form->input('id');
		//echo $form->input('event_id', array('type' => 'select', 'options' => $eventList, 'label' => 'Event'));
		echo $form->input('contenttype_id', array('type' => 'select', 'options' => $contentTypeList, 'label' => 'Type'));
		echo $form->input('short_name');
		echo $form->input('long_name');
		echo $form->input('description');
		echo $form->input('published');
		
	?>
	</fieldset>
<?php echo $form->end(__('Modify', true));?>
</div>

<div class="actions">
    <ul>
        <li class="icon info"><?php echo $html->link(__('View activity', true), array('action'=>'view', $form->value('Activity.id')));?></li>
        <li class="icon info"><?php echo $html->link(__('View event', true), array('controller' => 'events', 'action'=>'view', $form->value('Event.id')));?></li>
        <li class="icon info"><?php echo $html->link(__('View type', true), array('controller' => 'contenttypes', 'action'=>'view', $form->value('Contenttype.id')));?></li>
        <li class="icon cross"><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Activity.id')), null, sprintf(__('Are you sure you want to delete "%s"?', true), $form->value('Activity.short_name'))); ?></li>
    </ul>
</div>

</div>