<?php
	$this->pageTitle = "Admin Panel";
	
	echo "<p><b>Welcome, " . $user["User"]["username"] . "!</b></p>\n";
	
	echo "			<ul class=\"adminPanel\">\n";
	
	echo "				<li>" . $html->link('Add a BBQ Joint', '/admin/joints/add') . "</li>\n";

	echo "				<li>" . $html->link('BBQ Joint Search Log', '/admin/searchlog') . "</li>\n";

	
	echo "			</ul>\n";
	
?>