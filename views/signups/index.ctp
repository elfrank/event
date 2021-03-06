<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2><?php echo __('Signup', true); ?></h2>

<br />

<?php echo($html->tag('p', 'Choose the package you want to sign up for:')); ?>

<br />

<?php echo($form->create('Signup', array('action' => 'confirm')));?> 

<table class="listing" cellpadding="0" cellspacing="0">
      <tr>
		<th><?php echo __('Package', true); ?></th>
		<th><?php echo __('Price', true); ?></th>
		<th><?php echo __('Available', true); ?></th>
		<th><?php echo __('Sales End', true); ?></th>
		<th><?php echo __('Details', true); ?></th>
      </tr>

<?php
$i = 0;
      foreach($packages as $package)
      { 
	  	$class = null;
	   	if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
		$today = strtotime(date('Y-m-d G:i:s'));
		$salesEnd = strtotime($package['Package']['sales_end']);
?>	    
	    <tr<?php echo $class;?>>
		<td>
			<?php
				if($packageAvailability[$package['Package']['id']] == 1 && $today < $salesEnd)
				{
			?>
					<input type="hidden" name="data[Signup][user_id]" value="1" />

			<?php 
					echo($form->radio('package_id', array($package['Package']['id'] => $package['Package']['name']), 
													array('value' => $package['Package']['id'])));
				}
				else
				{
					echo($html->tag('label', $package['Package']['name']));
				}
			?>
		</td>
		<td>
			<?php echo('$'.$package['Package']['price']); ?>
		</td>
		<td>
			<?php 
			      if($packageAvailability[$package['Package']['id']] == 1 && $today < $salesEnd)
			      {
				echo('<img class="package_availability" src="'.$this->webroot.'img/icons/accept.png" />');						
			      }
			      else
			      {				
				echo('<img class="package_availability" src="'.$this->webroot.'img/icons/delete.png" />');
			      }
			 ?>
		</td>
		<td>
			<?php 
			      $closed = '';
			      			     
			      if($today > $salesEnd)
			      {
				$closed = '<span class="sales_closed">('.__('closed', true).')</span>';
			      }
			      else if($packageAvailability[$package['Package']['id']] == 0)
			      {
				$closed = '<span class="sales_closed">('.__('sold out', true).')</span>';
			      }

			      echo fdate($package['Package']['sales_end']).' '.$closed;
			?>
		</td>
		<td>
			<?php echo $html->link($html->image('../img/icons/information.png'), 
									array('admin' => 0, 'controller' => 'packages', 'action' => 'view', $package['Package']['id']), 
									array('title' => __('View', true)), null, false); ?> 

		</td>
		
		</tr>
<?php
      }
?>

</table>


<?php 
      echo('<div id="signup_button">'.$form->submit('Proceed').'</div>');
      echo('<span id="signup_discount_code">'.$form->input('discount_code_id').'</span>');
      echo($form->end()); 
?>

</div>