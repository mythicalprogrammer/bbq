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

echo "<h3>" . $jointName . "</h3>\n";

echo $joint['Joint']['address'] . "<br/>\n";
echo "			" . $joint['Joint']['city'] . ", ";
// Reference States Table
foreach($states as $state) {
	if ($state['Statelist']['id'] == $joint['Joint']['state_id']) {
		echo $state['Statelist']['state_abbr'] . " ";
	}
}
echo $joint['Joint']['zip'] . "<br/>\n";
if ($joint['Joint']['phone']) {
	echo "			" . $joint['Joint']['phone'] . "<br/>\n";
}
if ($joint['Joint']['url']) {
	echo "			";
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


$addr = $joint['Joint']['address'] . " " . $joint['Joint']['city'] . " " .  $joint['Joint']['state'];
$addr = str_replace(" ", "+", $addr);

$gMapKey = "ABQIAAAA_iwTMO9zYpmDab6qmz5UzRTpJZEScOwrFi7gBYjoJDitheTOshQ6-RQZI3cQSkEikMuau0NH2wDXcg";

$gMapUrl = "http://maps.google.com/maps/geo?q=" . $addr . "&output=csv&key=" . $gMapKey;

$csv = file_get_contents($gMapUrl);

list($http, $http2, $long, $lat) = split(",", $csv);

?>

			<br/>
			<div id="map" style="width: 500px; height: 400px"></div> 


<script type="text/javascript"> 

if (GBrowserIsCompatible()) { 

function createMarker(point,html) {
	var marker = new GMarker(point);
	GEvent.addListener(marker, "click", function() {
		marker.openInfoWindowHtml(html);
	});
	return marker;
}

var map = new GMap2(document.getElementById("map"));
map.addControl(new GLargeMapControl());
map.addControl(new GMapTypeControl());
map.setCenter(new GLatLng(<?php echo $long ?>,<?php echo $lat ?>),12);

var point = new GLatLng(<?php echo $long ?>,<?php echo $lat ?>);
var marker = createMarker(point)
map.addOverlay(marker);
marker.openInfoWindowHtml("<?php echo $jointName?>");

}
</script>

