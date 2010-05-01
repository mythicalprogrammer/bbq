<?php

class SearchesController extends AppController {

	var $name = "Searches";
	var $uses = array('Search', 'Joint', 'Statelist');

	function index() {
		$this->set('joints', $this->Joint->find('all'));
	}
	
	function SearchByDistance() {
		
		if($this->data['Search']['q'] != "") {
		
			// Get location of search input
			$gc = $this->Joint->geocode($this->data['Search']['q']); 
		
			// Search within 50 miles using Haversine formula
			// Sort by distance, result up to 11 results
			$this->set('results', $this->Joint->query("SELECT *,  ( 3959 * acos( cos( radians(". $gc['lat'] . ") ) * cos( radians( lat ) ) * cos( radians( lon ) - radians(" . $gc['lon'] . ") ) + sin( radians(" . $gc['lat'] . ") ) * sin( radians( lat ) ) ) ) AS distance FROM joints HAVING distance < 50 ORDER BY distance LIMIT 0 , 11;"));

			// Grab States table
			$states = $this->set('states', $this->Statelist->find('all'));
		
		}
		else {
			// if empty input, just return empty array
			$this->set('results', Array());
		}
		
	}
	
}

?>