<?php
$this->pageTitle = "Admin > Add BBQ Joint";

$stateSel = array();
// create array for States drop-down select menu
foreach($states as $key => $state) {
	$stateSel[$key+1] = $state["Statelist"]["name"];
}

echo "<div class=\"adminJointEdit\">\n";
echo $form->create('Joint') . "\n";
echo "				" . $form->input('name', array('size' => 30)) . "\n";
echo "				" . $form->input('address', array('size' => 25)) . "\n";
echo "				" . $form->input('city') . "\n";
// echo "				" . $form->input('state') . "\n";
echo "				" . $form->input('state_id', array('options' => $stateSel)) . "\n";
echo "				" . $form->input('zip', array('size' => 10)) . "\n";
echo "				" . $form->input('country', array('options' => array("United States" =>"United States","Canada" => "Canada"))) . "\n";
echo "				" . $form->input('phone') . "\n";
echo "				" . $form->input('url', array('size' => 30)) . "\n";
echo "				" . $form->end('Add Joint') . "\n";
echo "			<br clear=\"both\"></div>\n";


?>