<?php

class PackagesController extends AppController
{
  var $name = 'Packages';

  var $hasMany = array('User', 'Signup');

  var $helpers = array('Html', 'Time');

  function admin_index()
  {
    $this->set('packages', $this->paginate());
  }

  function admin_add()
  {
    if(!empty($this->data))
    {
      $this->Package->create();
      if($this->Package->save($this->data))
      {
	$this->Session->setFlash(__('The package has been saved.', true));
	$this->redirect(array('action' => 'admin_index'));
      }
      else
      {
	$this->Session->setFlash(__('The Package could not be save. Please, try again.', true));
      }
    }
  }

  function admin_view($id)
  {
    if(!$id)
    {
      $this->Session->setFlash(__('Invalid Package', true));
      $this->redirect(array('action' => 'admin_index'));
    }
    $this->set('package', $this->Package->findById($id));
  }

  function admin_edit($id = null)
  {
    if (!$id && empty($this->data)) 
    {
      $this->Session->setFlash(__('Invalid Package', true));
      $this->redirect(array('action' => 'admin_index'));
    }

    if (!empty($this->data)) 
    {
      if ($this->Package->save($this->data)) 
      {
	$this->Session->setFlash(__('The Package has been saved', true));
	$this->redirect(array('action' => 'admin_index'));
      } 
      else 
      {
	$this->Session->setFlash(__('The Package could not be saved. Please, try again.', true));
      }
    }

    if (empty($this->data)) 
    {
      $this->data = $this->Package->read(null, $id);
    }
  }

  function admin_delete($id)
  {
    $this->Package->delete($id);
    $this->Session->setFlash('The package has been deleted.');
    $this->redirect(array('action' => 'index'));
  }

  function admin_signups()
  {
    $this->set('packages', $this->paginate());
    $this->set('numberOfSignups', $this->requestAction('/signups/getNumberOfSignupsForAllPackages'));
    $this->set('lastSignupDates', $this->requestAction('/signups/getLastSignupDateForAllPackages'));
    $this->set('discounts', $this->requestAction('/signups/getPackagesDiscounts'));
  }
 
  function getPackageSelectList()
  {
    $packages = $this->Package->find('all', array('fields' => array('Package.id', 'Package.name')));

    $packageSelectList = array();

    foreach($packages as $package)
    {
      $packageSelectList[$package['Package']['id']] = $package['Package']['name'];
    }

    return $packageSelectList;
  }

  function getTotalSlots()
  {
    $totalSlots = $this->Package->find('first', array('fields' => 'sum(Package.qty)'));
    return $totalSlots['0']['sum(`Package`.`qty`)'];
  }
  
  function view($id)
  {
    if(!$id)
    {
      $this->Session->setFlash(__('Invalid Package', true));
      $this->redirect(array('action' => 'admin_index'));
    }
    $this->set('package', $this->Package->findById($id));
  }
}

?>