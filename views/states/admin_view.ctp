<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon state"><?php echo $html->link(__('Manage States', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="menus view">
<h2><?php  echo sprintf(__('State "%s"', true), "<u>{$state['State']['name']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
    	
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $state['State']['name']." <em>(Id {$state['State']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
    </dl>

<?php } ?>

</div>

<div class="actions">
    <ul>
<?php if (!empty($actions)) { ?>
        <li class="icon view"><?php echo $html->link(__('View State', true), array('action'=>'view', $state['State']['id'])); ?></li>
<?php } ?>
		<li class="icon add"><?php echo $html->link(__('New State', true), array('action'=>'add', $state['State']['id'])); ?></li>
		<li class="icon edit"><?php echo $html->link(__('Edit State', true), array('action'=>'edit', $state['State']['id'])); ?></li>
<?php if (empty($actions)) { ?>
		
        <li class="icon cross"><?php echo $html->link(__('Delete State', true), array('action'=>'delete', $state['State']['id']), null, sprintf(__('Are you sure you want to delete state "%s"?', true), $state['State']['name'])); ?></li>
<?php } ?>
        <li class="icon user"><?php echo $html->link(__('Manage Users', true), array('controller' => 'users', 'action'=>'index'));?></li>
        <li class="icon user"><?php echo $html->link(__('Manage Groups', true), array('controller' => 'groups', 'action'=>'index'));?></li>
    </ul>
</div>
</div>