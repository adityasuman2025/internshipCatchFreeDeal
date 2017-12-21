<?php
	//page for viewing description of the service
	include('php/connect_db.php');

	//including header bar
	include('php/header.php');

?>
<html>
<!--- A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)-->
<head>
	<style type="text/css">
		body,html
		{
			background-color: #f1f1f1;
		}
	</style>
</head>
<body>
	<?php
		$content_service_id = $_GET['content_service_id'];
		
		if(isset($content_service_id))
		{

		}
		else
		{
			die('You are trying to refresh the page. Radius session not allowed.');
		}

	//for loading content of that particular deal
		$desc_viewer_query="SELECT * FROM content_service WHERE id = '$content_service_id'";
		$desc_viewer_query_run = @mysqli_query($connect_link, $desc_viewer_query);

		while($desc_viewer_query_data = @mysqli_fetch_assoc($desc_viewer_query_run))
		{
			$desc_content_id = $desc_viewer_query_data['id'];
			
			$desc_content_image = $desc_viewer_query_data['image'];
			$desc_content_provider = $desc_viewer_query_data['provider'];
			$desc_content_name = $desc_viewer_query_data['name'];
			$desc_content_desc = $desc_viewer_query_data['description'];
			$desc_content_org_price = $desc_viewer_query_data['org_price'];
			$desc_content_off = $desc_viewer_query_data['off'];
			$desc_content_price = $desc_viewer_query_data['price'];
			$desc_content_link= $desc_viewer_query_data['link'];
			$desc_content_address= $desc_viewer_query_data['address'];
			$desc_content_mob= $desc_viewer_query_data['mob'];

			$desc_content_location = $desc_viewer_query_data['location'];
			$desc_content_likes = $desc_viewer_query_data['likes'];
			$desc_content_service_code = $desc_viewer_query_data['service_code'];

			$desc_content_time = $desc_viewer_query_data['time'];	

		//for getting time passed since post
			$content_timestamps = strtotime($desc_content_time);
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

		}
	?>

<div class="page_content">
<!-------description of the selected deal------>
	<div class="desc_viewer_div">
		<div class="row">
			<div class="col-xs-12 col-md-6 desc_info">
				<img class="desc_image" src="img/service/<?php
				 echo @$desc_content_image;
				?>" onerror="this.onerror=null;this.src='img/logo.jpg';"/>
				<br>

				<div class="desc_likes">
					<div class="desc_time_spent">
						<?php
							echo @$time_in_mnths . @$time_in_days . @$time_in_hrs . @$time_in_mins; 
						?>
						 ago
					</div>

					<div class="like_click">
						<?php 
							$cookie_name_incr = "like_incr_" . $content_service_id;
							$cookie_name_decr = "like_decr_" . $content_service_id;

							if(isset($_COOKIE[$cookie_name_incr]))
							{
								echo "<img src=\"img/like_png.png\">";
								echo "<div class=\"like_text\">l</div>";
							}
							else
							{
								echo "<img src=\"img/like1.png\">";
								echo "<div class=\"like_text\">u</div>";
							}
						?>
						<span>
							<?php
								echo $desc_content_likes;
							?>
						</span>
					</div>
				</div>

			</div>

			<div class="col-xs-12 col-md-6 desc_desc">
				<div class="desc_name">
					<?php
						 echo @$desc_content_name;
					?>
				</div>

				<div class="desc_provider">
					<?php
						echo @$desc_content_provider;
					?>
				</div>

				<span class="desc_location">
					<?php
						echo $desc_content_location
					?>
				</span>
				<br>

				<?php
				 echo @$desc_content_desc;
				?>	
				<br>

				<div class="desc_price">
					<?php
						if($desc_content_price !='')
						{
							echo "&#8377 " . $desc_content_price;
						}
						
					?>
				</div>

				<div class="desc_org_price">
					<?php
						if($desc_content_org_price !='')
						{
							echo "&#8377 " . $desc_content_org_price;
						}
						
					?>				
				</div>

				<div class="desc_off">
					<?php
						if($desc_content_off != '')
						{
							echo $desc_content_off;
						}
						
					?>		
				</div>
				<br>
			
				<div class="desc_service_code_button">
					click here to get your benefits
					<br><br>
					
					<a>Catch Service</a>
				</div>
				<br>

				<div class="desc_service_code_area">
					<?php
					//secret code
						if($desc_content_service_code == '')
						{

						}
						else
						{
							echo "<span class=\"desc_service_code_feed\">
								Use this code for getting your benefits at the service store.
							</span>";
							echo "<br><br><span class=\"desc_service_code\">$desc_content_service_code</span><br><br>";
						}
					?>

					<?php
					//secret link
						if($desc_content_link == '')
						{

						}
						else
						{
							echo "<a target=\"_blank\" class=\"desc_service_link\" href=\"$desc_content_link \">Visit Site</a><br>";
						}
					?>

					<?php
					//secret address
						if($desc_content_address == '')
						{

						}
						else
						{
							echo "<span class=\"desc_service_address\">$desc_content_address</span><br>";
						}
					?>

					<?php
					//secret mob
						if($desc_content_mob == '')
						{

						}
						else
						{
							echo "<span class=\"desc_service_mob\">$desc_content_mob</span><br>";
						}
					?>
					
				</div>
				
			</div>
		</div>
	</div>
	<br>

<!--------suggestion of the deal of the same location------>
	<div class="sugg_from_provider_div">
		<h4 class="content_deal_h4">
			More Services at 
			<?php 
				echo @$desc_content_location;
			?>
		</h4>

		<span class="desc_id">
			<?php
				echo $content_service_id;
			?>	
		</span>

		<div class="sugg_from_provider">
		</div>
	</div>

<!----footer------>
	<br><br>
	<?php
		include('php/footer.php');
	?>
</div>

	<script type="text/javascript">
	/*----script for getting suggestion of the same provider----*/
		desc_location = "<?php echo $desc_content_location ?>";
		desc_id = "<?php echo $content_service_id ?>";

		query_to_send = "SELECT * FROM content_service WHERE location = '" + desc_location + "' AND id != "+ desc_id + " ORDER BY id DESC LIMIT 10";

		$.post('php/service_viewer.php', {query_to_send: query_to_send}, function(e)
		{
			$('.sugg_from_provider').html(e);

		/*----if there is no deal from same provider----*/
			suggested_deals_no = $('.sugg_from_provider .content_service_div').length;
			

			if(suggested_deals_no ==0)
			{
				$('.content_deal_h4').fadeOut(0);
			}
			else
			{
				$('.content_deal_h4').fadeIn(0);
			}
		});
		
	/*-------on clicking heart -----*/
		$('.like_click img').click(function()
		{
			desc_likes = parseInt($.trim($('.like_click span').text()));
			desc_id = $.trim($('.desc_id').text());

			like_click_img_attr = $('.like_click img').attr('src');
			like_text = $.trim($('.like_text').text());
			//alert(like_text);
			
			if(like_text == 'u')
			{	
				var new_desc_likes = desc_likes +1;
				like_incr_query = "UPDATE content_service SET likes = " + new_desc_likes + " WHERE id = "+ desc_id;
				
				$.post('php/like_incr.php', {desc_likes: desc_likes, desc_id: desc_id, like_incr_query: like_incr_query}, function(e)
				{
					$('.like_click span').text(e);

					like_text = $('.like_text').text('l');
					$('.like_click img').attr('src', 'img/like_png.png');
				});
			}
			else if(like_text == 'l')
			{
				var new_desc_likes = desc_likes - 1;
				like_decr_query = "UPDATE content_service SET likes = " + new_desc_likes + " WHERE id = "+ desc_id;
				
				$.post('php/like_decr.php', {desc_likes: desc_likes, desc_id: desc_id, like_decr_query: like_decr_query}, function(e)
				{
					$('.like_click span').text(e);

					like_text = $('.like_text').text('u');
					$('.like_click img').attr('src', 'img/like1.png');
				});
			}

		});

	/*----on clicking on catch service button------*/
		$('.desc_service_code_button a').click(function()
		{
			service_id = desc_id;
			service_provider = "<?php echo $desc_content_provider ?>"
			$.post('php/show_service.php', {service_id: service_id, service_provider: service_provider}, function(n)
			{
				if(n == 1)
				{
					$('.desc_service_code_area').fadeIn(500);
					$('.desc_service_code_button').fadeOut(0);
				}
				else
				{
					$('.div_loader').fadeIn(500);
					$('.loader_bckgrnd').fadeIn(500);

				//loading pop up for informing to log in first
					$('.pop_back').fadeIn(500);
					$('.pop_div').fadeIn(500);
					$('.pop_div_content').text(n);
					
				}
			});
		});
	</script>

</body>

<head>
	<title>	
		<?php
			 echo @$desc_content_name;
		?> | Catchfreedeal
	</title>
	
</head>

</html>