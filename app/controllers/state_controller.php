<?php

App::import('Sanitize');

class StateController extends AppController {

	var $name = "States";
	var $pageTitle = "States";


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