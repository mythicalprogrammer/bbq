<?php

$this->pageTitle = $state["State"]["name"];

echo "<ul id=\"joints\">\n";

foreach ($state["Joints"] as $joint) {
	// $jointName =  Sanitize::paranoid($joint['name'], array('encode' => false));
	// echo "				<li>" . $html->link($jointName, "/joint/" . $joint['id']) . "<br/>";

	echo "				<li>" . $joint['name'] . " - " . $html->link("link", "/joint/" . $joint['id']) . "<br/>";

	echo $joint['address'] . ", " . $joint['city'] . " " . $joint['zip'];
	echo "</li>\n";
}

echo "			</ul>\n";

?>
