<?php
class Place extends AppModel {

	var $name = 'Place';
	var $validate = array(
		'name' => array('notempty'),
		'deleted' => array('numeric')
	);

}
?>