<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2><?php __('Coupons');?></h2>

<div class="actions">
    <ul>
        <li class="icon coupon"><?php echo $html->link(__('New Coupon', true), array('action'=>'add')); ?></li>
    </ul>
</div>

<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% coupons in this event. Page %page%/%pages%', true)
));
?>
</p>

<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('percentage');?></th>
	<th><?php __('Codes'); ?></th>
	<th><?php __('Used Codes'); ?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($coupons as $coupon):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $coupon['Coupon']['id']; ?>
		</td>
		<td>
			<?php echo $coupon['Coupon']['name']; ?>
		</td>
		<td>
			<?php echo $coupon['Coupon']['description']; ?>
		</td>
		<td>
			<?php echo $coupon['Coupon']['percentage'].' %'; ?>
		</td>
		<td>
			<?php echo $numberOfCodes[$coupon['Coupon']['id']]; ?>
		</td>
		<td>
			<?php echo $numberOfUsedCodes[$coupon['Coupon']['id']]; ?>
		</td>
		<td>
			<?php echo fdate($coupon['Coupon']['created']); ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('../img/icons/information.png'), array('action'=>'view', $coupon['Coupon']['id']), array('title' => __('View', true)), null, false); ?> 
			<?php echo $html->link($html->image('../img/icons/pencil.png'), array('action'=>'edit', $coupon['Coupon']['id']), array('title' => __('Edit', true)), null, false); ?> 
			<?php echo $html->link($html->image('../img/icons/delete.png'), array('action'=>'delete', $coupon['Coupon']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete coupon  # %s?', true), $coupon['Coupon']['id']), false); ?>
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
