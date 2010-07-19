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
	function admin_index( $slug = null ) {
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
	
	function admin_edit($id = null) {

		$this->Page->id = $id;
		
		if (empty($this->data)) {
			$this->data = $this->Page->read();
		} else {
			if ($this->Page->save($this->data)) {
				// $this->redirect('/page/' . $this->id);
				$this->redirect('/admin');
			}
		}
		
	}
	
	
}
	
?>