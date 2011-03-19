<?php
class Profile extends AuthakeAppModel {

	var $name = 'Profile';
	var $useTable = "authake_profiles";
	var $validate = array(
		'user_id' => array('numeric'),
		'first_name' => array('notempty'),
		'last_name' => array('notempty'),
		'display_name' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User' => array(
			'className' => 'Authake.User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Team' => array(
			'className' => 'Team',
			'foreignKey' => 'team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>