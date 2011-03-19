<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon team"><?php echo $html->link(__('Return To Teams', true), array('action'=>'index'));?></li>
    </ul>
</div>

<h2><?php  __('Team');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $team['Team']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Leader'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($team['Profile']['first_name'].' '.$team['Profile']['last_name'], array('admin' => 0, 'plugin' => 'authake', 'controller' => 'users', 'action' => 'view', $team['Profile']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number of Members'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $numberOfMembers[$team['Team']['id']]; ?>
			&nbsp;
		</dd>
	</dl>
</div>