<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon pack"><?php echo $html->link(__('Manage packages', true), array('action'=>'index'));?></li>
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2><?php  __('Package');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>	
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['name']." <em>(Id {$package['Package']['id']})</em>"; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo '$'.$package['Package']['price']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slots'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['qty']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created on'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d/m/Y H:i', $time->fromString($package['Package']['created'])); ?>
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated on'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d/m/Y H:i', $time->fromString($package['Package']['modified'])); ?>
		</dd>
	</dl>

<br />

<div class="actions">
	<ul>
		<li class="icon signup"><?php echo $html->link(__('Back to Signups', true), array('controller' => 'signups', 'action' => 'index')); ?> </li>
	</ul>
</div>

</div>
