<?php

$this->pageTitle = $state["State"]["name"];

echo "<ul id=\"joints\">\n";

foreach ($state["Joints"] as $joint) {

	$jointName = str_replace(" ", "-", $joint['name']);
	$jointName = preg_replace("/[^A-Za-z0-9_-]/","",$jointName);

	echo "				<li>" . $html->link($joint['name'], "/joint/" . $joint['id'] . "/$jointName") . "<br/>";

	echo $joint['address'] . ", " . $joint['city'] . " " . $state['State']['state_abbr'] . " " . $joint['zip'];
	echo "</li>\n";
}

echo "			</ul>\n";

?>
