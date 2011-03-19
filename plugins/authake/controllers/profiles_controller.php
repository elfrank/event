<?php
class ProfilesController extends AuthakeAppController {

  var $name = 'Profiles';
  var $helpers = array('Htmlbis', 'Form', 'Time');
  var $uses = array('Authake.Profile', 'Team');
  var $paginate = array(
                        'limit' => 10,
                        'order' => array(
                                         'Profile.id' => 'asc'
                                        )
                       );

	function index($tableonly = false) {
		$this->Profile->recursive = 1;
        $this->set('profiles', $this->paginate());
        $this->set('tableonly', $tableonly);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Profile', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('profile', $this->Profile->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Profile->create();
			if ($this->Profile->save($this->data)) {
				$this->Session->setFlash(__('The Profile has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Profile could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		$this->set('teamList', $this->Team->find('list'));
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Profile', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Profile->save($this->data)) {
				$this->Session->setFlash(__('The Profile has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Profile could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Profile->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Profile', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Profile->del($id)) {
			$this->Session->setFlash(__('Profile deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Profile could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}


	function admin_index() {
		$this->Profile->recursive = 0;
		$this->set('profiles', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Profile', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('profile', $this->Profile->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Profile->create();
			if ($this->Profile->save($this->data)) {
				$this->Session->setFlash(__('The Profile has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Profile could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Profile', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Profile->save($this->data)) {
				$this->Session->setFlash(__('The Profile has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Profile could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Profile->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Profile', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Profile->del($id)) {
			$this->Session->setFlash(__('Profile deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Profile could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

	function getPaginatedMembersOfTeam($team_id)
	{
	  return $this->paginate(array('team_id' => $team_id));
	}
}
?>