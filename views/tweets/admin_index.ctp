<div id="authake">
<div class="twitters index">

<h2><?php __('Twitter accounts');?></h2>
<p>Activity from your event is going to be tweeted by these accounts.</p>

<div class="actions">
    <ul>
        <li class="icon add"><?php echo $html->link(__('Add account', true), array('admin'=>0,'action'=>'twitter')); ?></li>
    </ul>
</div>


<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo __('id');?></th>
	<th><?php echo __('username');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($twitteraccounts as $account):
	$class = '';
	if ($i++ % 2 == 0) {
		$class = 'altrow';
	}

?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $account['twitter_accounts']['id']; ?>
		</td>
		<td>
			<img src="<?php echo $account['twitter_accounts']['profile_pic']; ?>" style="height:16px;width:16px">
			<?php echo $account['twitter_accounts']['username']; ?>
		</td>
		
       	<td class="actions">
			<?php echo $htmlbis->iconlink('cross', __('Delete', true), array('action'=>'delete', $account['twitter_accounts']['id']), null, sprintf(__('Are you sure you want to delete activity "%s"?', true), $account['twitter_accounts']['username'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>



</div>