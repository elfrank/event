<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2><?php __('Codes');?></h2>

<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% coupon codes in this event. Page %page%/%pages%', true)
));
?>
</p>

<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('coupon_id');?></th>
	<th><?php echo $paginator->sort('code');?></th>
	<th><?php echo $paginator->sort('discount');?></th>
	<th><?php echo $paginator->sort('used');?></th>
</tr>
<?php
$i = 0;
foreach ($codes as $code):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $html->link($code['Coupon']['name'], array('controller' => 'coupons', 'action' => 'view', $code['Coupon']['id'])); ?>
		</td>
		<td>
			<?php echo $code['Code']['code']; ?>
		</td>
		<td>
			<?php echo '$'.$code['Code']['discount']; ?>
		</td>
		<td>
			<?php echo __(ucfirst($code['Code']['used']), true); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>


<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>

<div class="actions">
    <ul>
	<li class="icon signup"><?php echo $html->link(__('Go To Signups', true), array('controller' => 'signups', 'action' => 'index')); ?></li>
    </ul>
</div>

</div>