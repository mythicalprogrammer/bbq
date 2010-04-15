
<?php

foreach($states as $state ) {
	echo $html->link($state["State"]["name"], $state["State"]["name"]) . "<br/>";
}

?>
