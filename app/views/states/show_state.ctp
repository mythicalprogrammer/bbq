
<?php

$this->pageTitle = $state["State"]["name"];

foreach ($state["Joints"] as $joint) {
	
	$jointName =  Sanitize::paranoid($joint['name'], array('encode' => false));

	echo "<b>" . $html->link($jointName, "/joint/" . $joint['id']) . "</b><br/>";
	
}

?>
