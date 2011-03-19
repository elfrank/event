<?php
/* SVN FILE: $Id: pages_controller.php 7945 2008-12-19 02:16:01Z gwoo $ */
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision: 7945 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-18 18:16:01 -0800 (Thu, 18 Dec 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */
class PagesController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Pages';
/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array('Html');
/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	var $uses = array();
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
	function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title'));
		$this->render(join('/', $path));
	}
	
	function dashboard() {
		$this->loadModel('Area');
		$areas = $this->Area->find('all');
		
		$this->loadModel('Menu');
		$menus = $this->Menu->find('all');
		
		$areasById = array();

		foreach($areas as $area)
		{
			$areasById[$area['Area']['id']] = $area['Area'];
		}

		$count = array();

	  	foreach($menus as $menu)
		{
			$count[$menu['Menu']['area_id']] = 0;
		}

		foreach($menus as $menu) {
			$area_id = $menu['Menu']['area_id'];

			$count[$area_id]++;
			$dashboard[$area_id][$count[$area_id]]['name'] = $menu['Menu']['name'];
			$dashboard[$area_id][$count[$area_id]]['url'] = $menu['Menu']['url'];
		}

		$this->set(compact('dashboard'));
		$this->set('areas', $areasById);
				    
		$maxMenus = 0;

		foreach($count as $c)
		{
			if($maxMenus < $c)
			{
				$maxMenus = $c;
			}
		}

		$this->set('maxMenus', $maxMenus);
	}

	function principal(){
		$this->loadModel('Event');
		$this->loadModel('Schedule');
		
		$event = $this->Event->find('first', array('conditions' => array('Event.id' => 1)));
		
		$this->set('event',$event);
		$schedules = $this->Schedule->find('all');
		$schedule = array();

		foreach($schedules as $s){
			$date_start = $s['Schedule']['start_date'];
			$date_end = $s['Schedule']['end_date'];
			$date_s = explode(" ",$date_start);
			$date_e = explode(" ",$date_end);
			for($date = $date_s[0]; $date<=$date_e[0]; $date++){
				$schedule[$date][] = $s['Activity'];				
			}
		}
				
		$this->set('schedules',$schedule);
		
		
		
		
		
		
		
		/*
$url = "http://search.twitter.com/search.json?q=%23eventCongressSystem";
			

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,
		$url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$contents = curl_exec ($ch);
		curl_close ($ch);
*/

		$contents = '{"results":[{"from_user_id_str":"651757","profile_image_url":"/webroot/proy/43691213-e948-4c1d-9009-181f894747ae_normal.png","created_at":"Wed, 10 Nov 2010 23:05:50 +0000","from_user":"edboy","id_str":"2497187313360896","metadata":{"result_type":"recent"},"to_user_id":null,"text":"RT @MarciandreA: Uno, dos, tres, probando, probando! #eventCongressSystem","id":2497187313360896,"from_user_id":651757,"geo":null,"iso_language_code":"pt","to_user_id_str":null,"source":"&lt;a href=&quot;http://twitter.com&quot; rel=&quot;nofollow&quot;&gt;Tweetie for Mac&lt;/a&gt;"},{"from_user_id_str":"86570907","profile_image_url":"/webroot/proy/image_normal.jpg","created_at":"Wed, 10 Nov 2010 23:05:46 +0000","from_user":"matoxk","id_str":"2497171467272192","metadata":{"result_type":"recent"},"to_user_id":null,"text":"Asi es #eventCongressSystem","id":2497171467272192,"from_user_id":86570907,"geo":null,"iso_language_code":"en","to_user_id_str":null,"source":"&lt;a href=&quot;http://twitter.com/&quot; rel=&quot;nofollow&quot;&gt;Twitter for iPhone&lt;/a&gt;"},{"from_user_id_str":"11402125","profile_image_url":"/webroot/proy/8e1bb453-cb76-447f-951f-17deee057677_normal.png","created_at":"Wed, 10 Nov 2010 23:05:05 +0000","from_user":"featilluminati","id_str":"2496997525291008","metadata":{"result_type":"recent"},"to_user_id":886468,"text":"@perrohunter #eventCongressSystem que es?","id":2496997525291008,"from_user_id":11402125,"to_user":"perrohunter","geo":null,"iso_language_code":"en","to_user_id_str":"886468","source":"&lt;a href=&quot;http://mobileways.de/gravity&quot; rel=&quot;nofollow&quot;&gt;Gravity&lt;/a&gt;"},{"from_user_id_str":"161730942","profile_image_url":"/webroot/proy/Alt_normal.jpg","created_at":"Wed, 10 Nov 2010 23:03:58 +0000","from_user":"417g33k","id_str":"2496719438745600","metadata":{"result_type":"recent"},"to_user_id":null,"text":"#eventCongressSystem Mensaje recibido.","id":2496719438745600,"from_user_id":161730942,"geo":null,"iso_language_code":"pt","to_user_id_str":null,"source":"&lt;a href=&quot;http://twitter.com/&quot;&gt;web&lt;/a&gt;"},{"from_user_id_str":"47711549","profile_image_url":"/webroot/proy/2010-10-07-59693_normal.jpg","created_at":"Wed, 10 Nov 2010 23:03:39 +0000","from_user":"roxsan33","id_str":"2496637725315072","metadata":{"result_type":"recent"},"to_user_id":null,"text":"Algo #eventCongressSystem cc. @perrohunter","id":2496637725315072,"from_user_id":47711549,"geo":null,"iso_language_code":"en","to_user_id_str":null,"source":"&lt;a href=&quot;http://blackberry.com/twitter&quot; rel=&quot;nofollow&quot;&gt;Twitter for BlackBerry\u00ae&lt;/a&gt;"},{"from_user_id_str":"12295316","profile_image_url":"/webroot/proy/image_normalMarols.jpg","created_at":"Wed, 10 Nov 2010 23:02:41 +0000","from_user":"MarciandreA","id_str":"2496396108242944","metadata":{"result_type":"recent"},"to_user_id":null,"text":"Uno, dos, tres, probando, probando! #eventCongressSystem","id":2496396108242944,"from_user_id":12295316,"geo":null,"iso_language_code":"pt","to_user_id_str":null,"source":"&lt;a href=&quot;http://twitter.com&quot; rel=&quot;nofollow&quot;&gt;Tweetie for Mac&lt;/a&gt;"},{"from_user_id_str":"18027041","profile_image_url":"/webroot/proy/colors_normal.JPG","created_at":"Wed, 10 Nov 2010 23:01:41 +0000","from_user":"OctavioRafael","id_str":"2496143141376001","metadata":{"result_type":"recent"},"to_user_id":null,"text":"probando el #eventCongressSystem","id":2496143141376001,"from_user_id":18027041,"geo":null,"iso_language_code":"en","to_user_id_str":null,"source":"&lt;a href=&quot;http://twitter.com/&quot;&gt;web&lt;/a&gt;"},{"from_user_id_str":"886468","profile_image_url":"/webroot/proy/avatarNaturalBase_normal.jpg","created_at":"Wed, 10 Nov 2010 23:01:14 +0000","from_user":"perrohunter","id_str":"2496028024504320","metadata":{"result_type":"recent"},"to_user_id":null,"text":"Podrian twittear algo con el hash  #eventCongressSystem ? es para una prueba :) gracias","id":2496028024504320,"from_user_id":886468,"geo":null,"iso_language_code":"es","to_user_id_str":null,"source":"&lt;a href=&quot;http://twitter.com&quot; rel=&quot;nofollow&quot;&gt;Tweetie for Mac&lt;/a&gt;"}],"max_id":2497187313360896,"since_id":0,"refresh_url":"?since_id=2497187313360896&q=%23eventCongressSystem","results_per_page":15,"page":1,"completed_in":0.027965,"since_id_str":"0","max_id_str":"2497187313360896","query":"%23eventCongressSystem"}';
		//echo $contents;

		$arr = json_decode($contents,1);
		
		
		//print_r($arr);
		
		$res = array();
		$i = 0;
		
		foreach($arr['results'] AS $tweet)
		{
			$res[$i]['img'] = $tweet['profile_image_url'];
			$res[$i]['usr'] = $tweet['from_user'];
			$res[$i]['tweet'] = $tweet['text'];
			$i++;
				
		}
		
		$reverse = array();
		$j = 0;
		for($i;$i>0;$i--)
		{
			$reverse[$j] = $res[$i-1];
			$j++;
		}
		
		$json = json_encode($reverse);
		
		
		$this->set('tweets',$json);
		
		
		
		
		
		
	}
}

?>
