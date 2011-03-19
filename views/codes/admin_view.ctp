<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon code"><?php echo $html->link(__('Manage codes', true), array('action'=>'index'));?></li>
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2><?php  __('Code');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $code['Code']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Coupon'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($code['Coupon']['name'], array('controller' => 'coupons', 'action' => 'view', $code['Coupon']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			 <?php		 
			 	if(!empty($profile))
				{
					echo $html->link($profile['Profile']['first_name'].' '.$profile['Profile']['last_name'], array('admin' => 0, 'plugin' => 'authake', 'controller' => 'users', 'action' => 'view', $code['User']['id']));
				}		
				else
				{
					__('Not assigned yet');
				}
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $code['Code']['code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Used'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			      if($code['Code']['used'] == 'yes')
			      {
				echo __(ucfirst($code['Code']['used']), true).' <em>('.fdate($code['Code']['use_date']).')</em>';
			      }
			      else
			      {
				echo __(ucfirst($code['Code']['used']), true);
			      }
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo fdate($code['Code']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo fdate($code['Code']['modified']); ?>
			&nbsp;
		</dd>	
	</dl>

<div class="actions">
	<ul>
		<li class="icon pencil"><?php echo $html->link(__('Edit Code', true), array('action' => 'admin_edit', $code['Code']['id'])); ?> </li>
		<li class="icon cross"><?php echo $html->link(__('Delete Code', true), array('action' => 'admin_delete', $code['Code']['id']), null, sprintf(__('Are you sure you want to delete code # %s?', true), $code['Code']['id'])); ?> </li>
	</ul>
</div>

</div>