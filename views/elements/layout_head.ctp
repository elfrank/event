<div id="header_title">
   <?php echo $html->link($html->image('../img/logos/logo.png'), '/', array('title' => __('View', true)), null, false); ?> 
</div>

<div class="menu">

<span class="login_info">
   <?php 
   if($authak3->isLogged()) {
   		e("Logged in as ".$html->link($authak3->getLogin(), array('admin' => 0, 'controller'=>'profile', 'action'=>'index'), array())." | ".$html->link("Logout", array('controller'=>'user', 'action'=>'logout'), array()));
   		
   } else {
   		e($html->link("Register", array('controller'=>'user', 'action'=>'register'), array())." | ".$html->link("Login", array('controller'=>'user', 'action'=>'login'), array()));
   }
   ?>
</span>

<?php 
e("<ul>");
	e('<li>'.$html->link("Home", "/")."</li>");
if ($authak3->isLogged()) {
	if($authak3->isMemberOf(1) || $authak3->isMemberOf(14)) {
		e('<li>'.$html->link("Dashboard", "/dashboard/")."</li>");
		e('<li>'.$html->link(__("Schedules", true), array('admin' => 0, 'controller'=> 'schedules', 'action' =>'calendar'))."</li>");
		e('<li>'.$html->link(__("Signup", true), array('controller' => 'signups', 'action' => 'index'))."</li>");
  	} else {
		e('<li>'.$html->link(__("Schedules", true), array('admin' => 0, 'controller'=> 'schedules', 'action' =>'calendar'))."</li>");
  		e('<li>'.$html->link(__("Signup", true), array('controller' => 'signups', 'action' => 'index'))."</li>");
  	}
} else {
  e('<li>'.$html->link(__("Schedules", true), array('admin' => 0, 'controller'=> 'schedules', 'action' =>'calendar'))."</li>");
}
e("<ul>");
?>

</div>