<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon place"><?php echo $html->link(__('Return to Schedules', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="places view">
<h2><?php  echo sprintf(__('Schedule "%s" from "%s"', true), "<u>{$schedule['Schedule']['id']}</u>", "<u>{$schedule['Activity']['short_name']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
            
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($schedule['Activity']['short_name'], array('controller'=> 'activities', 'action'=>'view', $schedule['Activity']['id'])); ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Place'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($schedule['Place']['name'], array('controller'=> 'places', 'action'=>'view', $schedule['Place']['id'])); ?>
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
    </dl>

<?php } ?>

</div>

<div class="related">
	<h3><?php __('Suscribed Users');?></h3>
	<?php if (!empty($schedule['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Username'); ?></th>
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
			<td><?php echo $user['login'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>


</div>