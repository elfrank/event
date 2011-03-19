<div id="authake">
<div class="actions menuheader">
    <ul>
        <li class="icon ticket"><?php echo $html->link(__('Manage tickets', true), array('action'=>'index'));?></li>
    </ul>
</div>
<div class="activities view">
<h2><?php  echo sprintf(__('Ticket %s', true), "<u>{$ticket['Ticket']['id']}</u>"); ?></h2>
<?php if (empty($actions)) { ?>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
            
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subject'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ticket['Ticket']['subject']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($ticket['Profile']['first_name']." ".$ticket['Profile']['last_name'], array('admin' => 0, 'plugin' => 'authake', 'controller'=> 'profiles', 'action'=>'view', $ticket['Profile']['id']))." <em>(Id {$ticket['Profile']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ticket['Area']['name']." <em>(Id {$ticket['Area']['id']})</em>"; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Message'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ticket['Ticket']['message']; ?>
			&nbsp;
		</dd>
				
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Submission date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d/m/Y H:i', $time->fromString($ticket['Ticket']['created'])); ?>
			&nbsp;
		</dd>		
			
		<?php echo $form->create('Ticket', array('action' => 'view'));
			echo $form->input('id');
			echo $form->input('reply');
			echo $form->end(__('Reply', true));
		?>
		&nbsp;
    </dl>

<?php } ?>

</div>

</div>