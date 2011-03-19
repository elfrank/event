<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon group"><?php echo $html->link(__('Manage teams', true), array('action'=>'index'));?></li>
    </ul>
</div>

<?php echo $form->create('Team');?>
	<fieldset>
 		<legend><?php __('Add Team');?></legend>
	<?php
		echo $form->input('profile_id', array('type' => 'select', 'options' => $userList, 'label' => __('Leader', true)));
		echo $form->input('name', array('label' => __('Team Name', true)));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>

<div class="actions">
	<ul>
		<li class="icon group_add"><?php echo $html->link(__('Add Members', true), array('action' => 'add_members', $team[0]['Team']['id'])); ?> </li>
		<li class="icon group_edit"><?php echo $html->link(__('Edit Team', true), array('action' => 'edit', $team[0]['Team']['id'])); ?> </li>
		<li class="icon group_delete"><?php echo $html->link(__('Delete Team', true), array('action' => 'delete', $team[0]['Team']['id']), null, sprintf(__('Are you sure you want to delete team # %s?', true), $team[0]['Team']['id'])); ?> </li>
	</ul>
</div>

</div>
