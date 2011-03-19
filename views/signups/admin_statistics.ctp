<div id="authake">

<div class="actions menuheader">
    <ul> 
        <li class="icon signup"><?php echo $html->link(__('Manage signups', true), array('controller' => 'packages', 'action'=>'signups'));?></li>
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2><?php  __('Signups');?></h2>

<h4><?php __('Statistics');?></h4>

<br />

<div class="stat_area_left">
  <div class="stat_inner_area">
    <div class="stat_data">
      <?php echo '<span class="dash_title">'.__('Sold Tickets', true).'</span>'; ?>
      <dl>
	<dt>
	  <?php echo __('Total Current Signups', true).':'; ?> 
	</dt>
	<dd>
	  <?php echo $totalSignups; ?>
	</dd>
	<dt>
	  <?php echo __('Total Expected Signups', true).':'; ?>
	</dt>
	<dd>
	  <?php echo  $totalSlots; ?>
	</dd>
	<dt>
	  <?php echo __('Current % of sales', true).': '; ?>
	</dt>
	<dd>
	  <?php printf('%.2f', $totalSignups*100/$totalSlots); ?>
	</dd>
      </dl>
    </div>
    <img class="chart" src="<?php echo $graph1; ?>" />
  </div>
</div>

<div class="stat_area_right">
  <div class="stat_inner_area">
    <div class="stat_data">
      <?php echo '<span class="dash_title">'.__('Earnings', true).'</span>'; ?>
      <dl>
	<dt>
	  <?php echo __('Total Current Earnings', true).':'; ?> 
	</dt>
	<dd>
	  <?php echo '$'.$totalEarnings; ?>
	</dd>
	<dt>
	  <?php echo __('Total Applied Discounts', true).':'; ?> 
	</dt>
	<dd>
	  <?php echo '$'.$totalDiscounts; ?>
	</dd>
	<dt>
	  <?php echo __('Total Expected Earnings', true).':'; ?>
	</dt>
	<dd>
	  <?php echo  '$'.$totalExpectedEarnings; ?>
	</dd>
      </dl>
    </div>
    <img class="chart" src="<?php echo $graph2; ?>" />
  </div>
</div>

<div class="stat_area_complete">
  <div class="stat_inner_area">
    <div class="stat_data">
      <?php echo '<span class="dash_title">'.__('Signups per Package', true).'</span>'; ?>
      <dl>
	<dt>
	  <?php echo __('Total Number of Packages', true).':'; ?> 
	</dt>
	<dd>
	  <?php echo $numberOfPackages; ?>
	</dd>
	<dt>
	  <?php echo __('Number of Full Packages', true).':'; ?>
	</dt>
	<dd>
	  <?php echo $numberOfFullPackages; ?>
	</dd>
	<dt>
	  <?php echo __('Maximum % of Signups', true).':'; ?>
	</dt>
	<dd>
	  <?php 
	  	if(count($maxSignupsPackages['package_id']) > 1)
		{
			echo __('Several', true);
		}
		else if(count($maxSignupsPackages['package_id']) == 1 && $maxSignupsPackages['signups_percentage'] > 0.0)
		{
			echo $maxSignupsPackages['names'][0].'<br />('.$maxSignupsPackages['signups_percentage'][0].'%)';
		}
		else
		{
			echo __('None', true);
		}
	  ?>
	</dd>
	<dt>
	  <?php echo __('Minimum % of Signups', true).':'; ?>
	</dt>
	<dd>
	  <?php 
	  	if(count($minSignupsPackages['package_id']) > 1)
		{
			echo __('Several', true);
		}
		else if(count($minSignupsPackages['package_id']) == 1)
		{
			echo $minSignupsPackages['names'][0].'<br />('.$minSignupsPackages['signups_percentage'][0].'%)';
		}
		else
		{
			echo __('All', true);
		}
	  ?>
	</dd>
      </dl>
    </div>
    <img class="chart" src="<?php echo $chart3; ?>" />
  </div>
</div>

</div>