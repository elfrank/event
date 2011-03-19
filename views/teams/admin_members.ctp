<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon group"><?php echo $html->link(__('Manage Teams', true), array('action'=>'index'));?></li>
    </ul>
</div>

<h2><?php __('Members');?></h2>

<h4><?php echo(__('Team', true).': '.$team[0]['Team']['name']); ?></h4>

<?php
	if(!empty($members)):
?>

<table class="listing" cellpadding="0" cellspacing="0">
       <tr>
		<th><?php echo __('Id', true);?></th>
		<th><?php echo __('User Name', true);?></th>
		<th><?php echo __('Enrollment Date', true);?></th>
		<th><?php echo __('Signed Up', true);?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
<?php

$i = 0;

foreach($members as $member):
	$class = null;

	if ($i++ % 2 == 0) 
	{
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $member['Profile']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($member['Profile']['first_name'].' '. $member['Profile']['last_name'], array('admin' => 0, 'plugin' => 'authake', 'controller' => 'users', 'action' => 'view', $member['Profile']['id'])); ?>
		</td>
		<td>
			<?php echo fdate($member['Membership']['created']); ?>
		</td>
		<td>
			<?php
				if($signups[$member['Profile']['id']])
				{
					echo __('Yes', true);
				}
				else
				{
					echo __('No', true);
				}
			?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('../img/icons/cross.png'), array('controller' => 'memberships', 'action'=>'admin_delete', $member['Membership']['id'], $team[0]['Team']['id']), array('title' => __('Remove from team', true)), sprintf(__('Are you sure you want to remove user # %s from this team?', true), $member['Profile']['id']), false); ?>
		</td>
	</tr>

<?php endforeach; ?>

</table>

<?php
	endif;

	if(empty($members))
	{
		echo '<br />';
		__('This team has no members.');
		echo '<br /><br />';
	}
?>

<div class="actions">
	<ul>
		<li class="icon group_add"><?php echo $html->link(__('Add Members', true), array('action' => 'add_members', $team[0]['Team']['id'])); ?> </li>
		<li class="icon group_edit"><?php echo $html->link(__('Edit Team', true), array('action' => 'edit', $team[0]['Team']['id'])); ?> </li>
		<li class="icon group_delete"><?php echo $html->link(__('Delete Team', true), array('action' => 'delete', $team[0]['Team']['id']), null, sprintf(__('Are you sure you want to delete team # %s?', true), $team[0]['Team']['id'])); ?> </li>
	</ul>
</div>

</div>