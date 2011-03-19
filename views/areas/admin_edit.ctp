<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon area"><?php echo $html->link(__('Manage Areas', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="users form">
<?php echo $form->create('Area');?>
	<fieldset>
 		<legend><?php __('Modify Area'); echo " ".$this->data['Area']['name']; ?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('active');
		
	?>
	</fieldset>
<?php echo $form->end(__('Modify', true));?>
</div>

<div class="actions">
    <ul>
        <li class="icon info"><?php echo $html->link(__('View Area', true), array('action'=>'view', $form->value('Area.id')));?></li>
        <li class="icon cross"><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Area.id')), null, sprintf(__('Are you sure you want to delete "%s"?', true), $form->value('Area.name'))); ?></li>
    </ul>
</div>

</div>