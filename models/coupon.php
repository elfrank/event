<?php
class Coupon extends AppModel {

	var $name = 'Coupon';
	var $validate = array(
		'name' => array('notempty'),
		'deleted' => array('numeric')
	);

}
?>