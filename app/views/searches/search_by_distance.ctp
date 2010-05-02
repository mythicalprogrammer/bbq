<?php
$this->pageTitle = "Search Results";
?>
<?php
	if( empty($results) ) {
		echo "<em>Sorry, no results were found.</em>\n";
	}
	else {
?>

<p>BBQ Joints near: <em><?php echo $location; ?></em></p>

<ol id="searchResults">
<?php 
	
	foreach($results as $result) {
	
		// Reference States Listing Model to grab State Abbreviation
		foreach($states as $state) {
			if ($state['Statelist']['id'] == $result['joints']['state_id']) {
				$jointStateAbbr = $state['Statelist']['state_abbr'];
			}
		}
	
		echo "				<li>" . $html->link($result['joints']['name'], "/joint/" . $result['joints']['id']) . "<br/>\n";
		echo "				" . $result['joints']['address'] . "<br/>\n";
		echo "				" . $result['joints']['city'] . ", " . $jointStateAbbr . " " . $result['joints']['zip'] . "<br/>\n";
		echo "				<em>" . round($result[0]['distance'], 2) . " miles away</em></li>\n";
				
	}
	
	
?>
			</ol>
			
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
					map.setCenter(new GLatLng(<?php echo $lgc['lat']; ?>,<?php echo $lgc['lon']; ?>),11);

					<?php
					foreach($results as $result) {
						
						foreach($states as $state) {
							if ($state['Statelist']['id'] == $result['joints']['state_id']) {
								$jointStateAbbr = $state['Statelist']['state_abbr'];
							}
						}
						
						echo "var point = new GLatLng(" . $result['joints']['lat'] . "," . $result['joints']['lon'] . ");\n";

						$windowInfo = "<strong>".$result['joints']['name']."</strong><br/>".$result['joints']['address']."<br/>".$result['joints']['city'] . ", " . $jointStateAbbr . " " . $result['joints']['zip'];

						echo "var wInfo = \"" . $windowInfo . "\"\n";
						echo "var marker = createMarker(point, wInfo);\n";
						echo "map.addOverlay(marker);\n";
						
						?>

					<?php 
						
					}

					?>

				}
				
				
		
			</script>
						
<?php
	}
?>
