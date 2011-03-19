<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon bus"> <?php echo $html->link(__(' Manage Transport Services', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="transports form">
<?php echo $form->create('Transport');?>	
	<fieldset>
 		<legend><?php __('Create a New Transport Service');?></legend>
		<br />
	<?php        
		echo $form->input('company');
		echo $form->input('number_of_units');		
		echo $form->input('type_of_unit');
		echo $form->input('capacity_of_unit');
		echo $form->input('price_per_unit');
	?>
	</fieldset>
<?php echo $form->end(__('Create', true));?>
</div>

<div class="actions">
    <ul>
    </ul>
</div>
</div>