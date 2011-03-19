<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon event"><?php echo $html->link(__('Manage Event', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="users form">
<?php echo $form->create('Event');?>
	<fieldset>
 		<legend><?php __('Modify Event'); echo " ".$this->data['Event']['short_name']; ?></legend>
	<?php
		echo $form->input('short_name');
		echo $form->input('long_name');
		echo $form->input('slogan');
		echo $form->input('place');
		echo $form->input('description');
		echo $form->input('start_date');
		echo $form->input('end_date');
		echo $form->input('active');
	?>
	</fieldset>
<?php echo $form->end(__('Modify', true));?>
</div>

<div class="actions">
    <ul>
        <li class="icon info"><?php echo $html->link(__('View Event', true), array('action'=>'view', $form->value('Event.id')));?></li>
        <li class="icon cross"><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Event.id')), null, sprintf(__('Are you sure you want to delete "%s"?', true), $form->value('Event.short_name'))); ?></li>
    </ul>
</div>

</div>