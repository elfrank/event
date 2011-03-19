<?php
class PlacesController extends AppController {

	var $name = 'Places';
	var $helpers = array('Authake.Htmlbis', 'Form', 'Time');
	var $paginate = array(
                        'limit' => 30,
                        'order' => array(
                                         'Place.created' => 'asc'
                                        )
                       );
	
	function index($tableonly = false) {
		$this->Place->recursive = 1;
        $this->set('places', $this->paginate());
        $this->set('tableonly', $tableonly);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Place', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('place', $this->Place->read(null, $id));
	}
	
	function admin_index($tableonly = false) {
		$this->Place->recursive = 1;
        $this->set('places', $this->paginate());
        $this->set('tableonly', $tableonly);
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Place', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('place', $this->Place->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Place->create();
			if ($this->Place->save($this->data)) {
				$this->Session->setFlash(__('The Place has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Place could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Place', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Place->save($this->data)) {
				$this->Session->setFlash(__('The Place has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Place could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Place->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Place', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Place->del($id)) {
			$this->Session->setFlash(__('Place deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Place could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>