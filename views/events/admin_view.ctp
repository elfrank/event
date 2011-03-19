<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon event"><?php echo $html->link(__('Manage Events', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="events view">
<h2><?php  echo sprintf(__('Event "%s"', true), "<u>{$event['Event']['short_name']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
    	
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Short Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['short_name']." <em>(Id {$event['Event']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Long Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['long_name']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slogan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['slogan']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Place'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['place']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['description']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo fdate($event['Event']['start_date']); ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('End Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo fdate($event['Event']['end_date']); ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Active'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php $event['Event']['active'] == 1 ?  ($output = "<div class='accept'></div>") : ($output = "<div class='cross'></div>"); echo $output; ?>
			&nbsp;
		</dd>
    </dl>

<?php } ?>

</div>

<div class="actions">
    <ul>
<?php if (!empty($actions)) { ?>
        <li class="icon view"><?php echo $html->link(__('View Event', true), array('action'=>'view', $event['Event']['id'])); ?></li>
<?php } ?>
		<li class="icon add"><?php echo $html->link(__('New Event', true), array('action'=>'add', $event['Event']['id'])); ?></li>
		<li class="icon edit"><?php echo $html->link(__('Edit Event', true), array('action'=>'edit', $event['Event']['id'])); ?></li>
<?php if (empty($actions)) { ?>
		
        <li class="icon cross"><?php echo $html->link(__('Delete Event', true), array('action'=>'delete', $event['Event']['id']), null, sprintf(__('Are you sure you want to delete event "%s"?', true), $event['Event']['short_name'])); ?></li>
<?php } ?>
    </ul>
</div>

<div class="related">
	<h3><?php __('Related Packages');?></h3>
	<?php if (!empty($event['Package'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Quantity'); ?></th>
		<th><?php __('Sales End'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php endif; ?>
	
<?php if (empty($actions)) { ?>
        <?php  
        foreach ($event['Package'] as $package):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $package['name'];?></td>
			<td><?php echo $package['description'];?></td>
			<td><?php echo $package['price'];?></td>
			<td><?php echo $package['qty'];?></td>
			<td><?php echo fdate($package['sales_end']);?></td>
			
			
			<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('controller' => 'packages', 'action'=>'view', $package['id'])); ?>
			<?php echo $htmlbis->iconlink('pencil', __('Edit', true), array('controller' => 'packages', 'action'=>'edit', $package['id'])); ?>
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('controller' => 'packages', 'action'=>'delete', $package['id']), null, sprintf(__('Are you sure you want to delete package "%s"?', true), $package['name'])); ?>
		</td>
		</tr>
	<?php endforeach; ?>
<?php } ?>
	</table>
</div>

<div class="related">
	<h3><?php __('Related Activities');?></h3>
	<?php if (!empty($event['Activity'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Short Name'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php endif; ?>
	
<?php if (empty($actions)) { ?>
        <?php  
        foreach ($event['Activity'] as $activity):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $activity['short_name'];?></td>			
			<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('controller' => 'activities', 'action'=>'view', $activity['id'])); ?>
			<?php echo $htmlbis->iconlink('pencil', __('Edit', true), array('controller' => 'activities', 'action'=>'edit', $activity['id'])); ?>
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('controller' => 'activities', 'action'=>'delete', $activity['id']), null, sprintf(__('Are you sure you want to delete activity "%s"?', true), $activity['short_name'])); ?>
		</td>
		</tr>
	<?php endforeach; ?>
<?php } ?>
	</table>
</div>
</div>