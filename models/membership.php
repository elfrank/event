<?php

class Membership extends AppModel
{
  var $name = 'Membership';

  var $belongsTo = array(
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
