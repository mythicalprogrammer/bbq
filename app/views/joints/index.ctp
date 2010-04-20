<?php

echo "<h3>" . $html->link("List States", "/state") . "</h3>";

echo "<br/>";


	foreach($joints as $joint) {
		
		$jointName =  Sanitize::paranoid($joint['Joint']['name'], array('encode' => false));
		
		echo "<b>" . $html->link($jointName, array('controller' => 'joints', 'action' => 'view', $joint['Joint']['id'])) . "</b><br/>";
		echo $joint['Joint']['address'] . "<br/>";
		echo $joint['Joint']['city'] . ", ";
		echo $joint['Joint']['state'] . " ";
		echo $joint['Joint']['zip'] . "<br/>";
		if ($joint['Joint']['phone'] != "") {
		echo $joint['Joint']['phone'] . "<br/>";
		}
		if ($joint['Joint']['url'] != "") {
		echo $joint['Joint']['url'] . "<br/>";
		}
		echo "<small>[" . $html->link('Edit', array('action'=>'edit', 'id'=>$joint['Joint']['id'])) . "]</small><br/>";
		echo "<br/>";

	}

echo "<p>(" . $html->link("Add a Joint", "add") . ")</p>";


?>
