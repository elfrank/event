<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon activity"><?php echo $html->link(__('Manage Areas', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="activities form">
<?php echo $form->create('Area');?>
	<fieldset>
 		<legend><?php __('Create a New Area');?></legend>
	<?php        
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('active');
	?>
	</fieldset>
<?php echo $form->end(__('Create', true));?>
</div>

<div class="actions">
    <ul>
    </ul>
</div>
</div>