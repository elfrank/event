<div id="authake">
	<h2><?php __('Schedule');?></h2> 
		
	<div class="actions">
		<ul>
			<li class="icon schedule">
				<a id="anterior">Anterior</a>
			</li>
			<li class="icon schedule">
				<a id="siguiente">Siguiente</a>
			</li>
		</ul>
	</div>
</div>
	
	<div id="calendar_container">
		<div id="calendar_overload" class="calendar_overload">
	<?php 	
		foreach($activities as $day => $activities)
		{
	?>
			<div class="calendar_day">
					<h1><?php echo($day); ?></h1>
				<table>
	
	<?php
					foreach($activities as $act)
					{
						echo '<tr><td>'.$act['time'].'</td><td>'.$html->link($act['short_name'], array('admin' => 0, 'controller' => 'activities', 'action' => 'view', $act['id'])).'</td></tr>';
					}
	?>				
				</table>
			</div>
	<?php		
		}
	?>
		</div>
		<div class="clearer"></div>
	</div>


<script>
	
	
	var smoothSchedule = {
		currentPage: 0,
		stepSize: 0,
		analize: function(){
			var dimensiones = $('calendar_container').getSize();
			
			this.stepSize = dimensiones.x;
			
			var contenedor = dimensiones.x/2 - 2;
			
			
			var totalLoader = $$('.calendar_day').length * contenedor + contenedor;
			this.totalPaginas = Math.floor($$('.calendar_day').length/2);
			
			if($$('.calendar_day').length % 2 != 0)
			{
				this.totalPaginas+1;
			}
			
			$$('.calendar_overload').setStyle('width',totalLoader);
			
			$$('.calendar_day').setStyle('width',contenedor);
			
		},
		next:function()
		{
			if(this.currentPage +1 < this.totalPaginas)
			{
				this.currentPage++;
				var scrollTo =  this.stepSize;
				var myFx = new Fx.Scroll('calendar_container', {
						offset: {
							'x': scrollTo, 
							'y': 0     
							} 
						}).start();
			}
		},
		back:function()
		{
			if(this.currentPage - 1 >= 0)
			{
				this.currentPage--;
				var scrollTo = -1 * this.stepSize;
				var myFx = new Fx.Scroll('calendar_container', {
						offset: {
							'x': scrollTo, 
							'y': 0     
							} 
						}).start();
			}
		}

	}
	smoothSchedule.analize();
	var timer = null;
	window.addEvent('resize', function(){
	  $clear(timer);
	  timer = (function(){
	    smoothSchedule.analize();
	  }).delay(50);
	});
	
	
	$('siguiente').addEvent('click',function(e){
		
		smoothSchedule.next();
		
	});
	
	$('anterior').addEvent('click',function(e){
		
		smoothSchedule.back();
		
	});
	
	
	
</script>