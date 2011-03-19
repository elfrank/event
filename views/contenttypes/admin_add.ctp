<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon contenttype"><?php echo $html->link(__('Manage Content Types', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="contenttypes form">
<?php echo $form->create('Contenttype');?>
	<fieldset>
 		<legend><?php __('Create a Content Type');?></legend>
	<?php        
        echo $form->input('name');
		echo $form->input('description');
        
	?>
	</fieldset>
<?php echo $form->end(__('Create', true));?>
</div>

<div class="actions">
    <ul>
    	<li class="icon activity"><?php echo $html->link(__('Manage Activities', true), array('controller' => 'activities', 'action'=>'index'));?></li>
        <li class="icon schedule"><?php echo $html->link(__('Manage Schedules', true), array('controller' => 'schedules', 'action'=>'index'));?></li>
    </ul>
</div>
</div>