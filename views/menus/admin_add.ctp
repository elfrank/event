<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon menu"><?php echo $html->link(__('Manage Menus', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="activities form">
<?php echo $form->create('Menu');?>
	<fieldset>
 		<legend><?php __('Create a Menu');?></legend>
	<?php        
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('area_id', array('type' => 'select', 'options' => $areaList));
		echo $form->input('url');
		echo $form->input('active', array('type' => 'checkbox'));
	?>
	</fieldset>
<?php echo $form->end(__('Create', true));?>
</div>

<div class="actions">
    <ul>
    	<li class="icon area"><?php echo $html->link(__('Manage Areas', true), array('controller' => 'areas', 'action'=>'index'));?></li>
        <li class="icon add"><?php echo $html->link(__('New Area', true), array('controller' => 'areas', 'action'=>'add'));?></li>
    </ul>
</div>
</div>