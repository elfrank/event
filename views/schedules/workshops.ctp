<div id="authake">
<div class="schedules index">

<div class="actions menuheader">
    <ul>
        <li class="icon menu"><?php echo $html->link(__('Return To Schedules', true), array('action'=>'index'));?></li>
    </ul>
</div>

<?php $day = $this->params['pass'][0]; ?>
<h2><?php __('Workshops '.$day); ?></h2>

<?php echo($form->create('Schedule', array('action' => 'suscribe')));?> 
<?php echo $form->input('old_schedule_id', array('type'=>'hidden', 'value' => $id)); ?>
<?php echo $form->input('day', array('type'=>'hidden', 'value' => $day)); ?>
<table class="listing" cellpadding="0" cellspacing="0">
<tr>
	<th></th>
	<th><?php echo __('Activity', true);?></th>
	<th><?php echo __('Start Date', true);?></th>
	<th><?php echo __('End Date', true);?></th>
	<th></th>
</tr>

<?php
$i = 0;
foreach($workshops as $w):
$class = '';
	if ($i++ % 2 == 0) {
		$class = 'altrow';
	}

?>
	<tr<?php echo $class;?>>
		<td>
			<?php 
				$attributes = array('value' => $w['Schedule']['id'], 'label' => false);
				echo $form->radio('schedule_id', array($w['Schedule']['id'] => ''), $attributes); 
				
			?>
		</td>
		<td>
			<?php echo $html->link(__($w['Activity']['short_name'], true), array('controller' => 'activities', 'action' => 'view', $w['Activity']['id'])); ?>
		</td>
		<td>
			<?php echo fdate($w['Schedule']['start_date']); ?>
		</td>
		<td>
			<?php echo fdate($w['Schedule']['end_date']); ?>
		</td>
</tr>
<?php endforeach; ?>
</table>
<?php echo $form->submit('Save'); ?>
<?php echo($form->end()); ?>


</div>
</div>
