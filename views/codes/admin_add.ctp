<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon code"><?php echo $html->link(__('Manage codes', true), array('action'=>'index'));?></li>
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<?php echo $form->create('Code');?>
	<fieldset>
 		<legend><?php __('Add Code');?></legend>
	<?php
		echo $form->input('coupon_id', array('type' => 'select', 'options' => $couponsList, 'label' => 'Coupon Type'));
		echo $form->input('user_id', array('type' => 'select', 'options' => $usersList, 'label' => 'User'));
		echo $form->input('package_id', array('type' => 'select', 'options' => $packagesList, 'label' => 'Package'));
		echo $form->input('code');
		echo $form->input('deleted');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>

</div>