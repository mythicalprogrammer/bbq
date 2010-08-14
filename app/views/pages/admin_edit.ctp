<?php
$this->pageTitle = "Admin > Edit " . $pages[0]['Pages']['title'] . " Page";

echo $javascript->link('tiny_mce/tiny_mce.js') . "\n";
?>
<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "simple"
});
</script>

<?

echo "<div class=\"adminPageEdit\">\n";
echo $form->create('Page') . "\n";
echo "				" . $form->input('title', array('size' => 20)) . "\n";
echo "				" . $form->input('slug', array('size' => 15)) . "\n";
echo "				" . $form->input('content', array('cols' => 80, 'rows' => 20)) . "\n";
echo "				" . $form->end('Save Page') . "\n";
echo "			<br clear=\"both\"></div>\n";

?>