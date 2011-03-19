<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon place"><?php echo $html->link(__('Manage Schedules', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="places view">
<h2><?php  echo sprintf(__('Schedule "%s" from "%s"', true), "<u>{$schedule['Schedule']['id']}</u>", "<u>{$schedule['Activity']['short_name']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
            
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($schedule['Activity']['short_name'], array('controller'=> 'activities', 'action'=>'view', $schedule['Activity']['id']))." <em>(Id {$schedule['Activity']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Place'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($schedule['Place']['name'], array('controller'=> 'places', 'action'=>'view', $schedule['Place']['id']))." <em>(Id {$schedule['Place']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo fdate($schedule['Schedule']['start_date']); ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('End Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo fdate($schedule['Schedule']['end_date']); ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slots'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $schedule['Schedule']['slots']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Current Slots'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $schedule['Schedule']['current_slots']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created on'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo fdate($schedule['Schedule']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated on'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo fdate($schedule['Schedule']['modified']); ?>
			&nbsp;
		</dd>
    </dl>

<?php } ?>

</div>

<div class="actions">
    <ul>
		<li class="icon add"><?php echo $html->link(__('Add Schedule', true), array('action'=>'add')); ?></li>
		<li class="icon edit"><?php echo $html->link(__('Edit Schedule', true), array('action'=>'edit', $schedule['Schedule']['id'])); ?></li>
<?php if (empty($actions)) { ?>
		
        <li class="icon cross"><?php echo $html->link(__('Delete Schedule', true), array('action'=>'delete', $schedule['Schedule']['id']), null, sprintf(__('Are you sure you want to delete schedule "%s-%s"?', true), $schedule['Schedule']['start_date'],$schedule['Schedule']['end_date'])); ?></li>
<?php } ?>
    </ul>
</div>

<div class="related">
	<h3><?php __('Suscribed Users');?></h3>
	<?php if (!empty($schedule['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Username'); ?></th>
		<th><?php __('Email'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($schedule['User'] as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['login'];?></td>
			<td><?php echo $user['email'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), '/authake/users/view/'.$user['id']); ?>
				<?php echo $html->link(__('Edit', true), '/authake/users/edit/'.$user['id']); ?>
				<?php echo $html->link(__('Delete', true), '/authake/users/delete/'.$user['id'], null, sprintf(__('Are you sure you want to delete # %s?', true), $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>


</div>