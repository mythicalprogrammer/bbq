<?php

App::import('Sanitize');

class JointsController extends AppController {

	var $name = 'Joints';
	var $pageTitle = 'BBQ Joints';


	function index() {
		$joints = $this->set('joints',
			$this->Joint->find('all',
				array('order' => array('state' => 'ASC'))
			)
		);

	}
	
	function view($id = null) {
		$this->Joint->id = $id;
		$this->set('joint', $this->Joint->read());
	}
	
	function add() {
		if (!empty($this->data)) {
			if ($this->Joint->save($this->data)) {
				$this->Session->setFlash('Your post has been saved.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	function edit($id = null) {
		$this->Joint->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Joint->read();
		} else {
			if ($this->Joint->save($this->data)) {
				$this->Session->setFlash('Your post has been updated.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
}
?>