<?php
// file: /app/models/user.php
class User extends AppModel {
	var $name = 'User';
	var $validate = array(
		'username'=>array(
			'rule'=>VALID_NOT_EMPTY,
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'Please enter your Username'
		),
		'password'=>array(
			'rule'=>VALID_NOT_EMPTY,
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'Please enter your Password'
		)
	);


	/**
	 * Checks User data is valid before allowing access to system
	 * @param array $data
	 * @return boolean|array
	 */
	function check_user_data($data) {
		// init
		$return = FALSE;

		// find user with passed username
		$conditions = array(
			'User.username'=>$data['User']['username'],
			'User.status'=>'1'
		);
		$user = $this->find('first',array('conditions'=>$conditions));

		// not found
		if(!empty($user)) {
			$salt = Configure::read('Security.salt');
			// check password
			if($user['User']['password'] == md5($data['User']['password'].$salt)) {
				$return = $user;
			}
		}

	return $return;
	}
}
?>
