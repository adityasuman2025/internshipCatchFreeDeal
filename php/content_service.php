	<?php
	//content of the deal content
		include('connect_db.php');

		$content_query= $_POST['content_query'];

		$content_query_run = mysqli_query($connect_link, $content_query);
	
		while($content_query_data = mysqli_fetch_assoc($content_query_run))
		{
			$content_service_id = $content_query_data['id'];
			
			$content_service_image= $content_query_data['image'];
			$content_service_name = $content_query_data['name'];
			$content_service_provider = $content_query_data['provider'];
			$content_service_location = $content_query_data['location'];
			$content_service_price = $content_query_data['price'];
			$content_service_org_price = $content_query_data['org_price'];
			$content_service_off = $content_query_data['off'];
			$content_service_time = $content_query_data['time'];
			$content_service_likes = $content_query_data['likes'];

		//for getting time passed since post
			$content_timestamps = strtotime($content_service_time);
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

			echo "<div class=\"content_service_div\">
					<form action=\"service_desc_viewer.php\" method=\"get\">
						<button name=\"content_service_id\" value=\"$content_service_id\" class=\"content_service_info_button\">
							<div class=\"content_service_image\">
								<img src=\"img/service/$content_service_image \" onerror=\"this.onerror=null;this.src='img/logo.jpg';\"/>
							</div>
							<span id=\"content_service_provider\">
								$content_service_provider
							</span>
							
							<div id=\"content_service_name\">
								$content_service_name
							</div>
							
							<span id=\"content_service_location\">
								$content_service_location
							</span>

							<div class=\"content_service_like_time\">

								<div class=\"content_service_time\">
									$time_in_mnths $time_in_days $time_in_hrs $time_in_mins ago
								</div>

								<div class=\"content_service_like\">
									$content_service_likes
									<img src=\"img/like1.png\"/>
								</div>
								
							</div>

							<div class=\"content_service_price_div\">";

								if($content_service_price != '')
								{
									echo "<span id=\"content_service_price\"> 
										&#8377 $content_service_price
									</span>";
								}

								if($content_service_org_price != '')
								{
									echo "<span id=\"content_service_org_price\"> 
										&#8377 $content_service_org_price
									</span>";
								}
								
								if($content_service_off != '')
								{
									echo "<span id=\"content_service_off\"> 
										$content_service_off
									</span>";
								}	

							echo "</div>
						</button>
					</form>

					<form method=\"get\" target=\"_blank\" action=\"service_desc_viewer.php\">
						<button name =\"content_service_id\" id=\"catch_service\" value=\"$content_service_id\">
							Catch Service
						</button>
					</form>
				</div>";

		}
	?>
