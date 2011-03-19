<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon contenttype"><?php echo $html->link(__('Manage Content Types', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="contenttypes view">
<h2><?php  echo sprintf(__('Content Type "%s"', true), "<u>{$contenttype['Contenttype']['name']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
            
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($contenttype['Contenttype']['name'], array('controller'=> 'events', 'action'=>'view', $contenttype['Contenttype']['id']))." <em>(Id {$contenttype['Contenttype']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contenttype['Contenttype']['description']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created on'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d/m/Y H:i', $time->fromString($contenttype['Contenttype']['created'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated on'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d/m/Y H:i', $time->fromString($contenttype['Contenttype']['modified'])); ?>
			&nbsp;
		</dd>
    </dl>

<?php } ?>

</div>

<div class="actions">
    <ul>
<?php if (!empty($actions)) { ?>
        <li class="icon info"><?php echo $html->link(__('View type', true), array('action'=>'view', $contenttype['Contenttype']['id'])); ?></li>
<?php } ?>
		<li class="icon add"><?php echo $html->link(__('Add type', true), array('action'=>'add')); ?></li>
		<li class="icon edit"><?php echo $html->link(__('Edit type', true), array('action'=>'edit', $contenttype['Contenttype']['id'])); ?></li>
<?php if (empty($actions)) { ?>
		
        <li class="icon cross"><?php echo $html->link(__('Delete activity', true), array('action'=>'delete', $contenttype['Contenttype']['id']), null, sprintf(__('Are you sure you want to delete content type "%s"?', true), $contenttype['Contenttype']['name'])); ?></li>
<?php } ?>
    </ul>
</div>

<div class="related">
	<h3><?php __('Related Activities');?></h3>
	<?php if (!empty($contenttype['Activity'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Short Name'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php endif; ?>
	
<?php if (empty($actions)) { ?>
        <?php  
        foreach ($contenttype['Activity'] as $activity):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $activity['short_name'];?></td>
			<td class="actions">
            <?php echo $htmlbis->iconlink('information', __('View', true), array('action'=>'view', $activity['id'])); ?>
			<?php echo $htmlbis->iconlink('pencil', __('Edit', true), array('action'=>'edit', $activity['id'])); ?>
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('action'=>'delete', $activity['id']), null, sprintf(__('Are you sure you want to delete activity "%s"?', true), $activity['short_name'])); ?>
		</td>
		</tr>
	<?php endforeach; ?>
<?php } ?>
	
</div>
</div>