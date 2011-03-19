<?php
class CouponsController extends AppController {

	var $name = 'Coupons';
	var $helpers = array('Html', 'Form');
	
	function admin_index() 
	{
	  $this->Coupon->recursive = 0;
	  $this->set('coupons', $this->paginate());
	  $this->set('numberOfCodes', $this->__getNumberOfCodesOfAllCoupons());
	  $this->set('numberOfUsedCodes', $this->__getNumberOfCodesUsedOfAllCoupons());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Coupon', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('coupon', $this->Coupon->read(null, $id));

		$numberCodesOfAllCoupons = $this->__getNumberOfCodesOfAllCoupons();
		$this->set('numberOfCodes', $numberCodesOfAllCoupons[$id]);
		$numberOfUsedCodesOfAllCoupons = $this->__getNumberOfCodesUsedOfAllCoupons();
		$this->set('numberOfUsedCodes', $numberOfUsedCodesOfAllCoupons[$id]);
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Coupon->create();
			if ($this->Coupon->save($this->data)) {
				$this->Session->setFlash(__('The Coupon has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Coupon could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Coupon', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Coupon->save($this->data)) {
				$this->Session->setFlash(__('The Coupon has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Coupon could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Coupon->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Coupon', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Coupon->del($id)) {
			$this->Session->setFlash(__('Coupon deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Coupon could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function __getNumberOfCodesOfAllCoupons()
	{
	  $this->loadModel('Code');
	  $numberOfCodes = array();
	  $coupons = $this->Coupon->find('all');
	  
	  foreach($coupons as $coupon)
	  {
	    $numberOfCodes[$coupon['Coupon']['id']] = $this->Code->find('count', array('conditions' => array('coupon_id' => $coupon['Coupon']['id'])));
	  }

	  return $numberOfCodes;
	}

	function __getNumberOfCodesUsedOfAllCoupons()
	{
	  $this->loadModel('Code');
	  $numberOfUsedCodes = array();
	  $coupons = $this->Coupon->find('all');
	  
	  foreach($coupons as $coupon)
	  {
	    $numberOfUsedCodes[$coupon['Coupon']['id']] = $this->Code->find('count', array('conditions' => array('coupon_id' => $coupon['Coupon']['id'], 'used' => 'yes')));
	  }

	  return $numberOfUsedCodes;
	}
}
?>