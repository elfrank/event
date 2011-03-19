<div id="authake">

<h2><?php __('Teams');?></h2>

<div class="actions">
    <ul>
        <li class="icon group_add"><?php echo $html->link(__('New Team', true), array('action'=>'add')); ?></li>
    </ul>
</div>

<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% teams on this event. Page %page%/%pages%', true)
));
?>
</p>

<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('Leader','user_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php __('Members'); ?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
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
			<?php echo $team['Team']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($team['Profile']['first_name'].' '. $team['Profile']['last_name'], array('admin' => 0, 'plugin' => 'authake', 'controller' => 'users', 'action' => 'view', $team['Profile']['id'])); ?>
		</td>
		<td>
			<?php echo $team['Team']['name']; ?>
		</td>
		<td>
			<?php echo $numberOfMembers[$team['Team']['id']]; ?>
		</td>
		<td>
			<?php echo fdate($team['Team']['created']); ?>
		</td>
		<td>
			<?php echo fdate($team['Team']['modified']); ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('../img/icons/information.png'), array('action'=>'view', $team['Team']['id']), array('title' => __('View', true)), null, false); ?> 
			<?php echo $html->link($html->image('../img/icons/pencil.png'), array('action'=>'edit', $team['Team']['id']), array('title' => __('Edit', true)), null, false); ?> 
			<?php echo $html->link($html->image('../img/icons/delete.png'), array('action'=>'delete', $team['Team']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $team['Team']['id']), false); ?>
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
