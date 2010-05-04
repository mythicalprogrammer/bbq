<?php

class SearchesController extends AppController {

	var $name = "Searches";
	var $uses = array('Search', 'Joint', 'Statelist', 'SearchLog');

	function index() {
		$this->set('joints', $this->Joint->find('all'));
	}
	
	function SearchByDistance() {
		
		if($this->data['Search']['q'] != "") {
		
			// pass location
			$this->set('location', $this->data['Search']['q']);
		
			// Geocode of search input and pass
			$gc = $this->Joint->geocode($this->data['Search']['q']); 
			$this->set('lgc', $gc);
					
			// Search within 50 miles using Haversine formula
			// Sort by distance, result up to 11 results
			$this->set('results', $this->Joint->query("SELECT *,  ( 3959 * acos( cos( radians(". $gc['lat'] . ") ) * cos( radians( lat ) ) * cos( radians( lon ) - radians(" . $gc['lon'] . ") ) + sin( radians(" . $gc['lat'] . ") ) * sin( radians( lat ) ) ) ) AS distance FROM joints HAVING distance < 50 ORDER BY distance LIMIT 0 , 11;"));

			// Grab States table
			$states = $this->set('states', $this->Statelist->find('all'));

			// Log each Search Query into Database
			$this->SearchLog->Save(
				array('query' => $this->data['Search']['q'],
				'date' => date("Y-m-d H:i:s", time()),
				'ip' => getenv("REMOTE_ADDR")
				));
		
		}
		else {
			// if empty input, just return empty array
			$this->set('results', Array());
		}
	
	}
		
}

?>