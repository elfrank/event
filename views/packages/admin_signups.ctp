<div id="authake">

<div class="actions menuheader">
    <ul> 
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2><?php __('Signups');?></h2>

<p class="paging_count">
  <?php
     echo $paginator->counter(array('format' => __('There are %current% signups of this event. Page %page%/%pages%', true)));
  ?>
</p>

<table class="listing" cellpadding="0" cellspacing="0">
       <tr>
		<th><?php echo $paginator->sort('id');?></th>
		<th><?php echo $paginator->sort('name');?></th>
		<th><?php __('Signups/Slots'); ?></th>
		<th><?php __('Earnings') ?></th>
		<th><?php __('Discounts') ?></th>
		<th><?php __('Latest Signup Date'); ?></th>
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
			<?php echo $html->link($package['Package']['name'], array('action'=>'view', $package['Package']['id']), array('title' => __('View', true)), null, false); ?> 
		</td>
		<td>
			<?php echo $numberOfSignups[$package['Package']['id']].'/'.$package['Package']['qty']; ?>
		</td>
		<td>
			<?php echo '$'.(($package['Package']['price'] * $numberOfSignups[$package['Package']['id']]) - $discounts[$package['Package']['id']]); ?>
		</td>
		<td>
			<?php echo '$'.$discounts[$package['Package']['id']]; ?>
		</td>
		<td>
			<?php 
			      if(!empty($lastSignupDates[$package['Package']['id']]))
			      {
				echo fdate($lastSignupDates[$package['Package']['id']]);
			      }
			      else
			      {
				__('No signups yet');
			      }
			?>
		</td>
		<td class="actions">	
			<?php echo $html->link($html->image('../img/icons/information.png'), array('controller' => 'signups', 'action' => 'admin_view', $package['Package']['id']), array('title' => __('View', true)), null, false); ?> 
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
    <li class="icon stats"><?php echo $html->link(__('Statistics', true), array('controller' => 'signups', 'action' => 'admin_statistics')); ?></li>
  </ul>
</div>
</div>
