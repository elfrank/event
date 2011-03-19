<?php
class ContenttypesController extends AppController {

	var $name = 'Contenttypes';
	var $helpers = array('Authake.Htmlbis', 'Form', 'Time');
	var $paginate = array(
                        'limit' => 10,
                        'order' => array(
                                         'Contenttype.created' => 'asc'
                                        )
                       );

	function index($tableonly = false) {
		$this->Contenttype->recursive = 1;
        $this->set('contenttypes', $this->paginate());
        $this->set('tableonly', $tableonly);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Contenttype', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contenttype', $this->Contenttype->read(null, $id));
	}
	
	function admin_index($tableonly = false) {
		$this->Contenttype->recursive = 1;
        $this->set('contenttypes', $this->paginate());
        $this->set('tableonly', $tableonly);
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Contenttype', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contenttype', $this->Contenttype->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Contenttype->create();
			if ($this->Contenttype->save($this->data)) {
				$this->Session->setFlash(__('The Contenttype has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Contenttype could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Contenttype', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Contenttype->save($this->data)) {
				$this->Session->setFlash(__('The Contenttype has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Contenttype could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Contenttype->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Contenttype', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Contenttype->del($id)) {
			$this->Session->setFlash(__('Contenttype deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Contenttype could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>