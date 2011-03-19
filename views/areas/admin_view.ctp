<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon activity"><?php echo $html->link(__('Manage Areas', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="activities view">
<h2><?php  echo sprintf(__('Area "%s"', true), "<u>{$area['Area']['name']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
    	
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $area['Area']['name']." <em>(Id {$area['Area']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $area['Area']['description']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Active'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php $area['Area']['active'] == 1 ?  ($output = "<div class='accept'></div>") : ($output = "<div class='cross'></div>"); echo $output; ?>
			&nbsp;
		</dd>
    </dl>

<?php } ?>

</div>

<div class="actions">
    <ul>
<?php if (!empty($actions)) { ?>
        <li class="icon info"><?php echo $html->link(__('View Area', true), array('action'=>'view', $area['Area']['id'])); ?></li>
<?php } ?>
		<li class="icon edit"><?php echo $html->link(__('Edit Area', true), array('action'=>'edit', $area['Area']['id'])); ?></li>
<?php if (empty($actions)) { ?>
		
        <li class="icon cross"><?php echo $html->link(__('Delete Area', true), array('action'=>'delete', $area['Area']['id']), null, sprintf(__('Are you sure you want to delete area "%s"?', true), $area['Area']['name'])); ?></li>
<?php } ?>
    </ul>
</div>

</div>