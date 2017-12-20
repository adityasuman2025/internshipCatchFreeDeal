	<h4 class="content_deal_h4">Deals</h4>
	<br>
	<?php
	//content of the deal content
		include('connect_db.php');

		$content_query= $_POST['content_query'];

		$content_query_run = mysqli_query($connect_link, $content_query);
	
		while($content_query_data = mysqli_fetch_assoc($content_query_run))
		{
			$content_id = $content_query_data['id'];
			
			$content_image = $content_query_data['image'];
			$content_provider = $content_query_data['provider'];
			$content_name = $content_query_data['name'];
			$content_org_price = $content_query_data['org_price'];
			$content_off = $content_query_data['off'];
			$content_price = $content_query_data['price'];
			$content_deal = $content_query_data['deal'];
			$content_note = $content_query_data['note'];
			$content_likes = $content_query_data['likes'];
			
			$content_time = $content_query_data['time'];

		//for getting time passed since post
			$content_timestamps = strtotime($content_time);
			$current_time = time();
			$time_spent = $current_time - $content_timestamps;

			$time_in_mins = round($time_spent/60) . " mins";

			$time_in_hrs= "";
			$time_in_days= "";
			$time_in_mnths = "";

			if($time_in_mins>=60)
			{
				$time_in_hrs = round($time_in_mins/60) . " hrs";
				$time_in_mins = "";

				if($time_in_hrs >= 24)
				{
					$time_in_days = round($time_in_hrs/24) . " days";
					$time_in_hrs =  "";
					$time_in_mins = "";

					if($time_in_days>=30)
					{
						$time_in_mnths =  round($time_in_days/30) . " months";
						$time_in_days = "";
						$time_in_hrs =  "";
						$time_in_mins = "";

					}
				}
			}
		//for getting time passed since post

			echo "<div class=\"content_div\">
					<form action=\"desc_viewer.php\" method=\"get\">
						<button name=\"content_deal_id\" value=\"$content_id\" class=\"content_info_button\">
							<div class=\"content_image\">
								<img src=\"img/deal/$content_image \" onerror=\"this.onerror=null;this.src='img/logo.jpg';\"/>
							</div>
							<span id=\"content_provider\">
								$content_provider
							</span>
							
							<div id=\"content_name\">
								$content_name
							</div>

							<div id=\"content_note\">
								$content_note
							</div>

							<div class=\"content_like_time\">

								<div class=\"content_time\">
									$time_in_mnths $time_in_days $time_in_hrs $time_in_mins ago
								</div>

								<div class=\"content_like\">
									$content_likes
									<img src=\"img/like1.png\"/>
								</div>
								
							</div>

							<div class=\"content_price_div\">
								<span id=\"content_price\">
									&#8377 $content_price
								</span>

								<span id=\"content_org_price\">
									&#8377 $content_org_price
								</span>
								
								<span id=\"content_off\">
									$content_off
								</span>
							</div>
						</button>
					</form>
					
					<div id=\"content_deal\">
						<a target=\"_blank\" href=\"$content_deal\">
							Catch Deal
						</a>
					</div>
				  </div>";

		}
	?>
