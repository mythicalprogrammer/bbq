<?php
class ContactController extends AppController {
	var $uses = array ( );
	var $components = array ('Email' );
    var $name = 'Contact';
   
    function contact() {
        $this->pageTitle = 'Contact';
        if (! empty ( $this->data )) {
            $email = $this->data ['Page'] ['email'];
            $name = $this->data ['Page'] ['name'];
            $message = $this->data ['Page'] ['message'];
            $error = 0;
            // start filter vars
            if (strlen ( trim ( $email ) ) <3) {
                $error = 1;
            }
            if (strlen ( trim ( $message ) ) <4) {
                $error = 1;
            }
            // verify email address
            if ((strlen ( trim ( $email ) ) <3) || ($this->Email->validMail ( $email ) == 0)) {
                $error = 1;
            }
            if ($error == 0) {
                $this->Email->email ( $email, $name, $message ); //here is the email sent
                $this->set ( 'success', 'Your message has been sent, thanks!' );
                // setting "succes" variable for displaying if email was sent.
            } else {
                $this->set ( 'error', 'Please complete all fields.' );
                // this is in case of error
            }
        } else {
        }
    }
}
?>

<?php

// class ContactController extends AppController {
// 
// 	var $name = 'Contact';
// 
// 	function add() {
// 	    // if ($this->RequestHandler->isPost()) {
// 	    //     $this->Contact->set($this->data);
// 	    //     if ($this->Contact->validates()) {
// 	    //         //send email using the Email component
// 	    //         $this->Email->to = 'piroko@gmail.com';  
// 	    //         $this->Email->subject = 'Contact message from ' . $this->data['Contact']['name'];  
// 	    //         $this->Email->from = $this->data['Contact']['email'];  
// 	    // 	   
// 	    //         $this->Email->send($this->data['Contact']['details']);
// 	    //     }
// 	    // }
// 	    if (! empty ($this->data)) {
// 	        $this->Contact->set($this->data);
// 	        if ($this->Contact->validates()) {
// 	            //send email using the Email component
// 	            $this->Email->to = 'piroko@gmail.com';  
// 	            $this->Email->subject = 'Contact message from ' . $this->data['Contact']['name'];  
// 	            $this->Email->from = $this->data['Contact']['email'];  
// 	    	   
// 	            $this->Email->send($this->data['Contact']['details']);
// 	        }
// 	    }
// 
// 	
// 	}
// 
// }

?>