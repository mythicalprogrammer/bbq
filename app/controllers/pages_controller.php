<?php
class PagesController extends AppController {

	function index( $slug = null ) {
		if (!$slug) {
			$this->Session->setFlash(__('Invalid Page.', true));
			$this->redirect(array('action'=>'index'));
		}
		$page = $this->Page->find('first', array(
			'conditions' => array(
			'Page.slug' => $slug
		)));
		
		$this->pageTitle = $page['Page']['title'];
		$this->set('page', $page);

	}
	
	
}
	
?>