<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon signup"><?php echo $html->link(__('Manage signups', true), array('controller' => 'packages', 'action'=>'signups'));?></li>
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2><?php echo(__('Signups for Package', true)); ?></h2> 

<h4><?php echo $packageName; ?></h4>

<p>

<?php
	if(empty($signups))
	{
		__("There are no signups for this package.");
	}
	else
	{
   
   echo '<p class="paging_count">';
   echo $paginator->counter(array('format' => __('There are %current% signups in this package. Page %page%/%pages%', true)));
echo '</p>';
  ?>

<table class="listing" cellpadding="0" cellspacing="0">
       <tr>
		<th><?php echo $paginator->sort('Id','id', array('url' => array($signups['0']['Package']['id'])));?></th>
		<th><?php echo $paginator->sort('User Name', 'name', array('url' => array($signups['0']['Package']['id'])));?></th>
		<th><?php __('Team'); ?></th>
		<th><?php echo $paginator->sort('Signup Date', 'created', array('url' => array($signups['0']['Package']['id'])));?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
<?php

$i = 0;

foreach($signups as $signup):
	$class = null;

	if ($i++ % 2 == 0) 
	{
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $signup['Signup']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($signup['Profile']['first_name'].' '.$signup['Profile']['last_name'], array('admin' => 0, 'plugin' => 'authake', 'controller' => 'users', 'action' => 'view', $signup['Profile']['user_id'])); ?>
		</td>
		<td>
			<?php 
			      if($teams[$signup['Profile']['id']]['Team']['name'])
			      {
				echo $html->link($teams[$signup['Profile']['id']]['Team']['name'], array('controller' => 'teams', 'action'=>'view', $teams[$signup['Profile']['id']]['Team']['id']), array('title' => __('View', true), null, false)); 
			      }
			      else
			      {
				__('None');
			      }
			?>
		</td>
		<td>
			<?php echo fdate($signup['Package']['created']); ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('../img/icons/cross.png'), array('action' => 'admin_cancel', $signup['Signup']['id'], $signups['0']['Package']['id']), array('title' => __('Cancel', true)), sprintf(__('Are you sure you want to cancel signup # %s?', true), $signup['Signup']['id']), false); ?>
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

<?php 
      }
?>
