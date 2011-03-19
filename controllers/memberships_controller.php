<?php

class MembershipsController extends AppController
{
  var $name = 'Memberships';

  function admin_delete($id, $team_id)
  {
    if ($this->Membership->del($id)) 
    {
      $this->Session->setFlash(__('Member removed from team.', true));
      $this->redirect(array('controller' => 'teams', 'action' => 'admin_members', $team_id));
    }
  }
}

?>
