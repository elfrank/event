<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon pack"><?php echo $html->link(__('Manage packages', true), array('action'=>'index'));?></li>
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<?php
	echo $form->create('Package');
	echo $form->inputs(array('legend' => __('Modify Package', true), 'name', 'description', 'price', 'qty', 'sales_end'));
	echo $form->end('Modify');
?>

<div class="actions">
     <ul>
	<li class="icon cross">
		<?php echo $html->link(__('Delete', true), array('action' => 'admin_delete', $form->value('Package.id')), null, sprintf(__('Are you sure you want to delete package # %s?', true), $form->value('Package.id'))); ?>
	</li>
     </ul>
</div>

</div>
