<?php

class State extends AppModel
{
	var $name = 'State';

    var $hasMany = array(
		'Joints'=>array(
			'className'=>'joints',
			'foreignKey'=>'state_id',
			'order'=>'name asc'
		)
	);
}

?>