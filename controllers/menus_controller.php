<?php
class MenusController extends AppController {

	var $name = 'Menus';
	var $helpers = array('Authake.Htmlbis', 'Form', 'Time');
	var $uses = array('Menu', 'Area');
	var $paginate = array(
                        'limit' => 20,
                        'order' => array(
                                         'Menu.id' => 'asc'
                                        )
                       );
	
	function admin_index($tableonly = false) {
		$this->Menu->recursive = 1;
        $this->set('menus', $this->paginate());
        $this->set('tableonly', $tableonly);
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Menu', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('menu', $this->Menu->read(null, $id));
	}

	function admin_add() {
		$this->set('areaList', $this->Area->find('list', array('fields' => array('id','name'))));
		if (!empty($this->data)) {
			$this->Menu->create();
			if ($this->Menu->save($this->data)) {
				$this->Session->setFlash(__('The Menu has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Menu could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		$this->set('areaList', $this->Area->find('list', array('fields' => array('id','name'))));
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Menu', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Menu->save($this->data)) {
				$this->Session->setFlash(__('The Menu has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Menu could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Menu->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Menu', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Menu->del($id)) {
			$this->Session->setFlash(__('Menu deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Menu could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>