<?php
class TicketsController extends AppController {

	var $name = 'Tickets';
	var $helpers = array('Authake.Htmlbis', 'Form', 'Time');
	
    var $paginate = array(
                        'limit' => 10,
                        'order' => array(
                                         'Ticket.created' => 'asc'
                                        )
                       );	
					   
	function admin_index() {
		//$this->Ticket->recursive = 1;
        $this->set('tickets', $this->paginate());
        //$this->set('tableonly', $tableonly);
	}
	
	function admin_view($id = null) {	
		if (!$id) 
		{
			$this->Session->setFlash(__('Invalid Ticket', true));
			$this->redirect(array('action' => 'index'));
		}		
		elseif (!empty($this->data)) 
		{					
			if ($this->Ticket->save($this->data)) 
			{			
				$this->Session->setFlash(__('The reply has been sent', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reply could not be sent. Please, try again.', true));
			}
		}
		else
		{
			$this->set('ticket', $this->Ticket->read(null, $id));
			$this->data = $this->Ticket->findById($id);
		}
	}
	
	function index() 
	{	
		$this->loadModel('Profile');
		$userId = $this->Session->read('Authake.id');		
		$profile = $this->Profile->find("first", array('conditions' => array('Profile.user_id' => $userId)));	
		$this->paginate = array(
			'conditions' => array('profile_id' => $profile['Profile']['id'])
		);
		$this->set('tickets', $this->paginate('Ticket'));
	}
	
	function add() 
	{
		$this->loadModel('Area');
		$this->loadModel('Authake.Profile');
		$this->set('areaList', $this->Area->find('list', array('fields' => array('id','name'))));				
		$userId = $this->Session->read('Authake.id');		
		$profile = $this->Profile->find("first", array('conditions' => array('Profile.user_id' => $userId)));
		$this->set('profile_id', $profile["Profile"]["id"]);
		if (!empty($this->data)) {
			$this->Ticket->create();
			if ($this->Ticket->save($this->data)) {
				$this->Session->setFlash(__('Your Ticket has been sent', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Your Ticket could not be sent. Please, try again.', true));
			}
		}
	}
	
	function view($id = null) {	
		if (!$id) 
		{
			$this->Session->setFlash(__('Invalid Ticket', true));
			$this->redirect(array('action' => 'index'));
		}		
		elseif (!empty($this->data)) 
		{					
			if ($this->Ticket->save($this->data)) 
			{			
				$this->Session->setFlash(__('The reply has been sent', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reply could not be sent. Please, try again.', true));
			}
		}
		else
		{
			$this->set('ticket', $this->Ticket->read(null, $id));
			$this->data = $this->Ticket->findById($id);
		}
	}
	
}
?>
