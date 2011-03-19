<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon group"><?php echo $html->link(__('Manage Teams', true), array('action'=>'index'));?></li>
    </ul>
</div>

<h2><?php  __('Team');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $team['Team']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Leader'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($team['Profile']['first_name'].' '.$team['Profile']['last_name'], array('admin' => 0, 'plugin' => 'authake', 'controller' => 'users', 'action' => 'view', $team['Profile']['id']))." <em>(Id {$team['Profile']['id']})</em>"; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number of Members'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $numberOfMembers[$team['Team']['id']]; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>&nbsp;</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link(__('view team members', true), array('action' => 'members', $team['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created on'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo fdate($team['Team']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated on'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo fdate($team['Team']['modified']); ?>
			&nbsp;
		</dd>
	</dl>

<div class="actions">
	<ul>
		<li class="icon group_edit"><?php echo $html->link(__('Edit Team', true), array('action' => 'edit', $team['Team']['id'])); ?> </li>
		<li class="icon group_delete"><?php echo $html->link(__('Delete Team', true), array('action' => 'delete', $team['Team']['id']), null, sprintf(__('Are you sure you want to delete team # %s?', true), $team['Team']['id'])); ?> </li>
	</ul>
</div>

</div>