<?php
	// A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)
		include ('php/connect_db.php');
	/*-header bar---*/
		include('php/header.php');
?>
<html>
<head>
	<title>Catchfreedeal</title>
	<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
	<style type="text/css">
		body,html
		{
			background-color: #f1f1f1;
		}
	</style>

	<!------meta--tags-->
	<meta name="viewport" content ="width= device-width, initial-scale= 1">
</head>
<body>

<div class="head_content">
<!----image--slider------>
	<div class="image_slider">
		<?php
			include('php/image_slider.php');
		?>
	</div>
	<div class="catog_pc_div">
		<h4>Catogories</h4>
		<form action="deal.php" method="get" class="catog_pc">
				<?php
					$sub_menu_query= "SELECT sub_menu FROM catog_menu";

					if($sub_menu_assoc_run = mysqli_query($connect_link , $sub_menu_query))
					{
						//getting sub menu
						while($submenu_array = mysqli_fetch_assoc($sub_menu_assoc_run))
						{
							$sub_menu_result = $submenu_array['sub_menu'];
							echo "<input type=\"submit\"  value= \"" .$sub_menu_result."\" name=\"deal_catog\" class=\"catog_menu_a\"><br>";
						}
					}
				?>
		</form>
	</div>

</div>
<br>

<!-----user views div-------->
	<div class="viewed_deal_div">
		<?php
			if(!isset($_COOKIE['logged_user_cookie']))
			{
				echo 'You have no recent views';	
			}
			else
			{
				echo "<h4>Your Last Views</h4>";
				include ('php/prev_views.php');
			}
		?>
	</div>


<!----Trending deals------>
	<h4 class="content_deal_h4">Trending Deals</h4>
	<div class="trending_deals"></div>
	
<!----under 99 deals------>
	<h4 class="content_deal_h4">Under &#8377 99 Deals</h4>
	<div class="below_nn"></div>
	
<!----discount of 50% deals------>
	<h4 class="content_deal_h4">Deals with more than 50% off</h4>
	<div class="greater_fifty_per"></div>
	
<!-----content-deal---->
	<h4 class="content_deal_h4">Deals</h4>
	<?php
		include('php/content_deal.php');
	?>
<br><br>


<!----footer------>
	<?php
		include('php/footer.php');
	?>

<!---scripts-------->
	<script type="text/javascript">
	/*--rending deals---*/
		var query_to_send = "SELECT * FROM content_deal ORDER BY click DESC LIMIT 5";
		$.post('php/deal_viewer.php', {query_to_send: query_to_send}, function(e)
		{
			$('.trending_deals').html(e);
		});

	/*--deals with price less than 99---*/
		var query_to_send = "SELECT * FROM content_deal WHERE price <= 99";
		$.post('php/deal_viewer.php', {query_to_send: query_to_send}, function(e)
		{
			$('.below_nn').html(e);
		});

	/*--deals with off greater than 50%---*/
		var query_to_send = "SELECT * FROM content_deal WHERE off >= 50";
		$.post('php/deal_viewer.php', {query_to_send: query_to_send}, function(e)
		{
			$('.greater_fifty_per').html(e);
		});


	</script>
	
</body>
</html>