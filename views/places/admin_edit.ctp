<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon places"><?php echo $html->link(__('Manage Places', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="users form">
<?php echo $form->create('Place');?>
	<fieldset>
 		<legend><?php __('Modify Content Type'); echo " ".$this->data['Place']['name']; ?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('slots');
		echo $form->input('computers');
		echo $form->input('computer_room');
	?>
	</fieldset>
<?php echo $form->end(__('Modify', true));?>
</div>

<div class="actions">
    <ul>
    	<li class="icon add"><?php echo $html->link(__('Add Place', true), array('action'=>'add'));?></li>
        <li class="icon info"><?php echo $html->link(__('View Place', true), array('action'=>'view', $form->value('Place.id')));?></li>
        <li class="icon cross"><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Place.id')), null, sprintf(__('Are you sure you want to delete "%s"?', true), $form->value('Place.name'))); ?></li>
    </ul>
</div>

</div>