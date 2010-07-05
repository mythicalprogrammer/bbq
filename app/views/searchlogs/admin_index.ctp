<table id="searchLog">
	<tr>
		<th>Search Query</th>
		<th>Date</th>
		<th>IP</th>
	</tr>
<?php

	foreach($searchlogs as $key => $searchlog) {

		echo "<tr>\n";
		echo "<td>" . $searchlog['Searchlog']['query'] . "</td>\n";
		echo "<td>" . date("M d, Y - h:iA", strtotime($searchlog['Searchlog']['date'])) . "</td>\n";
		echo "<td>" . $searchlog['Searchlog']['ip'] . "</td>\n";
		echo "</tr>\n";		
	}
?>
</table>