<?php

App::import('Sanitize');

class StateController extends AppController {

	var $name = "States";
	var $pageTitle = "States";
	var $scaffold;
	
	function index() {

		$this->set('states', $this->State->find('all'));
	}

	function showState($statename) {
		if($statename && $thestate = $this->State->findByState_abbr($statename))
		{
			$this->set('state',$thestate);
		}
		else
		{
			$this->Session->setFlash("something wrong happens!");
		}
	}
	
}

?>