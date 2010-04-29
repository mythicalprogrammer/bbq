<?php
$jointName =  Sanitize::paranoid($joint['Joint']['name'], array('encode' => false));

// Reference States Table
foreach($states as $state) {
	if ($state['Statelist']['id'] == $joint['Joint']['state_id']) {
		$jointState = $state['Statelist']['name'];
		$jointStateAbbr = $state['Statelist']['state_abbr'];
	}
}

$this->pageTitle = $html->link("BBQ Joints", "/joints") . " > " . $html->link($jointState, "/joints/" . strtolower($jointStateAbbr));
?>
<div class="bbqJoint">
<?php 
echo "				<h3>" . $jointName . "</h3>\n";

echo "				" . $joint['Joint']['address'] . "<br/>\n";
echo "				" . $joint['Joint']['city'] . ", ";
// Reference States Table
foreach($states as $state) {
	if ($state['Statelist']['id'] == $joint['Joint']['state_id']) {
		echo $state['Statelist']['state_abbr'] . " ";
	}
}
echo $joint['Joint']['zip'] . "<br/>\n";
if ($joint['Joint']['phone']) {
	echo "				" . $joint['Joint']['phone'] . "<br/>\n";
}
if ($joint['Joint']['url']) {
	echo "				";
	// url parsing
	if(!substr_count($joint['Joint']['url'], "http://")) {
		echo $html->link($joint['Joint']['url'], "http://" . $joint['Joint']['url']) . "<br/>\n";
	}
	else {
		echo $html->link($joint['Joint']['url'], $joint['Joint']['url']) . "<br/>\n";
	}
}
// admin edit

if ($userCheck) {
	echo "<br/>\n";
	echo "[ " . $html->link('Edit this Joint', array('admin' => true, 'action'=>'edit', 'id'=>$joint['Joint']['id'])) . " ]<br/>";
	echo "<br/>";
}

?>
			</div>
			<div id="jointMap"></div> 

<script type="text/javascript"> 

if (GBrowserIsCompatible()) { 

	function createMarker(point,html) {
		var marker = new GMarker(point);
		GEvent.addListener(marker, "click", function() {
			marker.openInfoWindowHtml(html);
		});
		return marker;
	}

	var map = new GMap2(document.getElementById("jointMap"));
	map.addControl(new GLargeMapControl());
	map.addControl(new GMapTypeControl());
	map.setCenter(new GLatLng(<?php echo $joint['Joint']['lat']?>,<?php echo $joint['Joint']['lon']?>),12);


	var point = new GLatLng(<?php echo $joint['Joint']['lat']?>,<?php echo $joint['Joint']['lon']?>);

	var marker = createMarker(point)
	map.addOverlay(marker);
	// marker.openInfoWindowHtml("<?php echo $jointName?>");

}
</script>

