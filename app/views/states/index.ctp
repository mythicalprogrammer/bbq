
<?php

$this->pageTitle = "BBQ Joints by State";

echo "			<table id=\"states\">\n";

foreach($states as $key => $state) {
	
	if(!($key % 4) && $key != 0) {
		echo "				</tr>\n				<tr>\n";
	}
	else if(!($key % 4)) {
		echo "				<tr>\n";
	}

	// echo $html->link($state["State"]["name"], $state["State"]["name"]) . "<br/>";

	
	echo "					<td>" . $html->link($state["State"]["name"], "/joints/" . strtolower($state["State"]["state_abbr"])) . "</td>\n";
	
}

echo "				</tr>\n			</table>";

?>
