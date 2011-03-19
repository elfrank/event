<?php
class AreasController extends AppController {

	var $name = 'Areas';
	var $helpers = array('Authake.Htmlbis', 'Form', 'Time');
	var $paginate = array(
                        'limit' => 10,
                        'order' => array(
                                         'Area.id' => 'asc'
                                        )
                       );
	
	function admin_index($tableonly = false) {
		$this->Area->recursive = 1;
        $this->set('areas', $this->paginate());
        $this->set('tableonly', $tableonly);
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Area', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('area', $this->Area->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Area->create();
			if ($this->Area->save($this->data)) {
				$this->Session->setFlash(__('The Area has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Area could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Area', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Area->save($this->data)) {
				$this->Session->setFlash(__('The Area has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Area could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Area->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Area', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Area->del($id)) {
			$this->Session->setFlash(__('Area deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Area could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>