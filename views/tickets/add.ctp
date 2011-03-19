<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon ticket"><?php echo $html->link(__('Inbox', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="activities form">
<?php echo $form->create('Ticket');?>
	<fieldset>
 		<legend><?php __('Create a New Ticket');?></legend>
		<p>
			Ask questions, submit ideas or tell us what you think about the event.
		</p>
		<br />
	<?php        
        echo $form->hidden('profile_id', array('value' => $profile_id));
		echo $form->input('area_id', array('type' => 'select', 'options' => $areaList, 'label' => 'Area'));		
		echo $form->input('subject');        
		echo $form->input('message', array('type' => 'textarea'));        
	?>
	</fieldset>
<?php echo $form->end(__('Send', true));?>
</div>
</div>