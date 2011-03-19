<div id="authake">
<div class="schedules index">

<div class="actions menuheader">
    <ul>
        <li class="icon menu"><?php echo $html->link(__('Return To Schedules', true), array('action'=>'index'));?></li>
    </ul>
</div>

<h2><?php __('Keynotes'); ?></h2>

<table>
<?php
foreach($activities as $activity) {
	echo "<tr>";
	echo "<td>".$activity['Activity']['short_name']."</td>";
	echo "<td>".fdate($activity['Schedule']['start_date'])."</td>";
	echo "<td>".fdate($activity['Schedule']['end_date'])."</td>";
	echo "<td>".$activity['Place']['name']."</td>";
	echo "</tr>";
}
?>
</table>
</div>
</div>