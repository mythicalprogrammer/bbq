<?php
// /app/controllers/users_controller.php

class UsersController extends AppController {
	var $name = 'Users';
	var $helpers = array('Html', 'Form');

	/**
	 * Before any Controller Action
	 */
	function beforeFilter() {
		parent::beforeFilter();
	}


	/**
	 * Logs in a User
	 */
	function login() {
		// $salt = Configure::read('Security.salt');
		// echo md5('password'.$salt);

		// redirect user if already logged in
		if( $this->Session->check('User') ) {
			$this->redirect(array('controller'=>'dashboard','action'=>'index','admin'=>true));
		}

		if(!empty($this->data)) {
			// set the form data to enable validation
			$this->User->set( $this->data );
			// see if the data validates
			if($this->User->validates()) {
				// check user is valid
				$result = $this->User->check_user_data($this->data);

				if( $result !== FALSE ) {
					// update login time
					$this->User->id = $result['User']['id'];
					$this->User->saveField('last_login',date("Y-m-d H:i:s"));
					// save to session
					$this->Session->write('User',$result);
					$this->Session->setFlash('You have successfully logged in','flash_good');
					$this->redirect(array('controller'=>'dashboard','action'=>'index','admin'=>true));
				} else {
					$this->Session->setFlash('Either your Username of Password is incorrect','flash_bad');
				}
			}
		}
	}


	/**
	 * Logs out a User
	 */
	function logout() {
		if($this->Session->check('User')) {
			$this->Session->delete('User');
			$this->Session->setFlash('You have successfully logged out','flash_good');
		}
		$this->redirect(array('action'=>'login'));
	}
}
?>
