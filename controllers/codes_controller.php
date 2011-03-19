<?php
class CodesController extends AppController {

	var $name = 'Codes';
	var $helpers = array('Authake.Htmlbis', 'Form', 'Time');
	var $paginate = array(
                        'limit' => 20,
                        'order' => array(
                                         'Code.id' => 'asc'
                                        )
                       );

	function index() {
		$this->Code->recursive = 0;
		$this->set('codes', $this->paginate('Code', array('user_id' => '1')));
	}

	function admin_index() {
	  $this->Code->recursive = 0;
	  $this->set('codes', $this->paginate());
	  $this->set('profiles', $this->__getUserProfilesOfAllCodes());	  
	  $this->set('packages', $this->__getPackagesOfAllCodes());
	}

	function admin_view($id = null) 
	{
	  if (!$id) 
	  {
	    $this->Session->setFlash(__('Invalid Code', true));
	    $this->redirect(array('action' => 'index'));
	  }
	  
	  $code = $this->Code->read(null, $id);

	  $this->set('code', $code);

	  $this->loadModel('Authake.Profile');
	  $this->set('profile', $this->Profile->find('first', array('conditions' => array('user_id' => $code['Code']['user_id']))));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Code->create();
			if ($this->Code->save($this->data)) {
				$this->Session->setFlash(__('The Code has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Code could not be saved. Please, try again.', true));
			}
		}
		else {		
		  $this->loadModel('Authake.User');
		  $this->loadModel('Package');
		  $this->loadModel('Coupon');
		  $this->set('usersList', $this->User->find('list', array('fields' => array('id','login'))));
		  $this->set('packagesList', $this->Package->find('list', array('fields' => array('id','name'))));
		  $this->set('couponsList', $this->Coupon->find('list', array('fields' => array('id','name'))));
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Code', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Code->save($this->data)) {
				$this->Session->setFlash(__('The Code has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Code could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
		  $this->loadModel('Package');
		  $this->data = $this->Code->read(null, $id);
		  $this->loadModel('Authake.User');
		  $this->set('usersList', $this->User->find('list', array('fields' => array('id','login'))));
		  $this->set('packagesList', $this->Package->find('list', array('fields' => array('id','name'))));
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Code', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Code->del($id)) {
			$this->Session->setFlash(__('Code deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Code could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

	function __getUserProfilesOfAllCodes()
	{
	  $profiles = array();
	  $this->loadModel('Authake.Profile');

	  $codes = $this->Code->find('all');
	  
	  foreach($codes as $code)
	  {
	    $profiles[$code['Code']['id']] = $this->Profile->find('first', array('conditions' => array('user_id' => $code['Code']['user_id'])));
	  }

	  return $profiles;
	}

	function __getPackagesOfAllCodes()
	{
	  $this->loadModel('Package');
	  $packages = array();

	  $codes = $this->Code->find('all');
	  foreach($codes as $code)
	  {
	    $packages[$code['Code']['id']] = $this->Package->find('first', array('conditions' => array('Package.id' => $code['Code']['package_id'])));
	  }

	  return $packages;
	}
}
?>