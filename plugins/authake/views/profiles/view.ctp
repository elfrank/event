<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon user"><?php echo $html->link(__('Manage profiles', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="profiles view">
<h2><?php  echo sprintf(__('Profile %s', true), "<u>{$profile['Profile']['display_name']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
<?php if ($profile['User']['disable']) { ?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo $html->image("icons/error.png", array('title' => __('Warning', true))); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php
                    echo "<strong>".__('Account disabled', true)."</strong>";
            ?>
            &nbsp;
        </dd>
<?php } ?>        
		
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Login'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $profile['User']['login']." <em>(Id {$profile['Profile']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Display Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $profile['Team']['name']." <em>(Id {$profile['Team']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Display Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $profile['Profile']['display_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $profile['Profile']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $profile['Profile']['last_name']; ?>
			&nbsp;
		</dd>
    </dl>

<?php } ?>

</div>

<div class="actions">
    <ul>
<?php if (!empty($actions)) { ?>
        <li class="icon profile"><?php echo $html->link(__('View Account', true), array('action'=>'view', $profile['Profile']['id'])); ?></li>
<?php } ?>
        <li class="icon user"><?php echo $html->link(__('View Account', true), array('controller' => 'users','action'=>'view', $profile['Profile']['user_id'])); ?></li>
        <li class="icon user_edit"><?php echo $html->link(__('Edit Profile', true), array('action'=>'edit', $profile['Profile']['id'])); ?></li>
<?php if (empty($actions)) { ?>
		
        <li class="icon cross"><?php echo $html->link(__('Delete Profile', true), array('action'=>'delete', $profile['Profile']['id']), null, sprintf(__('Are you sure you want to delete profile \'%s\'?', true), $profile['Profile']['display_name'])); ?></li>
<?php } ?>
    </ul>
</div>

<?php if (!empty($actions)) { ?>

<div class="monitor_rules index">
<h3><?php __('Allowed & denied actions');?></h3>
<?php
    foreach($actions as $controller => $ruleslist) {
        echo "<div style=\"float: left; padding: 0 0.7em; margin: 0.5em; border-left: 1px solid #CCC;\"><h4>{$controller}</h4>";
        echo "<ul>";
        foreach($ruleslist as $k => $rule) {
            if ($rule['permission'] == "Allow")
                echo '<li class="icon accept"><p style="color: green">'.$rule['action'];
            else
                echo '<li class="icon delete"><p style="color: red">'.$rule['action'];
            echo '</p></li>';
        
        }
        echo "</ul></div>";
    }

?>
<p style="clear: both"></p>
</div>
    <div class="actions">
        <ul>
            <li class="icon lock"><?php echo $html->link(__('Manage rules', true), array('controller'=> 'rules', 'action'=>'index')); ?></li>
            <li class="icon accept"><?php echo $html->link(__('Hide this view', true), array('action'=>'view', $profile['Profile']['id'])); ?></li>
        </ul>
    </div>
<?php } ?>
</div>