<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon state"><?php echo $html->link(__('Manage States', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="menus form">
<?php echo $form->create('State');?>
	<fieldset>
 		<legend><?php __('Modify State'); echo " ".$this->data['State']['name']; ?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end(__('Modify', true));?>
</div>

<div class="actions">
    <ul>
    	<li class="icon add"><?php echo $html->link(__('New State', true), array('action'=>'add'));?></li>
        <li class="icon info"><?php echo $html->link(__('View State', true), array('action'=>'view', $form->value('State.id')));?></li>
    	<li class="icon cross"><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('State.id')), null, sprintf(__('Are you sure you want to delete state "%s"?', true), $form->value('State.name'))); ?></li>
        <li class="icon user"><?php echo $html->link(__('Manage Users', true), array('controller' => 'users', 'action'=>'index'));?></li>
        <li class="icon user"><?php echo $html->link(__('Manage Groups', true), array('controller' => 'groups', 'action'=>'index'));?></li>
    </ul>
</div>
</div>