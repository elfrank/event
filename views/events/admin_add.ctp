<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon event"><?php echo $html->link(__('Manage Events', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="activities form">
<?php echo $form->create('Event');?>
	<fieldset>
 		<legend><?php __('Create a New Event');?></legend>
	<?php        
		echo $form->input('short_name');
		echo $form->input('long_name');
		echo $form->input('slogan');
		echo $form->input('place');
		echo $form->input('description');
		echo $form->input('start_date');
		echo $form->input('end_date');
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