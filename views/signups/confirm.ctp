<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2>Confirm Signup</h2>

<?php
	echo($html->tag('p', 'In order to proceed to checkout, confirm that this is the package you want to sign up for:'));
?>
<br />

<div class="signup_area">
     <div class="signup_inner_area">  
     <span class="signup_area_title"><?php __('Event Information'); ?></span>
     <dl>
	<dt><?php echo __('Name', true); ?></dt>
	<dd><?php echo $event['Event']['short_name']; ?></dd>
	<dt><?php echo __('Location', true); ?></dt>
	<dd><?php echo $event['Event']['place']; ?></dd>
	<dt><?php echo __('From', true); ?></dt>
	<dd><?php echo fdate($event['Event']['start_date']); ?></dd>
	<dt><?php echo __('To', true); ?></dt>
	<dd><?php echo fdate($event['Event']['end_date']); ?></dd>
     </dl>
     <?php
	if(!empty($discountCode))
	{
		echo '<div class="separator">&nbsp;</div>';
		echo '<div class="separator">&nbsp;</div>';
		echo '<div class="separator">&nbsp;</div>';
	}
     ?>
     <div class="separator">&nbsp;</div>

</div>
</div>

<div class="signup_area">
     <div class="signup_inner_area">  
     <span class="signup_area_title"><?php __('Signup Information'); ?></span>
     <dl><?php $i = 0; $class = ' class="altrow"';?>
	<?php
		foreach($package['Package'] as $field => $value){
			if($field == 'price')
			{
				$value = '$'.$value;
			}
	?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo ucfirst(__($field, true)); ?></dt>
		<dd<?php if ($i % 2 == 0) echo $class;?>><?php echo ucfirst(__($value, true)); ?></dd>

	<?php		
		}

		if(empty($discountCode))
		{
	?>

			<dt class="pay"><img class="paypal_logo" src="../img/icons/paypal.png" /></dt>
			<dd class="pay"><span class="paypal_button"><?php echo $paypal->button('Pay Now ', array('test' => true, 'amount' => $package['Package']['price'], 'item_name' => $package['Package']['name'],'custom'=>$profile_id)); ?></span></dd>
	<?php
		}
		else
		{
	?>
			<dt><?php echo __('Discount', true); ?></dt>
			<dd>(<?php printf('%.2f', $discountCode['Coupon']['percentage']/100*$package['Package']['price']); ?>)</dd>
			<dt><?php echo __('You pay', true); ?></dt>
			<dd><?php printf('$%.2f', $package['Package']['price']-($discountCode['Coupon']['percentage']/100*$package['Package']['price'])); ?></dd>
	<?php
		}
	?>
</dl>

</div>
</div>

<div class="tmp">
<?php
	echo($form->create('Signup', array('action' => 'checkout')));
	echo($form->hidden('user_id', array('value' => $signupInfo['Signup']['user_id'])));
	echo($form->hidden('package_id', array('value' => $signupInfo['Signup']['package_id'])));
	if(!empty($discountCode))
	{
		echo($form->hidden('code_id', array('value' => $discountCode['Code']['id'])));
	}
	echo($form->submit('Sign up now'));
	echo($form->end());
?>
</div>

</div>