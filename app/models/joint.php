<?php

class Joint extends AppModel {
    var $name = 'Joint';

	var $validate = array(
		'name' => array('rule' => 'notEmpty'),
		'address' => array('rule' => 'notEmpty'),
		'city' => array('rule' => 'notEmpty'),
		'state' => array('rule' => 'notEmpty'),
		'zip' => array('rule' => 'notEmpty'),
		'country' => array('rule' => 'notEmpty')
	);

}

?>