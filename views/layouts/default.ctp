<?php
/* SVN FILE: $Id: default.ctp 6296 2008-01-01 22:18:17Z phpnut $ */
/**
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
 * @subpackage		cake.cake.libs.view.templates.layouts
 * @since			CakePHP(tm) v 0.10.0.1076
 * @version			$Revision: 6296 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2008-01-01 16:18:17 -0600 (Tue, 01 Jan 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>
		<?php __('E-vent | '); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->charset();
		echo $html->meta('favicon.png','favicon.png',    array('type' => 'icon'));

        echo $html->css('cake.generic');
        echo $html->css('flashhelper');
        echo $html->css('authake');
        
        echo $javascript->link('mootools-1.2.4-core-yc');
        echo $javascript->link('mootools-1.2.4.2-more');

		echo $scripts_for_layout;
	?>
	
</head>
<body>
	<div id="container">
		<div id="header">
				
			<?php e($this->element('layout_head')); ?>
		</div>
		<div id="content">
			<?php
				if ($session->check('Message.flash')):
                    $session->flash();
				endif;
			?>

			<?php echo $content_for_layout; ?>

		</div>		
		<div id="footer">
			<br />
			<?php e($this->element('layout_footer')); ?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>
