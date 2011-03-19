<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon contenttypes"><?php echo $html->link(__('Manage Content Types', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="users form">
<?php echo $form->create('Contenttype');?>
	<fieldset>
 		<legend><?php __('Modify Content Type'); echo " ".$this->data['Contenttype']['name']; ?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('description');
		
	?>
	</fieldset>
<?php echo $form->end(__('Modify', true));?>
</div>

<div class="actions">
    <ul>
    	<li class="icon add"><?php echo $html->link(__('Add Type', true), array('action'=>'add'));?></li>
        <li class="icon info"><?php echo $html->link(__('View Type', true), array('action'=>'view', $form->value('Contenttype.id')));?></li>
        <li class="icon cross"><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Contenttype.id')), null, sprintf(__('Are you sure you want to delete "%s"?', true), $form->value('Activity.short_name'))); ?></li>
    </ul>
</div>

</div>