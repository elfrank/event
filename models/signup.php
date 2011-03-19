<?php

class Signup extends AppModel
{
  var $name = 'Signup';

  //  var $belongsTo = array('Package', 'Profile');

  var $belongsTo = array(
			 'Package',
			 'Profile' => array(
				   'className' => 'AuthakeProfile',
				   'foreignKey' => 'profile_id',
				   'conditions' => '',
				   'fields' => '',
				   'order' => ''
					    )
			 );
}

?>
