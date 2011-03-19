<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon bus"><?php echo $html->link(__('Manage Transport Services', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="transports view">
<h2><?php  echo sprintf(__('Transport Service "%s"', true), "<u>{$transport['Transport']['company']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
    	
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('company'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $transport['Transport']['company']." <em>(Id {$transport['Transport']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type of Unit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $transport['Transport']['type_of_unit']; ?>
			&nbsp;
		</dd>			
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Capacity of Unit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $transport['Transport']['capacity_of_unit']; if($transport['Transport']['capacity_of_unit'] == 1){echo ' person';}else{echo ' people';} ?>
			&nbsp;
		</dd>			
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number of Units'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $transport['Transport']['number_of_units']; ?>
			&nbsp;
		</dd>			
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Price per Unit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo '$'.$transport['Transport']['price_per_unit']; ?>
			&nbsp;
		</dd>	
    </dl>

<?php } ?>

</div>

<div class="actions">
    <ul>
<?php if (!empty($actions)) { ?>
        <li class="icon info"><?php echo $html->link(__('View Transport', true), array('action'=>'view', $transport['Transport']['id'])); ?></li>
<?php } ?>
		<li class="icon pencil"><?php echo $html->link(__('Edit Transport', true), array('action'=>'edit', $transport['Transport']['id'])); ?></li>
<?php if (empty($actions)) { ?>
		
        <li class="icon cross"><?php echo $html->link(__('Delete Transport', true), array('action'=>'delete', $transport['Transport']['id']), null, sprintf(__('Are you sure you want to delete transport "%s"?', true), $transport['Transport']['company'])); ?></li>
<?php } ?>
    </ul>
</div>

</div>