<?php
class State extends AppModel {

	var $name = 'State';
	var $validate = array(
		'name' => array('notempty')
	);

}
?>