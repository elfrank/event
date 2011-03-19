<?php

//App::import('Vendor', 'oauth', array('file' => 'OAuth'.DS.'oauth_consumer.php'));

class ActivitiesController extends AppController {

	var $name = 'Activities';
	var $helpers = array('Authake.Htmlbis', 'Form', 'Time');
	var $uses = array('Activity', 'Contenttype', 'Event');
	public $components = array('OauthConsumer');
    var $paginate = array(
                        'limit' => 10,
                        'order' => array(
                                         'Activity.created' => 'asc'
                                        )
                       );

	function index($tableonly = false) {
		$this->Activity->recursive = 1;
        $this->set('activities', $this->paginate());
        $this->set('tableonly', $tableonly);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Activity', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('activity', $this->Activity->read(null, $id));
	}
	
	function admin_index($tableonly = false) {
		$this->Activity->recursive = 1;
        $this->set('activities', $this->paginate());
        $this->set('tableonly', $tableonly);
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Activity', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('activity', $this->Activity->read(null, $id));
	}

	function admin_add() 
	{
		$this->set('eventList', $this->Event->find('list', array('fields' => array('id','short_name'))));
		$this->set('contentTypeList', $this->Contenttype->find('list'));
		if (!empty($this->data)) {
			$this->Activity->create();
			if ($this->Activity->save($this->data)) {
				$this->Session->setFlash(__('The Activity has been saved', true));
				
				
				//twitiemos




				
				
				$activ = $this->Activity->read();
				
				$liga = 'http://congreso.rebeet.com/activities/view/'.$activ['Activity']['id'];
				
				$original_url = $liga;
					
				$request = 'http://api.bit.ly/v3/shorten?login=perrohunter&apiKey=R_d0eb0066b6b31a1800c1c17293736a2b&format=txt&longUrl=' . urlencode($original_url);
				$response = file_get_contents($request);
				if (substr($request, 0, 4) == 'http')
				{
					$liga = $response;	
				}
				else
				{
					$liga = '';
				}
				
				$status = "Nuevo(a) ".$activ['Contenttype']['name']." '".$activ['Activity']['short_name']."'! ".$liga;

				
				$this->loadModel('TwitterAccounts');
				
				$cuentas = $this->TwitterAccounts->query('SELECT * FROM twitter_accounts');
				
				
				foreach($cuentas AS $cuenta)
				{
				
					$accessKey = $cuenta['twitter_accounts']['access_token'];
					$accessSecret = $cuenta['twitter_accounts']['access_token_secret'];
					//echo $status." ".$accessKey."<br>";
					
				
					$result = $this->OauthConsumer->post('Twitter',$accessKey, $accessSecret, 'http://api.twitter.com/1/statuses/update.json', array('status' => $status));


					/*
echo '<pre>';
			        print_r($result);
			        echo '</pre>';
*/
				}			
				
				
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Activity could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Activity', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Activity->save($this->data)) {
				$this->Session->setFlash(__('The Activity has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Activity could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Activity->read(null, $id);
			$this->set('eventList', $this->Event->find('list', array('fields' => array('id','short_name'))));
			$this->set('contentTypeList', $this->Contenttype->find('list'));
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Activity', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Activity->del($id)) {
			$this->Session->setFlash(__('Activity deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Activity could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
