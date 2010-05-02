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

	var $actsAs = array('Geocoded' => array( 
	    'key' => 'ABQIAAAA_iwTMO9zYpmDab6qmz5UzRTpJZEScOwrFi7gBYjoJDitheTOshQ6-RQZI3cQSkEikMuau0NH2wDXcg' 
	));
	
	
	function beforeSave() {
	    if ($coords = $this->geocode($this->data)) { 
	        $this->set($coords);
	    } 
	    return true; 
	}
	

}

?>