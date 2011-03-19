<?php
/* SVN FILE: $Id: routes.php 6311 2008-01-02 06:33:52Z phpnut $ */
/**
 * Short description for file.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.app.config
 * @since			CakePHP(tm) v 0.2.9
 * @version			$Revision: 6311 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2008-01-02 00:33:52 -0600 (Wed, 02 Jan 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.thtml)...
 */


	/* Optional Routes, but nice */
Router::connect('/paypal_ipn/process', array('plugin' => 'paypal_ipn', 'controller' => 'instant_payment_notifications', 'action' => 'process'));
Router::connect('/paypal_ipn/:action/*', array('admin' => 'true', 'plugin' => 'paypal_ipn', 'controller' => 'instant_payment_notifications', 'action' => 'index'));
	/* End Paypal IPN plugin */



  //	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/dashboard/', array('controller' => 'pages', 'action' => 'dashboard'));
	Router::connect('/users/', array('plugin' => 'authake', 'controller' => 'users', 'action' => 'index'));
	Router::connect('/groups/', array('plugin' => 'authake', 'controller' => 'groups', 'action' => 'index'));
	Router::connect('/rules/', array('plugin' => 'authake', 'controller' => 'rules', 'action' => 'index'));
	Router::connect('/user/logout/', array('plugin' => 'authake', 'controller' => 'user', 'action' => 'logout'));
	Router::connect('/user/login/', array('plugin' => 'authake', 'controller' => 'user', 'action' => 'login'));
	Router::connect('/user/register/', array('plugin' => 'authake', 'controller' => 'user', 'action' => 'register'));
	Router::connect('/profiles', array('plugin' => 'authake', 'controller' => 'profiles', 'action' => 'index'));
	Router::connect('/admin/users', array('plugin' => 'authake', 'controller' => 'users', 'action' => 'index'));
	Router::connect('/admin/users/add', array('plugin' => 'authake', 'controller' => 'users', 'action' => 'add'));
	Router::connect('/admin/groups', array('plugin' => 'authake', 'controller' => 'groups', 'action' => 'index'));
	Router::connect('/admin/rules', array('plugin' => 'authake', 'controller' => 'rules', 'action' => 'index'));
	Router::connect('/admin/user', array('plugin' => 'authake', 'controller' => 'user', 'action' => 'index'));
	Router::connect('/admin/user/logout', array('plugin' => 'authake', 'controller' => 'user', 'action' => 'logout'));
	Router::connect('/admin/profiles', array('plugin' => 'authake', 'controller' => 'profiles', 'action' => 'index','admin'=>1));
	Router::connect('/profile', array('plugin' => 'authake', 'controller' => 'profile', 'action' => 'index'));
	Router::connect('/', array('controller' => 'pages', 'action' => 'principal'));
	

	
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
/* 	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display')); */
/**
 * Then we connect url '/test' to our test controller. This is helpfull in
 * developement.
 */
	Router::connect('/tests', array('controller' => 'tests', 'action' => 'index'));
?>
