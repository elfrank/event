<?php

class Package extends AppModel
{

  const EMPTY_FIELD_MESSAGE = 'This field cannot be left blank.';
  const BAD_MONEY_FORMAT_MESSAGE = 'Enter a valid monetary amount (a decimal number).';
  const NEGATIVE_PRICE_MESSAGE = 'Enter a positive value.';
  const NON_NUMERIC_VALUE_MESSAGE = 'Enter a numeric value.';

  var $name = 'Package';

  //  var $hasAndBelongsToMany = array('Profile');

  var $validate = array(
			'name' => array(
					'rule' => 'notEmpty', 
					'message' => self::EMPTY_FIELD_MESSAGE),
			'description' => array(
					       'rule' => 'notEmpty',
					       'message' => self::EMPTY_FIELD_MESSAGE),
			'price' => array(
					 'rule1' => array(
							  'rule' => 'notEmpty',
							  'message' => self::EMPTY_FIELD_MESSAGE),
					 'rule2' => array(
							  'rule' => array('decimal', 2),
							  'message' => self::BAD_MONEY_FORMAT_MESSAGE)),
			'qty' => array(
				       'rule1' => array(
							'rule' => 'notEmpty',
							'message' => self::EMPTY_FIELD_MESSAGE),
				       'rule2' => array(
							'rule' => 'numeric',
							'message' => self::NON_NUMERIC_VALUE_MESSAGE),
				       'rule3' => array(
							'rule' => array('comparison', '>=', 0),
							'message' => self::NEGATIVE_PRICE_MESSAGE)));
}

?>