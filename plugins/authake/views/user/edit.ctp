<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon user"><?php echo $html->link(__('Profile', true), array('action'=>'index'));?></li>
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<?php
	echo $form->create(null, array('controller' => 'user', 'action' => 'edit'));
	echo $form->inputs(array('legend' => __('Modify Account Data', true), 'login', 'email', 'password'));
	echo $form->hidden('id');
	echo $form->end('Modify');
?>

</div>

<?php
	if(isset($d))
	pr($d);
?>