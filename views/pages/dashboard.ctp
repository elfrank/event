<div id="authake">

<div class="actions menuheader">
    <ul>
        <li class="icon door_in"><?php echo $html->link(__('Logout', true), array('controller'=> 'user', 'action'=>'logout')); ?></li>
    </ul>
</div>

<h2><?php __('Dashboard'); ?></h2>

<?php

$max_col=3;
$col = 1;

foreach($dashboard as $key => $val) 
{

  if($col == 1)
  {
    $class = 'dash_area_left';
  }
  else
  {
    $class = 'dash_area_right';
  }

  if($col<=$max_col)
  {
    $col++;	
  }
  else
  {
    $col=1;
  }  
 ?>
	<div class="<?php echo $class; ?>">
		<div class="dash_inner_area">
		    <?php
				echo '<span class="dash_title">'.$areas[$key]['name'].'</span>';
				echo '<br />';
				echo '<span class="dash_description">'.$areas[$key]['description'].'</span>';
				
				$menus = 0;

				echo '<ul>';
				foreach($val as $item)
				{
					$menus++;
					echo '<li class="icon play dash_bullet"><span class="dash_menu_item">'.$html->link($item['name'], "/admin/".$item['url']).'</span></li>';
				}
				
				while($menus < $maxMenus)
				{
					$menus++;
					echo '<li class="dash_bullet">&nbsp;</li>';
				}

				echo '</ul>';
			?>
		</div>
	</div>
<?php
}
?>