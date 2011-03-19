<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon menu"><?php echo $html->link(__('Manage States', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="activities form">
<?php echo $form->create('State');?>
	<fieldset>
 		<legend><?php __('Create a State');?></legend>
	<?php        
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end(__('Create', true));?>
</div>

<div class="actions">
    <ul>
    	<li class="icon user"><?php echo $html->link(__('Manage Users', true), array('controller' => 'users', 'action'=>'index'));?></li>
    	<li class="icon group"><?php echo $html->link(__('Manage Groups', true), array('controller' => 'groups', 'action'=>'index'));?></li>
    </ul>
</div>
</div>