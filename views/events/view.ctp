<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon event"><?php echo $html->link(__('Return To Events', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="events view">
<h2><?php  echo sprintf(__('Event "%s"', true), "<u>{$event['Event']['short_name']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
    	
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Short Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['short_name']; ?>
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
		
    </dl>

<?php } ?>

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
		</td>
		</tr>
	<?php endforeach; ?>
<?php } ?>
	</table>
</div>
</div>