<?php
class SchedulesController extends AppController {

	var $name = 'Schedules';
	var $helpers = array('Authake.Htmlbis', 'Form', 'Time', 'Html');
	var $uses = array('Schedule', 'Activity', 'Place', 'User');
	
    var $paginate = array(
                        'limit' => 30,
                        'order' => array(
                                         'Schedule.created' => 'asc'
                                        )
                       );

	function index($data = null) {
		$this->Schedule->recursive = 1;
	    $this->set('schedules', $this->paginate());
	}
	
	function mycalendar() {
		$user_id = $this->Session->read('Authake.id');
		$this->Schedule->bindModel(array('hasOne' => array('SchedulesUser')));
		$activities = $this->Schedule->find('all', array('order' => 'start_date ASC','conditions' => array('SchedulesUser.user_id' => $user_id)));
		$this->set(compact('activities'));
	}
	
	function keynotes() {
		$this->Schedule->recursive = 1;
		$keynotes = $this->Schedule->find('all', array('conditions' => array('Activity.contenttype_id' => 2)));
		$this->set(compact('keynotes'));
	}
	
	function workshops($day = null) {
		$this->Schedule->recursive = 1;
		$user_id = $this->Session->read('Authake.id');
		$workshops = $this->Schedule->find('all', array('conditions' => array('Activity.contenttype_id' => 1, 'Schedule.start_date' => "$day 16:00:00")));
		
		$this->Schedule->bindModel(array('hasOne' => array('SchedulesUser')));
		$schedule = $this->Schedule->find('first', array('fields' => array('Schedule.*'),'conditions'=>array('SchedulesUser.user_id'=>$user_id, 'Schedule.start_date' => "$day 16:00:00")));
		$schedule_id = $schedule['Schedule']['id'];
		$this->set('id', $schedule_id);
		$this->set('workshops', $workshops);			
	}
	
	function suscribe() {
		$user_id = $this->Session->read('Authake.id');
		if(!empty($this->data)) {
			if($this->data['type'] == 'workshop') {
				$old_schedule_id = $this->data['Schedule']['old_schedule_id'];
				$day = $this->data['Schedule']['day'];
				if($old_schedule_id != '') {
					$sql = "DELETE FROM schedules_users WHERE schedule_id={$old_schedule_id} AND user_id={$user_id}";  
			  	    $this->Schedule->query($sql);
				}
				$schedule_id = $this->data['Schedule']['schedule_id'];
				$this->Schedule->save(array( 
					'Schedule' => array( 
						'id' => $schedule_id, 
					), 
					'User' => array( 
						'User' => array($user_id), 
					), 
				));	
			} else if($this->data['type'] == 'keynote') {
				foreach($this->data['Schedule'] as $d) {
					echo $schedule_id = $d['schedule_id'];
					if($schedule_id == '') { 
						echo "delete";
						$sql = "DELETE FROM schedules_users WHERE schedule_id={$schedule_id} AND user_id={$user_id}";  
			  	    	$this->Schedule->query($sql);
					} else {
						echo 'add';
						if($schedule_id != 0) {
						$this->Schedule->save(array( 
							'Schedule' => array( 
								'id' => $schedule_id, 
							), 
							'User' => array( 
								'User' => array($user_id), 
							), 
						));	
						}
					}
				}
			}
				

			$this->Session->setFlash(__('Your preferences has been saved', true));
		} else {
			
		}
		
	} 
	
	function __selectedWorkshop($event) {
		foreach($event as $w) {
			foreach($w['User'] as $user) {
				if($user['login'] == $this->Session->read('Authake.login')) {
					return $w;
				}
			}
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Schedule', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('schedule', $this->Schedule->read(null, $id));
	}
	
	function admin_index($tableonly = false) {
		$this->Schedule->recursive = 1;
        $this->set('schedules', $this->paginate());
        $this->set('tableonly', $tableonly);
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Schedule', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('schedule', $this->Schedule->read(null, $id));
	}

	function admin_add() {
		$this->set('activityList', $this->Activity->find('list', array('fields' => array('id','short_name'))));
		$this->set('placeList', $this->Place->find('list', array('fields' => array('id','name'))));
		$this->set('userList', $this->User->find('list', array('fields' => array('id','login'))));
		if (!empty($this->data)) {
			$this->Schedule->create();
			if ($this->Schedule->save($this->data)) {
				$this->Session->setFlash(__('The Schedule has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Schedule could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Schedule', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Schedule->save($this->data)) {
				$this->Session->setFlash(__('The Schedule has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Schedule could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->set('activityList', $this->Activity->find('list', array('fields' => array('id','short_name'))));
			$this->set('placeList', $this->Place->find('list', array('fields' => array('id','name'))));
			$this->set('userList', $this->User->find('list', array('fields' => array('id','login'))));
			$this->data = $this->Schedule->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Schedule', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Schedule->del($id)) {
			$this->Session->setFlash(__('Schedule deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Schedule could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}
		
	function calendar($year = null, $month = null) {
 
		$this->Event->recursive = 0;
 
		$month_list = array('january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
		$day_list = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
		$base_url = $this->webroot . 'activities/calendar'; // NOT not used in the current helper version but used in the data array
		$view_base_url = $this->webroot. 'activities';
 
		$data = null;
 
		if(!$year || !$month) {
			$year = date('Y');
			$month = date('M');
			$month_num = date('n');
			$item = null;
		}
 
		$flag = 0;
 
		for($i = 0; $i < 12; $i++) { // check the month is valid if set
			if(strtolower($month) == $month_list[$i]) {
				if(intval($year) != 0) {
					$flag = 1;
					$month_num = $i + 1;
					$month_name = $month_list[$i];
					break;
				}
			}
		}
 
		if($flag == 0) { // if no date set, then use the default values
			$year = date('Y');
			$month = date('M');
			$month_name = date('F');
			$month_num = date('m');
		}
 
		$fields = array('id', 'activity_id', 'DAY(start_date) AS start_day');
 
		$var = $this->Schedule->findAll('MONTH(Schedule.start_date) = ' . $month_num . ' AND YEAR(Schedule.start_date) = ' . $year, $fields, 'Schedule.start_date ASC');
		
		$this->loadModel("Activity");
		
		$activities = $this->Activity->find('all', array('fields' => 'id, short_name'));		
 
		/**
		* loop through the returned data and build an array of 'events' that is passes to the view
		* array key is the day of month 
		*
		*/
 
		foreach($activities as $act) 
		{
			$act_name = $act['Activity']['short_name'];
			
			foreach($act['Schedule'] as $sch)
			{
				if(isset($sch['start_date'])) 
				{
					$date = date_parse($sch['start_date']);
					$date_string = $date['year'].'-'.$date['month'].'-'.$date['day'];					 
					if($date['minute'] < 10)
					{
						$date['minute'] = '0'.$date['minute'];
					}
					$act['Activity']['time'] = $date['hour'].':'.$date['minute'];
					$data[$date_string][] = $act['Activity'];
				}
			} 			
		}
 
		/*foreach($var as $v) {
 
			if(isset($v[0]['start_day'])) {
 
				$day = $v[0]['start_day'];
 
				if(isset($data[$day])) {
					$data[$day] .= '<br /><a href="' . $view_base_url . '/view/' . $v['Schedule']['id'] . '">' . $v['Schedule']['id'] . '</a>';
				} else {
					$data[$day] = '<a href="' . $view_base_url . '/view/' . $v['Schedule']['id'] . '">' . $v['Schedule']['id'] . '</a>';
				}
			}
		}*/
 
		$this->set('year', $year);
		$this->set('month', $month);
		$this->set('base_url', $base_url);
		$this->set('activities', $data);
 
	}
}
?>