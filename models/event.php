<?php
class Event extends AppModel {

	var $name = 'Event';
	var $validate = array(
		'short_name' => array('notempty'),
		'long_name' => array('notempty'),
		'slogan' => array('notempty'),
		'place' => array('notempty'),
		'active' => array('numeric'),
		'deleted' => array('numeric')
	);
	
	var $hasMany = array(
		'Package' => array(
			'className' => 'Package',
			'foreignKey' => 'event_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'event_id',
			'dependent' => true,
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