<?php
class StatesController extends AppController {

	var $name = 'States';
	var $helpers = array('Authake.Htmlbis', 'Form', 'Time');
	var $paginate = array(
                        'limit' => 40,
                        'order' => array(
                                         'State.name' => 'asc'
                                        )
                       );
	
	function admin_index($tableonly = false) {
		$this->State->recursive = 1;
        $this->set('states', $this->paginate());
        $this->set('tableonly', $tableonly);
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid State', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('state', $this->State->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->State->create();
			if ($this->State->save($this->data)) {
				$this->Session->setFlash(__('The State has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The State could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid State', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->State->save($this->data)) {
				$this->Session->setFlash(__('The State has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The State could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->State->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for State', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->State->del($id)) {
			$this->Session->setFlash(__('State deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The State could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>