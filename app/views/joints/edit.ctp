<h3>Edit Joint</h3>
<?php
	echo $form->create('Joint', array('action' => 'edit'));
	echo $form->input('name');
	echo $form->input('address');
	echo $form->input('address2');
	echo $form->input('city');
	echo $form->input('state');
	echo $form->input('zip');
	echo $form->input('country');
	echo $form->input('phone');
	echo $form->input('url');
	echo $form->input('id', array('type'=>'hidden')); 
	echo $form->end('Save Post');
?>