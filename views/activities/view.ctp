<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon place"><?php echo $html->link(__('Return to Activities', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="activities view">
<h2><?php  echo sprintf(__('Activity %s', true), "<u>{$activity['Activity']['short_name']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
            
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Event'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($activity['Event']['short_name'], array('controller'=> 'events', 'action'=>'view', $activity['Event']['id'])); ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($activity['Contenttype']['name'], array('controller'=> 'contenttypes', 'action'=>'view', $activity['Contenttype']['id'])); ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Short Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $activity['Activity']['short_name']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Long Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $activity['Activity']['long_name']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $activity['Activity']['description']; ?>
			&nbsp;
		</dd>
	</dl>

<?php } ?>

</div>
</div>