<div id="authake">
<div class="schedules index">
<?php if (!$tableonly) { ?>
<h2><?php __('Schedules');?></h2>
<div class="actions">
    <ul>
        <li class="icon add"><?php echo $html->link(__('New Schedule', true), array('action'=>'add')); ?></li>
    </ul>
</div>
<?php } ?>
<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% schedules on this system. Page %page%/%pages%', true)
));
?></p>
<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('activity_id');?></th>
	<th><?php echo $paginator->sort('start_date');?></th>
	<th><?php echo $paginator->sort('end_date');?></th>
	<th><?php echo $paginator->sort('place_id');?></th>
	<th><?php echo $paginator->sort('slots');?></th>
	<th><?php echo $paginator->sort('current_slots');?></th>
	<th><?php echo $paginator->sort('status');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($schedules as $schedule):
	$class = '';
	if ($i++ % 2 == 0) {
		$class = 'altrow';
	}
        
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $html->link(__($schedule['Schedule']['id'], true), array('controller' => 'schedules', 'action' => 'view', $schedule['Schedule']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link(__($schedule['Activity']['short_name'], true), array('controller' => 'activities', 'action' => 'view', $schedule['Activity']['id'])); ?>
		</td>
		<td>
			<?php echo fdate($schedule['Schedule']['start_date']); ?>
		</td>
		<td>
			<?php echo fdate($schedule['Schedule']['end_date']); ?>
		</td>
		<td>
			<?php echo $html->link(__($schedule['Place']['name'], true), array('controller' => 'places', 'action' => 'view', $schedule['Place']['id'])); ?>
		</td>
		<td>
			<?php echo $schedule['Schedule']['slots']; ?>
		</td>
		<td>
			<?php echo $schedule['Schedule']['current_slots']; ?>
		</td>
		<td>
			<?php $schedule['Schedule']['status'] == 1 ?  ($output = "<div class='accept'></div>") : ($output = "<div class='cross'></div>"); echo $output; ?>
		</td>
		<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('action'=>'view', $schedule['Schedule']['id'])); ?>
			<?php echo $htmlbis->iconlink('pencil', __('Edit', true), array('action'=>'edit', $schedule['Schedule']['id'])); ?>
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('action'=>'delete', $schedule['Schedule']['id']), null, sprintf(__('Are you sure you want to delete schedule "%s-%s"?', true), $schedule['Schedule']['start_date'],$schedule['Schedule']['end_date'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

<div class="actions">
    <ul>
		<li class="icon activity"><?php echo $html->link(__('Manage Activities', true), array('controller' => 'activities','action'=>'index')); ?></li>
		<li class="icon add"><?php echo $html->link(__('Add Activity', true), array('controller' => 'activities', 'action'=>'add')); ?></li>
		<li class="icon user"><?php echo $html->link(__('Manage Users', true), array('controller' => 'users','action'=>'index')); ?></li>
		<li class="icon add"><?php echo $html->link(__('Add User', true), array('controller' => 'users', 'action'=>'add')); ?></li>
    </ul>
</div>


<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<?php if (!$tableonly) { ?>
<div class="actions">
	<ul>
	</ul>
</div>
<?php } ?>
</div>
