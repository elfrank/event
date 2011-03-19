<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon place"><?php echo $html->link(__('Manage Places', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="places view">
<h2><?php  echo sprintf(__('Place "%s"', true), "<u>{$place['Place']['name']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
            
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($place['Place']['name'], array('action'=>'view', $place['Place']['id']))." <em>(Id {$place['Place']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $place['Place']['description']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slots'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $place['Place']['slots']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number of Computers'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $place['Place']['computers']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is a Computer Room?'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $place['Place']['computer_room']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created on'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d/m/Y H:i', $time->fromString($place['Place']['created'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated on'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d/m/Y H:i', $time->fromString($place['Place']['modified'])); ?>
			&nbsp;
		</dd>
    </dl>

<?php } ?>

</div>

<div class="actions">
    <ul>
<?php if (!empty($actions)) { ?>
        <li class="icon info"><?php echo $html->link(__('View Place', true), array('action'=>'view', $place['Place']['id'])); ?></li>
<?php } ?>
		<li class="icon add"><?php echo $html->link(__('Add Place', true), array('action'=>'add')); ?></li>
		<li class="icon edit"><?php echo $html->link(__('Edit Place', true), array('action'=>'edit', $place['Place']['id'])); ?></li>
<?php if (empty($actions)) { ?>
		
        <li class="icon cross"><?php echo $html->link(__('Delete Place', true), array('action'=>'delete', $place['Place']['id']), null, sprintf(__('Are you sure you want to delete place "%s"?', true), $place['Place']['name'])); ?></li>
<?php } ?>
    </ul>
</div>
</div>