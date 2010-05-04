<?php
$jointName =  $joint['Joint']['name'];

// Reference States Listing Model to grab State Abbreviation
foreach($states as $state) {
	if ($state['Statelist']['id'] == $joint['Joint']['state_id']) {
		$jointState = $state['Statelist']['name'];
		$jointStateAbbr = $state['Statelist']['state_abbr'];
	}
}
// Title Breadcrumb
$this->pageTitle = $html->link("BBQ Joints", "/joints") . " > " . $html->link($jointState, "/joints/" . strtolower($jointStateAbbr));
?>
<div class="bbqJoint">
				<h3><?php echo $jointName; ?></h3>
				<?php echo $joint['Joint']['address']; ?><br/>
				<?php echo $joint['Joint']['city'] . ", " . $jointStateAbbr . " " . $joint['Joint']['zip']; ?><br/>
<?php // check phone
if ($joint['Joint']['phone']) {
	echo "				" . $joint['Joint']['phone'] . "<br/>\n";
}
if ($joint['Joint']['url']) {
	echo "				";
	// check url and parse if necessary
	if(!substr_count($joint['Joint']['url'], "http://")) {
		echo $html->link($joint['Joint']['url'], "http://" . $joint['Joint']['url']) . "<br/>\n";
	}
	else {
		echo $html->link($joint['Joint']['url'], $joint['Joint']['url']) . "<br/>\n";
	}
}

// ADMIN - edit
if ($userCheck) {
	
	echo "				<br/>\n";
	// EDIT JOINT
	echo "				[ " . $html->link('Edit this Joint', array('admin' => true, 'action'=>'edit', 'id'=>$joint['Joint']['id'])) . " ]<br/>\n";
	echo "				<br/>\n";
	// DELETE JOINT
	// echo "<font color=red>DO NOT ACCIDENTALLY CLICK --> [ " . $html->link('Delete this Joint', array('admin' => true, 'action'=>'delete', 'id'=>$joint['Joint']['id'])) . " ]</font><br/>\n";

	
	echo "				<br/>\n";
}

?>
			</div>
			
			<div id="jointMap"></div> 
			
			<script type="text/javascript"> 
			
				if (GBrowserIsCompatible()) { 

					function createMarker(point,html) {
						var marker = new GMarker(point);
						// GEvent.addListener(marker, "click", function() {
						// 	marker.openInfoWindowHtml(html);
						// });
						return marker;
					}

					var map = new GMap2(document.getElementById("jointMap"));
					map.addControl(new GLargeMapControl());
					map.addControl(new GMapTypeControl());
					map.setCenter(new GLatLng(<?php echo $joint['Joint']['lat']?>,<?php echo $joint['Joint']['lon']?>),12);


					var point = new GLatLng(<?php echo $joint['Joint']['lat']?>,<?php echo $joint['Joint']['lon']?>);

					var marker = createMarker(point);
					map.addOverlay(marker);

				}
				
			</script>

