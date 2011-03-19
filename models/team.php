<?php
class Team extends AppModel {

	var $name = 'Team';
	var $validate = array(
		'user_id' => array('numeric'),
		'name' => array('notempty'),
		'deleted' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Profile' => array(
			'className' => 'AuthakeProfile',
			'foreignKey' => 'profile_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $hasMany = array(
		'Profile' => array(
			'className' => 'AuthakeProfile',
			'foreignKey' => 'team_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
?>