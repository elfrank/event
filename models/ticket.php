<?php
class Ticket extends AppModel {

	var $name = 'Ticket';
	var $validate = array(
		'area_id' => array('notempty'),
		'subject' => array('notempty'),
		'message' => array('notempty')		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Profile' => array(
		   'className' => 'AuthakeProfile',
		   'foreignKey' => 'profile_id',
		   'conditions' => '',
		   'fields' => '',
		   'order' => ''
		)
	);
/*
	var $hasMany = array(
		'Schedule' => array(
			'className' => 'Schedule',
			'foreignKey' => 'activity_id',
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
	);*/
}
?>