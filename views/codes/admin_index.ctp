<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2><?php __('Codes');?></h2>

<div class="actions">
    <ul>
	<li class="icon code"><?php echo $html->link(__('New Code', true), array('action' => 'add')); ?></li>
    </ul>
</div>

<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% coupon codes in this event. Page %page%/%pages%', true)
));
?>
</p>

<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('coupon_id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo __('Package', true); ?></th>
	<th><?php echo $paginator->sort('code');?></th>
	<th><?php echo $paginator->sort('used');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
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
			<?php echo $code['Code']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($code['Coupon']['name'], array('controller' => 'coupons', 'action' => 'view', $code['Coupon']['id'])); ?>
		</td>
		<td>
			<?php 
			      if(!empty($profiles[$code['Code']['id']]))
			      {
				echo $html->link($profiles[$code['Code']['id']]['Profile']['first_name'].' '.$profiles[$code['Code']['id']]['Profile']['last_name'], array('admin' => 0, 'plugin' => 'authake', 'controller' => 'users', 'action' => 'view', $code['User']['id']));
			      }
			      else
			      {
				__('Not assigned yet');
			      }
			?>
		</td>
		<td>
			<?php 
			      if(!empty($packages[$code['Code']['id']]))
			      {
				echo $html->link($packages[$code['Code']['id']]['Package']['name'], array('admin' => 1, 'controller' => 'packages', 'action' => 'view', $code['Code']['package_id']));
			      }
			      else
			      {
				__('Not assigned yet');
			      }
			?>		
		</td>
		<td>
			<?php echo $code['Code']['code']; ?>
		</td>
		<td>
			<?php echo __(ucfirst($code['Code']['used']), true); ?>
		</td>
		<td>
			<?php echo fdate($code['Code']['created']); ?>
		</td>	
		<td class="actions">
		    <?php echo $html->link($html->image('../img/icons/information.png'), array('action'=>'view', $code['Code']['id']), array('title' => __('View', true)), null, false); ?> 
		    <?php echo $html->link($html->image('../img/icons/pencil.png'), array('action'=>'edit', $code['Code']['id']), array('title' => __('Edit', true)), null, false); ?> 
		    <?php echo $html->link($html->image('../img/icons/delete.png'), array('action'=>'delete', $code['Code']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete code # %s?', true), $code['Code']['id']), false); ?>
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