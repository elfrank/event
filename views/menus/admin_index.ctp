<div id="authake">
<div class="menus index">
<?php if (!$tableonly) { ?>
<h2><?php __('Menus');?></h2>
<div class="actions">
    <ul>
        <li class="icon add"><?php echo $html->link(__('New Menu', true), array('action'=>'add')); ?></li>
    </ul>
</div>
<?php } ?>
<p class="paging_count">
<?php
echo $paginator->counter(array(
'format' => __('There are %current% menus on this system. Page %page%/%pages%', true)
));
?></p>
<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('area');?></th>
	<th><?php echo $paginator->sort('url');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($menus as $menu):
	$class = '';
	if ($i++ % 2 == 0) {
		$class = 'altrow';
	}
        
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $menu['Menu']['id']; ?>
		</td>
		<td>
			<?php echo $html->link(__($menu['Menu']['name'], true), array('action' => 'view', $menu['Menu']['id'])); ?>
		</td>
		<td>
			<?php echo $menu['Menu']['description']; ?>
		</td>
		<td>
			<?php echo $html->link(__($menu['Area']['name'], true), array('controller' => 'areas', 'action' => 'view', $menu['Area']['id'])); ?>
		</td>
		<td>
			<?php echo $menu['Menu']['url']; ?>
		</td>
		<td>
			<?php $menu['Menu']['active'] == 1 ?  ($output = "<div class='accept'></div>") : ($output = "<div class='cross'></div>"); echo $output; ?>
		</td>
		
       	<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('action'=>'view', $menu['Menu']['id'])); ?>
			<?php echo $htmlbis->iconlink('pencil', __('Edit', true), array('action'=>'edit', $menu['Menu']['id'])); ?>
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('action'=>'delete', $menu['Menu']['id']), null, sprintf(__('Are you sure you want to delete area "%s"?', true), $menu['Menu']['name'])); ?>
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
		<li class="icon activity"><?php echo $html->link(__('Manage Activities', true), array('controller'=>'activities', 'action'=>'index')); ?> </li>
		<li class="icon place"><?php echo $html->link(__('Manage Places', true), array('controller'=>'places', 'action'=>'index')); ?> </li>
	</ul>
</div>
<?php } ?>
</div>