<?php
class Menu extends AppModel {

	var $name = 'Menu';
	var $validate = array(
		'name' => array('notempty'),
		'area' => array('numeric'),
		'active' => array('numeric'),
		'deleted' => array('numeric')
	);

	var $belongsTo = array(
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>