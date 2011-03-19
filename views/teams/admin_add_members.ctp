<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon group"><?php echo $html->link(__('Manage Teams', true), array('action'=>'index'));?></li>
    </ul>
</div>

<?php echo $form->create('Team', array('admin' => 1, 'controller' => 'teams', 'action' => 'add_members', $team['Team']['id']));?>
	<fieldset>
 		<legend><?php __('Add Team Member');?></legend>
	<?php
		echo $form->input('profile_id', array('type' => 'select', 'multiple' => true, 'options' => $userList, 'label' => __('Leader', true)));
	?>
	</fieldset>
<?php echo $form->end('Add to Team');?>

<div class="actions">
	<ul>
		<li class="icon group"><?php echo $html->link(__('View Team', true), array('action' => 'view', $team['Team']['id'])); ?> </li>
		<li class="icon group_edit"><?php echo $html->link(__('Edit Team', true), array('action' => 'edit', $team['Team']['id'])); ?> </li>
		<li class="icon group_delete"><?php echo $html->link(__('Delete Team', true), array('action' => 'delete', $team['Team']['id']), null, sprintf(__('Are you sure you want to delete team # %s?', true), $team['Team']['id'])); ?> </li>
	</ul>
</div>

</div>