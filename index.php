<?php
	include ('php/connect_db.php');
/*-header bar---*/
	include('php/header.php');
?>

<html>
<!--- A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)-->
<head>
	<title>Catchfreedeal</title>
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
			<form action="deal.php" method="get" class="catog_pc">
					<?php
						$sub_menu_query= "SELECT sub_menu FROM catog_deal";

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
		
		<div class="image_slider">
			<?php
				include('php/image_slider.php');
			?>
		</div>
	</div>
	<br>
	
<!------Deals tabs------>
	<?php
		if(isset($_GET['deals_tab']))
		{
			echo "<span class=\"selected_tab\">".$_GET['deals_tab']."</span>";
			echo "<div class=\"deal_tabs_div\">
					<h4 class=\"deal_tab_h4\"></h4>
					<br>

					<div class=\"deals_div\"></div>
				  </div>";
		}
	?>

<!-----content-deal---->
	<div class="content_deal_page"></div>
	<div class="load_more_deal">load more...</div>
	<br>

<!-----user views div-------->
	<div class="viewed_deal_div">
		<?php
			if(!isset($_COOKIE['logged_user_cookie']))
			{
				//echo 'You have no recent views';	
			}
			else
			{
				include ('php/prev_views.php');
			}
		?>
	</div>


<!----footer------>
	<br><br>
	<?php
		include('php/footer.php');
	?>

	<div class="content_div_no"></div>
</div>



<!------script------>
<script type="text/javascript">
/*----for deal tab-------*/
	selected_tab = $.trim($('.selected_tab').text());

	if(selected_tab == "trend")
	{
		//var query_to_send = "SELECT * FROM content_deal ORDER BY click DESC LIMIT 10";
		$.post('php/trending_deal_viewer.php', {}, function(e)
		{
			$('.deals_div').html(e);
			$('.deal_tab_h4').text('Trending Deals');

			deals_div_no = $('.deals_div .content_div').length;
			if(deals_div_no ==0)
			{
				$('.deals_div').html("sorry no such deals found at the moment <br><br>").css('color', 'red');
			}

		});

		$('.content_deal_page').fadeIn(0);
		$('.load_more_deal').fadeIn(0);
	}
	else if(selected_tab == "free")
	{
		var query_to_send = "SELECT * FROM content_deal WHERE price =0 ORDER BY id DESC LIMIT 30 ";
		$.post('php/deal_viewer.php', {query_to_send: query_to_send}, function(e)
		{
			$('.deal_tab_h4').text('Free Deals');
			$('.deals_div').html(e);

			deals_div_no = $('.deals_div .content_div').length;
			if(deals_div_no ==0)
			{
				$('.deals_div').html("sorry no such deals found at the moment <br><br>").css('color', 'red');
			}
		});

		$('.content_deal_page').fadeOut(0);
		$('.load_more_deal').fadeOut(0);
	}
	else if(selected_tab == "below_nn")
	{
		var query_to_send = "SELECT * FROM content_deal WHERE price <= 99 ORDER BY id DESC LIMIT 30";
		$.post('php/deal_viewer.php', {query_to_send: query_to_send}, function(e)
		{
			$('.deals_div').html(e);
			$('.deal_tab_h4').html('Under &#8377 99');

			deals_div_no = $('.deals_div .content_div').length;
			if(deals_div_no ==0)
			{
				$('.deals_div').html("sorry no such deals found at the moment <br><br>").css('color', 'red');
			}
		});

		$('.content_deal_page').fadeOut(0);
		$('.load_more_deal').fadeOut(0);
	}
	else if(selected_tab == "greater_fifty")
	{
		var query_to_send = "SELECT * FROM content_deal WHERE off >= 50 ORDER BY id DESC LIMIT 30";
		$.post('php/deal_viewer.php', {query_to_send: query_to_send}, function(e)
		{
			$('.deal_tab_h4').text('50% Off');
			$('.deals_div').html(e);

			deals_div_no = $('.deals_div .content_div').length;
			if(deals_div_no ==0)
			{
				$('.deals_div').html("sorry no such deals found at the moment <br><br>").css('color', 'red');
			}
		});

		$('.content_deal_page').fadeOut(0);
		$('.load_more_deal').fadeOut(0);
	}

/*----for getting total no of content div----*/
	content_query_div_no = "SELECT * FROM content_deal";
	$.post('php/content_deal.php', {content_query: content_query_div_no}, function(e)
	{
		$('.content_div_no').html(e);
		content_div_no = $('.content_div_no .content_div').length;
	});

/*----for generatng load more for content deal----*/
	start =0;
	limit = 50;
	org_limit = 50;

	content_query = "SELECT * FROM content_deal ORDER BY id DESC LIMIT " + start + ", " + limit;
	$.post('php/content_deal.php', {content_query: content_query}, function(e)
	{
		$('.content_deal_page').html(e);

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
		content_query = "SELECT * FROM content_deal ORDER BY id DESC LIMIT " + start + ", " + limit;
		$.post('php/content_deal.php', {content_query: content_query}, function(e)
		{
			$('.content_deal_page').html(e);
			content_deal_page_no = $('.content_deal_page .content_div').length;

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