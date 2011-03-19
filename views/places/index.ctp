<div id="authake">
<div class="places index">
<?php if (!$tableonly) { ?>
<h2><?php __('Places');?></h2>
<?php } ?>
<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% places on this system. Page %page%/%pages%', true)
));
?></p>
<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('slots');?></th>
	<th><?php echo $paginator->sort('computers');?></th>
	<th><?php echo $paginator->sort('Computer Room?','computer_room');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($places as $place):
	$class = '';
	if ($i++ % 2 == 0) {
		$class = 'altrow';
	}
        
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $place['Place']['id']; ?>
		</td>
		<td>
			<?php echo $html->link(__($place['Place']['name'], true), array('action' => 'view', $place['Place']['id'])); ?>
		</td>
		<td>
			<?php echo $place['Place']['description']; ?>
		</td>
		<td>
			<?php echo $place['Place']['slots']; ?>
		</td>
		<td>
			<?php echo $place['Place']['computers']; ?>
		</td>
		<td>
			<?php echo $place['Place']['computer_room']; ?>
		</td>
		<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('action'=>'view', $place['Place']['id'])); ?>
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
