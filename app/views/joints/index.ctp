<?php

echo "<p>(" . $html->link("Add a Joint", "add") . ")</p>";

	foreach($joints as $joint) {
		
		
		echo "<b>" . $html->link($joint['Joint']['name'], array('controller' => 'joints', 'action' => 'view', $joint['Joint']['id'])) . "</b><br/>";
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
?>
