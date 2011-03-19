<div id="authake">

<h2><?php __('Teams');?></h2>

<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% teams on this event. Page %page%/%pages%', true)
));
?>
</p>

<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php __('# Members'); ?></th>
</tr>
<?php
$i = 0;
foreach ($teams as $team):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $team['Team']['name']; ?>
		</td>
		<td>
			<?php echo $numberOfMembers[$team['Team']['id']]; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
</div>
