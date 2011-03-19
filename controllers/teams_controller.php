<?php
class TeamsController extends AppController {

  var $name = 'Teams';
  var $uses = array('Team','Profile', 'Membership', 'Signup');
  var $helpers = array('Authake.Htmlbis', 'Form', 'Time');
  var $paginate = array(
                        'limit' => 20,
                        'order' => array(
                                         'Team.id' => 'asc'
                                        )
                       );

  function index() {
    $this->Team->recursive = 0;
    $this->set('teams', $this->paginate());
    $this->set('numberOfMembers', $this->__getNumberOfMembersOfTeams($this->Team->find('all')));
  }

  function view($id = null) {  
    if (!$id) {
      $this->Session->setFlash(__('Invalid Team', true));
      $this->redirect(array('action' => 'index'));
    }
    $this->set('team', $this->Team->read(null, $id));
    $this->set('numberOfMembers', $this->__getNumberOfMembersOfTeams($this->Team->find('all')));
  }

  function add() {
    if (!empty($this->data)) {
      $this->Team->create();
      if ($this->Team->save($this->data)) {
        $this->Session->setFlash(__('The Team has been saved', true));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The Team could not be saved. Please, try again.', true));
      }
    } else {
      $this->set('userList', $this->User->find('list',array('fields' => array('User.id','User.login'))));
    }
  }

  function edit($id = null) {
    if (!$id && empty($this->data)) {
      $this->Session->setFlash(__('Invalid Team', true));
      $this->redirect(array('action' => 'index'));
    }
    if (!empty($this->data)) {
      if ($this->Team->save($this->data)) {
        $this->Session->setFlash(__('The Team has been saved', true));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The Team could not be saved. Please, try again.', true));
      }
    }
    if (empty($this->data)) {
      $this->set('userList', $this->User->find('list',array('fields' => array('User.id','User.login'))));
      $this->data = $this->Team->read(null, $id);
    }
  }

  function admin_index()
  {
    $this->Team->recursive = 0;
    $this->set('teams', $this->paginate());
    $this->set('numberOfMembers', $this->__getNumberOfMembersOfTeams($this->Team->find('all')));
  }

  function admin_view($id = null)
  {
    if (!$id) {
      $this->Session->setFlash(__('Invalid Team', true));
      $this->redirect(array('action' => 'index'));
    }
    $this->set('team', $this->Team->read(null, $id));
    $this->set('numberOfMembers', $this->__getNumberOfMembersOfTeams($this->Team->find('all', array('conditions' => array('Team.id' => $id)))));
  }

  function admin_add() {
    if (!empty($this->data)) {
      $this->Team->create();
      if ($this->Team->save($this->data)) {
        $this->Session->setFlash(__('The Team has been saved', true));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The Team could not be saved. Please, try again.', true));
      }
    }
    else
    {
      $this->loadModel('Authake.Profile');
      $this->set('userList', $this->Profile->find('list',array('fields' => array('Profile.id','Profile.first_name'))));
    }
  }

  function admin_edit($id = null) 
  {
    if (!$id && empty($this->data)) 
    {
      $this->Session->setFlash(__('Invalid Team', true));
      $this->redirect(array('action' => 'index'));
    }

    if (!empty($this->data)) 
    {
      $this->data['Team']['id'] = $id;
      if ($this->Team->save($this->data)) 
      {
	$this->Session->setFlash(__('The Team has been saved', true));
	$this->redirect(array('action' => 'index'));
      } else {
	$this->Session->setFlash(__('The Team could not be saved. Please, try again.', true));
      }
    }
    if (empty($this->data)) {
      $this->data = $this->Team->read(null, $id);
      $this->loadModel('Authake.Profile');
      $this->set('userList', $this->Profile->find('list',array('fields' => array('Profile.id','Profile.first_name'))));
    }
  }

  function admin_add_members($id = null)
  {
    if (!$id && empty($this->data)) 
    {
      $this->Session->setFlash(__('Invalid Team', true));
      $this->redirect(array('action' => 'index'));
    }

    if(!empty($this->data)) 
    {
      $this->loadModel('Authake.Profile');
      $profiles = $this->data['Team']['profile_id'];
      $record = array();
      foreach($profiles as $profile)
      {
	$record['Profile']['id'] = $profile;
	$record['Profile']['team_id'] = $id;
	$this->Profile->save($record);
      }
      $this->Session->setFlash('The users have been added to the team');
      $this->redirect(array('action' => 'members', $id));
    }

    if (empty($this->data)) {
      $this->data = $this->Team->read(null, $id);
      $this->loadModel('Authake.Profile');
      $this->set('userList', $this->Profile->find('list',array('conditions' => array('team_id' => '<> '.$id), 'fields' => array('Profile.id','Profile.first_name'))));
      $this->set('team', $this->Team->find('first', array('conditions' => array('Team.id' => $id))));
    }
  }

        function admin_delete($id = null) {
                if (!$id) {
                        $this->Session->setFlash(__('Invalid id for Team', true));
                        $this->redirect(array('action' => 'index'));
                }
                if ($this->Team->del($id)) {
                        $this->Session->setFlash(__('Team deleted', true));
                        $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('The Team could not be deleted. Please, try again.', true));
                $this->redirect(array('action' => 'index'));
        }

        function __getNumberOfMembersOfTeams($teams)
        {
          $numberOfMembers = array();
          foreach($teams as $team)
          {
            $numberOfMembers[$team['Team']['id']] = $this->Membership->find('count', array('conditions' => array('Membership.team_id' => $team['Team']['id'])));
          }

          return $numberOfMembers;
        }

        function admin_members($team_id)
        {
	  $members = $this->Membership->find('all', array('conditions' => array('Membership.team_id' => $team_id)));
          $this->set('members', $members);
          $this->set('team', $this->Team->find('all', array('conditions' => array('Team.id' => $team_id))));
	  $this->set('signups', $this->__determineSignups($members));
        }

        function admin_remove_member($team_id, $profile_id)
        {
          $this->redirect(array('action' => 'admin_members', $team_id));
        }

	function __determineSignups($members)
	{
	  $signups = array();

	  foreach($members as $member)
	  {
	    $signups[$member['Profile']['id']] = $this->requestAction('signups/isSignedUp/'.$member['Profile']['id']);
	  }

	  return $signups;
	}

	function leader()
	{
	  $leaderId =$this->Session->read('Authake.id');
	  $this->set('leaderTeams', $this->Team->find('all', array('conditions' => array('profile_id' => $leaderId))));
	}
  }
?>