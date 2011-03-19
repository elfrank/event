<table>
<tr><td><?php echo $html->link(__('Go To My Calendar', true), array('controller' => 'schedules', 'action' => 'mycalendar'))."."; ?></td></tr>
<tr><td><?php echo $html->link(__('Return To Suscribe Workshops from 18/03/2010', true), array('controller' => 'schedules', 'action' => 'workshops','2010-03-18'))."."; ?></td></tr>
<tr><td><?php echo $html->link(__('Return To Suscribe Workshops from 19/03/2010', true), array('controller' => 'schedules', 'action' => 'workshops','2010-03-19'))."."; ?></td></tr>
<tr><td><?php echo $html->link(__('Return To Suscribe Keynotes', true), array('controller' => 'schedules', 'action' => 'keynotes'))."."; ?></td></tr>
</table>