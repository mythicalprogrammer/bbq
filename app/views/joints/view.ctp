
<?php
$jointName =  Sanitize::paranoid($joint['Joint']['name'], array('encode' => false));
$this->pageTitle = $jointName;
?>

<?php
echo $joint['Joint']['address'] . "<br/>";
echo $joint['Joint']['city'] . ", ";
echo $joint['Joint']['state'] . " ";
echo $joint['Joint']['zip'] . "<br/>";
echo $joint['Joint']['phone'] . "<br/>";
if(!substr_count($joint['Joint']['url'], "http://")) {
	echo $html->link($joint['Joint']['url'], "http://" . $joint['Joint']['url']) . "<br/>";
}
else {
	echo $html->link($joint['Joint']['url'], $joint['Joint']['url']) . "<br/>";
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

