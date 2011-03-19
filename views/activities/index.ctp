<div id="authake">
<div class="activities index">
<?php if (!$tableonly) { ?>
<h2><?php __('Activities');?></h2>
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
	<th class="actions"></th>
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
			<?php echo $html->link(__($activity['Activity']['short_name'], true), array('action' => 'view', $activity['Activity']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($activity['Contenttype']['name'], array('controller' => 'contenttypes', 'action' => 'view', $activity['Contenttype']['id'])); ?>
		</td>
		<td>
			<?php $activity['Activity']['published'] == 1 ?  ($output = "<div class='accept'></div>") : ($output = "<div class='cross'></div>"); echo $output; ?>
		</td>
		
       	<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('action'=>'view', $activity['Activity']['id'])); ?>
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
</div>