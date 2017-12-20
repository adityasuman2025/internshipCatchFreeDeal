<?php
	session_start();
	include ('php/connect_db.php');
/*-header bar---*/
	include('php/header.php');
?>

<html>
<!--- A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)-->
<head>
	<title>Services | Catchfreedeal</title>
	<style type="text/css">
		body,html
		{
			background-color: #f1f1f1;
		}
	</style>
</head>
<body>

<div class="page_content">
	<div class="head_content">
	<!----image--slider------>
		<div class="catog_pc_div">
			<h4>Catogories</h4>
			<form action="service.php" method="get" class="catog_pc">
				<?php
					$sub_menu_query= "SELECT sub_menu FROM catog_service";

					if($sub_menu_assoc_run = mysqli_query($connect_link , $sub_menu_query))
					{
						//getting sub menu
						while($submenu_array = mysqli_fetch_assoc($sub_menu_assoc_run))
						{
							$sub_menu_result = $submenu_array['sub_menu'];
							echo "<input type=\"submit\"  value= \"" .$sub_menu_result."\" name=\"service_catog\" class=\"catog_menu_a\"><br>";
						}
					}
				?>
			</form>
		</div>
		
		<div class="image_slider">
			<?php
				include('php/image_slider.php');
			?>
		</div>
	</div>
	<br>

<!-----for setting any location---->
	<div class="set_location_div">
		<?php
			if(!isset($_SESSION["set_location_cookie"]))
			{
				include('php/get_location.php');
			}
		?>
	</div>

	<div class="service_location_div">
		<?php
			if (isset($_SESSION["set_location_cookie"])) {
				echo $_SESSION["set_location_cookie"];
			}
		?>
	</div>

<!------if choosed category or not---------->
	<?php
		if(isset($_GET['service_catog']))
		{
			echo "<h4 class=\"choosed_catog_h4\">Services > <span class=\"choosed_service_catog\">" . $_GET['service_catog'] . "</span> at <button class=\"choosed_service_location\">" . @$_SESSION["set_location_cookie"] . "</button></h4>";
			echo "<div class=\"choosed_deal\"></div>";
			$_SESSION['service_catog'] = $_GET['service_catog'];
		}
		else
		{
			echo "	<h4 class=\"content_deal_h4\">Services at <button class=\"choosed_service_location\">" . @$_SESSION["set_location_cookie"] . "</button></h4>
					<div class=\"content_service_page\"></div>
				  	<div class=\"load_more_deal\">load more...</div>";
		}
	?>


<!----footer------>
	<br><br>
	<?php
		include('php/footer.php');
	?>

	<div class="content_div_no"></div>
</div>

<script type="text/javascript">	
/*----on chossing any location--------*/
	$('.service_location').click(function()
	{	
		service_location = $(this).text();
		$('.service_location_div').html(service_location);

		$.post('php/set_location_cookie.php', {service_location: service_location}, function(e)
		{
			//alert(e);
		});	

		$('.set_location_div').fadeOut(500);
		location.reload();
	});

/*-----on clicking on choosed_service_location--------*/
	$('.choosed_service_location').click(function()
	{
		$.post('php/get_location.php', {}, function(e)
		{
			$('.set_location_div').html(e);
		/*----on chossing any location--------*/
			$('.service_location').click(function()
			{	
				service_location = $(this).text();
				$('.service_location_div').html(service_location);

				$.post('php/set_location_cookie.php', {service_location: service_location}, function(e)
				{
					//alert(e);
				});	

				$('.set_location_div').fadeOut(500);
				location.reload();
			});
		});
	});

/*----for showing result according to selected category--*/
	var service_catog = $.trim($('.choosed_service_catog').text());
	service_location = $.trim($('.service_location_div').text());

	query_to_send = "SELECT * FROM content_service WHERE location = '" + service_location + "' AND tag = '" + service_catog + "'";
	
	$.post('php/service_viewer.php', {query_to_send : query_to_send}, function(e)
	{
		$('.choosed_deal').html(e);

		/*----if there is no service of the tag----*/
		suggested_service_no = $('.choosed_deal .content_service_div').length;
		if(suggested_service_no ==0)
		{
			$('.choosed_deal').html('<br>sorry no services found').css('color', 'red');
		}
		
	});

/*----for getting total no of content div----*/
	content_query_div_no = "SELECT * FROM content_service WHERE location ='" + service_location + "'";
	$.post('php/content_service.php', {content_query: content_query_div_no}, function(e)
	{
		$('.content_div_no').html(e);
		content_div_no = $('.content_div_no .content_service_div').length;
		//alert(content_div_no);
		
	});

/*----for generatng load more for content deal----*/
	start =0;
	limit = 50;
	org_limit = 50;

	content_query = "SELECT * FROM content_service WHERE location ='" + service_location +"' ORDER BY id DESC LIMIT " + start + ", " + limit;

	$.post('php/content_service.php', {content_query: content_query}, function(e)
	{
		$('.content_service_page').html(e);

	//if results div is coming 0
		if(content_div_no == 0)
		{
			$('.content_service_page').html("<br>sorry no services found at the moment.").css('color', 'red');

		}
		
	//if initially total no of div is less than limit then load more is not visible
		if(content_div_no <= limit)
		{
			$('.load_more_deal').fadeOut(0);
		}
		else
		{
			$('.load_more_deal').fadeIn(0);
		}
	});


	$('.load_more_deal').click(function()
	{
		limit = limit + org_limit;
		content_query = "SELECT * FROM content_service WHERE location ='" + service_location +"' ORDER BY id DESC LIMIT " + start + ", " + limit;

		$.post('php/content_service.php', {content_query: content_query}, function(e)
		{
			$('.content_service_page').html(e);
			content_deal_page_no = $('.content_service_page .content_service_div').length;

			if(content_deal_page_no>=content_div_no)
			{
				$('.load_more_deal').fadeOut(0);
			}
		});

		if(content_deal_page_no>=content_div_no)
		{
			$('.load_more_deal').fadeOut(0);
		}

	});
	
</script>

</body>
</html>