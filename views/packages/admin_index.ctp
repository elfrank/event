<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2><?php __('Packages');?></h2>

<div class="actions">
    <ul>
        <li class="icon pack_add"><?php echo $html->link(__('New Package', true), array('action'=>'add')); ?></li>
    </ul>
</div>

<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% packages on this system. Page %page%/%pages%', true)
));
?>
</p>

<table class="listing" cellpadding="0" cellspacing="0">
       <tr>
		<th><?php echo $paginator->sort('id');?></th>
		<th><?php echo $paginator->sort('name');?></th>
		<th><?php echo $paginator->sort('price');?></th>
		<th><?php echo $paginator->sort('Slots', 'qty');?></th>
		<th><?php echo $paginator->sort('created');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
<?php

$i = 0;

foreach($packages as $package):
	$class = null;

	if ($i++ % 2 == 0) 
	{
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $package['Package']['id']; ?>
		</td>
		<td>
			<?php echo $package['Package']['name']; ?>
		</td>
		<td>
			<?php echo '$'.$package['Package']['price']; ?>
		</td>
		<td>
			<?php echo $package['Package']['qty']; ?>
		</td>
		<td>
			<?php echo fdate($package['Package']['created']); ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('../img/icons/information.png'), array('action'=>'view', $package['Package']['id']), array('title' => __('View', true)), null, false); ?> 
			<?php echo $html->link($html->image('../img/icons/pencil.png'), array('action'=>'edit', $package['Package']['id']), array('title' => __('Edit', true)), null, false); ?> 
			<?php echo $html->link($html->image('../img/icons/delete.png'), array('action'=>'delete', $package['Package']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $package['Package']['id']), false); ?>
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
