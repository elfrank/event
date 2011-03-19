<div id="authake">
<div class="schedules index">

<div class="actions menuheader">
    <ul>
        <li class="icon menu"><?php echo $html->link(__('Return To Schedules', true), array('action'=>'index'));?></li>
    </ul>
</div>

<h2><?php __('Keynotes'); ?></h2>

<?php echo($form->create('Schedule', array('action' => 'suscribe')));?> 
<?php echo $form->input('type', array('type'=>'hidden', 'value' => 'keynote', 'name' => 'data[type]')); ?>

<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th></th>
	<th><?php echo __('Activity', true);?></th>
	<th><?php echo __('Start Date', true);?></th>
	<th><?php echo __('End Date', true);?></th>
	<th></th>
</tr>

<?php

$j = 0;
for($i = 0; $i < count($keynotes); $i++) {
$class = '';
	if ($j++ % 2 == 0) {
		$class = 'altrow';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php 
				echo $form->input('schedule_id', array('type' => 'checkbox', 'value' => $keynotes[$i]['Schedule']['id'],'label'=>'', 'checked'=>'checked', 'name' => "data[Schedule][$i][schedule_id]"));
			?>
		</td>
		<td>
			<?php echo $html->link(__($keynotes[$i]['Activity']['short_name'], true), array('controller' => 'activities', 'action' => 'view', $keynotes[$i]['Activity']['id'])); ?>
		</td>
		<td>
			<?php echo fdate($keynotes[$i]['Schedule']['start_date']); ?>
		</td>
		<td>
			<?php echo fdate($keynotes[$i]['Schedule']['end_date']); ?>
		</td>
</tr>
<?php } ?>
</table>
<?php echo $form->submit('Save'); ?>
<?php echo($form->end()); ?>


</div>
</div>
