<?php

class SearchlogController extends AppController {

	var $name = 'Searchlogs';
	var $pageTitle = 'Search Log';


	function admin_index() {
		$joints = $this->set('searchlogs', $this->Searchlog->find('all'));
	}

}
?>