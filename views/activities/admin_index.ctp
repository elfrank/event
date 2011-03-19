<div id="authake">
<div class="activities index">
<?php if (!$tableonly) { ?>
<h2><?php __('Activities');?></h2>
<div class="actions">
    <ul>
        <li class="icon add"><?php echo $html->link(__('New Activity', true), array('action'=>'add')); ?></li>
    </ul>
</div>
<?php } ?>
<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% activities on this system. Page %page%/%pages%', true)
));
?></p>
<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('event_id');?></th>
	<th><?php echo $paginator->sort('short_name');?></th>
	<th><?php echo $paginator->sort('Type', 'contenttype_id');?></th>
	<th><?php echo $paginator->sort('published');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($activities as $activity):
	$class = '';
	if ($i++ % 2 == 0) {
		$class = 'altrow';
	}
        
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $activity['Activity']['id']; ?>
		</td>
		<td>
			<?php echo $activity['Event']['short_name']; ?>
		</td>
		<td>
			<?php echo $html->link(__($activity['Activity']['short_name'], true), array('admin' => 0, 'action' => 'view', $activity['Activity']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($activity['Contenttype']['name'], array('controller' => 'contenttypes', 'action' => 'view', $activity['Contenttype']['id'])); ?>
		</td>
		<td>
			<?php $activity['Activity']['published'] == 1 ?  ($output = "<div class='accept'></div>") : ($output = "<div class='cross'></div>"); echo $output; ?>
		</td>
		
       	<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('admin' => 0, 'action'=>'view', $activity['Activity']['id'])); ?>
			<?php echo $htmlbis->iconlink('pencil', __('Edit', true), array('action'=>'edit', $activity['Activity']['id'])); ?>
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('action'=>'delete', $activity['Activity']['id']), null, sprintf(__('Are you sure you want to delete activity "%s"?', true), $activity['Activity']['short_name'])); ?>
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
		<li class="icon schedule"><?php echo $html->link(__('Manage schedules', true), array('controller'=>'schedules', 'action'=>'index')); ?> </li>
		<li class="icon type"><?php echo $html->link(__('Manage types', true), array('controller'=>'contenttypes', 'action'=>'index')); ?> </li>
        <li class="icon event"><?php echo $html->link(__('Manage events', true), array('controller'=> 'events', 'action'=>'index')); ?> </li>
	</ul>
</div>
<?php } ?>
</div>