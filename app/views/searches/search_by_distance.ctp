<?php
$this->pageTitle = "Search Results";
// pr($results);
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
<?php
	}
?>
