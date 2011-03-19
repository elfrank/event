<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon contenttype"><?php echo $html->link(__('Return To Content Types', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="contenttypes view">
<h2><?php  echo sprintf(__('Content Type "%s"', true), "<u>{$contenttype['Contenttype']['name']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
            
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($contenttype['Contenttype']['name'], array('controller'=> 'events', 'action'=>'view', $contenttype['Contenttype']['id'])); ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contenttype['Contenttype']['description']; ?>
			&nbsp;
		</dd>
    </dl>

<?php } ?>

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
            <?php echo $htmlbis->iconlink('information', __('View', true), array('controller' => 'activities','action'=>'view', $activity['id'])); ?>
		</td>
		</tr>
	<?php endforeach; ?>
<?php } ?>
	
</div>
</div>