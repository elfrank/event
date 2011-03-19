<div id="authake">

<div class="actions menuheader">
    <ul>
	<li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2>Profile</h2>

<br />

<div class="profile_area">
     <div class="profile_inner_area">
     	  <span class="profile_area_title"><?php __('Personal Data'); ?></span>
	  <table id="profile_area_table">
		<tr>
			<td class="profile_area_concept"><?php echo __('Name', true).':'; ?></td>
			<td><?php echo $profile['Profile']['first_name'].' '.$profile['Profile']['last_name']; ?></td>
		</tr>
		<tr>
			<td class="profile_area_concept"><?php echo __('Display Name', true).':'; ?></td>
			<td><?php echo $profile['Profile']['display_name']; ?></td>
		</tr>
		<tr>
			<td class="profile_area_concept"><?php echo __('Birth Date', true).':'; ?></td>
			<td><?php echo fdate($profile['Profile']['birthdate']); ?></td>
		</tr>
		<tr>
			<td class="profile_area_concept"><?php echo __('Organization', true).':'; ?></td>
			<td><?php echo $organization['Organization']['name']; ?></td>
		</tr>
		<tr>
			<td class="profile_area_concept"><?php echo __('State', true).':'; ?></td>
			<td><?php echo $stateName; ?></td>
		</tr>
	  </table>
	  <br />
	  <div class="profile_area_links"><?php echo $html->link(__('Edit Profile', true), array('plugin' => 'authake', 'controller' => 'profile', 'action' => 'edit', $profile['Profile']['id'])); ?></div>
     </div>
</div>

<div class="profile_area">
     <div class="profile_inner_area">
     	  <span class="profile_area_title"><?php __('Account Data'); ?></span>
	  <table id="profile_area_table">
		<tr>
			<td class="profile_area_concept"><?php echo __('Username', true).':'; ?></td>
			<td><?php echo $profile['User']['login']; ?></td>
		</tr>
		<tr>
			<td class="profile_area_concept"><?php echo __('Email', true).':'; ?></td>
			<td><?php echo $profile['User']['email']; ?></td>
		</tr>
		<tr>
			<td class="profile_area_concept"><?php echo __('Member since', true).':'; ?></td>
			<td><?php echo fdate($profile['User']['created']); ?></td>
		</tr>
		<tr>
			<td class="profile_area_concept">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td class="profile_area_concept">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	  </table>
	  <br />
	  <div class="profile_area_links"><?php echo $html->link(__('Edit Account', true), array('plugin' => 'authake', 'controller' => 'user', 'action' => 'edit', $profile['Profile']['user_id'])); ?></div>
     </div>
</div>

<div class="profile_area">
      <div class="profile_inner_area">
     	  <span class="profile_area_title"><?php __('Team'); ?></span>
		  <table id="profile_area_table">
		<?php		
			if($team['Team']['name'] != '')
			{
		?>		  
				<tr>
					<td class="profile_area_concept"><?php echo __('You belong to team', true).':'; ?></td>
					<td><?php echo $team['Team']['name']; ?></td>
				</tr>
				<tr>
					<td class="profile_area_concept"><?php echo __('Your leader is', true).':'; ?></td>
					<td>
						<?php
							if($team['Team']['profile_id'] == $profile['Profile']['id'])
							{
								echo __('You', true);
							}
							else
							{
								echo $team['Profile']['first_name'].' '.$team['Profile']['last_name'];
							}						   
						?>
					</td>
				</tr>
				<tr>
					<td class="profile_area_concept">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="profile_area_concept">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="profile_area_concept">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>		  
		<?php
			}
			else
			{
		?>
				<tr>
					<td class="profile_area_concept"><?php echo __('You belong to no team', true); ?></td>
					<td><?php echo '&nbsp;'; ?></td>
				</tr>				
				<tr>
					<td class="profile_area_concept">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="profile_area_concept">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="profile_area_concept">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>		  
				<tr>
					<td class="profile_area_concept">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
		<?php
			}
		?>
	  </table>
	  <br />
	  <br />
     </div>
</div>

<div class="actions">
    <ul>
        <li class="icon ticket"><?php echo $html->link(__('Inbox', true), array('plugin' => 0, 'controller' => 'tickets', 'action'=>'index'));?></li>		
    </ul>
</div>
</div>