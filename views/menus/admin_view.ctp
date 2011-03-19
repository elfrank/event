<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon menu"><?php echo $html->link(__('Manage Menus', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="menus view">
<h2><?php  echo sprintf(__('Menu "%s"', true), "<u>{$menu['Menu']['name']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
    	
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['name']." <em>(Id {$menu['Menu']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['description']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link(__($menu['Area']['name'], true), array('controller' => 'areas','action' => 'view',  $menu['Area']['id'])); ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['url']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Active'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php $menu['Menu']['active'] == 1 ?  ($output = "<div class='accept'></div>") : ($output = "<div class='cross'></div>"); echo $output; ?>
			&nbsp;
		</dd>
    </dl>

<?php } ?>

</div>

<div class="actions">
    <ul>
<?php if (!empty($actions)) { ?>
        <li class="icon view"><?php echo $html->link(__('View Menu', true), array('action'=>'view', $menu['Menu']['id'])); ?></li>
<?php } ?>
		<li class="icon add"><?php echo $html->link(__('New Menu', true), array('action'=>'add', $menu['Menu']['id'])); ?></li>
		<li class="icon edit"><?php echo $html->link(__('Edit Menu', true), array('action'=>'edit', $menu['Menu']['id'])); ?></li>
<?php if (empty($actions)) { ?>
		
        <li class="icon cross"><?php echo $html->link(__('Delete Menu', true), array('action'=>'delete', $menu['Menu']['id']), null, sprintf(__('Are you sure you want to delete event "%s"?', true), $menu['Menu']['name'])); ?></li>
<?php } ?>
		<li class="icon area"><?php echo $html->link(__('Manage Areas', true), array('controller' => 'areas', 'action'=>'index')); ?></li>
		<li class="icon add"><?php echo $html->link(__('New Area', true), array('controller' => 'areas', 'action'=>'add', $menu['Menu']['id'])); ?></li>
    </ul>
</div>
</div>