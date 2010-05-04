<?php

class JointsController extends AppController {

	var $name = 'Joints';
	var $pageTitle = 'BBQ Joints';
	// access states
	var $uses = array('Joint', 'Statelist');

	function index() {
		$joints = $this->set('joints', $this->Joint->find('all'));
	}

	function admin_index() {
		$joints = $this->set('joints', $this->Joint->find('all'));
	}

	function view($id = null) {
		
		$states = $this->set('states', $this->Statelist->find('all'));
		
		$this->Joint->id = $id;
		$this->set('joint', $this->Joint->read());
		
		// $jointInfo =$this->Joint->read();		
		// $this->set('gc', $this->Joint->geocode($jointInfo['Joint']['address'] . ", " . $jointInfo['Joint']['city'] . ", " . $jointInfo['Joint']['state']));
		
	}

	
	function admin_add() {
		
		$states = $this->set('states', $this->Statelist->find('all'));
		
		if (!empty($this->data)) {

			$addJoint = $this->data['Joint'];

			// if all required BBQ Joint fields are not blank
			// then geocode and merge into array
			if($addJoint['name'] != "" && $addJoint['address'] != "" && $addJoint['city'] != "" && $addJoint['zip'] != "") {
				$addJoint = array_merge($addJoint, $this->Joint->geocode($this->data));
			}

			if ($this->Joint->save($addJoint)) {
				// $this->Session->setFlash('The joint was successfully added.');
				$this->redirect(array('action' => 'index'));
			}

		}
	}
	
	function admin_edit($id = null) {
		
		$states = $this->set('states', $this->Statelist->find('all'));
		
		$this->Joint->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Joint->read();
		} else {
			if ($this->Joint->save($this->data)) {
				// $this->Session->setFlash('The joint has been successfully updated.');
				// $this->redirect(array('action' => 'index'));
				$this->redirect('/joint/' . $id);
			}
		}
	}
	
	function admin_delete($id = null) {
		$this->Joint->delete($id);
		$this->redirect(array('action'=>'index'));
	}
	
}
?>