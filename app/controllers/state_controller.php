<?php

class StateController extends AppController {

	var $name = "States";
	var $pageTitle = "States";
	var $scaffold;
	
	function index() {

		$this->set('states', $this->State->find('all'));
	}

	function showState($statename) {
		if($statename && $thestate = $this->State->findByName($statename))
		{
			$this->set('state',$thestate);//debug $thestate you'll find data you need
		}
		else
		{
			$this->Session->setFlash("something wrong happens!");
		}
	}
	
}

?>