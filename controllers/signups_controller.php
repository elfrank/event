<?php

class SignupsController extends AppController
{
  const UNIQUE_SIGNUP_MESSAGE = '';

  var $name = 'Signups';

  var $uses = array('Signup', 'Package', 'Team', 'Profile');

  var $helpers = array('Html', 'Form');

  var $validate = array('package_id' => array(
  					   'rule' => 'isUnique',
  					   'message' => self::UNIQUE_SIGNUP_MESSAGE));

  
  function index()
  {
    $packages = $this->Package->find('all');

    $packageAvailability = array();
    foreach($packages as $package)
    {
      $packageAvailability[$package['Package']['id']] = !$this->__full($package['Package']['id']);
    }

    $this->set('packageAvailability', $packageAvailability);
    $this->set('packages', $packages);
    $this->set('signups', $this->Signup->find('all'));
  }

  function confirm()
  {
    if(!isset($this->data['Signup']['package_id']))
    {
      $this->Session->setFlash('You must select a package');
      $this->redirect(array('action' => 'index'));
    }

    if(isset($this->data['Signup']['discount_code_id']) && $this->data['Signup']['discount_code_id'] != '')
    {
      $this->loadModel('Code');
      if(!$this->Code->find('count', array('conditions' => array('code' => $this->data['Signup']['discount_code_id']))))
      {
	$this->Session->setFlash(__('The code you entered does not exist', true));
	$this->redirect(array('action' => 'index'));
      }
      
      $code = $this->Code->find('first', array('conditions' => array('code' => $this->data['Signup']['discount_code_id'])));

      if($code['Code']['used'] == 'yes')
      {
	$this->Session->setFlash(__('The code you entered has already been used', true));
	$this->redirect(array('action' => 'index'));
      }     
    }

    $this->loadModel('Event');
    $package = $this->Package->find('first', array('conditions' => array('Package.id' => $this->data['Signup']['package_id'])));
    $this->set('package', $this->Package->find('first', array('conditions' => array('id' => $this->data['Signup']['package_id']), 'fields' => array('Package.name', 'Package.description', 'Package.price'))));
    $this->set('signupInfo', $this->data);
    $this->set('event', $this->Event->find('first', array('conditions' => array('Event.id' => $package['Package']['event_id']))));
    if(!empty($this->data['Signup']['discount_code_id']))
    {
      $this->loadModel('Code');
      $this->set('discountCode', $this->Code->find('first', array('conditions' => array('code' => $this->data['Signup']['discount_code_id']))));
    }
    
    
    $userId = $this->Session->read('Authake.id');		
    $profile = $this->Profile->find("first", array('conditions' => array('Profile.user_id' => $userId)));
    $this->set('profile_id',$profile['Profile']['id']);
    
  }

  function checkout()
  {
    if(!empty($this->data))
    {
      $this->loadModel('Code');

      if(isset($this->data['Signup']['code_id']))
      {
		$code = array('Code' => array('id' => $this->data['Signup']['code_id'], 'used' => 'yes', 'use_date' => 'now()'));
		if($this->Signup->save($this->data) && $this->Code->save($code))
		{
		  $this->Session->setFlash('You have signed up to the event.');
		  $this->redirect(array('action' => 'index'));
		}
      }

      $this->Session->setFlash('You have signed up to the event.');
      $this->redirect(array('action' => 'index'));
    }

    $this->set('data', $this->data);
  }

  function signup_team($team_id)
  {
    $dataToSave = array('Signup' => array());

    $i = 0;
    $signups = 0;

    foreach($this->data['Signup']['selected'] as $key => $value)
    {
      if($value == 1)
      {
	$dataToSave['Signup'][$i++] = array('profile_id' => $key);
	$signups++;
      }
    }

    $i = 0;

    foreach($this->data['Signup']['chosen_package'] as $key => $value)
    {
      if($this->data['Signup']['selected'][$key])
      {
	$dataToSave['Signup'][$i++]['package_id'] = $value;
      }
    }

    if($this->Signup->saveAll($dataToSave['Signup']))
    {
      if($signups == 1)
      {
	$this->Session->setFlash('The team member was signed up for the event.');
      }
      else
      {
	$this->Session->setFlash('The team members were signed up for the event.');
      }
    }

    $this->redirect(array('controller' => 'teams', 'action' => 'view_myteam', $team_id));
  }

  function admin_index()
  {
    $packages = $this->Package->find('all', array('order' => 'name ASC'));
    $this->set('packages', $packages);
    
    $this->set('numberOfSignups', $this->getNumberOfSignupsForPackages($packages));
  }

  function admin_view($package_id)
  {
    $this->set('signups', $this->paginate(array("Signup.package_id = $package_id")));
    $this->set('packageName', $this->Package->field('name', array('id' => $package_id)));
    $this->set('teams', $this->__getTeams($package_id));
  }

  function __getTeams($package_id)
  {
    $signups = $this->Signup->find('all', array('conditions' => array('Signup.package_id' => $package_id)));
    
    $teams = array();

    foreach($signups as $signup)
    {
      $teams[$signup['Profile']['id']] = $this->Team->find('first', array('conditions' => array('Team.id' => $signup['Profile']['team_id'])));
    }
    
    return $teams;
  }

  function admin_cancel($id, $package_id)
  {
    if($this->Signup->delete($id))
    {
      $this->Session->setFlash('The signup has been canceled.');
      $this->redirect(array('action' => 'admin_view', $package_id));
    }
    else
    {
      $this->Session->setFlash('Invalid signup id.');
      $this->redirect(array('action' => 'admin_view', $package_id));
    }
  }

  function __full($packageId)
  {
    $this->Package->id = $packageId;
    $signupsForPackage = $this->Signup->find('count', array('conditions' => array('Signup.package_id' => $packageId)));
    $packageQty = $this->Package->field('qty');
    return ($packageQty - $signupsForPackage) == 0;
  }

  function __getPackagesNames($signups)
  {
    $packagesNames = array();

    foreach($signups as $signup)
    {
      $package =  $this->Package->findById($signup['Signup']['package_id']);
      $packagesNames[$signup['Signup']['package_id']] = $package['Package']['name'];
    }

    return $packagesNames;
  }

  function getNumberOfSignupsForPackages($packages)
  {
    $numberOfSignups = array();

    foreach($packages as $package)
    {
      $numberOfSignups[$package['Package']['id']] = $this->Signup->find('count', array('conditions' => array('Signup.package_id' => $package['Package']['id'])));
    }

    return $numberOfSignups;
  }

  function getNumberOfSignupsForAllPackages()
  {
    $numberOfSignups = array();
    $packages = $this->Package->find('all');

    foreach($packages as $package)
    {
      $numberOfSignups[$package['Package']['id']] = $this->Signup->find('count', array('conditions' => array('Signup.package_id' => $package['Package']['id'])));
    }

    return $numberOfSignups;
  }

  function __getNumberOfSlotsForPackages()
  {
    $numberOfSlots = array();

    $signups = $this->Signup->find('all');

    foreach($signups as $signup)
    {
      $package =  $this->Package->findById($signup['Signup']['id']);
      $numberOfSlots[$signup['Signup']['package_id']] = $package['Package']['qty'];
    }

    return $numberOfSlots;
  }

  function getLastSignupDateForAllPackages()
  {
    $lastSignupDates = array();
    $packages = $this->Package->find('all');

    foreach($packages as $package)
    {
      $signup = $this->Signup->find('first', array('conditions' => array('Signup.package_id' => $package['Package']['id']), 'order' => 'Signup.created', 'limit' => 1));
      $lastSignupDates[$package['Package']['id']] = $signup['Signup']['created'];
    }

    return $lastSignupDates;
  }

  function getSignedUpUsers()
  {
    $signups = $this->Signup->find('all', array('fields' => array('Signup.profile_id')));
    $signedUpUsers = array();

    foreach($signups as $signup)
    {
      $signedUpUsers[] = $signup['Signup']['profile_id'];
    }

    return $signedUpUsers;
  }

  function isSignedUp($profile_id = 0)
  {
    return $this->Signup->find('count', array('conditions' => array('Signup.profile_id' => $profile_id)));
  }

  function admin_statistics()
  {
    $totalSignups = $this->Signup->find('count');
    $totalSlots = $this->requestAction('packages/getTotalSlots');

    $this->set('totalSignups', $totalSignups);
    $this->set('totalSlots', $totalSlots);

    // total signups vs total slots chart.

    $graph1 = array(
		    'cht' => 'bvg',
		    'chs' => '200x200',
		    'chxt' => 'x,y',
		    'chco' => '4D89F9,C6D9FD',
		    'chxl' => '0:|Signups',
		    'chdl' => 'Current%20signups|Expected%20signups',
		    'chd' => 't:'.$totalSignups.'|'.$totalSlots,
		    'chxr' => '0,0,0|1,0,'.($totalSlots+10).','.floor(($totalSlots+10)/5),
		    'chds' => '0,'.($totalSlots+10),
		    'chf' => 'bg,s,F9F9F9');

    $this->set('graph1', $this->__makeChartUrl($graph1));
    
    $totalExpectedEarnings = $this->__totalExpectedEarnings();
    $totalDiscounts = $this->__totalDiscounts();
    $totalEarnings = $this->__totalEarnings($this->getNumberOfSignupsForPackages($this->Package->find('all'))) - $totalDiscounts;
    
    $this->set('totalEarnings', $totalEarnings);
    $this->set('totalExpectedEarnings', $totalExpectedEarnings);
    $this->set('totalDiscounts', $totalDiscounts);

    // current earnings vs expected earnings chart.

    $graph2 = array(
		    'cht' => 'bvg',
		    'chs' => '250x200',
		    'chxt' => 'x,y',
		    'chco' => '4D89F9,002538,C6D9FD',
		    'chxl' => '0:|Earnings',
		    'chdl' => 'Current%20earnings|Total%20discounts|Expected%20earnings',
		    'chd' => 't:'.$totalEarnings.'|'.$totalDiscounts.'|'.$totalExpectedEarnings,
		    'chxr' => '0,0,0|1,0,'.($totalExpectedEarnings+10).','.floor(($totalExpectedEarnings+10)/5),
		    'chds' => '0,'.($totalExpectedEarnings+10),
		    'chf' => 'bg,s,F9F9F9');

    $this->set('graph2', $this->__makeChartUrl($graph2));

    // signups per package chart.

    $this->set('numberOfPackages', $this->Package->find('count'));    
    $this->set('numberOfFullPackages', $this->__numberOfFullPackages());
    $this->set('maxSignupsPackages', $this->__maxSignupsPackages());
    $this->set('minSignupsPackages', $this->__minSignupsPackages());
    $this->set('chart3', $this->__makeChartUrl($this->__buildChart3()));
  }

  function __maxSignupsPackages()
  {
    $signupsAndSlots = $this->__signupsAndSlotsOfAllPackages();

    $maxSignupsPackages['package_id'] = array();
    $maxSignupsPackages['signups_percentage'] = array();
    $maxSignupsPackages['names'] = array();

    $maxPercentage['package_id'] = 0;
    $maxPercentage['signups_percentage'] = 0.0;
    $maxPercentage['name'] = '';

    foreach($signupsAndSlots as $id => $sas)
    {
      if($sas['slots'] == 0)
      {
	$percentage = 0.0;
      }
      else
      {
	$percentage = ($sas['signups'] * 100 ) / $sas['slots'];
      }
      
      if($percentage > $maxPercentage['signups_percentage'])
      {
	$maxPercentage['package_id'] = $id;
	$maxPercentage['signups_percentage'] = $percentage;
	$maxPercentage['name'] = $sas['name'];
      }
    }

    array_push($maxSignupsPackages['package_id'], $maxPercentage['package_id']);
    array_push($maxSignupsPackages['signups_percentage'], $maxPercentage['signups_percentage']);
    array_push($maxSignupsPackages['names'], $maxPercentage['name']);

    foreach($signupsAndSlots as $id => $sas)
    {
      if($sas['slots'] == 0)
      {
	$percentage = 0.0;
      }
      else
      {
	$percentage = ($sas['signups'] * 100 ) / $sas['slots'];
      }

      if($percentage == $maxPercentage['signups_percentage'] && $id != $maxPercentage['package_id'])
      {
	array_push($maxSignupsPackages['package_id'], $id);
	array_push($maxSignupsPackages['signups_percentage'], $percentage);
	array_push($maxSignupsPackages['names'], $sas['name']);
      }
    }

    return $maxSignupsPackages;
  }

  function __minSignupsPackages()
  {
    $signupsAndSlots = $this->__signupsAndSlotsOfAllPackages();

    $minSignupsPackages['package_id'] = array();
    $minSignupsPackages['signups_percentage'] = array();
    $minSignupsPackages['names'] = array();

    $minPercentage['package_id'] = 0;
    $minPercentage['signups_percentage'] = 101.0;
    $minPercentage['name'] = '';

    foreach($signupsAndSlots as $id => $sas)
    {
      if($sas['slots'] == 0)
      {
	$percentage = 0.0;
      }
      else
      {
	$percentage = ($sas['signups'] * 100 ) / $sas['slots'];
      }
      
      if($percentage < $minPercentage['signups_percentage'])
      {
	$minPercentage['package_id'] = $id;
	$minPercentage['signups_percentage'] = $percentage;
	$minPercentage['name'] = $sas['name'];
      }
    }

    array_push($minSignupsPackages['package_id'], $minPercentage['package_id']);
    array_push($minSignupsPackages['signups_percentage'], $minPercentage['signups_percentage']);
    array_push($minSignupsPackages['names'], $minPercentage['name']);

    foreach($signupsAndSlots as $id => $sas)
    {
      if($sas['slots'] == 0)
      {
	$percentage = 0.0;
      }
      else
      {
	$percentage = ($sas['signups'] * 100 ) / $sas['slots'];
      }

      if($percentage == $minPercentage['signups_percentage'] && $id != $minPercentage['package_id'])
      {
	array_push($minSignupsPackages['package_id'], $id);
	array_push($minSignupsPackages['signups_percentage'], $percentage);
	array_push($minSignupsPackages['names'], $sas['name']);
      }
    }

    return $minSignupsPackages;
  }

  function __numberOfFullPackages()
  {
    $signupsAndSlots = $this->__signupsAndSlotsOfAllPackages();
    
    $numberOfFullPackages = 0;

    foreach($signupsAndSlots as $sas)
    {
      if($sas['signups'] == $sas['slots'])
      {
	$numberOfFullPackages++;
      }
    }

    return $numberOfFullPackages;
  }

  function __buildChart3()
  {
    $signupsAndSlots = $this->__signupsAndSlotsOfAllPackages();

    $data = 't:';
    $names = '0:';

    foreach($signupsAndSlots as $sas)
    {
      $data .= $sas['signups'].',';
      $names .= '|'.$sas['name'];
    }

    $data = substr($data, 0, -1);

    $data .= '|';

    foreach($signupsAndSlots as $sas)
    {
      $data .= $sas['slots'].',';
    }

    $data = substr($data, 0, -1);

    $chart3 = array(
		    'cht' => 'bvg',
		    'chs' => '700x200',
		    'chxt' => 'x,y',
		    'chco' => '4D89F9,C6D9FD',
		    'chdl' => 'Current%20signups|Expected%20signups',
		    'chxl' => $names,
		    'chd' => $data,
		    'chxr' => '0,0,0|1,0,'.($this->__maxSlots()+10).','.floor(($this->__maxSlots()+10)/5),
		    'chds' => '0,'.($this->__maxSlots()+10),
		    'chf' => 'bg,s,F9F9F9',
		    'chbh' => '15,4,30');

    return $chart3;
  }

  function __maxSlots()
  {
    $packages = $this->Package->find('all');
    
    $maxSlots = 0;

    foreach($packages as $package)
    {
      if($package['Package']['qty'] > $maxSlots)
      {
	$maxSlots = $package['Package']['qty'];
      }
    }

    return $maxSlots;
  }

  function __signupsAndSlotsOfAllPackages()
  {
    $packages = $this->Package->find('all');

    $signupsAndSlots = array();

    $signups = $this->getNumberOfSignupsForPackages($packages);
    
    foreach($packages as $package)
    {
      $signupsAndSlots[$package['Package']['id']]['signups'] = $signups[$package['Package']['id']];
      $signupsAndSlots[$package['Package']['id']]['slots'] = $package['Package']['qty'];
      $signupsAndSlots[$package['Package']['id']]['name'] = $package['Package']['name'];
    }

    return $signupsAndSlots;
  }

  function __totalEarnings($numberOfSignups)
  {
    $totalEarnings = 0;

    foreach($numberOfSignups as $package_id => $num)
    {
      $totalEarnings += $this->Package->field('price', array('Package.id' => $package_id)) * $num;
    }

    return $totalEarnings;
  }

  function __totalExpectedEarnings()
  {
    $totalExpectedEarnings = 0;
    $packages = $this->Package->find('all');

    foreach($packages as $package)
    {
      $totalExpectedEarnings += $package['Package']['price'] * $package['Package']['qty'];
    }

    return $totalExpectedEarnings;
  }

  function __makeChartUrl($graph)
  {
    $url = 'http://chart.apis.google.com/chart?';
    foreach($graph as $key => $val)
    {
      $url .= $key.'='.$val.'&';
    }

    return $url;
  }

  function __totalDiscounts()
  {
    $discounts = $this->getPackagesDiscounts();
    
    $totalDiscounts = 0;
    
    foreach($discounts as $discount)
    {
      $totalDiscounts += $discount;
    }

    return $totalDiscounts;
  }

  function getPackagesDiscounts()
  {
    $this->loadModel('Package');
    $packages = $this->Package->find('all');
    $this->loadModel('Code');
    $codes = $this->Code->find('all');
    $this->loadModel('Coupon');

    $discounts = array();

    foreach($packages as $package)
    {
      $discounts[$package['Package']['id']] = 0;
    }

    foreach($codes as $code)
    {
      if(!empty($code['Code']['package_id']) && $code['Code']['used'] == 'yes')
      {
	$discounts[$code['Code']['package_id']] += $this->Package->field('price', array('Package.id' => $code['Code']['package_id']))*($this->Coupon->field('percentage', array('id' => $code['Code']['coupon_id']))/100);
      }
    }
    return $discounts;
  }
}

?>
