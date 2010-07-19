<?php

echo $page['Page']['content'];

// ADMIN - edit
if ($userCheck) {
	
	echo "				<br/>\n";
	// EDIT PAGE
	echo "				[ " . $html->link('Edit this Page', array('admin' => true, 'action'=>'edit', 'id'=>$page['Page']['id'])) . " ]<br/>\n";
	echo "				<br/>\n";
	// DELETE PAGE
	// echo "<font color=red>DO NOT ACCIDENTALLY CLICK --> [ " . $html->link('Delete this Joint', array('admin' => true, 'action'=>'delete', 'id'=>$joint['Joint']['id'])) . " ]</font><br/>\n";

	
	echo "				<br/>\n";
}


?>
