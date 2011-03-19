<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon group"><?php echo $html->link(__('Manage teams', true), array('action'=>'index'));?></li>
    </ul>
</div>

<?php echo $form->create('Team');?>
	<fieldset>
 		<legend><?php __('Edit Team');?></legend>
	<?php
		echo $form->input('profile_id', array('type' => 'select', 'options' => $userList, 'label' => __('Leader', true)));
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>

<div class="actions">
	<ul>
		<li class="icon cross"><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Team.id')), null, sprintf(__('Are you sure you want to delete team # %s?', true), $form->value('Team.id'))); ?></li>
	</ul>
</div>

</div>
