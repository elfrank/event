<div id="authake">
<div class="tickets index">

<h2><?php __('Inbox');?></h2>
<div class="actions">
    <ul>
        <li class="icon add"><?php echo $html->link(__('New Ticket', true), array('action'=>'add')); ?></li>
    </ul>
</div>
<?php
	if(count($tickets) > 0)
	{
?>
<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% tickets on this system. Page %page%/%pages%', true)
));
?></p>
<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('area_id');?></th>
	<th><?php echo $paginator->sort('subject');?></th>
	<th><?php echo $paginator->sort('created');?></th>	
	<th><?php echo "Replied"; ?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($tickets as $ticket):
	$class = '';
	if ($i++ % 2 == 0) {
		$class = 'altrow';
	}
        
?>
	<tr class="<?php echo $class;?>">
		<td>
			<?php echo $ticket['Ticket']['id']; ?>
		</td>
		<td>
			<?php echo $ticket['Area']['name']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['subject']; ?>
		</td>
		<td>
			<?php echo fdate($ticket['Ticket']['created']); ?>
		</td>
		<td>
			<?php 
				if($ticket['Ticket']['reply'] != '')
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
			?>
		</td>
		
       	<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('action'=>'view', $ticket['Ticket']['id'])); ?>
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('action'=>'delete', $ticket['Ticket']['id']), null, sprintf(__('Are you sure you want to delete ticket "%s"?', true), $ticket['Ticket']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php
	}
	else
	{
		echo "<br />No messages";
	}
?>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
</div>