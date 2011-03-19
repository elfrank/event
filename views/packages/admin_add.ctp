<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon pack"><?php echo $html->link(__('Manage packages', true), array('action'=>'index'));?></li>
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<?php
	echo $form->create('Package');
	echo $form->inputs(array('legend' => __('Add Package', true), 'name', 'description', 'price', 'qty'));
	echo $form->end('Submit');
?>

</div>
