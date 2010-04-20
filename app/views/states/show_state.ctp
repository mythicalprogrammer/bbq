
<?php

echo "<h3>" . $html->link("States", "/state") . " > " . $state["State"]["name"] . "</h3>";
echo "<br/>";

foreach ($state["Joints"] as $joint) {
	
	$jointName =  Sanitize::paranoid($joint['name'], array('encode' => false));
	// $joint['name']
	echo "<b>" . $html->link($jointName, array('controller' => 'joints', 'action' => 'view', $joint['id'])) . "</b><br/>";
	echo $joint['address'] . "<br/>";
	echo $joint['city'] . ", ";
	echo $joint['state'] . " ";
	echo $joint['zip'] . "<br/>";
	if ($joint['phone'] != "") {
	echo $joint['phone'] . "<br/>";
	}
	if ($joint['url'] != "") {
	echo $joint['url'] . "<br/>";
	}
	echo "<br/>";
}

?>
