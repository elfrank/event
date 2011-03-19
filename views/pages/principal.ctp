<div id="authake">

<div class="main_left">
  <div class="front_container">
    <div id="event_signup">
      <h2><?php e($event['Event']['short_name']);?></h2>
      <h4><?php e($event['Event']['slogan']);?></h4>
      <br />	
      <p class="date_from">
	from <?PHP e(date('F d', strtotime($event['Event']['start_date']))."</p>  <p class='date_to'> to ".date('F d', strtotime($event['Event']['end_date'])));?>
      </p>
      <div class="principal_separator"></div>
      <br /><br />
      <span id="event_description"><?php e($event['Event']['description']); ?></span>
    </div>
  </div>
  
  <div class="front_container">
    <div id="event_signup">
      <span class="prev_packages">Sign up for one of our </span><span class="packages"><?php e(count($event['Package']));?> Packages!</span>
      <br /><br />
      <?php e($html->link(__('Sign up now!', true), array('controller'=> 'signups', 'action'=>'index')));?>
      <br /><br />
    </div>
  </div>

  <div class="clearer"></div>


  <div class="front_container">
	  <div id="event_signup" class="tweet_holder">
	    <h2>Who's coming?</h2>
	    <div id="tweets">
	    </div>
    </div>
  </div>
  

</div>




<div class="main_right">
<div >
    <div id="event_timeline">
      <h3>TIME LINE</h3>
      <?php
	 foreach($schedules as $date => $activity){
				e("<h4>".$date."</h4>");
				$act = 1;
				$max_act = 3;
				e("<ul>");
				foreach($activity as $a){
					if($act<=$max_act){
						e('<li class="icon play dash_bullet" style="font-size: small;"><span class="dash_menu_item">'.$a['short_name'].'</item></li>');
						$act++;
					}
					else{
//						e('<li class="more">'.$html->link('more ...',array('controller'=>'schedules','action'=>'index')).'</li>');										break;
					}
				}
				e("</ul>");
			}
		?>
	</div>
	</div>
</div>

<div class="clearer"></div>
</div>


<script>
	var tweets = <?=$tweets?>;
	
		function placeTweet()
		{
			var newTweet = tweets.pop();
			
			var placeThis = new Element('div',{
				'class':'thisTweete',
				'styles':{
					'height':'0px',
					'opacity':'0.0'
				}
			});
			
			var placeMe = new Element('div',{
				'class':'tweete'
			});
			
			placeMe.adopt(new Element('img',{
				'src':newTweet.img
			}));
			
			placeMe.adopt(new Element('span',{
				'html':'<a href="http://twitter.com/'+newTweet.usr+'">'+newTweet.usr+'</a><br>'+newTweet.tweet
			}));
			
			placeMe.adopt(new Element('div',{
				'class':'clearer'
			}));
			
			placeThis.inject($('tweets'),'top');
			
			var myFx = new Fx.Tween(placeThis,{
						'duration':500,
						'onComplete':function()
						{
							
							placeMe.inject(placeThis);
							var myFx2 = new Fx.Tween(placeThis,{
									'duration':500
							});	
							myFx2.start('opacity', '1.0');	
						}
				});
				myFx.start('height', '56');
			tweets.unshift(newTweet);
			//codigo para destruir exeso de tweets
			var total = 0;
			$$('#tweets .thisTweete').each(function(el){
				
				if(total >= 7)
				{
					el.destroy();
				}
				
				total++;
			});
			
			
		}
		if(tweets.length > 6)
		{
			for(var i=0;i<6;i++)
			{
				placeTweet();
			}
		}
		//placeTweet();
				
		setInterval("placeTweet()",2400)
	
</script>
