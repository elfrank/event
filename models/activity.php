<?php
class Activity extends AppModel {

	var $name = 'Activity';
	var $validate = array(
		'event_id' => array('numeric'),
		'user_id' => array('numeric'),
		'short_name' => array('notempty'),
		'long_name' => array('notempty'),
		'contenttype_id' => array('numeric'),
		'published' => array('numeric'),
		'deleted' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Contenttype' => array(
			'className' => 'Contenttype',
			'foreignKey' => 'contenttype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

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
	);
}
?>