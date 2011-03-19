<div id="authake">
<div class="events index">
<?php if (!$tableonly) { ?>
<h2><?php __('Events');?></h2>
<div class="actions">
    <ul>
        <li class="icon add"><?php echo $html->link(__('New Event', true), array('action'=>'add')); ?></li>
    </ul>
</div>
<?php } ?>
<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% events on this system. Page %page%/%pages%', true)
));
?></p>
<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('short_name');?></th>
	<th><?php echo $paginator->sort('slogan');?></th>
	<th><?php echo $paginator->sort('place');?></th>
	<th><?php echo $paginator->sort('start_date');?></th>
	<th><?php echo $paginator->sort('end_date');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($events as $event):
	$class = '';
	if ($i++ % 2 == 0) {
		$class = 'altrow';
	}
        
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $event['Event']['id']; ?>
		</td>
		<td>
			<?php echo $html->link(__($event['Event']['short_name'], true), array('action' => 'view', $event['Event']['id'])); ?>
		</td>
		<td>
			<?php echo $event['Event']['slogan']; ?>
		</td>
		<td>
			<?php echo $event['Event']['place']; ?>
		</td>
		<td>
			<?php echo fdate($event['Event']['start_date']); ?>
		</td>
		<td>
			<?php echo fdate($event['Event']['end_date']); ?>
		</td>
		<td>
			<?php $event['Event']['active'] == 1 ?  ($output = "<div class='accept'></div>") : ($output = "<div class='cross'></div>"); echo $output; ?>
		</td>
		
       	<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('action'=>'view', $event['Event']['id'])); ?>
			<?php echo $htmlbis->iconlink('pencil', __('Edit', true), array('action'=>'edit', $event['Event']['id'])); ?>
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('action'=>'delete', $event['Event']['id']), null, sprintf(__('Are you sure you want to delete area "%s"?', true), $event['Event']['short_name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<?php if (!$tableonly) { ?>
<div class="actions">
	<ul>
		<li class="icon activity"><?php echo $html->link(__('Manage Activities', true), array('controller'=>'activities', 'action'=>'index')); ?> </li>
		<li class="icon place"><?php echo $html->link(__('Manage Places', true), array('controller'=>'places', 'action'=>'index')); ?> </li>
	</ul>
</div>
<?php } ?>
</div>