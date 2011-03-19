<?php

class ProfileController extends AuthakeAppController
{
  var $name = 'Profile';
  var $uses = array('Authake.Profile', 'Package', 'State', 'Organization');
  var $helpers = array('Htmlbis', 'Form', 'Time');

  // public

  function index()
  {
    $this->loadModel('Organization');
    $this->loadModel('State');
    $this->loadModel('Team');
    $userId = $this->Session->read('Authake.id');		
    $profile = $this->Profile->find("first", array('conditions' => array('Profile.user_id' => $userId)));
    $this->set('profile', $profile);
    $this->set('organization', $this->Organization->find('first', array('conditions' => array('Organization.id' => $profile['Profile']['organization_id']))));
    $this->set('stateName', $this->State->field('name', array('State.id' => $profile['Profile']['state_id'])));
    $this->set('team', $this->Team->find('first', array('conditions' => array('Team.id' => $profile['Profile']['team_id']))));
  }

  function edit($id = null)
  {
   if (!$id && empty($this->data)) 
    {
      $this->Session->setFlash(__('Invalid profile', true));
      $this->redirect(array('admin' => 0, 'plugin' => 'authake', 'controller' => 'profile', 'action' => 'index'));
    }

    if (!empty($this->data)) 
    {
      if($this->Profile->save($this->data)) 
      {
		$this->Session->setFlash(__('Your profile has been saved', true));
		$this->redirect(array('admin' => 0, 'plugin' => 'authake', 'controller' => 'profile', 'action' => 'index'));
      } 
      else 
      {
		$this->Session->setFlash(__('Your profile could not be saved. Please, try again.', true));
      }
    }

    if (empty($this->data)) 
    {
      $this->data = $this->Profile->read(null, $id);
	  $this->set('states', $this->State->find('list'));
	  $this->set('organizations', $this->Organization->find('list'));
    } 
  }

  function personal()
  {
    $profileId  = $this->Session->read('Authake.id');
    $this->set('profile', $this->Profile->find('first', array('conditions' => array('Profile.id' => $profileId))));
    $this->set('organizationName', $this->__getOrganizationName($profileId));
  }

  function edit_personal($id = null)
  {
    if (!$id && empty($this->data)) 
    {
      $this->Session->setFlash(__('Invalid Profile', true));
      $this->redirect(array('action' => 'index'));
    }

    if (!empty($this->data)) 
    {
      if ($this->Package->save($this->data)) 
      {
	$this->Session->setFlash(__('Your profile has been saved', true));
	$this->redirect(array('action' => 'personal'));
      } 
      else 
      {
	$this->Session->setFlash(__('Your Profile could not be saved. Please, try again.', true));
      }
    }

    if (empty($this->data)) 
    {
      $this->data = $this->Package->read(null, $id);
    }
  }

  // private

  function __getOrganizationName($profileId)
  {
    $this->loadModel('Organization');
    $organizationId = $this->Profile->field('organization_id', array('id' => $profileId));
    return $this->Organization->field('name', array('id' => $organizationId));
  }
}

?>
