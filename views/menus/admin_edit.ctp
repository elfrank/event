<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon event"><?php echo $html->link(__('Manage Menus', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="menus form">
<?php echo $form->create('Menu');?>
	<fieldset>
 		<legend><?php __('Modify Menu'); echo " ".$this->data['Menu']['name']; ?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('area_id', array('type' => 'select', 'options' => $areaList));
		echo $form->input('url');
		echo $form->input('active', array('type' => 'checkbox'));
	?>
	</fieldset>
<?php echo $form->end(__('Modify', true));?>
</div>

<div class="actions">
    <ul>
    	<li class="icon add"><?php echo $html->link(__('New Menu', true), array('action'=>'add'));?></li>
    	<li class="icon area"><?php echo $html->link(__('View Menu', true), array('action'=>'view'));?></li>
    	<li class="icon cross"><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Menu.id')), null, sprintf(__('Are you sure you want to delete "%s"?', true), $form->value('Menu.name'))); ?></li>
        <li class="icon area"><?php echo $html->link(__('Manage Areas', true), array('controller' => 'areas', 'action'=>'index'));?></li>
        <li class="icon add"><?php echo $html->link(__('New Area', true), array('controller' => 'areas', 'action'=>'add'));?></li>
    </ul>
</div>
</div>