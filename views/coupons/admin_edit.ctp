<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon coupon"><?php echo $html->link(__('Manage coupons', true), array('action'=>'index'));?></li>
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<?php echo $form->create('Coupon');?>
	<fieldset>
 		<legend><?php __('Edit Coupon');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('percentage');
		echo $form->input('deleted');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>

<div class="actions">
	<ul>
		<li class="icon cross"><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Coupon.id')), null, sprintf(__('Are you sure you want to delete coupon # %s?', true), $form->value('Coupon.id'))); ?></li>
	</ul>
</div>

</div>
