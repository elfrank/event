<?php
class Schedule extends AppModel {

	var $name = 'Schedule';
	var $useTable = 'schedules';
	var $validate = array(
		'activity_id' => array('numeric'),
		'place_id' => array('numeric'),
		'slots' => array('numeric'),
		'current_slots' => array('numeric'),
		'status' => array('numeric'),
		'deleted' => array('numeric'),
		'name' => array(
			'rule' => array('minLength', 2),
			'message' => 'Name must be at least 2 characters long',
			'required' => true 
										),
		'notes' => array(
			'rule' => array('minLength', 2),
			'message' => 'Please add some notes',
			'required' => true )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'activity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Place' => array(
			'className' => 'Place',
			'foreignKey' => 'place_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'AuthakeUser',
			'joinTable' => 'schedules_users',
			'foreignKey' => 'schedule_id',
			'associationForeignKey' => 'user_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>