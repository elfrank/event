<div id="authake">
<div class="transports index">
<?php if (!$tableonly) { ?>
<h2><?php __('Transport Services');?></h2>
<div class="actions">
    <ul>
        <li class="icon add"><?php echo $html->link(__('New Transport Service', true), array('action'=>'add')); ?></li>
    </ul>
</div>
<?php } ?>
<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% transport services on this system. Page %page%/%pages%', true)
));
?></p>
<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('company');?></th>
	<th><?php echo $paginator->sort('type_of_unit');?></th>
	<th><?php echo $paginator->sort('capacity_of_unit');?></th>
	<th><?php echo $paginator->sort('number_of_units');?></th>
	<th><?php echo $paginator->sort('price_per_unit');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($transports as $transport):
	$class = '';
	if ($i++ % 2 == 0) {
		$class = 'altrow';
	}
        
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $transport['Transport']['id']; ?>
		</td>
		<td>
			<?php echo $html->link(__($transport['Transport']['company'], true), array('action' => 'view', $transport['Transport']['id'])); ?>
		</td>
		<td>
			<?php echo $transport['Transport']['type_of_unit']; ?>
		</td>
		<td>
			<?php echo $transport['Transport']['capacity_of_unit']; if($transport['Transport']['capacity_of_unit'] == 1){echo ' person';}else{echo ' people';} ?>
		</td>
		<td>
			<?php echo $transport['Transport']['number_of_units']; ?>
		</td>
		<td>
			<?php echo '$'.$transport['Transport']['price_per_unit']; ?>
		</td>
		
       	<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('action'=>'view', $transport['Transport']['id'])); ?>
			<?php echo $htmlbis->iconlink('pencil', __('Edit', true), array('action'=>'edit', $transport['Transport']['id'])); ?>
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('action'=>'delete', $transport['Transport']['id']), null, sprintf(__('Are you sure you want to delete transport service "%s"?', true), $transport['Transport']['company'])); ?>
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