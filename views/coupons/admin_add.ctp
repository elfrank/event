<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon coupon"><?php echo $html->link(__('Manage coupons', true), array('action'=>'index'));?></li>
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<?php echo $form->create('Coupon');?>
	<fieldset>
 		<legend><?php __('Add Coupon');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('percentage');
		echo $form->input('deleted');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>