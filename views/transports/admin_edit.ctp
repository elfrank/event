<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon bus"><?php echo $html->link(__('Manage Transport Services', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="users form">
<?php echo $form->create('Transport');?>
	<fieldset>
 		<legend><?php __('Modify Transport Service'); echo " ".$this->data['Transport']['company']; ?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('company');
		echo $form->input('type_of_unit');
		echo $form->input('capacity_of_unit');
		echo $form->input('number_of_units');
		echo $form->input('price_per_unit');
	?>
	</fieldset>
<?php echo $form->end(__('Modify', true));?>
</div>

<div class="actions">
    <ul>
        <li class="icon info"><?php echo $html->link(__('View', true), array('action'=>'view', $form->value('Transport.id')));?></li>
        <li class="icon cross"><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Transport.id')), null, sprintf(__('Are you sure you want to delete "%s"?', true), $form->value('Transport.company'))); ?></li>
    </ul>
</div>

</div>