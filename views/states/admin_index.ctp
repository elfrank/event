<div id="authake">
<div class="states index">
<?php if (!$tableonly) { ?>
<h2><?php __('States');?></h2>
<div class="actions">
    <ul>
        <li class="icon add"><?php echo $html->link(__('New State', true), array('action'=>'add')); ?></li>
    </ul>
</div>
<?php } ?>
<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% states on this system. Page %page%/%pages%', true)
));
?></p>
<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($states as $state):
	$class = '';
	if ($i++ % 2 == 0) {
		$class = 'altrow';
	}
        
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $state['State']['id']; ?>
		</td>
		<td>
			<?php echo $html->link(__($state['State']['name'], true), array('action' => 'view', $state['State']['id'])); ?>
		</td>
		
       	<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('action'=>'view', $state['State']['id'])); ?>
			<?php echo $htmlbis->iconlink('pencil', __('Edit', true), array('action'=>'edit', $state['State']['id'])); ?>
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('action'=>'delete', $state['State']['id']), null, sprintf(__('Are you sure you want to delete state "%s"?', true), $state['State']['name'])); ?>
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
		<li class="icon user"><?php echo $html->link(__('Manage Users', true), array('controller'=>'users', 'action'=>'index')); ?> </li>
		<li class="icon group"><?php echo $html->link(__('Manage Groups', true), array('controller'=>'groups', 'action'=>'index')); ?> </li>
	</ul>
</div>
<?php } ?>
</div>