<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon user"><?php echo $html->link(__('Profile', true), array('action'=>'index'));?></li>
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<?php
	echo $form->create(null, array('controller' => 'profile', 'action' => 'edit'));
	echo $form->inputs(array('legend' => __('Modify Profile', true), 'first_name', 'last_name', 'display_name', 'birthdate'));
	echo $form->input('organization_id', array('type' => 'select', 'options' => $organizations, 'label' => 'Organization'));
	echo $form->input('state_id', array('type' => 'select', 'options' => $states, 'label' => 'State'));	
	echo $form->hidden('id');
	echo $form->end('Modify');
?>

</div>

<?php
	if(isset($d))
	pr($d);
?>