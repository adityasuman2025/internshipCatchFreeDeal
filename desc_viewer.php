<?php
	//page for viewing description of the deal
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
		$content_deal_id = $_GET['content_deal_id'];
		
		if(isset($content_deal_id))
		{

		}
		else
		{
			die('You are trying to refresh the page. Radius session not allowed.');
		}

	//for loading content of that particular deal
		$desc_viewer_query="SELECT * FROM content_deal WHERE id = '$content_deal_id'";
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
			$desc_content_deal = $desc_viewer_query_data['deal'];

			$desc_content_note = $desc_viewer_query_data['note'];
			$desc_content_likes = $desc_viewer_query_data['likes'];
			
			$desc_content_time = $desc_viewer_query_data['time'];
			$desc_content_click = $desc_viewer_query_data['click'];

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


		//increasing no of clicks of the selcted deal whose desciption is currently opened
			$desc_content_click_new = $desc_content_click + 1;
			$deal_click_query = "UPDATE content_deal SET click = '$desc_content_click_new' WHERE id = '$content_deal_id'";
			$deal_click_query_run = mysqli_query($connect_link, $deal_click_query);
		}

	//if user has logged in then storing its viewed item in his account database
		if(!isset($_COOKIE['logged_user_cookie']))
		{}
		else
		{
			$logged_user_id = $_COOKIE['logged_user_cookie'];
			$content_deal_id = @$_GET['content_deal_id'];
			
		//getting_prev_viewed_id_of_user
			$getting_prev_viewed_id_of_user_query = "SELECT * FROM users WHERE id = '$logged_user_id'";

			if($getting_prev_viewed_id_of_user_query_run = @mysqli_query($connect_link, $getting_prev_viewed_id_of_user_query))
			{
				$getting_prev_viewed_id_of_user_result = @mysqli_fetch_assoc($getting_prev_viewed_id_of_user_query_run);
				
			//old viewed ids
				$view_1_prev = $getting_prev_viewed_id_of_user_result['view1'];
				$view_2_prev = $getting_prev_viewed_id_of_user_result['view2'];
				$view_3_prev = $getting_prev_viewed_id_of_user_result['view3'];
				$view_4_prev = $getting_prev_viewed_id_of_user_result['view4'];

			//updating_prev_viewed_id_of_user
				$updating_view1_query ="UPDATE users SET view1 = '$content_deal_id' WHERE id = '$logged_user_id'";
				$updating_view2_query ="UPDATE users SET view2 = '$view_1_prev' WHERE id = '$logged_user_id'";
				$updating_view3_query ="UPDATE users SET view3 = '$view_2_prev' WHERE id = '$logged_user_id'";
				$updating_view4_query ="UPDATE users SET view4 = '$view_3_prev' WHERE id = '$logged_user_id'";
				$updating_view5_query ="UPDATE users SET view5 = '$view_4_prev' WHERE id = '$logged_user_id'";

			//updating old views by new views
				$updating_view1_query_run = mysqli_query($connect_link, $updating_view1_query);
				$updating_view2_query_run = mysqli_query($connect_link, $updating_view2_query);
				$updating_view3_query_run = mysqli_query($connect_link, $updating_view3_query);
				$updating_view4_query_run = mysqli_query($connect_link, $updating_view4_query);
				$updating_view5_query_run = mysqli_query($connect_link, $updating_view5_query);
					
			}

		}
	?>

<div class="page_content">
<!-------description of the selected deal------>
	<div class="desc_viewer_div">
	<div class="row">
			<div class="col-xs-12 col-md-6 desc_info">
				<img class="desc_image" src="img/deal/<?php
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
							$cookie_name_incr = "like_incr_" . $content_deal_id;
							$cookie_name_decr = "like_decr_" . $content_deal_id;

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


				<?php
				 echo @$desc_content_desc;
				?>

				<div class="desc_note">
					<?php
						echo $desc_content_note;
					?>
				</div>
				<br>

				<div class="desc_price">
					&#8377 <?php
						echo @$desc_content_price;
					?>
				</div>

				<div class="desc_org_price">
					&#8377 <?php
						echo @$desc_content_org_price;
					?>					
				</div>

				<div class="desc_off">
					 <?php
						echo @$desc_content_off;
					?>
				</div>
				<br>

				<div class="desc_deal">
					<a target="_blank" href="<?php
						echo @$desc_content_deal;
					?>">Buy Now</a>
				</div>

			</div>
		</div>
	</div>
	<br>

<!--------suggestion of the deal of the same provider------>
	<div class="sugg_from_provider_div">
		<h4 class="content_deal_h4">
			More from 
			<?php 
				echo @$desc_content_provider;
			?>
		</h4>

		<span class="desc_id">
			<?php
				echo $content_deal_id;
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
	var desc_provider = $.trim($('.desc_provider').text());
	var desc_id = $.trim($('.desc_id').text());

	query_to_send = "SELECT * FROM content_deal WHERE provider = '" + desc_provider + "' AND id != "+ desc_id + " ORDER BY click LIMIT 10";

	$.post('php/deal_viewer.php', {query_to_send: query_to_send}, function(e)
	{
		$('.sugg_from_provider').html(e);

	/*----if there is no deal from same provider----*/
		suggested_deals_no = $('.sugg_from_provider .content_div').length;
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
			like_incr_query = "UPDATE content_deal SET likes = " + new_desc_likes + " WHERE id = "+ desc_id;
			
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
			like_decr_query = "UPDATE content_deal SET likes = " + new_desc_likes + " WHERE id = "+ desc_id;
			
			$.post('php/like_decr.php', {desc_likes: desc_likes, desc_id: desc_id, like_decr_query: like_decr_query}, function(e)
			{
				$('.like_click span').text(e);

				like_text = $('.like_text').text('u');
				$('.like_click img').attr('src', 'img/like1.png');
			});
		}

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