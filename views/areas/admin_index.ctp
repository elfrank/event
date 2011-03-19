<div id="authake">
<div class="areas index">
<?php if (!$tableonly) { ?>
<h2><?php __('Areas');?></h2>
<div class="actions">
    <ul>
        <li class="icon add"><?php echo $html->link(__('New Area', true), array('action'=>'add')); ?></li>
    </ul>
</div>
<?php } ?>
<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% areas on this system. Page %page%/%pages%', true)
));
?></p>
<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($areas as $area):
	$class = '';
	if ($i++ % 2 == 0) {
		$class = 'altrow';
	}
        
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $area['Area']['id']; ?>
		</td>
		<td>
			<?php echo $html->link(__($area['Area']['name'], true), array('action' => 'view', $area['Area']['id'])); ?>
		</td>
		<td>
			<?php echo $area['Area']['description']; ?>
		</td>
		<td>
			<?php $area['Area']['active'] == 1 ?  ($output = "<div class='accept'></div>") : ($output = "<div class='cross'></div>"); echo $output; ?>
		</td>
		
       	<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('action'=>'view', $area['Area']['id'])); ?>
			<?php echo $htmlbis->iconlink('pencil', __('Edit', true), array('action'=>'edit', $area['Area']['id'])); ?>
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('action'=>'delete', $area['Area']['id']), null, sprintf(__('Are you sure you want to delete area "%s"?', true), $area['Area']['name'])); ?>
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
		<li class="icon schedule"><?php echo $html->link(__('Manage Menus', true), array('controller'=>'menus', 'action'=>'index')); ?> </li>
	</ul>
</div>
<?php } ?>
</div>