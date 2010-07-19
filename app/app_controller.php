<?php
// file: /app/app_controller.php

class AppController extends Controller {
	// class variables
	var $_User = array();
	var $helpers = array('Html', 'Form', 'Javascript');
	// grab model for Pages
	var $uses = array('Pages');

	/**
	 * Before any Controller action
	 */
	
	function beforeFilter() {
		// Pages
		$this->set('pages', $this->Pages->find("all"));
	
		// set user vars
		$this->set('userCheck', $this->Session->check('User'));
		$this->set('user', $this->Session->read('User'));
		
		if($this->Session->check('User')) {
			$this->layout = 'admin';
		}
		
		// if admin url requested
		if(isset($this->params['admin']) && $this->params['admin']) {
			// check user is logged in
			if( !$this->Session->check('User') ) {
				$this->Session->setFlash('You must be logged in for that action.');
				$this->redirect('/login');
			}
	
			// save user data
			$this->_User = $this->Session->read('User');
			$this->set('user',$this->_User);
	
			// change layout
			$this->layout = 'admin';
		}
	}
	
}
?>
