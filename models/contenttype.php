<?php
class Contenttype extends AppModel {

	var $name = 'Contenttype';
	var $validate = array(
		'name' => array('notempty'),
		'deleted' => array('numeric')
	);

	var $hasMany = array(
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'contenttype_id',
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