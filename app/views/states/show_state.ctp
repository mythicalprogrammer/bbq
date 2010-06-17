<?php

$this->pageTitle = $state["State"]["name"];

echo "<ul id=\"joints\">\n";

foreach ($state["Joints"] as $joint) {

	echo "				<li>" . $joint['name'] . " - " . $html->link("link", "/joint/" . $joint['id']) . "<br/>";

	echo $joint['address'] . ", " . $joint['city'] . " " . $state['State']['state_abbr'] . " " . $joint['zip'];
	echo "</li>\n";
}

echo "			</ul>\n";

?>
