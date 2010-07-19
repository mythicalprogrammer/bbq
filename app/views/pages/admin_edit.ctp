<?php
$this->pageTitle = "Admin > Edit " . $pages[0]['Pages']['title'] . " Page";


echo "<div class=\"adminPageEdit\">\n";
echo $form->create('Page') . "\n";
echo "				" . $form->input('title', array('size' => 20)) . "\n";
echo "				" . $form->input('slug', array('size' => 15)) . "\n";
echo "				" . $form->input('content', array('cols' => 70, 'rows' => 20)) . "\n";
echo "				" . $form->end('Edit Page') . "\n";
echo "			<br clear=\"both\"></div>\n";

?>