<div id="authake">

<div class="users form">
<?php echo $form->create('Profile');?>
	<fieldset>
 		<legend><?php __('Edit profile'); echo " ".$this->data['Profile']['display_name']; ?></legend>
		<br />
	<?php
		echo $form->input('id');
		//echo $form->input('team_id', array('type' => 'select', 'options' => $teamList, 'empty' => 'None'));
		echo $form->input('first_name');
		echo $form->input('last_name');
		echo $form->input('display_name');
		echo $form->input('birth_date', array( 'label' => 'Date of birth'
                                    , 'dateFormat' => 'DMY'
                                    , 'minYear' => date('Y') - 70
                                    , 'maxYear' => date('Y') - 18 ));
	?>
	</fieldset>
<?php echo $form->end(__('Modify', true));?>
</div>
</div>