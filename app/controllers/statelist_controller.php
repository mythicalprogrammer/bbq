<?php

class StatelistController extends AppController {

	var $name = "Statelist";

	function index() {
		$this->set('states', $this->State->find('all'));
	}
	
}

?>