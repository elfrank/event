<div id="authake">
<div class="contenttypes index">
<?php if (!$tableonly) { ?>
<h2><?php __('Content Types');?></h2>
<div class="actions">
    <ul>
        <li class="icon add"><?php echo $html->link(__('New Content Type', true), array('action'=>'add')); ?></li>
    </ul>
</div>
<?php } ?>
<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% content types on this system. Page %page%/%pages%', true)
));
?></p>
<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($contenttypes as $contenttype):
	$class = '';
	if ($i++ % 2 == 0) {
		$class = 'altrow';
	}
        
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $contenttype['Contenttype']['id']; ?>
		</td>
		<td>
			<?php echo $html->link(__($contenttype['Contenttype']['name'], true), array('action' => 'view', $contenttype['Contenttype']['id'])); ?>
		</td>
		<td>
			<?php echo $contenttype['Contenttype']['description']; ?>
		</td>
		<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('action'=>'view', $contenttype['Contenttype']['id'])); ?>
			<?php echo $htmlbis->iconlink('pencil', __('Edit', true), array('action'=>'edit', $contenttype['Contenttype']['id'])); ?>
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('action'=>'delete', $contenttype['Contenttype']['id']), null, sprintf(__('Are you sure you want to delete activity "%s"?', true), $contenttype['Contenttype']['name'])); ?>
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
	</ul>
</div>
<?php } ?>
</div>